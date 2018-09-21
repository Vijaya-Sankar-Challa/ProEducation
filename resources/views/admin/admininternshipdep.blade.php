@extends('admin.admin')

@section('admin_title')
Admin Pannel | Internship Departments | ProEducation
@endsection

@section('page_name')
Internship Departments Data
@stop

@section('page_dis')
Total Internship Departments
@stop

@section('levels')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#">Internship Departments</a></li>
	</ol>
@stop

@section('admincontent')
    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Department</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{ url('/admininterndepregister') }}" role="form">
        {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group{{ $errors->has('internship_department') ? ' has-error' : '' }}">
                  <label for="internship_department" class="col-sm-2 control-label">New Department : </label>
                  <div class="col-sm-5">
                      <input id="name" type="text" class="form-control" name="internship_department" placeholder="New Internship Category" value="{{ old('internship_department') }}" required autofocus>

                      @if ($errors->has('internship_department'))
                          <span class="help-block">
                              <strong>{{ $errors->first('internship_department') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-info">Add</button>
                  </div>
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
    <div id="myModal" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body">
	          <form class="form-horizontal" role="form">
	            <div class="form-group id-check">
	              <label class="control-label col-sm-2" for="id">ID :</label>
	              <div class="col-sm-10">
	                <input type="text" class="form-control" id="sid" disabled>
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-sm-2" for="name">Department :</label>
	              <div class="col-sm-10">
	                <input type="text" class="form-control" id="n" required>
						      <p class="error text-center alert alert-danger hidden"></p>
	              </div>
	            </div>
	          	<div class="form-group created_at">
		            <label class="control-label col-sm-2" for="created_at">Created At:</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control" id="c" disabled>
		            </div>
	          	</div>
	          </form>
	          <div class="deleteContent">
	            Are you Sure you want to delete <b><span class="title"></span></b> ?
	            <span class="hidden id"></span>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn actionBtn" data-dismiss="modal">
	              <span id="footer_action_button" class='glyphicon'> </span>
	            </button>
	            <button type="button" class="btn btn-warning" data-dismiss="modal">
	              <span class='glyphicon glyphicon-remove'></span> Close
	            </button>
	          </div>
	        </div>
	      </div>
	    </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
    // Edit Data (Modal and function edit data)
  $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#sid').val($(this).data('id'));
    $('#n').val($(this).data('name'));
    $('#c').val($(this).data('created_at'));
    $('#myModal').modal('show');
	});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/editinterndepItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#sid").val(),
          'name': $('#n').val(),
          'created_at':$('#c').val()
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item " + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.created_at + "</td><td><button class='edit-modal btn btn-block btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-created_at='" + data.created_at + "'><span class='glyphicon glyphicon-edit'></span></button></td><td><button class='delete-modal btn btn-block btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-remove'></span></button></td></tr>");
      }
  	});
	});

	//delete function
	$(document).on('click', '.delete-modal', function() {
	  $('#footer_action_button').text(" Delete");
	  $('#footer_action_button').removeClass('glyphicon-check');
	  $('#footer_action_button').addClass('glyphicon-trash');
	  $('.actionBtn').removeClass('btn-success');
	  $('.actionBtn').addClass('btn-danger');
	  $('.actionBtn').addClass('delete');
	  $('.modal-title').text('Delete');
	  $('.id').text($(this).data('id'));
	  $('.deleteContent').show();
	  $('.form-horizontal').hide();
	  $('.title').html($(this).data('name'));
	  $('#myModal').modal('show');
	});

	$('.modal-footer').on('click', '.delete', function() {
	  $.ajax({
	    type: 'post',
	    url: '/deleteinterndepItem',
	    data: {
	      '_token': $('input[name=_token]').val(),
	      'id': $('.id').text()
	    },
	    success: function(data) {
	      $('.item' + $('.id').text()).remove();
	    }
	  });
	});
</script>
@stop