@extends('room.layouts.core')
@section('content')
<div class="right_col" role="main">
	<div class="">


		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Requests</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<p>Latest training requests by member. You can assign yourself as the trainer by clicking "View" button.</p>

						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 20%">Name</th>
									<th>Training Type</th>
									<th>Proposed Training Time</th>

									<th>Status</th>
									<th>Suitability</th>
									<th style="width: 20%">Options</th>
								</tr>
							</thead>
							<tbody>
								@foreach($requests as $request)
								<tr>
									<td>
										<a>{{ $request->user->name }} ({{ $request->user->vid }})</a>
										<br />
										<small>Submitted {{ $request->created_at }}</small>
									</td>
									<td>

										@if($request->type == 1)
										@php
										$nextRating = App\AtcRating::getNextRatingByRating($request->user->atc_rating_id)
										@endphp
										ATC ({{ $nextRating->name }})
										@else
										@php
										$nextRating = App\PilotRating::getNextRatingByRating($request->user->pilot_rating_id)
										@endphp
										Pilot ({{ $nextRating->name }})
										@endif
									</td>
									<td>
										{{ $request->training_time }}
									</td>
									<td>
										@if($request->status == 1)
										<label class="label label-success">Assigned</label>
										@elseif($request->status == 2)
										<label class="label label-danger">Refused</label>
										@elseif($request->status == 3)
										<label class="label label-primary">Completed</label>
										@else
										<label class="label label-warning">Pending</label>
										@endif
									</td>
									<td>
										@if($request->type == 1)
										@if($nextRating->id <= $user->atc_rating_id && $request->trainee_id != $user->id)
										<label class="label label-success">You're suitable</label>
										@else
										<label class="label label-danger">You're not suitable</label>
										@endif
										@else
										@if($nextRating->id <= $user->pilot_rating_id && $request->trainee_id != $user->id)
										<label class="label label-success">You're suitable</label>
										@else
										<label class="label label-danger">You're not suitable</label>
										@endif
										@endif
									</td>

									<td>
										<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".view{{ $request->id }}"><i class="fa fa-folder"></i> View </a>
										<!-- <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
										<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete{{ $request->id }}"><i class="fa fa-trash-o"></i> Delete </a>
									</td>
								</tr>
								<div id="view{{ $request->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">



									</div>
								</div>
								@endforeach

							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>

		@foreach($requests as $request)
		<div class="modal fade bs-example-modal-lg view{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form action="/room/assignme" method="post">
						{{ csrf_field() }}
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Request Details</h4>
						</div>
						<div class="modal-body">

							<table class="table">
								<tr>
									<td>Name: </td>
									<td><b><a href="/room/profile/{{ $request->user->id }}">{{ $request->user->name }} ({{ $request->user->vid }})</a></b></td>
									<input type="hidden" name="request_id" value="{{ $request->id }}">
								</tr>
								<tr>
									<td>Recent Rating: </td>
									<td>{{ $request->user->atcrating->name }} / {{ $request->user->pilotrating->name }}</td>
								</tr>
								<tr>
									<td>Email: </td>
									<td><a href="{{ $request->email }}">{{ $request->email }}</a></td>
								</tr>
								<tr>
									<td>Training type: </td>
									<td>
										@if($request->type == 1)
										@php
										$nextRating = App\AtcRating::getNextRatingByRating($request->user->atc_rating_id)
										@endphp
										ATC (<b>{{ $nextRating->name }}</b>)
										@else
										@php
										$nextRating = App\PilotRating::getNextRatingByRating($request->user->pilot_rating_id)
										@endphp
										Pilot (<b>{{ $nextRating->name }}</b>)
										@endif
									</td>
								</tr>

								<tr>
									<td>Proposed training time: </td>
									<td><b>{{ $request->training_time }}z</b></td>
								</tr>
								<tr>
									<td>Trainee Message: </td>
									<td>{{ $request->note }}</td>
								</tr>
								<tr>
									<td>Your Message: </td>
									<td>
										<textarea class="form-control" rows="3" placeholder='You may specify the training details here...' name="note"></textarea>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							@if($request->type == 1)
							@if($nextRating->id <= $user->atc_rating_id && $request->trainee_id != $user->id)
							<button type="submit" class="btn btn-success">Assign me as the trainer!</button>
							@else
							<a class="btn btn-danger disabled">You're not suitable for this request!</a>
							@endif
							@else
							@if($nextRating->id <= $user->pilot_rating_id && $request->trainee_id != $user->id)
							<button type="submit" class="btn btn-success">Assign me as the trainer!</button>
							@else
							<a class="btn btn-danger disabled">You're not suitable for this request!</a>
							@endif
							@endif

						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade bs-example-modal-lg delete{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Delete the Request</h4>
					</div>
					<div class="modal-body">
						<h4>Are you sure to delete this request?</h4>
						<p>This action is irreversible.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<a href="/room/request/delete/{{ $request->id }}" class="btn btn-danger">Yes, delete this request!</a>

					</div>
				</div>
			</div>
		</div>


		@endforeach

	</div>
</div>

@endsection