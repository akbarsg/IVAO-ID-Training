@extends('room.layouts.core')
@section('content')
<div class="right_col" role="main">
	<div class="">


		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Trainings</h2>
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

						<!-- <p>Latest training sessions. You can check out member training logs here.</p> -->

						<table class="table table-striped projects">
							<thead>
								<tr>

									<th>Trainee Name</th>
									<th>Trainer Name</th>
									<th>Training Type</th>
									<th>Completed Time</th>
									<th>Status</th>
									<th style="width: 20%">Options</th>
								</tr>
							</thead>
							<tbody>
								@foreach($trainings as $training)
								<tr>
									<td>
										<a>{{ $training->request->user->name }} ({{ $training->request->user->vid }})</a>
										<br />
										<small>Requested at {{ $training->request->created_at }}</small>
									</td>
									<td>
										<a>{{ $training->trainer->name }} ({{ $training->trainer->vid }})</a>
										<br />
										<small>Assigned at {{ $training->created_at }}</small>
									</td>
									<td>
										@if($training->request->type == 1)
										ATC ({{ $training->request->user->atcrating->getNextRatingByRating($training->request->user->atc_rating_id)->name }})
										@else
										Pilot ({{ $training->request->user->pilotrating->getNextRatingByRating($training->request->user->pilot_rating_id)->name }})
										@endif
									</td>
									<td>
										@if($training->request->status == 3)
										{{ $training->history->created_at }}
										@else
										-
										@endif
									</td>
									<td>

										@if($training->request->status == 1)
										<label class="label label-success">Assigned</label>
										@elseif($training->request->status == 2)
										<label class="label label-danger">Refused</label>
										@elseif($training->request->status == 3)
										<label class="label label-primary">Completed</label>
										@else
										<label class="label label-warning">Pending</label>
										@endif

									</td>
									<td>

										<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".viewtraining{{ $training->id }}"><i class="fa fa-folder"></i> View </a>

										<!-- <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
										@if($training->trainer_id == $user->id && $training->request->status != 3)
										<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
										@endif
									</td>
								</tr>

								<div class="modal fade bs-example-modal-lg viewtraining{{ $training->id }}" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">

											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">Training Details</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4">
														Message for trainee
													</div>
													<div class="col-md-8">
														{{ $training->note }}
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<p>Training note</p>
													</div>
													<div class="col-md-8">
														@if($training->request->status == 3)
														<p>{{ $training->history->description }}</p>
														@else
														<p><i>Training not completed yet!</i></p>
														@endif
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

											</div>
										</div>
									</div>
								</div>

								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>



	</div>
</div>

@endsection