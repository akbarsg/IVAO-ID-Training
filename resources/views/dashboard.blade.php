@extends('layouts.core')
@section('content')
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2>Training Room</h2>
					<ol class="breadcrumb">
						<li>
							<a href="/">
								<i class="ion-ios-home"></i>
								Home
							</a>
						</li>
						<li class="active">Training Room</li>
					</ol>
				</div>
			</div>
		</div>
	</div>   
</section>

<section id="blog-full-width">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="sidebar" style="padding-top: 50px">
					<div class="author widget">
						<h3 class="widget-head">Profile</h3>
						<!-- <img class="img-responsive" src="images/author/author-bg.jpg"> -->
						<div class="author-body text-center">
							<!-- <div class="author-img">
								<img src="images/author/author.jpg">
							</div> -->
							<div class="author-bio">
								<h3>{{ $user->name }}</h3>
								<b><p>{{ $user->vid }}</p></b>
								<p>{{ $user->atcrating->name }} / {{ $user->pilotrating->name }}</p>
							</div>
						</div>
					</div>
					<div class="categories widget">
						<h3 class="widget-head">Categories</h3>
						<ul>
							<li>
								<a href="">Audio</a> <span class="badge">1</span>
							</li>
							<li>
								<a href="">Gallery</a> <span class="badge">2</span>
							</li>
							<li>
								<a href="">Image</a> <span class="badge">4</span>
							</li>
							<li>
								<a href="">Standard</a> <span class="badge">2</span>
							</li>
							<li>
								<a href="">Status</a> <span class="badge">3</span>
							</li>
						</ul>
					</div>

					<div class="recent-post widget">
						<h3>Recent Posts</h3>
						<ul>
							<li>
								<a href="#">Corporate meeting turns into a photoshooting.</a><br>
								<time>16 May, 2015</time>
							</li>
							<li>
								<a href="#">Statistics,analysis. The key to succes.</a><br>
								<time>15 May, 2015</time>
							</li>
							<li>
								<a href="#">Blog post without image, only text.</a><br>
								<time>14 May, 2015</time>
							</li>
							<li>
								<a href="#">Blog post with audio player. Share your creations.</a><br>
								<time>14 May, 2015</time>
							</li>
							<li>
								<a href="#">Blog post with classic Youtbube player.</a><br>
								<time>12 May, 2015</time>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<section class="about-feature clearfix">
					<!-- <div class="container-fluid"> -->
						<div class="row">
							<div class="block about-feature-1 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s" style="width: 100%; background: {{ $status[2] }}">
								<h2>
									{{ $status[0] }}
								</h2>
								<p>
									{{ $status[1] }}

								</p>
								<table class="table table-bordered">
									<!-- <tr>
										<td>Submission time: </td>
										<td>{{ $request->created_at }}z</td>
									</tr> -->
									@if($request->status == 1)
									@php
									$training = App\Training::where('request_id', $request->id)->first();
									@endphp
									<tr>
										<td>Trainer Name</td>
										<td><b>{{ $training->trainer->name }} ({{ $training->trainer->vid }})</b></td>
									</tr>
									<tr>
										<td>Trainer Email</td>
										<td><a href="mailto:{{ $training->trainer->email }}"></a><b>{{ $training->trainer->email }}</b></a></td>
									</tr>
									@endif
									<tr>
										<td>Your Email: </td>
										<td>{{ $request->email }}</td>
									</tr>
									<tr>
										<td>Training type: </td>
										<td>
											@if($request->type == 1)
												ATC ({{ $nextRating }})
											@else
												Pilot ({{ $nextRating }})
											@endif
										</td>
									</tr>
									
									<tr>
										<td>Proposed training time: </td>
										<td>{{ $request->training_time }}z</td>
									</tr>
									<tr>
										<td>Your Message: </td>
										<td>{{ $request->note }}</td>
									</tr>
									@if($request->status == 1)
									@php
									$trainer_note = App\Training::where('request_id', $request->id)->select('note')->first();
									if($trainer_note == null){
										$trainer_note = '';
									}
									@endphp
									<tr>
										<td>Trainer Message</td>
										<td>{{ $trainer_note->note }}</td>
									</tr>
									@endif
								</table>
								<a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Cancel</a>
							</div>
							
						</div>

					<!-- </div> -->
				</section>
			</div>
		</div>
	</section>

	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cancel Training Session</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to cancel this training request?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="/training/delete/{{ $request->id }}" class="btn btn-danger">Yes, cancel this request</a>
      </div>
    </div>

  </div>
</div>
	@endsection