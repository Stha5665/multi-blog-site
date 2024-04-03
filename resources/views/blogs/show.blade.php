@extends('layouts.admin')
 
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3>Blog</h3>
                    <a class="btn btn-primary btn-sm" href="{{ route('blogs.index') }}"> Back</a>
                
            </div>
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group text-center">
                        <h4><strong>Title:</strong>
                        {{ $blog->title }}</h4>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        @if($blog->image)
                            <img src="{{url('public/image/'.$blog->image) }}" alt="images" height="300" width="400">
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $blog->description }}
                    </div>
                </div>
        </div>
    </div>
@endsection