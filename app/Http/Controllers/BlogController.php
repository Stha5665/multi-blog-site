<?php

namespace App\Http\Controllers;
// use Illuminate\Pagination\Paginator;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Paginator::useBootstrap();
        // default pagination
        $blogs = Blog::latest()->paginate(3);
        return view('blogs.index',compact('blogs'))->with('i',(request()->input('page',1)-1)*5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category_id' => [
                'required', 'integer'
            ]
        ]);
  
        if($files = $request->file('image')){
            $path = 'public/image/'; 
            $imageName = date('YmdHis').".".$files->getClientOriginalExtension();
            $files -> move($path,$imageName);
            $insert = [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'image' => $imageName,
                'category_id' => $request->get('category_id'),
                'user_id' => auth()->user()->id

            ];


            Blog::create($insert);
        }
   
        return redirect()->route('blogs.index')
                        ->with('success','Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit',compact('blog'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $update = [];
        if($files = $request->file('image')){

            $path = 'public/image/'; 
            $imageName = date('YmdHis').".".$files->getClientOriginalExtension();
            $files -> move($path,$imageName);
            
            $update = [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'image' => $imageName

            ];

            // to remove old photo

            $imageName = $path.$request->get('oldphoto');
            $this->deletephoto($imageName);

        }else{

            $update = [
                'title' => $request->get('title'),
                'description' => $request->get('description')
            ];
        }

            $blog->update($update);
            return redirect()->route('blogs.index')
                            ->with('success','Blog updated successfully');
        
  
  
    }
  
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $imageName = 'public/image/'.$blog->image;
        $this->deletephoto($imageName);
        
        $blog->delete();
  
        return redirect()->route('blogs.index')
                        ->with('success','Blogs deleted successfully');
    }

    function deletephoto($imageName){
        if(file_exists($imageName)){
            @unlink($imageName);
        }
    }

}
