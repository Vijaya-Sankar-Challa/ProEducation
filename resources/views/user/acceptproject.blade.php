@extends('master')

@section('title')
    Project  | Pro Education
@endsection

@section('keywords')
  Projects of {{ Auth::user()->name }}
@endsection  

@section('description')
   
@endsection

@section('content')

<div class="container" style="margin-top: 120px;">
	<div class="row">
		<div class="asd">
			<h3>{{ $prodis->project_name }} {{ $prodis->id }}</h3>
		</div>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Project Bids</a></li>
				<li><a data-toggle="tab" href="#menu1">Accepted</a></li>
			</ul>
	</div>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<h3>Project bids</h3>
		  	<div class="row">
		  		<div class="panel panel-default">
		  		<?php $count =0; $accheck = 0; ?>
		      		@foreach($biduser as $aq)
		      			@if($aq->job_id == $prodis->id)
		      				<div class="media" style="padding: 2vw;">
							    <div class="media-left" style="padding-right: 3vw;">
							    	<?php $url = url('/profile/'.$aq->biduser->name); ?>
							      	<a href="{{ $url }}"><img src="{{ url('images/uploads/avatars') }}/{{ $aq->biduser->avatar }}" class="media-object" style="width:60px"></a>
							    </div>
							    <div class="media-body">
							      	<h4 class="media-heading"><a href="{{ $url }}">{{ $aq->biduser->name }}</a></h4>
							      <h6><?php echo substr($aq->biduser->intro, 0, 200)."...."; ?></h6>
							      <h5>Completes in : {{ $aq->days }} days</h5>
							      <div class="acclose">
							      	<?php $urll = url('/myprojects/'.$aq->biduser->name.'/'. $aq->job_id .'/'. $aq->biduser->id); ?>
							      	<a href="{{ $urll }}"><button class="btn btn-primary">Accept</button></a>
							      </div>
							    </div>
							    <div class="media-right" style="padding-top: 50px;">
							    	<h6 style="margin-right: 20vw;display: inline;">{{ $aq->amount }} Rs/- </h6>
							    </div>
							</div>
  							<hr><?php $count = 1; ?>
		      			@endif
		      		@endforeach 
		      		@if($count == 0)
		      			<div class="row">
							<div class="wow">
								<h5>No one has bided on your project!</h5>
							</div>
						</div>
		      		@endif
		  		</div>
		 	</div>
		</div>

		<div id="menu1" class="tab-pane fade">
		  <h3>Accepted Proposals</h3>
		  <div class="row">
		  	<div class="panel panel-default">
		  		@foreach($project as $as)
			  		@foreach($as->accpostpro as $ass)
			  			@if($prodis->id == $ass->pivot->accept_id)
		      				<div class="media" style="padding: 2vw;">
							    <div class="media-left" style="padding-right: 3vw;">
							    	<?php $url = url('/profile/'.$ass->name); ?>
							      	<a href="{{ $url }}"><img src="{{ url('images/uploads/avatars') }}/{{ $aq->biduser->avatar }}" class="media-object" style="width:60px"></a>
							    </div>
							    <div class="media-body">
							      	<h4 class="media-heading"><a href="{{ $url }}">{{ $ass->name }}</a></h4>
							      	<h5>Mail Id : {{ $ass->email }} </h5>
							      	<h6><?php echo substr($ass->intro, 0, 200)."...."; ?></h6>
							    </div>
							</div>
  							<hr><?php $accheck = 1; ?>
			  			@endif
			  		@endforeach
		  		@endforeach
		  		@if($count == 0)
	      			<div class="row">
						<div class="wow">
							<h5>No one has bided on your project!</h5>
						</div>
					</div>
				@elseif($accheck == 0)
					<div class="row">
						<div class="wow">
							<h5>You didn't accept any one!</h5>
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
	.asd{
		background-color: #dcdcdc;
		padding: 15px;
		border-radius: 10px;
		margin-bottom:20px;
	}
	.wow {
		padding: 20px;
		text-align: center;
	}
</style>
@endsection