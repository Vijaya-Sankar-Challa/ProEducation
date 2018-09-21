@extends('admin.admin')

@section('admin_title')
Admin Pannel | Bids | ProEducation
@endsection

@section('page_name')
Bids Till Date
@stop

@section('page_dis')
Total Bids Posted
@stop

@section('levels')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#">Bids</a></li>
	</ol>
@stop

@section('admincontent')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bids</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Id</th>
	                  <th>Bid Id</th>
	                  <th>User Id</th>
                    <th>Amount</th>
	                  <th>Days</th>
	                	<th>Created at</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($bids as $bid)
		                <tr class="{{ $bid->id }}">
		                  <td>{{ $bid->id }}</td>
		                  <td>{{ $bid->job_id }}</td>
		                  <td>{{ $bid->user_id }}</td>
                      <td>{{ $bid->amount }}</td>
		                  <td>{{ $bid->days }}</td>
		                  <td>{{ $bid->created_at->format('j F Y')  }}</td>
		                </tr>
	                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Bid Id</th>
                  <th>User Id</th>
                  <th>Amount</th>
                  <th>Days</th>
                  <th>Created at</th>
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