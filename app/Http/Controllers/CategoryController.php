<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;
use Session;


class CategoryController extends Controller
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
            $categories = Category::all();
            return view('categories.categories')->withCategories($categories);
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
        if(Auth::user()->level == 'Administrator')
        {
            $this->validate($request, array(
                'name' => 'required|max:50|unique:categories,name'
                ));

            $category = new Category;

            $category->name = $request->name;
            $category->save();

            Session::flash('success', 'New category has been added successfully');

            return redirect()->route('categories.index');
        }
            return view('errors.404');
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
            $category = Category::find($id);
            return view('categories.show')->withCategory($category);
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
            $category = Category::find($id);
            return view('categories.edit')->withCategory($category);
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
        if(Auth::user()->level == 'Administrator')
        {
            $category = Category::find($id);

            $this->validate($request, ['name' => 'required|max:50|unique:categories,name']);
            $category->name = $request->name;
            $category->save();

            Session::flash('success', 'Category has been updated successfully');

            return redirect()->route('categories.show', $category->id);
        }
            return view('errors.404');
    }
}
