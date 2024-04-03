
@extends('layouts.admin')
  
    @section('content')
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Blog
                            <a href="{{ route('blogs.index') }}" class="btn btn-danger btn-sm text-white float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">  
   
                        <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Title:</label>
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" placeholder="Title">
                                    @error('title') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Description:</label>
                                    <textarea id="tiny" name="description" placeholder="Description" style="height:250px;">{{$blog->description}}</textarea>
                                    @error('description') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image: </label>
                                    <input type="file" name="image" class="form-control">
                                    @if($blog->image)
                                        <img src="{{url('public/image/'.$blog->image) }}" alt="images" height="300" width="300">
                                        <input type="hidden" name="oldphoto" value="{{$blog->image}}">
                                    @endif
                                    @error('image') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary">update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   @endsection