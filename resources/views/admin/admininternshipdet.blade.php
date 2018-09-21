@extends('admin.admin')

@section('admin_title')
Admin Pannel | Internship Details | ProEducation
@endsection

@section('page_name')
Internship Details Data
@stop

@section('page_dis')
Total Internship Details
@stop

@section('levels')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#">Internship Details</a></li>
	</ol>
@stop

@section('style')
  <script src="{{ url('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
  <script>
  	var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);

  </script>
@end

@section('admincontent')
    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{ url('/admininterndetregister') }}" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          	<div class="form-group">
          		<label for="internship_category_id" class="col-sm-2 control-label">Internship Category : </label>
	            <div class="col-sm-9">
	                <select class="form-control" name="internship_category_id">
	                  	@foreach($intern_cats as $intern_cat)
	                  		<option value="{{ $intern_cat->id }}">{{ $intern_cat->internship_category }}</option>
	                  	@endforeach
	                </select>
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          		<label for="title" class="col-sm-2 control-label">Title : </label>
	            <div class="col-sm-9">
	            	<input class="form-control" id="title" type="name" name="title" value="{{ old('title') }}" required>

	            	@if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                     @endif
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('powered_by') ? ' has-error' : '' }}">
          		<label for="powered_by" class="col-sm-2 control-label">BY : </label>
	            <div class="col-sm-9">
	            	<input class="form-control" id="powered_by" type="name" name="powered_by" value="{{ old('powered_by') }}" required>

	            	@if ($errors->has('powered_by'))
                        <span class="help-block">
                            <strong>{{ $errors->first('powered_by') }}</strong>
                        </span>
                     @endif
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
          		<label for="introduction" class="col-sm-2 control-label">Introduction : </label>
	            <div class="col-sm-9">
	            	<textarea class="form-control my-editor" id="introduction" rows="10" name="introduction">{{ old('introduction') }}</textarea>

	            	@if ($errors->has('introduction'))
                        <span class="help-block">
                            <strong>{{ $errors->first('introduction') }}</strong>
                        </span>
                     @endif
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
          		<label for="location" class="col-sm-2 control-label">Location : </label>
	            <div class="col-sm-5">
	            	<input class="form-control" id="location" type="name" name="location" value="{{ old('location') }}" required>

	            	@if ($errors->has('location'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                     @endif
	            </div>
	            <div class="col-sm-5">
	            	<h5><b>Note :</b><p>If you have multiple locations, seperate them with <b>'.'</b></p></h5>
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('dates') ? ' has-error' : '' }}">
          		<label for="dates" class="col-sm-2 control-label">Dates : </label>
	            <div class="col-sm-5">
	            	<input class="form-control" id="dates" type="name" name="dates" value="{{ old('dates') }}" required>

	            	@if ($errors->has('dates'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dates') }}</strong>
                        </span>
                     @endif
	            </div>
	            <div class="col-sm-5">
	            	<h5><b>Note :</b><p>If you have multiple dates, seperate them with <b>'.'</b></p></h5>
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('venue') ? ' has-error' : '' }}">
          		<label for="venue" class="col-sm-2 control-label">Venue : </label>
	            <div class="col-sm-5">
	            	<input class="form-control" id="venue" type="name" name="venue" value="{{ old('venue') }}" required>

	            	@if ($errors->has('venue'))
                        <span class="help-block">
                            <strong>{{ $errors->first('venue') }}</strong>
                        </span>
                     @endif
	            </div>
	            <div class="col-sm-5">
	            	<h5><b>Note :</b><p>If you have multiple venue's, seperate them with <b>'.'</b></p></h5>
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('contact_numbers') ? ' has-error' : '' }}">
          		<label for="contact_numbers" class="col-sm-2 control-label">Contact Numbers : </label>
	            <div class="col-sm-5">
	            	<input class="form-control" id="contact_numbers" type="name" name="contact_numbers" value="{{ old('contact_numbers') }}" required>

	            	@if ($errors->has('contact_numbers'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_numbers') }}</strong>
                        </span>
                     @endif
	            </div>
	            <div class="col-sm-5">
	            	<h5><b>Note :</b><p>If you have multiple contact numbers, seperate them with <b>'.'</b></p></h5>
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('accommodation_fee') ? ' has-error' : '' }}">
          		<label for="accommodation_fee" class="col-sm-2 control-label">Accommodation Fee : </label>
	            <div class="col-sm-5">
	            	<input class="form-control" id="accommodation_fee" type="name" name="accommodation_fee" value="{{ old('accommodation_fee') }}" required>

	            	@if ($errors->has('accommodation_fee'))
                        <span class="help-block">
                            <strong>{{ $errors->first('accommodation_fee') }}</strong>
                        </span>
                     @endif
	            </div>
	            <div class="col-sm-5">
	            	<h5><b>Note :</b><p>If you have multiple accommodation fee's, seperate them with <b>'.'</b></p></h5>
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('highlights') ? ' has-error' : '' }}">
          		<label for="highlights" class="col-sm-2 control-label">Highlights : </label>
	            <div class="col-sm-9">
	            	<textarea class="form-control my-editor" id="highlights" rows="10" name="highlights">{{ old('highlights') }}</textarea>

	            	@if ($errors->has('highlights'))
                        <span class="help-block">
                            <strong>{{ $errors->first('highlights') }}</strong>
                        </span>
                     @endif
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('who_can_attend') ? ' has-error' : '' }}">
          		<label for="who_can_attend" class="col-sm-2 control-label">Who Can Attend : </label>
	            <div class="col-sm-9">
	            	<textarea class="form-control my-editor" id="who_can_attend" rows="10" name="who_can_attend">{{ old('who_can_attend') }}</textarea>

	            	@if ($errors->has('who_can_attend'))
                        <span class="help-block">
                            <strong>{{ $errors->first('who_can_attend') }}</strong>
                        </span>
                     @endif
	            </div>
          	</div>
          	<div class="form-group{{ $errors->has('payment_procedure') ? ' has-error' : '' }}">
          		<label for="payment_procedure" class="col-sm-2 control-label">Payment Procedure : </label>
	            <div class="col-sm-9">
	            	<textarea class="form-control my-editor" id="payment_procedure" rows="10" name="payment_procedure">{{ old('payment_procedure') }}</textarea>

	            	@if ($errors->has('payment_procedure'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_procedure') }}</strong>
                        </span>
                     @endif
	            </div>
          	</div>
            <div class="form-group{{ $errors->has('internship_department') ? ' has-error' : '' }}">
				<div class="col-sm-3 control-label">
                    <button type="submit" class="btn btn-info ">Add Details</button>
                </div>
          </div>
          <div class="form-group">
          	<label for="internship_department" class="col-sm-2 control-label">Note : </label>
          	<div class="col-sm-9">
	        	<h5><p>If you have multiple items in fields described, seperate them with <b>'.'</b>, And each ends with <b>'.'</b></p></h5>
	      	</div>
	      </div>	
          <!-- /.box-body -->
        </form>
      </div>
	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
		    <div class="box-header">
		      <h3 class="box-title">Internship Department </h3>
		    </div>
		    <!-- /.box-header -->
		    <div class="box-body">
		      <table id="example1" class="table table-bordered table-striped">
		        <thead>
		            <tr>
		              <th>Id</th>
		              <th>Department Name</th>
		            	<th>Created at</th>
		            	<th>Edit</th>
		            	<th>Delete</th>
		            </tr>
		        </thead>
		        <tbody>
		            {{ csrf_field() }}
		        	@foreach($intern_deps as $intern_dep)
		                <tr class="item {{ $intern_dep->id }}">
		                  <td>{{ $intern_dep->id }}</td>
		                  <td>{{ $intern_dep->internship_department }}</td>
		                  <td>{{ $intern_dep->created_at->format('j F Y')  }}</td>
		                  <td><button type="button" class="edit-modal btn btn-block btn-info btn-sm" data-id="{{ $intern_dep->id }}" data-name="{{ $intern_dep->internship_department }}" data-created_at="{{ $intern_dep->created_at->format('j F Y') }}"><span class="glyphicon glyphicon-edit"></span></button></td>
		                  <td><button type="button" class="delete-modal btn btn-block btn-danger btn-sm" data-id="{{ $intern_dep->id }}" data-name="{{ $intern_dep->internship_department }}"><span class="glyphicon glyphicon-remove"></span></button></td>
		                </tr>
		            @endforeach
		        </tbody>
		        <tfoot>
		        <tr>
		          <th>Id</th>
		          <th>Department Name</th>
		          <th>Created at</th>
		          <th>Edit</th>
		          <th>Delete</th>
		        </tr>
		        </tfoot>
		      </table>
		    </div>
		    <!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
    </section>
@endsection