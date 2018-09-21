@extends('master')

@section('title')
    Browse Project | Pro Education
@endsection

@section('keywords')
   Post Project, Project Post
@endsection

@section('description')
   profile
@endsection

@section('content')
<div class="container" style="margin-top: 120px;">
	<div class="col-md-12">
		<form enctype="multipart/form-data" action="{{ url('/jobs') }}" method="POST">
			<div class="row" style="padding: 10px 0px;">
				<div class="col-md-2">
					<h5>Search</h5>
				</div>
				<div class="col-md-10" style="position: relative;display: block;">
					<div>
						<i class="fa fa-search fa-lg" aria-hidden="true" style="position: absolute;padding: 12px 5px 15px 10px;"></i>
						<input type="Search" name="Search" id="jobsearch" class="form-control" style="border-radius: 20px; padding: 10px 35px;">
					</div>
				</div>
			</div>
			<div class="row" style="padding: 10px 0px;">
				<div class="col-md-2">
					<h5>Skills</h5>
				</div>
				<div class="col-md-10">
					<select class="js-example-basic-multiple-limit" id="skillsmultiple" name="skills_multiple[]" style="width: 100%" multiple="multiple" required>
						@foreach($skills as $skill)
							<option value="{{ $skill->name }}">{{ $skill->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
			<div class="panel panel-default">
				<table class="table table-hover table-responsive" id="keywords" cellspacing="0" cellpadding="0">
				    <thead>
				      <tr>
				        <th class="col-md-5 col-sm-5 col-xs-5"><span>Jobs</span></th>
				        <th class="col-md-4 col-sm-4 col-xs-4"><span>DeadLine</span></th>
				        <th class="col-md-3 col-sm-3 col-xs-3"><span>Price</span></th>
				      </tr>
				    </thead>
				    <tbody>
				    @foreach($projects as $project)
				      <tr class="sdf" id="{{ $project->id }}" href="/jobs/{{ $project->id }}">
				        <td class="lalign col-md-5 col-sm-5 col-xs-5"><h5>{{ $project->project_name }}</h5>
							<p class="dis">{{ $project->description }}</p><p>Project Category: {{ $project->category }}</p><p>Skills: {{ $project->skills }}</p>
				        </td>
				        <td class="col-md-4 col-sm-4 col-xs-4">{{ $project->skills }}</td>
				        <td class="col-md-3 col-sm-3 col-xs-3"><h5><i class="fa fa-inr" aria-hidden="true"></i> {{ $project->budget_from }} - {{ $project->budget_to }}</h5></td>
				      </tr>
					@endforeach
				    </tbody>
				</table>
			</div>
			{{ $projects->links() }}
		</form>
	</div>
</div>
@endsection

@section('style')
<style type="text/css">
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

	$(document).ready(function(){
	    $('table tr.sdf').click(function(){
	        window.location = $(this).attr('href');
	        return false;
	    });
	});
	$('#jobsearch').on('keyup',function () {
		$val=$(this).val();
		$.ajax({
			type: 'get',
			url: '{{ URL::to('/jobsearch') }}',
			data: {'search': $val},
			success: function (data) {
				$('tbody').html(data);
			}
		});
	});

	$('#skillsmultiple').on('change',function () {
		if( $('#skillsmultiple :selected').length > 0){
	        //build an array of selected values
	        var selectednumbers = [];
	        $('#skillsmultiple :selected').each(function(i, selected) {
	            selectednumbers[i] = $(selected).val();
	        });
	        //post data to handler script. note the JSON.stringify call
	       $.ajax({
	        	type: 'get',
	            url: '{{ URL::to('/jobskillsearch') }}',
	            data: {'selectednumbers':JSON.stringify(selectednumbers)},
	            success: function(data) {
	              $('tbody').html(data);
	            }
	        });
	    }
	});

	$(function(){
	  $('#keywords')
	  .tablesorter({widthFixed: true, widgets: ['zebra']})
	});

	function truncateText(selector, maxLength) {
		var element = document.querySelector(selector),
		    truncated = element.innerText;

		if (truncated.length > maxLength) {
		    truncated = truncated.substr(0,maxLength) + '...';
		}
	return truncated;
	}

	document.querySelector('p.dis').innerText = truncateText('p.dis', 107);
</script>
@endsection