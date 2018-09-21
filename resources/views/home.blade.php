@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/dropzone.min.css') }}">
<script src="{{ url('js/dropzone.js') }}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="{{ url('/file-upload') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
                      <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                </div>
                <div id="hidden-group"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var counts = 0;
    Dropzone.options.myAwesomeDropzone = {
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      addRemoveLinks: true,
      acceptedFiles:'.jpg,.pdf',
      success: function (file, response) {
          counts= this.files.length;
          if (file.status == 'success') {
            HandleDropzoneFileUpload.handleSuccess(response);
          }
          else {
            HandleDropzoneFileUpload.handleError(response);
          }
      },
      init:function() {

        this.on("removedfile", function(file) {
            $.ajax({
                type: 'POST',
                url: 'upload/delete',
                data: {id: file.name, _token: $('#csrf-token').val() },
                dataType: 'html',
                 success: function(data){
                    var rep = JSON.parse(data);
                 }
            });
        } );
      },
    };
    var count = 1;
    var HandleDropzoneFileUpload = {
      handleError: function (response) {
        console.log('Sorry ther is some error while uploading');
      },
      handleSuccess: function (response) {
        var elementid = $('#hidden-group');
        var file_id = response.id;
        console.log(count);
        $(elementid).append('<input type="hidden" name="filecount' + count++ + '" value="' + file_id + '">');
        if (count == counts) {
          $(elementid).append('<input type="hidden" name="totalfiles" value="' + counts + '">');
        }
      }
    };
</script>
@endsection
