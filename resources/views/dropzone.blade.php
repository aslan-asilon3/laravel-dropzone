<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Ajax file Upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{asset('fav.png')}}" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('dropzone/dropzone.min.css')}}">
</head>
<body>

<div class="container">
    <div class="jumbotron">
      <h2 class="text-center">Dropzone file upload</h2>
        <form id="my-awesome-dropzone" class="dropzone">
          @csrf
        </form>
    </div>

    <button type="submit" id="button" class="btn btn-success" >Submit</button>
    <div class="row clearfix"></div>
    <div id="success_box" class="alert alert-success alert-dismissable" style="display: none;margin-top: 20px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Success !</strong>&emsp;All Files uploaded successfully.</div>    

</div>
<!-- https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types -->
<!-- https://www.dropzonejs.com -->
<script type="text/javascript" src="{{asset('dropzone/dropzone.min.js')}}"></script>
<script>
      Dropzone.autoDiscover = false;
      $("form#my-awesome-dropzone").dropzone({
        url: "file-upload",
        autoProcessQueue: false,
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        uploadMultiple :false,
        maxFilesize: 5, // MB
        addRemoveLinks: true,
        acceptedFiles: "image/*,application/pdf,application/msword",
        accept: function(file, done) {
            // console.log(file, done);
            if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        },
        
        init: function () {
            var myDropzone = this;
            $("#button").click(function (e) {
              e.preventDefault();
              myDropzone.processQueue();
            });
            this.on("complete", function (file) {
            // console.log(file, done);
            if(this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                if(file.status=="error"){
                  console.log(file);
                  return false;
                }
                $('#success_box').css('display','block');
                setTimeout(function(){
                  $('#success_box').css('display','none');
                }, 4000);
              }
          });
        }
      });

      
    </script>
</body>
</html>
