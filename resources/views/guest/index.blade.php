@extends('guest.layout')
@section('content')
    <div class="blogs">
        <h1>Blogs</h1>
        
       
        @foreach($blogs as $blog)

        <div class="row">
            @if($loop->even)
            <div class="img-col">
                <img src="/public/image/{{$blog->image}}">
            </div>

            <div class="text-col">
                <a href="home/{{$blog->id}}"><h2>{{ $blog->title }}</h2></a>
                <p>{{ Str::limit($blog->description, 50) }}</p>
            </div> 
            @else
            <div class="text-col">
                <a href="{{route('home.show',$blog->id)}}"><h2>{{ $blog->title }}</h2></a>
                <p>{{ Str::limit($blog->description, 80) }}</p>
            </div> 
            <div class="img-col">
                <img src="public/image/{{$blog->image}}">
            </div>
            @endif

        </div>
        
        @endforeach
    </div>
@endsection