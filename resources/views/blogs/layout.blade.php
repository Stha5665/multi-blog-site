<!DOCTYPE html>
<html>
<head>
<title>Main layout page </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- TinyMCE CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        forced_root_block : "" ,
        selector: 'textarea#tiny'
      });

</script>
<script>
  .mce-notification {display: none !important;}
</script>
</head>
<body>
<div class="jumbotron text-center">
  <h3>Laravel </h3>
</div>
  
<div class="container">
    @yield('content')
</div>
</body>
</html>