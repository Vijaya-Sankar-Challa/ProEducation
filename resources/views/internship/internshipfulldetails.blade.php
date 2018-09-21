@extends('master')

@section('title')
		{{ $interns_cat->internship_category }} | Pro Education
@endsection

@section('keywords')
	 {{ $interns_cat->internship_category }} Internship
@endsection

@section('description')
	{{ $interns_cat->internship_category }} Internships
@endsection

@section('content')
	<section class="content-block team-1 team-1-1">
    <div class="container">
        <div class="underlined-title">
            <h1>{{ $intern_full_details->title }}<p>BY : {{ $intern_full_details->powered_by }}</p></h1>
            <hr>
        </div>
        <div class="row">
        	<div class="col-xs-12">
        		{!! $intern_full_details->introduction !!}
        	</div>
        	<div class="col-xs-12">
        		<div class="underlined-title"><hr></div>
				<div class="col-xs-12 col-md-12">
						<div class="form-horizontal">
								<h1 style="text-align: center;padding-bottom: 20px;"><span>Application Form</span></h1>
								<div class="underlined-title"><hr></div>
								<form class="form-horizontal" role="form" method="POST" action="{{ url('/internship/apply') }}">
												{{ csrf_field() }}

									<div class="col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
											<label for="name" class="col-md-4 control-label">Name</label>

											<div class="col-md-7">
													<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

													@if ($errors->has('name'))
															<span class="help-block">
																	<strong>{{ $errors->first('name') }}</strong>
															</span>
													@endif
											</div>
									</div>

									<div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email" class="col-md-4 control-label">E-Mail Address</label>

											<div class="col-md-7">
													<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

													@if ($errors->has('email'))
															<span class="help-block">
																	<strong>{{ $errors->first('email') }}</strong>
															</span>
													@endif
											</div>
									</div>

									<div class="col-md-6 form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
											<label for="phone_number" class="col-md-4 control-label">Phone Number</label>

											<div class="col-md-7">
													<input id="phone_number" type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>

													@if ($errors->has('phone_number'))
															<span class="help-block">
																	<strong>{{ $errors->first('phone_number') }}</strong>
															</span>
													@endif
											</div>
									</div>

									<div class="col-md-6 form-group{{ $errors->has('collage') ? ' has-error' : '' }}">
											<label for="collage" class="col-md-4 control-label">Collage Name</label>

											<div class="col-md-7">
													<input id="collage" type="name" class="form-control" name="collage" required>

													@if ($errors->has('collage'))
															<span class="help-block">
																	<strong>{{ $errors->first('collage') }}</strong>
															</span>
													@endif
											</div>
									</div>

									<div class="col-md-6 form-group">
											<label for="internship_category_id" class="col-md-4 control-label">Choice Of Internship</label>
											<div class="col-md-7">
														<select id="internship_category_id" class="form-control" name="internship_category_id" requried>
																@foreach($intern_cats as $intern_cat)
																	<option value="{{ $intern_cat->id }}">{{ $intern_cat->internship_category }}</option>
																@endforeach
														</select>

														@if ($errors->has('year'))
																<span class="help-block">
																			<strong>{{ $errors->first('year') }}</strong>
																</span>
														@endif
											</div>
									</div>

									<div class="col-md-6 form-group">
											<label for="year" class="col-md-4 control-label">Year of Study</label>

											<div class="col-md-7">
														<select id="year" class="form-control" name="year" requried>
																<option value="1">1st Year</option>
																<option value="2">2nd Year</option>
																<option value="3">3rd Year</option>
																<option value="4">4th Year</option>
																<option value="5">Others</option>
														</select>

														@if ($errors->has('year'))
																<span class="help-block">
																			<strong>{{ $errors->first('year') }}</strong>
																</span>
														@endif
											</div>
									</div>

									<div class="col-md-6 form-group">
											<label for="department" class="col-md-4 control-label">Department of Study</label>

											<div class="col-md-7">
														<select id="department" class="form-control" name="department" requried>
															@foreach($intern_deps as $intern_dep)
																<option value="{{ $intern_dep->internship_department }}">{{ $intern_dep->internship_department }}</option>
															@endforeach
														</select>

														@if ($errors->has('department'))
																<span class="help-block">
																			<strong>{{ $errors->first('department') }}</strong>
																</span>
														@endif
											</div>
									</div>

									<div class="col-md-6 form-group">
											<label for="Accommodation" class="col-md-4 control-label">Accommodation</label>

											<div class="col-md-7">
														<select id="Accommodation" class="form-control" name="Accommodation" requried>
																<option value="1">Yes</option>
																<option value="0">NO</option>
														</select>

														@if ($errors->has('Accommodation'))
																<span class="help-block">
																			<strong>{{ $errors->first('Accommodation') }}</strong>
																</span>
														@endif
											</div>
									</div>
									<div class="col-md-12 form-group">
											<div class="col-md-7 col-md-offset-4">
													<button type="submit" class="btn btn-primary">
															Register
													</button>
											</div>
									</div>
							</form>
						</div>
				</div>
				<div class="underlined-title"><hr></div>
				<div class="col-xs-12 col-md-12">
					<?php
						$intern_location = explode(".", $intern_full_details->location);
						$intern_dates = explode(".", $intern_full_details->dates);
						$intern_venue = explode(".", $intern_full_details->venue);
						$intern_numbers = explode(".", $intern_full_details->contact_numbers);
						$intern_accommodation = explode(".", $intern_full_details->accommodation_fee);
						$count = count($intern_dates);
					?>
					<div class="underlined-title"><h1>Internship Details</h1><hr></div>
					<table class="table table-striped table-bordered table-responsive">
						<tr>
							<th>Location</th>
							@for($i = 0; $i < $count-1; $i++)
							<td>{{ $intern_location[$i] }}</td>
							@endfor
						</tr>
						<tr>
							<th>Dates</th>
							@for($i = 0; $i < $count-1; $i++)
							<td>{{ $intern_dates[$i] }}</td>
							@endfor
						</tr>
						<tr>
							<th>Venue</th>
							@for($i = 0; $i < $count-1; $i++)
							<td>{{ $intern_venue[$i] }}</td>
							@endfor
						</tr>
						<tr>
							<th>Contact Number</th>
							@for($i = 0; $i < $count-1; $i++)
							<td>{{ $intern_numbers[$i] }}</td>
							@endfor
						</tr>
						<tr>
							<th>Accommodation Fee</th>
							@for($i = 0; $i < $count-1; $i++)
							<td>{{ $intern_accommodation[$i] }}</td>
							@endfor
						</tr>
					</table>
				</div>
				<div class="underlined-title"><hr></div>
				<div class="col-xs-12 col-md-12">
					<div class="underlined-title"><h1>Highlights of the Internship</h1><hr></div>
					<div style="padding-bottom: 20px;">
						{!! $intern_full_details->highlights !!}
					</div>
				</div>
				<div class="underlined-title"><hr></div>
				<div class="col-xs-12 col-md-12">
					<div class="underlined-title"><h1>Who can attend</h1><hr></div>
					<div style="padding-bottom: 20px;">
						{!! $intern_full_details->who_can_attend !!}
					</div>
				</div>
				<div class="underlined-title"><hr></div>
				<div class="col-xs-12 col-md-12">
					<div class="underlined-title"><h1>Payment Procedure</h1><hr></div>
					<div style="padding-bottom: 20px;">
						{!! $intern_full_details->payment_procedure !!}
					</div>
				</div>
			</div>	
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>        
@endsection

@section('script')
	<script type="text/javascript">
		
	</script>
@endsection