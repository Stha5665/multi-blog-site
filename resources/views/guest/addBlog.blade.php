@extends('guest.layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto mb-2">
        @include('message.success')
            <div class="card" style="background: #555692">
                <div class="card-header">
                    <h3>Add New Blog
                    </h3>
                </div>
                <div class="card-body col-md-8 m-auto">
                        <form action="{{ url('addBlog/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Title:</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                    @error('title') 
                                    <small class="text-warning">{{$message}}</small>
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
                                    <small class="text-warning">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Description:</label>
                                    <textarea id="tiny" name="description" placeholder="Description" style="height:200px;"></textarea>
                                    @error('description') 
                                    <small class="text-warning">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Image: </label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image') 
                                    <small class="text-warning">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                </div>
                
            </div>  
        </div>
    </div>


@endsection