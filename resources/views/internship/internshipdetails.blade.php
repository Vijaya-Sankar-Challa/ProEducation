@extends('master')

@section('title')
		{{ $intern_cat->internship_category }} | Pro Education
@endsection

@section('keywords')
	 {{ $intern_cat->internship_category }} Internship
@endsection

@section('description')
	{{ $intern_cat->internship_category }} Internships
@endsection

@section('content')
<section class="content-block team-1 team-1-1">
    <div class="container">
        <div class="underlined-title">
            <h1>Learn What You Need</h1>
            <hr>
        </div>
        <div class="row">
        	@foreach($intern_details as $intern_detail)
        		@if($intern_detail->internship_category_id == $url_id)
            		<div class="detail col-sm-4 team-member-wrap">
		                <div class="team-member">
		                    <img src="http://placehold.it/600x500" class="img-responsive" alt="Member Image">
		                    <a href="{{ url('internship') }}/{{ $url_id }}/{{ $intern_detail->id }}">
			                    <div class="team-details">
			                        <h4 class="member-name">{{ $intern_detail->title }}</h4>
			                        <p class="position">By : {{ $intern_detail->powered_by }}</p>
			                        <p>{{ str_limit($intern_detail->introduction, 200) }}.</p>
			                        <ul class="social social-dark">
			                            <li>
			                                <a href="#"><i class="fa fa-2x fa-facebook"></i></a>
			                            </li>
			                            <li>
			                                <a href="#"><i class="fa fa-2x fa-twitter"></i></a>
			                            </li>
			                            <li>
			                                <a href="#"><i class="fa fa-2x fa-google-plus"></i></a>
			                            </li>
			                            <li>
			                                <a href="#"><i class="fa fa-2x fa-pinterest"></i></a>
			                            </li>
			                            <li>
			                                <a href="#"><i class="fa fa-2x fa-behance"></i></a>
			                            </li>
			                            <li>
			                                <a href="#"><i class="fa fa-2x fa-dribbble"></i></a>
			                            </li>
			                        </ul>
			                        <!-- /.social -->
			                    </div>
		                    </a>
		                </div>
		            </div>
		            <!-- /.team-member-wrap -->
            	@endif
            @endforeach
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>        
@endsection
