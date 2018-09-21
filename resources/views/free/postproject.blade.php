@extends('master')

@section('title')
    Post A Project | Pro Education
@endsection

@section('keywords')
   Post Project, Project Post
@endsection

@section('description')
   profile
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ url('css/dropzone.min.css') }}">
<script src="{{ url('js/dropzone.js') }}"></script>
@endsection

@section('content')
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ url('/fileupload') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
                      <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                </div>
                <div class="hidden-group"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<form enctype="multipart/form-data" action="/postproject" method="POST">
			<div class="hidden-group"></div>
			<ul>
				<li>
					<div class="form-group">
						<label for="sel1">Select Project Category :</label>
						<select class="form-control" id="cat_job" name="cat_job" required>
							<option value=""></option>
							@foreach($categories as $category)
								<option value="{{$category->name}}" name="{{ $category->name }}">{{ $category->name }}</option>
							@endforeach
						</select>
						<select class="form-control" id="cate_job" name="cate_job" style="display: none; margin-top: 10px" required></select>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="project_name">Project Name :</label>
						<input type="text" id="project_name" name="name" class="form-control" required>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="project_skills">Skills Required :</label>					
						<select class="js-example-basic-multiple-limit" name="skills_multiple[]" style="width: 100%" multiple="multiple" required>
						  @foreach($skills as $skill)
							<option value="{{ $skill->name }}">{{ $skill->name }}</option>
						  @endforeach
						</select>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="project_description">Describe Your Project :</label>
						<textarea rows="5" id="project_description" name="project_description" class="form-control" required></textarea>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="project_budget">Add Budget To Your Project : (<small>In Rupee</small>)</label><br>
						<div class="col-xs-12 col-sm-5" style="display: inline-table;">
							<span style="padding: 10px;">From : </span>
							<input type="number" id="project_budget" name="project_budget1" class="form-control asd-bud min" required>
						</div>
						<div class="col-xs-12 col-sm-5">
							<span style="padding: 10px;">To : </span>
							<input type="number" id="project_budget" name="project_budget2" class="form-control asd-bud max" required>
						</div>
						<h5 id="error" style="margin: 20px;padding: 0px 20px;color: #ff8375;display: none;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> "To" Value Should Be Grater Than "From" value</h5>
					</div>
				</li>
				<li>
					<br>
					<div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
            			<input type="submit" class="btn btn-success" style="padding: 10px;">
            		</div>
				</li>
			</ul>
		</form>
	</div>
</div>
@endsection

@section('script')
<script>
    var counts = 0;
    Dropzone.options.myAwesomeDropzone = {
      paramName: "file", // The name that will be used to transfer the file
      uploadMultiple: false,
      parallelUploads: 100,
      dictDefaultMessage: 'Upload Project Files here (if any) Before subbmitting form.',
      maxFilesize: 5, // MB
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
                url: 'fileupload/delete',
                data: {id: file.name, _token: $('#csrf-token').val() },
                dataType: 'html',
                 success: function(data){
                    var rep = JSON.parse(data);
                 }
            });
        } );
      },
    };
    var countfiles = 1;
    var HandleDropzoneFileUpload = {
      handleError: function (response) {
        console.log('Sorry ther is some error while uploading');
      },
      handleSuccess: function (response) {
        var elementid = $('.hidden-group');
        var file_id = response.id;
        $(elementid).append('<input type="hidden" name="filedet[' + countfiles++ + ']" value="' + file_id + '">');
        if (countfiles == counts) {
          $(elementid).append('<input type="hidden" name="totalfiles" value="' + counts + '">');
        }
      }
    };
</script>
<script>
	$(function () {

		$('.asd-bud').change(function () {
			var min = $('.min').val();
		 var max = $('.max').val();

		 if(min>=max)$('#error').show();
		 else $('#error').hide();
		});
		 
		$('#cat_job').change(function () {
			//console.log('e');
			var cat_id = $(this).val();
			var div = $(this).parent();
			var op = " ";
			//console.log(cat_id);
			$('#cate_job').show();
			$.ajax({
				type: 'get',
				url : '{!!URL::to('findproductname')!!}',
				data : {'name':cat_id},
				success : function (data) {
					//console.log('success');
                		for(var i=0;i<data.length;i++){
               				op+='<option value="'+data[i].name+'">'+data[i].name+'</option>';
               			}

               			div.find('#cate_job').html("");
               			div.find('#cate_job').append(op);
					//console.log(data);
				},
				error : function () {
					
				},
			});
		});
	});
</script>
@endsection
