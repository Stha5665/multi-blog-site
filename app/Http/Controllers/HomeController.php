<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\addBlogRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        if(isset($_GET['category'])){
            $blogs = $blogs->where('category_id', $_GET['category']);
        }
        return view('guest.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('guest.addBlog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addBlogRequest $request)
    {
        $validateData = $request->validated();
        $category = Category::findOrFail($validateData['category_id']);

        if($category){

            if($request->hasFile('image')){
                $image = $request->image;
                $uploadPath = 'public/image/';
                $extension = $image->getClientOriginalExtension();
                $fileName = date('YmdHis').'.'.$extension;
                $image->move($uploadPath, $fileName);

                $insertData = [
                    'title' => $validateData['title'],
                    'category_id' => $category->id,
                    'description' => $validateData['description'],
                    'image' => $fileName,
                    'user_id' => auth()->user()->id
                                    
                ];

                Blog::create($insertData);


            }

            return redirect()->back()
            ->with('success','Blog created successfully.');
        }else{
            return redirect()->back()
            ->with('warning','Category Not found!!.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $blog = Blog::find($id);
       $categories = Category::all();
       return view('guest.show', compact('blog', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        dd($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
