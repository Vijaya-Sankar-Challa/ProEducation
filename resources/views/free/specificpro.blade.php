@extends('master')

@section('title')
    {{ $dispro->project_name }}  | Pro Education
@endsection

@section('keywords')
   Post Project {{ $dispro->project_name }}, Project Post {{ $dispro->project_name }}
@endsection

@section('description')
   {{ $dispro->description }}
@endsection

@section('content')
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                	<?php $flag=-2; ?>
	                @foreach($bidcheck->pluck('user_id') as $bidchec)
						@if(Auth::user()->id == $bidchec) <?php $flag=0; ?>
						@else <?php $flag=1; ?>
						@endif
	                @endforeach
	                @if($dispro->user_id == Auth::user()->id) <?php $flag=-1; ?>@endif
                	<div>creator = {{ $dispro->user_id }}, Login = {{ Auth::user()->id }}, {{ count($bidcheck->pluck('user_id')) }} flag = {{ $flag }}</div>
                	@if ($flag == 0)
                		<div class="bg-success" style="padding: 10px 20px;border-radius: 10px;">You have already bided in this project</div>
                		<h3>{{ $dispro->project_name }}</h3>
                	    <hr>
                	@elseif ($flag == -1)
                		<div class="bg-success" style="padding: 10px 20px;border-radius: 10px;"><h6>You may not able to Bid. Because you are creator of this project.</h6></div>
                		<h3>{{ $dispro->project_name }}</h3>
                	    <hr>
                	@else
                    	<button type="button" class="btn btn-info pull-right" id="bidonthispro" style="margin-right: 25px;margin-bottom: 10px;">Bid On This Pro</button>
            	        <h3>{{ $dispro->project_name }}</h3>
                	    <hr>
                    	<div class="row" id="ammount" style="padding: 10px;">
                    		<form enctype="multipart/form-data" action="{{ url('/submitbid') }}" method="POST">
								<h4>Amount <small>IN(INR)</small></h4>
								<div class="row">
									<div class="col-md-6 col-sm-10">
		                                <div class="form-group">
										    <label for="amount" class="col-sm-4" style="margin-top: 10px;">Bid amount :</label>
										    <div class="col-sm-6">
										      <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" min="100" max="1000000" step="100" required>
										    </div>
										</div>
		                            </div>
		                            <div class="col-md-6 col-sm-10 col-xs-12">
		                                <div class="form-group">
										    <label for="deliver" class="col-sm-4" style="margin-top: 10px;">Delivers in :</label>
										    <div class="col-sm-6 col-xs-12">
										      <input type="number" class="form-control" id="deliver" placeholder="Days" name="deliver" min="1" max="90" step="1" required>
										    </div>
										</div>
		                            </div>
	                            </div>
	                            <div class="row">
		                            <div class="col-md-6 col-sm-10">
		                                <div class="form-group">
										    <label class="col-sm-4" style="margin-top: 10px;">Project Fee :</label>
										    <div class="col-sm-6" style="margin-top: 10px;">
										      <span id="profee"></span>
										    </div>
										</div>
		                            </div>
	                            </div>
	                            <div class="row">
		                            <div class="col-md-6 col-sm-10">
		                                <div class="form-group">
										    <label class="col-sm-4" style="margin-top: 10px;">Paid to You :</label>
										    <div class="col-sm-6" style="margin-top: 10px;">
										      <span id="payfee"></span>
										    </div>
										</div>
		                            </div>
	                            </div><hr>
	                            <div class="row">
		                            <div class="col-md-10 col-sm-10">
		                                <div class="form-group">
										    <label class="col-sm-4" style="margin-top: 10px;">Proposal :</label>
										    <div class="col-sm-10 col-md-10" style="margin-top: 10px;">
										      <textarea class="form-control" rows="8" name="description" placeholder="What makes you the best candidate for this project?" required></textarea>
										    </div>
										</div>
		                            </div>
	                            </div>
	                            <div class="row">
	                            	<div style="display: none;"><input id="displaynone" type="number" name="displaynone" value="{{ $dispro->id }}">{{ $dispro->id }}</div>
	                            </div>
	                            <div class="row">
	                    			<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
			            			<input type="submit" class="btn btn-success" style="padding: 10px;margin-left: 20px;">
	                    		</div>
	                    	</form>    
    	                <hr>
        	            </div>
        	        @endif        

                    <div class="row">	
	                	<div class="col-md-2 col-sm-2 col-xs-10" style="background-color: #f0f0f0;margin: 10px;border-radius: 5px; text-align: left;">
							<div class="row text-center" style="padding: 5px;"><h5>Bids</h5></div>
							<div class="row text-center" style="padding: 5px;">fsdf</div>
	                	</div>
	                	<div class="col-md-2 col-sm-2 col-xs-10" style="background-color: #f0f0f0;margin: 10px;border-radius: 5px; ">
	                		<div class="row text-center" style="padding: 5px;"><h5>Avg Bid</h5></div>
							<div class="row text-center" style="padding: 5px;">fsdf</div>
	                	</div>
	                	<div class="col-md-3 col-sm-3 col-xs-10" style="background-color: #f0f0f0;margin: 10px;border-radius: 5px; ">
	                		<div class="row text-center" style="padding: 5px;"><h5>Budget Range</h5></div>
							<div class="row text-center" style="padding: 5px;">{{ $dispro->budget_from }} <i class="fa fa-inr" aria-hidden="true"></i> - {{ $dispro->budget_to }} <i class="fa fa-inr" aria-hidden="true"></i></div>
	                	</div>
	            		<div class="col-md-3 col-sm-3 col-xs-10" style="background-color: #f0f0f0;margin: 10px;border-radius: 5px; text-align: right;">
	            			<div class="row text-center" style="padding: 5px;"><h5>Open</h5></div>
							<div class="row text-center" style="padding: 5px;">fsdf</div>
	            		</div>
	            	</div><hr>
	            	<div class="row" style="padding: 10px;">
	            		<h4>Project Description</h4>
	            		<p style="margin-left:15px;">{{ $dispro->description }}</p>
	            	</div>
	            	<div class="row" style="padding: 10px;">
	            		<h4>Skills required</h4>
	            		<p style="margin-left:15px;">{{ $dispro->skills }}</p>
	            	</div>
	            	<div class="row" style="padding: 10px;">
	            		@if(!empty($dispro->file_ids))
	            			<?php $poi = explode(",", $dispro->file_ids); ?>
	            			@for($i = 1; $i <= $poi[0]; $i++)
	            				@foreach($files as $file)
	            					@if($file->id == $poi[$i])
	            						<a href="/files/{{ $file->file }}" download>
	            							<div class="row download-styles">
	            								<i class="fa fa-download" aria-hidden="true"></i> {{ $file->file }}
	            							</div>
	            						</a>
	            					@endif
	            				@endforeach
	            			@endfor
	            		@endif
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($bidcheck as $asd)
{{ $asd->user->name }}
@endforeach
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                   	@foreach ($bidcheck as $asd)
						{{ $asd->user->name }}
					@endforeach
					{{$dispro->user}}{{$dispro->job}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style type="text/css">
	.download-styles {
		margin: 5px;
		display: inline-block;
		padding: 10px 15px;
		background-color: #e2e7ff;
		border-radius: 25px;
	}
	#heading{
		background-color: #aaaaaa;
		padding: 5px;
		color: white;
		border-radius: 5px;
	}
	#heading-val{
		background-color: white;
		border-radius: 5px;
	}
	table { border-collapse: collapse; border-spacing: 0; }
	#keywords {
	  margin: 0 auto;
	  font-size: 1.2em;
	  margin-bottom: 15px;
	}
	#keywords thead {
	  cursor: pointer;
	  background: #c9dff0;
	}
	#keywords thead tr th { 
	  font-weight: bold;
	  padding: 12px 30px;
	  padding-left: 42px;
	}
	#keywords thead tr th span { 
	  padding-right: 20px;
	  background-repeat: no-repeat;
	  background-position: 100% 100%;
	}

	#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
	  background: #acc8dd;
	}

	#keywords thead tr th.headerSortUp span {
	  background-image: url('http://i.imgur.com/SP99ZPJ.png');
	}
	#keywords thead tr th.headerSortDown span {
	  background-image: url('http://i.imgur.com/RkA9MBo.png');
	}


	#keywords tbody tr { 
	  color: #555;
	}
	#keywords tbody tr td {
	  text-align: center;
	  padding: 15px 10px;
	}
	#keywords tbody tr td.lalign {
	  text-align: left;
	}
</style>
@endsection

@section('script')
<script>
	$(function(){
  		$('#keywords')
  		.tablesorter({widthFixed: true, widgets: ['zebra']});
	});

	$(":input").bind('keyup mouseup', function () {
   		var asd = $('#amount').val();
   		if (asd<5000) {var assd = asd*15/100;}
   		else if (asd<10000) {var assd = asd/10;}
   		else {var assd = asd*7/100;}
   		$('#profee').text(assd);
   		var aasd = asd-assd;
   		$('#payfee').text(aasd);
	});

	$("#ammount").hide();

	$("#bidonthispro").click(function(){
    	$("#ammount").slideToggle();
	});
</script>
@endsection