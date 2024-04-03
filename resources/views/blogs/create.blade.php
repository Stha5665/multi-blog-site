@extends('layouts.admin')
  
    @section('content')
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Blog
                            <a href="{{ route('blogs.index') }}" class="btn btn-danger btn-sm text-white float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">  
   
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Title:</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                    @error('title') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Category:</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label>Description:</label>
                                    <textarea id="tiny" name="description" placeholder="Description" style="height:250px;"></textarea>
                                    @error('description') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image: </label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image') 
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   @endsection