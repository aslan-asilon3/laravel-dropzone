<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Ajax file Upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('dropzone/basic.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('dropzone/dropzone.min.css')}}">
</head>
<body>

<div class="container">
    <div class="jumbotron">
      <h2 class="text-center">Dropzone file upload</h2>
        <form action="{{url('file-upload')}}" method="post" enctype="multipart/form-data" class="dropzone">
          @csrf
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('dropzone/dropzone.min.js')}}"></script>
</body>
</html>
