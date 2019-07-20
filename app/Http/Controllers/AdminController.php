<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hacker;
use App\Post;
use Auth;
use Image;
use File;
use Hash;
use Session;

class AdminController extends Controller
{
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
            $hackers = Hacker::all();
            return view('admins.admins')->withHackers($hackers);
        }

        return view('errors.404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'Administrator')
        {
            return view('admins.create');
        }

        return view('errors.404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:100',
            'user' => 'required|unique:hackers,user|max:20|min:5',
            'email' => 'required|email|unique:hackers,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'level' => 'required'
        ));

        $hacker = new Hacker;
        $hacker->name = $request->input('name');
        $hacker->user = $request->input('user');
        $hacker->email = $request->input('email');
        $password = $request->input('password');
        $hacker->password = Hash::make($password);
        $hacker->level = $request->input('level');

        $hacker->save();

        Session::flash('success', 'Admin has been added successfully.');
        return redirect()->route('admins.show', $hacker->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == 'Administrator')
        {           
            $hacker = Hacker::find($id);
            $posts = Post::where('posted_by', '=',$hacker->user );
            return view('admins.show')->withHacker($hacker)
                                    ->withPosts($posts);
        }

        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->level == 'Administrator')
        {
            $hacker = Hacker::where('id', '=', $id)->first();
            return view('admins.edit')->withHacker($hacker);
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
        $hacker = Hacker::find($id);
        $change = false;

        if($request->input('user') == $hacker->user && $request->input('email') == $hacker->email) {
            $this->validate($request, array(
                'profile_pic' => 'sometimes|image',
                'name' => 'required|max:100',
                'twitter' => 'sometimes|max:100',
                'fb' => 'sometimes|max:100',
                'insta' => 'sometimes|max:100',
                'about' => 'sometimes',
                'level' => 'required'
            ));
        } 

        if($request->input('user') == $hacker->user && $request->input('email') != $hacker->email) {
            $this->validate($request, array(
                'profile_pic' => 'sometimes|image',
                'name' => 'required|max:100',
                'email' => 'required|email|unique:hackers,email',
                'twitter' => 'sometimes|max:100',
                'fb' => 'sometimes|max:100',
                'insta' => 'sometimes|max:100',
                'about' => 'sometimes',
                'level' => 'required'
            ));
        } 

        if($request->input('user') != $hacker->user && $request->input('email') == $hacker->email) {
            $this->validate($request, array(
                'profile_pic' => 'sometimes|image',
                'name' => 'required|max:100',
                'user' => 'required|unique:hackers,user|max:20|min:5',
                'twitter' => 'sometimes|max:100',
                'fb' => 'sometimes|max:100',
                'insta' => 'sometimes|max:100',
                'about' => 'sometimes',
                'level' => 'required'
            ));

            if(!$request->hasFile('profile_pic')) {
                $change = true;
            }
            
            $temps = Post::where('posted_by', '=', $hacker->user)->get();

            foreach ($temps as $temp) {
                $post = Post::find($temp->id);
                $post->posted_by = $request->input('user');
                $post->save();
            }

        } 

        if($request->input('user') != $hacker->user && $request->input('email') != $hacker->email) {
            $this->validate($request, array(
                'profile_pic' => 'sometimes|image',
                'name' => 'required|max:100',
                'user' => 'required|unique:hackers,user|max:20|min:5',
                'email' => 'required|email|unique:hackers,email',
                'twitter' => 'sometimes|max:100',
                'fb' => 'sometimes|max:100',
                'insta' => 'sometimes|max:100',
                'about' => 'sometimes',
                'level' => 'required'
            ));

            if(!$request->hasFile('profile_pic')) {
                $change = true;
            }
            
            $temps = Post::where('posted_by', '=', $hacker->user)->get();

            foreach ($temps as $temp) {
                $post = Post::find($temp->id);
                $post->posted_by = $request->input('user');
                $post->save();
            }
        }

        $hacker->name = $request->input('name');
        $hacker->user = $request->input('user');
        $hacker->email = $request->input('email');
        $hacker->twitter = $request->input('twitter');
        $hacker->fb = $request->input('fb');
        $hacker->insta = $request->input('insta');
        $hacker->about = $request->input('about');
        $hacker->level = $request->input('level');

        if($change == true) {

            $oldfilename = $hacker->profile_pic;

            if($oldfilename != "default.jpg")
                File::delete(public_path('images/author/'.$oldfilename));

            $filename = $request->profile_pic->getClientOriginalName();
            $location = public_path('images/author/'.$filename);
            Image::make($image)->resize(720, 720)->save($location);
            $hacker->profile_pic = $filename;
        }

        if($request->hasFile('profile_pic')) {

            $oldfilename = $hacker->profile_pic;

            if($oldfilename != "default.jpg")
                File::delete(public_path('images/author/'.$oldfilename));

            $image =  $request->file('profile_pic');
            $filename = $request->profile_pic->getClientOriginalName();
            $location = public_path('images/author/'.$filename);
            Image::make($image)->resize(720, 720)->save($location);

            $hacker->profile_pic = $filename;
        }
        $hacker->save();

        Session::flash('success', 'Profile has been updated successfully.');

        return redirect()->route('admins.show', $hacker->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hacker = Hacker::find($id);

        $tmphacker = Hacker::where('name', '=', 'Technosploit')->first();

        $temps = Post::where('posted_by', '=', $hacker->user)->get();

        foreach ($temps as $temp) {
            $post = Post::find($temp->id);
            $post->posted_by = $tmphacker->user;
            $post->save();
        }

        $oldfilename = $hacker->profile_pic;

        if($oldfilename != "default.jpg")
            File::delete(public_path('images/author/'.$oldfilename));

        $hacker->delete();

        Session::flash('success', 'Admin has been removed successfully');
        return redirect()->route('admins.index');
    }


    public function password()
    {
        return view('admins.password');
    }


    public function passwordUpdate(Request $request)
    {
        $hacker = Hacker::find(Auth::user()->id);

        $this->validate($request, array(
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ));

        if(Hash::check($request->input('current_password'), $hacker->password))
        {
            $newHash = Hash::make($request->input('new_password'));
            $hacker->password = $newHash;
            $hacker->save();

            Session::flash('success', 'Password has been changed successfully');
            return redirect()->route('admins.password');
        }
        else 
        {
            Session::flash('custom', 'Current password does not match');
            return redirect()->route('admins.password');
        }

    }
}
