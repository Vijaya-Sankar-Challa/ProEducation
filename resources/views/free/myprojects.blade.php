@extends('master')

@section('title')
    {{ Auth::user()->name }} Projects  | Pro Education
@endsection

@section('keywords')
  Projects of {{ Auth::user()->anme }}
@endsection  

@section('description')
   
@endsection

@section('content')

<div class="container" style="margin-top: 120px;">
	<h2>Your Projects</h2>
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Project Bids</a></li>
		<li><a data-toggle="tab" href="#menu1">Projects posted by you</a></li>
	</ul>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<h3>Project bids</h3>
		  	<div class="row">
		  		<div class="panel panel-default">
		      		<table class="table table-hover table-responsive">
					    <thead>
					      <tr>
					        <th>Project Name</th>
					        <th>Employee</th>
					        <th>Skills</th>
					        <th>Created at</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php $v = Auth::user()->id; $flag = 0; $projectarray  = array(); $projectid = array(); $projectcreatorarray = array(); $projectskills = array(); $projectcreatedat = array(); ?>
							@forelse($user as $users)
								@if($users->id == $v)
									@foreach($users->postpro as $proname)
										<?php $projectarray[] = $proname->project_name; $projectcreatorarray[] = $proname->user->name; $projectskills[] = $proname->skills; $projectcreatedat[] = $proname->created_at->format('j F Y'); $projectid[] = $proname->id; ?>
									@endforeach
								@endif
							@empty	
							@endforelse
							<?php  $count = count($projectarray); ?>
							@if($count != 0)
								@for($i = 0; $i < $count; $i++)
								<?php $asd = url('/jobs/'.$projectid[$i]); $posterprofile = url('/profile/'.$projectcreatorarray[$i]); ?>
									<tr>
										<td><a href="{{ $asd }}"><?php echo $projectarray[$i]; ?></a></td>
										<td><a href="{{ $posterprofile }}"><?php echo $projectcreatorarray[$i]; ?></a></td>
										<td><?php echo $projectskills[$i]; ?></td>
										<td><?php echo $projectcreatedat[$i]; ?></td>
									</tr>
								@endfor
							@else
								<?php $flag = 1; ?>	
							@endif	
					    </tbody>
		  			</table>
		  			@if($flag == 1)
		  				<div class="row">
		  					<div class="asssd">
		  						<h5>You didn't place any bid Yet!</h5>
		  					</div>
		  				</div>
		  			@endif
		  		</div>
		 	</div>
		</div>

		<div id="menu1" class="tab-pane fade">
		  <h3>Your projects</h3>
		  <div class="row">
		  	<div class="panel panel-default">
		  		<table class="table table-hover table-responsive">
		  			<thead>
					    <tr>
					        <th>Project Name</th>
					        <th>Budget</th>
					        <th>Created at</th>
					    </tr>
				    </thead>
				    <tbody>
				    <?php $flag1 = 0; $myproname = array(); $myproskills = array(); $myprobudget_from = array(); $myprobudget_to = array(); $myprodate = array(); ?>
				    	@forelse($mypro as $pro)
				    		@if($pro->user_id == Auth::user()->id)
				    			<?php $myproname[] = $pro->project_name; $myproskills[] = $pro->skills; $myprobudget_from[] = $pro->budget_from; $myprobudget_to[] = $pro->budget_to; $myprodate[] = $pro->created_at->format('j F Y'); ?>
				    		@endif
				    	@empty
				    	@endforelse
				    	<?php $count = count($myproname); ?>
				    	@if($count != 0)
					    	@for($i = 0; $i < $count; $i++)
					    		<tr>
					    			<?php $urll = url('/myprojects/'.$myproname[$i]); ?>
					    			<td><a href="{{ $urll }}"><?php echo $myproname[$i]; ?></a></td>
					    			<td><?php echo $myprobudget_from[$i] . " - " . $myprobudget_to[$i]; ?></td>
					    			<td><?php echo $myprodate[$i]; ?></td>
					    		</tr>
					    	@endfor
					    @else
					    	<?php $flag1 = 1; ?>
				    	@endif
				    </tbody>
		  		</table>
		  		@if($flag1 == 1)
		  			<div class="row">
						<div class="asssd">
							<h5>You didn't post any Project Yet!</h5>
						</div>
					</div>
		  		@endif
		  	</div>
		  </div>
		</div>
	</div>
</div>
	
@endsection
@section('style')
<style type="text/css">
	.panel-default {
		padding: 10px;
	}
	.asssd {
		padding: 20px;
		text-align: center;
	}
</style>
@end