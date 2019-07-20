<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use App\Hacker;
use App\Message;
use App\Comment;
use Auth;
use Image;
use File;
use Session;

class HackersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:hacker');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->level == 'Administrator')
      {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        
      }
      else 
      {
        $posts = Post::where('posted_by', '=', Auth::user()->user)
                      ->orderBy('created_at', 'desc')->paginate(10);
      }

      return view('posts.home')->withPosts($posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $hackers = Hacker::all();
      $categories = Category::all();
      $tags = Tag::all();
      return view('posts.create')->withCategories($categories)->withTags($tags)->withHackers($hackers);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //data validaton
      $this->validate($request, array(
              'title' => 'required|max:100|unique:posts,title',
              'category_id' => 'required|integer',
              'thumbnail' => 'required|image',
              'body' => 'required',
              'posted_by' => 'required'
          ));

      //data storing
      $post = new Post;
      $post->title = $request->title;
      $post->urltext = str_slug($request->title);
      $post->category_id = $request->category_id;
      $post->body = $request->body;
      $post->posted_by = $request->posted_by;

      //upload thumbnail
      $image =  $request->file('thumbnail');
      $filename = $post->urltext.'.'.$image->getClientOriginalExtension();
      $location = public_path('images/head/' . $filename);
      Image::make($image)->resize(800, 400)->save($location);

      //store image name to database
      $post->thumbnail = $filename;

      //save post to database
      $post->save();

      //associates tags to post
      $post->tags()->sync($request->tags, false);

      //flash session
      Session::flash('success', 'The post has been saved successfully.');

      //redirect
      return redirect()->route('exploit.show',$post->urltext);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urltext)
    {
      $post = Post::where('urltext', '=', $urltext)->first();

      if($post != '')
      {
        if(Auth::user()->level == 'Administrator' || $post->posted_by == Auth::user()->user)
        {
          return view('posts.show')->withPost($post);
        }
        else {
          return view('errors.404');
        }
      }
      
      return view('errors.404');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urltext)
    {
      $post = Post::where('urltext', '=', $urltext)->first();

      if(Auth::user()->level == 'Administrator' || $post->posted_by == Auth::user()->user)
      {
        $categories = Category::all();
        $allcats = array();
        foreach ($categories as $category) {
            $allcats[$category->id] = $category->name;
        }

        $hackers = Hacker::all();
        $allhackers = array();
        foreach ($hackers as $hacker) {
            $allhackers[$hacker->user] = $hacker->name;
        }

        $tags = Tag::all();
        $alltags = array();
        foreach ($tags as $tag) {
            $alltags[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($allcats)->withTags($alltags)->withHackers($allhackers);
      }

      return view('errors.404');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      //data validaton
      if($request->input('title') == $post->title) {

        $this->validate($request, array(
          'category_id' => 'required|integer',
          'thumbnail' => 'sometimes|image',
          'body' => 'required',
          'posted_by' => 'required'
        ));

      } else {

        $this->validate($request, array(
            'title' => 'required|max:100|unique:posts,title',
            'category_id' => 'required|integer',
            'thumbnail' => 'sometimes|image',
            'body' => 'required',
            'posted_by' => 'required'
        ));
        
        if(!$request->hasFile('thumbnail')) {

          $oldfilename = $post->thumbnail;
          $image = public_path('images/head/'.$oldfilename);
          $filename = str_slug($request->input('title')).'.'.File::extension($image);
          $location = public_path('images/head/'.$filename);
          Image::make($image)->resize(800, 400)->save($location);
          $post->thumbnail = $filename;

          File::delete(public_path('images/head/'.$oldfilename));

        }

      }
     
      //save data to database
      $post->title = $request->input('title');
      $post->urltext = str_slug($request->input('title'));
      $post->category_id = $request->input('category_id');
      $post->body = $request->input('body');
      $post->posted_by = $request->input('posted_by');

      //upload thumbnail if new thumbnail is avalible
      if ($request->hasFile('thumbnail')) {
        //get old thumbnail name
        $oldfilename = $post->thumbnail;

        //delete old thumbnail
        File::delete(public_path('images/head/'.$oldfilename));

        $image =  $request->file('thumbnail');
        $filename = $post->urltext.'.'.$image->getClientOriginalExtension();
        $location = public_path('images/head/'.$filename);
        Image::make($image)->resize(800, 400)->save($location);

        //store image name to database
        $post->thumbnail = $filename;
      }
     
      $post->save();

      //associates tags to post
      if (isset($request->tags)) {
          $post->tags()->sync($request->tags);
      } else {
          $post->tags()->sync(array());
      } 

      //flash session
      Session::flash('success', 'The post has been updated successfully.');

      //redirect
      return redirect()->route('exploit.show',$post->urltext);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->tags()->detach();

      File::delete(public_path('images/head/'.$post->thumbnail));

      $post->delete();

      Session::flash('success', 'The post has been deleted successfully');
      return redirect()->route('exploit.index');
    }

    public function messages()
    {
      $messages = Message::orderBy('created_at', 'desc')->paginate(10);
      return view('messages.messages')->withMessages($messages);
    }


    public function statistics()
    {
      $posts = Post::all();
      $categories = Category::all();
      $tags = Tag::all();
      $comments = Comment::all();
      $messages = Message::all();
      return view('statistics.statistics')->withPosts($posts)->withCategories($categories)->withTags($tags)->withComments($comments)->withMessages($messages);
    }
}
