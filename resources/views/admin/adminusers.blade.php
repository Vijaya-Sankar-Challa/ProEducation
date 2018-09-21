@extends('admin.admin')

@section('admin_title')
Admin Pannel | Users Data | ProEducation
@endsection

@section('page_name')
Users Data
@stop

@section('page_dis')
Total Users
@stop

@section('levels')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#">Users</a></li>
	</ol>
@stop

@section('admincontent')
    <!-- Main content -->
    <div class="col-md-12	">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title" style="padding-right: 10px;">Add New User</h3>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">Add New User<i class="fa fa-plus" style="padding-left: 5px;"></i>
            </button>
        </div>
        <div class="box-body" style="margin-top: 20px;">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/adminregister') }}">
                    {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-md-4 control-label">Name</label>

                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Password</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password" required>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                  <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                    	@if ($errors->has('password'))
                   		 	<span class="help-block">
                    			  <strong>{{ $errors->first('password') }}</strong>
                    		</span>
           	       		@endif

                  </div>
              </div>

							<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
		           	 <label class="col-md-4 control-label" for="role">Role:</label>
		           	 <div class="col-md-6">
		            	  <select class="form-control" name="role" id="ar" required>
                  	  <option value="0">User</option>
                  	  <option value="1">Admin</option>
                	  </select>
		            </div>
	          	</div>

	          	<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}" style="display: none;">
		           	 <label class="col-md-4 control-label" for="role">Role:</label>
		           	 <div class="col-md-6">
		            	  <input id="ver" type="number" class="form-control" name="verified" value="1">
		            </div>
	          	</div>

              <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                  <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                  <div class="col-md-6">
                      <input id="phone_number" type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                      @if ($errors->has('phone_number'))
                          <span class="help-block">
                              <strong>{{ $errors->first('phone_number') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>


              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                          Register
                      </button>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Id</th>
	                  <th>Name</th>
	                  <th>Email</th>
	                  <th>Phone number</th>
	                  <th>Role</th>
	                	<th>Last Ip</th>
	                	<th>Created at</th>
	                	<th>Edit</th>
	                	<th>Delete</th>
	                </tr>
                </thead>
                <tbody>
	                {{ csrf_field() }}
                	<?php $count = 1; ?>
                	@foreach($users as $user)
		                <tr class="item {{ $user->id }}">
		                  <td>{{ $user->id }}</td>
		                  <td>{{ $user->name }}</td>
		                  <td>{{ $user->email }}</td>
		                  <td>{{ $user->phone_number }}</td>
		                  <td>
		                  	@if($user->role == 0)
		                  		User
		                  	@else
		                  		Admin
		                  	@endif		
		                  </td>
		                  <td>{{ $user->visitor }}</td>
		                  <td>{{ $user->created_at->format('j F Y')  }}</td>
		                  <td><button type="button" class="edit-modal btn btn-block btn-info btn-sm" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-phone_number="{{ $user->phone_number }}" data-role="{{ $user->role }}" data-ip="{{ $user->visitor }}" data-created_at="{{ $user->created_at->format('j F Y') }}"><span class="glyphicon glyphicon-edit"></span></button></td>
		                  <td><button type="button" class="delete-modal btn btn-block btn-danger btn-sm" data-id="{{ $user->id }}" data-name="{{ $user->name }}"><span class="glyphicon glyphicon-remove"></span></button></td>
		                </tr>
	                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone number</th>
                  <th>Role</th>
                	<th>Last Ip</th>
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
	                <input type="text" class="form-control" id="uid" disabled>
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-sm-2" for="name">Name:</label>
	              <div class="col-sm-10">
	                <input type="text" class="form-control" id="n" required>
						      <p class="error text-center alert alert-danger hidden"></p>
	              </div>
	            </div>
	            <div class="form-group">
		            <label class="control-label col-sm-2" for="email">Email:</label>
		            <div class="col-sm-10">
		              <input type="email" class="form-control" id="e" disabled required>
		              <p class="error text-center alert alert-danger hidden"></p>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
		            <div class="col-sm-10">
		              <input type="number" class="form-control" id="p" required>
		              <p class="error text-center alert alert-danger hidden"></p>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <label class="control-label col-sm-2" for="role">Role:</label>
		            <div class="col-sm-10">
		              <select class="form-control" id="r">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                  </select>
		            </div>
	          	</div>
	          	<div class="form-group ip">
		            <label class="control-label col-sm-2" for="ip">IP:</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control" id="i" disabled>
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
    $('#e').prop("disabled", true);  
    $('#uid').val($(this).data('id'));
    $('#n').val($(this).data('name'));
    $('#e').val($(this).data('email'));
    $('#p').val($(this).data('phone_number'));
    $('#r').val($(this).data('role'));
    $('#i').val($(this).data('ip'));
    $('#c').val($(this).data('created_at'));
    $('#myModal').modal('show');
	});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/editItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#uid").val(),
          'name': $('#n').val(),
          'email': $('#e').val(),
          'phone_number':$('#p').val(),
          'role':$('#r').val(),
          'ip':$('#i').val(),
          'created_at':$('#c').val()
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item " + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.phone_number + "</td><td>" + data.role + "</td><td>" + data.ip + "</td><td>" + data.created_at + "</td><td><button class='edit-modal btn btn-block btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "' data-phone_number='" + data.phone_number + "' data-role='" + data.role + "' data-ip='" + data.ip + "' data-created_at='" + data.created_at + "'><span class='glyphicon glyphicon-edit'></span></button></td><td><button class='delete-modal btn btn-block btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-remove'></span></button></td></tr>");
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
	    url: '/deleteItem',
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