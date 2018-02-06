@extends('layouts.core')
@section('content')
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2>Training Room</h2>
					<!-- <ol class="breadcrumb">
						<li>
							<a href="/">
								<i class="ion-ios-home"></i>
								Beranda
							</a>
						</li>
						<li class="active">Training Room</li>
					</ol> -->
				</div>
			</div>
		</div>
	</div>   
</section>

<section id="blog-full-width">
	<div class="container">
		<div class="row">
			@include('layouts.sidebar')
			<div class="col-md-8">
				<section class="about-feature clearfix">
					<!-- <div class="container-fluid"> -->
						<!-- <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Welcome to IVAO Indonesia Training Center</h3>
							</div>
							<div class="panel-body">
								Panel content
							</div>
						</div> -->
						<h3>Welcome to IVAO Indonesia Training Center</h3>
						<p>With this tool, you can access all training materials which served by IVAO Indonesia staff. You may read the documents and request a training session to develop your flying and controlling skill in IVAO.</p>
						<p>So, how do you want to start the training?</p>
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<a href="/atc" type="button" class="btn btn-large btn-block btn-primary">Read ATC Documents</a>
							</div> 
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<a href="/pilot" type="button" class="btn btn-large btn-block btn-primary">Read Pilot Documents</a>
							</div> 
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<a href="/training" type="button" class="btn btn-large btn-block btn-success">Request a Training Session</a>
							</div>
						</div>
						<br>
						<!-- <div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a type="button" class="btn btn-large btn-block btn-primary">Request a Training Session</a>
							</div>
						</div> -->

						<br>

						@if($request !== '')
						<h3>Training Logs</h3>
						@endif
						@if($request !== '')
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								
							
							<div class="block about-feature-1 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s" style="width: 100%; background: {{ $status[2] }}; margin-right: 15px">
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
										<td><a href="https://www.ivao.aero/Member.aspx?ID={{ $training->trainer->vid }}"><b>{{ $training->trainer->name }} ({{ $training->trainer->vid }})</b></a></td>
									</tr>
									<tr>
										<td>Trainer Email</td>
										<td><a href="mailto:{{ $training->trainer->email }}"><b>{{ $training->trainer->email }}</b></a></td>
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
									@if($request->status == 3)
									@php
									$training = App\Training::where('request_id', $request->id)->first();
									$history = App\History::where('training_id', $training->id)->first();
									@endphp
									<tr>
										<td>Completed time: </td>
										<td>{{ $history->created_at }}z</td>
									</tr>
									@endif
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
									@elseif($request->status == 3)
									
									<tr>
										<td>Training Note</td>
										<td>{{ $history->description }}</td>
									</tr>
									@endif
								</table>
								@if($request->status == 0)
								<a class="btn btn-danger" data-toggle="modal" data-target="#cancel{{ $request->id }}">Cancel</a>
								@endif
							</div>
							<div id="cancel{{ $request->id }}" class="modal fade" role="dialog">
							  <div class="modal-dialog">

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
							</div>
						</div>
						<br>
						
						@if($requests->count() > 1)
						<h2>Past Requests</h2>
						@endif
						@php
						$i = 0;
						@endphp
						@foreach($requests as $request)
							@if($i == 0)
								@php
									$i++;
								@endphp
								@continue
							@endif
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								
							
							@php
							$status = array('Pending', 'Your request has not been reviewed yet. Please wait until a staff member assigned yours. You will be notified by email.', '#E65100');
							
								if ($request->status == 1) {
									$status[0] = 'Assigned';
									$status[1] = 'Your training request has been assigned! Please contact the assigned staff member.';
									$status[2] = '#43A047';
								} elseif ($request->status == 2) {
									$status[0] = 'Refused';
									$status[1] = 'Sorry, your training request has been refused.';
									$status[2] = '#EF5350';
								} elseif ($request->status == 3) {
									$status[0] = 'Completed';
									$status[1] = 'This training session has been finished!.';
									$status[2] = '#01579B';
								}

								if($request->type == 1) {
									$training_type = "ATC (" . $request->atcRating->name . ")";
								} else {
									$training_type = "Pilot (" . $request->pilotRating->name . ")";
								}
							@endphp
							<div class="block about-feature-1 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s" style="width: 100%; background: {{ $status[2] }}; margin-right: 15px"">
								<h2>
									{{ $status[0] }} <small style="color: #fff"> - {{ $training_type }}</small>
									@if($request->status == 0)
									<a class="btn btn-danger pull-right" data-toggle="modal" data-target="#cancel{{ $request->id }}">Cancel</a>
									@endif
									<a class="btn btn-primary pull-right" data-toggle="modal" data-target="#view{{ $request->id }}">View</a>
								</h2>
								
								
							</div>
							</div>
						</div>
						<div id="cancel{{ $request->id }}" class="modal fade" role="dialog">
						  <div class="modal-dialog">

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
						<div id="view{{ $request->id }}" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Details</h4>
						      </div>
						      <div class="modal-body">
						        <p>
									{{ $status[1] }}

								</p>
								<table class="table table-bordered">
									@if($request->status == 1 || $request->status == 3)
									
									<tr>
										<td>Trainer Name</td>
										<td><a href="https://www.ivao.aero/Member.aspx?ID={{ $request->training->trainer->vid }}"><b>{{ $request->training->trainer->name }} ({{ $request->training->trainer->vid }})</b></a></td>
									</tr>
									<tr>
										<td>Trainer Email</td>
										<td><a href="mailto:{{ $request->training->trainer->email }}"><b>{{ $request->training->trainer->email }}</b></a></td>
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
												ATC ({{ $request->atcRating->name }})
											@else
												Pilot ({{ $request->pilotRating->name }})
											@endif
										</td>
									</tr>
									
									<tr>
										<td>Proposed training time: </td>
										<td>{{ $request->training_time }}z</td>
									</tr>
									@if($request->status == 3)
									<tr>
										<td>Completed time: </td>
										<td>{{ $request->training->history->created_at }}z</td>
									</tr>
									@endif
									<tr>
										<td>Your Message: </td>
										<td>{{ $request->note }}</td>
									</tr>
									@if($request->status == 1)
									<tr>
										<td>Trainer Message</td>
										<td>{{ $request->training->note }}</td>
									</tr>
									@elseif($request->status == 3)
									
									<tr>
										<td>Training Note</td>
										<td>{{ $request->training->history->description }}</td>
									</tr>
									@endif
								</table>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>
						@endforeach
						@endif
					<!-- </div> -->
				</section>
			</div>
		</div>
	</section>

	@endsection