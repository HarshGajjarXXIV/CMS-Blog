<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Hacker;
use App\Post;
use App\Tag;
use Session;

class PagesController extends Controller
{   
    private $paginate;
    private $recent;


    public function __construct() {
        $this->paginate = 10;
        $this->recent = 5;
    }


    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
                    ->paginate($this->paginate);

        $categories = Category::all();

        return view('pages.home')->withPosts($posts)
                                ->withCategories($categories);
    }


    public function category($name)
    {
        $category = Category::where('name', '=', str_slug($name, ' '))->first();

        if($category != null)
        {
            
            $posts = Post::where('category_id', '=', $category->id)
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->paginate);
            

            $recentposts = Post::where('category_id', '!=', $category->id)
                                ->orderBy('created_at', 'desc')
                                ->take($this->recent)->get();

            $categories = Category::all();
            
            return view('pages.category')->withPosts($posts)
                                        ->withCategory($category)
                                        ->withRecentposts($recentposts)
                                        ->withCategories($categories);
        }
        return view('errors.404');
    }


    public function tag($name)
    {
        $tag = Tag::where('name', '=', str_slug($name, ' '))->first();

        if($tag != null)
        {
            $posts = $tag->posts()
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->paginate);

            $recentposts = Post::orderBy('created_at', 'desc')
                                ->take($this->recent)->get();

            $categories = Category::all();

            return view('pages.tag')->withPosts($posts)
                                    ->withTag($tag)
                                    ->withRecentposts($recentposts)
                                    ->withCategories($categories);
        }
        return view('errors.404');
    }


    public function post($urltext)
    {
        $post = Post::where('urltext', '=', $urltext)->first();

        if($post != null)
        {
            $recentposts = Post::where('title', '!=', $post->title)
                                ->where('category_id', '!=', $post->category_id)
                                ->orderBy('created_at', 'desc')
                                ->take($this->recent)->get();

            $relatedposts = Post::where('title', '!=', $post->title)
                                ->where('category_id', '=', $post->category_id)
                                ->orderBy('created_at', 'desc')
                                ->take(6)->get();

            $categories = Category::all();
            $hacker = Hacker::where('user', '=', $post->posted_by)->first();

            //update views
            $test = Post::find($post->id);
            $test->views = $post->views+1;
            $test->save();

            return view('pages.post')->withPost($post)
                                    ->withRecentposts($recentposts)
                                    ->withRelatedposts($relatedposts)
                                    ->withCategories($categories)
                                    ->withHacker($hacker);
        }
        return view('errors.404');
    }


    public function author($user)
    {
        $hacker = Hacker::where('user', '=', $user)->first();

        if ($hacker != null)
        {
            $posts = Post::where('posted_by', '=', $hacker->user)
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->paginate);

            $recentposts = Post::where('posted_by', '!=', $hacker->user)
                                ->orderBy('created_at', 'desc')->take($this->recent)->get();

            $categories = Category::all();
            

            return view('pages.author')->withPosts($posts)
                                    ->withRecentposts($recentposts)
                                    ->withCategories($categories)
                                    ->withHacker($hacker);
        }
        return view('errors.404');
    }


    public function result(Request $request)
    {

        $key = $request->input('key');

        if($key != null)
        {
            $category = Category::where('name', '=', $key)->first();

            if($category != null)
            {
                $id = $category->id;
            }
            else
            {
                $id = '';
            }

            $posts = Post::search($key, $id)->orderBy('created_at', 'desc')->paginate($this->paginate);
            $recentposts = Post::orderBy('created_at', 'desc')->take($this->recent)->get();
            $categories = Category::all();    

            return view('pages.search')->withPosts($posts)
                                    ->withRecentposts($recentposts)
                                    ->withCategories($categories);
        }
        return view('errors.404');
    }


    public function about()
    {
        $recentposts = Post::orderBy('created_at', 'desc')->take($this->recent)->get();
        $categories = Category::all();

        return view('pages.about')->withRecentposts($recentposts)
                                ->withCategories($categories);
    }


    public function contact()
    {
        $recentposts = Post::orderBy('created_at', 'desc')->take($this->recent)->get();
        $categories = Category::all();

        return view('pages.contact')->withRecentposts($recentposts)
                                    ->withCategories($categories);
    }
    

    public function privacyPolicy()
    {
        $recentposts = Post::orderBy('created_at', 'desc')->take($this->recent)->get();
        $categories = Category::all();

        return view('pages.privacy_policy')->withRecentposts($recentposts)
                                        ->withCategories($categories);
    }


    public function terms()
    {
        $recentposts = Post::orderBy('created_at', 'desc')->take($this->recent)->get();
        $categories = Category::all();

        return view('pages.terms')->withRecentposts($recentposts)
                                ->withCategories($categories);
    }

};
