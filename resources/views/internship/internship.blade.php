@extends('master')

@section('title')
		InternShips | Pro Education
@endsection

@section('keywords')
	 Internships
@endsection

@section('description')
	 Internships
@endsection

@section('content')
	<section id="content-1-1" class="content-block content-1-1 min-height-600px bg-white">
				<div class="container text-center">
						<h1>We Offer A large varieties of Internships.</h1>
						<div class="col-sm-8 col-sm-offset-2">
								<p class="lead">We don't want to overload you with hundreds of Internships, you don't need. We give you a strong base to express your own creativity.</p>
						</div>
				</div>
		</section>
		<div class="row" style="margin-top: 20px;">
				<div class="col-md-10 col-md-offset-1">
						<div class="col-xs-12 col-sm-6">
								<h2 style="text-align: center;"><span>Our Internship Programs</span></h2>
								@foreach($intern_cats as $intern_cat)
								<a href="{{ url('/internship') }}/{{ $intern_cat->id }}" class="btn btn-primary btn-md col-xs-12" title="" role="button">{{ $intern_cat->internship_category }}</a>
								@endforeach
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="col-xs-12">
									<div class="form-horizontal">
											<h2 style="text-align: center;"><span>Application Form</span></h2>
											<form class="form-horizontal" role="form" method="POST" action="{{ url('/internship/apply') }}">
															{{ csrf_field() }}

												<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
														<label for="name" class="col-md-4 control-label">Name</label>

														<div class="col-md-7">
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

														<div class="col-md-7">
																<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

																@if ($errors->has('email'))
																		<span class="help-block">
																				<strong>{{ $errors->first('email') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
														<label for="phone_number" class="col-md-4 control-label">Phone Number</label>

														<div class="col-md-7">
																<input id="phone_number" type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

																@if ($errors->has('phone_number'))
																		<span class="help-block">
																				<strong>{{ $errors->first('phone_number') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('collage') ? ' has-error' : '' }}">
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

												<div class="form-group">
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

												<div class="form-group">
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

												<div class="form-group">
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

												<div class="form-group">
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
												<div class="form-group">
														<div class="col-md-7 col-md-offset-4">
																<button type="submit" class="btn btn-primary">
																		Register
																</button>
														</div>
												</div>
										</form>
									</div>
							</div>
				</div>
		</div>        
@endsection