@extends('admin.admin')

@section('admin_title')
Admin Pannel | Projects Posted | ProEducation
@endsection

@section('page_name')
Projects Posted Till Date
@stop

@section('page_dis')
Total Projects Posted
@stop

@section('levels')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#">Projects</a></li>
	</ol>
@stop

@section('admincontent')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Projects Posted</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Id</th>
	                  <th>User Id</th>
	                  <th>Project Name</th>
                    <th>Category</th>
	                  <th>Skills</th>
                    <th>Files Id's</th>
	                	<th>Budget Range</th>
	                	<th>Created at</th>
	                	<th>Link</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($projects as $project)
		                <tr class="{{ $project->id }}">
		                  <td>{{ $project->id }}</td>
		                  <td>{{ $project->user_id }}</td>
		                  <td>{{ $project->project_name }}</td>
                      <td>{{ $project->category }}</td>
		                  <td>{{ $project->skills }}</td>
                      <td>{{ $project->file_ids }}</td>
		                  <td>{{ $project->budget_from }} - {{ $project->budget_to }}</td>
		                  <td>{{ $project->created_at->format('j F Y')  }}</td>
		                  <td><a href="{{ url('/jobs') }}/{{ $project->id }}"><button type="button" class="btn btn-block btn-default btn-sm"><span class="glyphicon glyphicon-link"></span></button></a></td>
		                </tr>
	                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>User Id</th>
                  <th>Project Name</th>
                  <th>Category</th>
                  <th>Skills</th>
                  <th>Files Id's</th>
                  <th>Budget Range</th>
                  <th>Created at</th>
                  <th>Link</th>
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

@section('script')

@stop