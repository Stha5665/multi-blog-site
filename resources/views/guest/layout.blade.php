
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/blog.css') }}" />

    <!-- TinyMCE CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        tinymce.init({
            forced_root_block : "" ,
            selector: 'textarea#tiny'
        });

    </script>
    <style>
    .mce-notification {display: none !important;}
    </style>


    <title>Blog Website</title>
</head>
<body>
    <div class="container">
        <nav>
            <img src="/public/image/logo.png" class="logo">
            <ul>

              <li><a class="nav-link active" aria-current="page" href="/">Home</a></li>
              <li>
                <div class="dropdown">
                    <a class="dropbtn">Category</a>
                    <div class="dropdown-content">
                        @foreach($categories as $category)
                        <a href="/home?category={{$category->id}}">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </li>

              @if(Auth::check())
                <li><a class="nav-link" href="{{url('/addBlog')}}">Add Blog</a></li>
                <li><a class="nav-link" href="{{route('signout')}}">Signout</a></li>
              @else
                <li><a class="nav-link" href="{{route('registration')}}">Register</a></li>
                <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
              @endif
            </ul>
        </nav>
        <div class="content">
            <h1>Beautiful<br> place to explore</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quaerat ducimus tempora, temporibus ad maiores. Dolorum sunt rerum libero ipsa distinctio, illum explicabo dolor. Quasi cum magnam sequi quidem neque?</p>
        </div>
    </div>

    @yield('content')

    <div class="footer">
        <h2>Questions? call 000-000-000-000</h2>
        <div class="row">
            <div class="col">
                <a href="#">FAQ</a>
                <a href="#">Investor Relations</a>
                <a href="#">Speed Test</a>
            </div>
            <div class="col">
                <a href="#">Help Center</a>
                <a href="#">Jobs</a>
                <a href="#">Speed Cookies</a>
                <a href="#">Legal Notices</a>
            </div>
            <div class="col">
                <a href="#">Account</a>
                <a href="#">Ways to watch</a>
                <a href="#">Corporate Information</a>
                <a href="#">Only on Netflix</a>
            </div>
            <div class="col">
                <a href="#">Media Centre</a>
                <a href="#">Terms of Use</a>
                <a href="#">Contact Us</a>
            </div>
            
        </div>
    </div>

    <script>
        window.addEventListener('message', event =>{

            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>
</body>
</html>

