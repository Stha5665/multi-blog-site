@extends('guest.layout')
@section('content')
<div class="blogs">
        <div class="row">
            <div class="row-title">
                <div class="title">
                    <h3>{{$blog->title}}</h3>
                    <h4>By: {{$blog->user->name}}</h3>
                    <h6>Date Published: <?=$blog->created_at->format('Y-m-d') ?></h6>
                    <h6><?=$blog->created_at->format('H-i-s') ?></h6>
                </div>
                <div class="icon">
                    <ul>
                        <li> <a href="#"> <img src="/public/image/facebook.png" alt=""></a></li>
                        <li> <a href="#"> <img src="/public/image/twitter.png" alt=""></a></li>
                        <li> <a href="#"> <img src="/public/image/linkedin.png" alt=""></a></li>
                    </ul>
                </div>
            </div>

            <hr>
            <div class="img">
    
                <img src="/public/image/{{$blog->image}}" >
                
            </div>
            <div class="text">
    
                <p>{!!$blog->description!!}</p>
            </div>
        </div>
    </div>
@endsection