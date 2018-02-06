@extends('room.layouts.core')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $profile->name }} Profile</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Report <small>Activity report</small></h2>
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
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

              <h3>{{ $profile->name }} <small>({{ $profile->vid }})</small></h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-microphone user-profile-icon"></i> {{ $profile->atcrating->name }}
                </li>

                <li>
                  <i class="fa fa-plane user-profile-icon"></i> {{ $profile->pilotrating->name }}
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-sign-in user-profile-icon"></i> {{ $profile->created_at }}
                </li>
              </ul>

              
              <br />


            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="profile_title">
                <div class="col-md-6">
                  <h2>User Activity Report</h2>
                </div>

              </div>

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  @if($profile->isStaff == 1)
                  <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="trainer-tab" data-toggle="tab" aria-expanded="true">Trainer Log</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="training-tab" data-toggle="tab" aria-expanded="false">Trainings</a>
                  </li>
                  @else
                  <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="training-tab" data-toggle="tab" aria-expanded="true">Trainings</a>
                  </li>
                  @endif
                </ul>

                <div id="myTabContent" class="tab-content">

              @if($profile->isStaff == 1)


                
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">

                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th>Trainee Name</th>
                        <th>Training Type</th>
                        <th>Requested Time</th>
                        <th>Completed Time</th>
                        <th>Suitability</th>
                        <th>Status</th>
                        <th style="width: 20%">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($requests as $request)
                      <tr>

                        <td>
                          {{ $request->user->name }}
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
                          {{ $request->created_at }}
                        </td>
                        <td>
                          @if($request->status == 3)
                            {{ $request->training->history->created_at }}
                          @else
                            -
                          @endif
                        </td>
                        <td>
                          @if($request->status == 0)
                          @if($request->type == 1)
                          @if($nextRating->id <= $user->atc_rating_id)
                          <label class="label label-success">You're suitable</label>
                          @else
                          <label class="label label-danger">You're not suitable</label>
                          @endif
                          @else
                          @if($nextRating->id <= $user->pilot_rating_id)
                          <label class="label label-success">You're suitable</label>
                          @else
                          <label class="label label-danger">You're not suitable</label>
                          @endif
                          @endif
                          @else
                          @if($request->status == 3)
                          <label class="label label-default">Completed</label>
                          @elseif($request->status == 1)
                          <label class="label label-default">Assigned</label>
                          @endif
                          @endif
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
                          
                          @if($request->status == 0)
                          <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".viewrequest{{ $request->id }}"><i class="fa fa-folder"></i> View </a>
                          @elseif($request->status == 1)
                          <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".viewtraining{{ $request->training->id }}"><i class="fa fa-folder"></i> View </a>
                          @elseif($request->status == 3)
                          <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".viewtraining{{ $request->training->id }}"><i class="fa fa-folder"></i> View </a>
                          @endif

                          @if($request->status == 0)
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".deleterequest{{ $request->id }}"><i class="fa fa-trash-o"></i> Delete </a>
                          @elseif($request->status == 1 && $request->training->trainer_id == $user->id)
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".canceltraining{{ $request->id }}"><i class="fa fa-trash-o"></i> Cancel </a>
                          @endif
                        </td>
                      </tr>

                      @if($request->status == 0)

                      <div class="modal fade bs-example-modal-lg viewrequest{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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

                                <div class="row">
                                  <div class="col-md-3">
                                    Name:
                                  </div>
                                  <div class="col-md-9">
                                    <b><a href="/room/profile/{{ $request->user->id }}">{{ $request->user->name }} ({{ $request->user->vid }})</a></b>
                                    <input type="hidden" name="request_id" value="{{ $request->id }}">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Recent Rating:
                                  </div>
                                  <div class="col-md-9">
                                    {{ $request->user->atcrating->name }} / {{ $request->user->pilotrating->name }}
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Email:
                                  </div>
                                  <div class="col-md-9">
                                    <a href="{{ $request->email }}">{{ $request->email }}</a>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Training Type:
                                  </div>
                                  <div class="col-md-9">
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
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Proposed Training Time:
                                  </div>
                                  <div class="col-md-9">
                                    <b>{{ $request->training_time }}z</b>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Trainee Message:
                                  </div>
                                  <div class="col-md-9">
                                    {{ $request->note }}
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Your Message:
                                  </div>
                                  <div class="col-md-9">
                                    <textarea class="form-control" rows="3" placeholder='You may specify the training details here...' name="note"></textarea>
                                  </div>
                                </div>



                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                @if($request->type == 1)
                                @if($nextRating->id <= $user->atc_rating_id)
                                <button type="submit" class="btn btn-success">Assign me as the trainer!</button>
                                @else
                                <a class="btn btn-danger disabled">You're not suitable for this request!</a>
                                @endif
                                @else
                                @if($nextRating->id <= $user->pilot_rating_id)
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

                      <div class="modal fade bs-example-modal-lg deleterequest{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">


                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">Delete Request</h4>
                            </div>
                            <div class="modal-body">

                              <h4>Are you sure to delete this training request?</h4>
                              <p>This action cannot be reversible!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                              <a href="/room/request/delete/{{ $request->id }}" class="btn btn-danger">Yes, delete this request!</a>


                            </div>
                            
                          </div>
                        </div>
                      </div>

                      @elseif($request->status == 3)

                      <div class="modal fade bs-example-modal-lg viewtraining{{ $request->training->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                  {{ $request->training->note }}
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <p>Training note</p>
                                </div>
                                <div class="col-md-8">
                                  @if($request->training->request->status == 3)
                                  <p>{{ $request->training->history->description }}</p>
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

                      @endif

                      

                      @endforeach

                      @endif
                    </tbody>
                  </table>

                </div>
              
                @php
                $tabactive = "";
                if($profile->isStaff == 0){
                  $tabactive = "active in";
                }
                @endphp
                
                <div role="tabpanel" class="tab-pane fade {{ $tabactive }}" id="tab_content2" aria-labelledby="training-tab">

                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th>Trainer Name</th>
                        <th>Training Type</th>
                        <th>Requested Time</th>
                        <th>Completed Time</th>
                        <th>Suitability</th>
                        <th>Status</th>
                        <th style="width: 20%">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($profile->isStaff != 1)
                      @foreach($requests as $request)
                      @if($request->status == 3)
                      @continue
                      @endif
                      <tr>

                        <td>

                          -
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
                          {{ $request->created_at }}
                        </td>
                        <td>
                          -
                        </td>
                        <td>
                          @if($request->type == 1)
                          @if($nextRating->id <= $user->atc_rating_id)
                          <label class="label label-success">You're suitable</label>
                          @else
                          <label class="label label-danger">You're not suitable</label>
                          @endif
                          @else
                          @if($nextRating->id <= $user->pilot_rating_id)
                          <label class="label label-success">You're suitable</label>
                          @else
                          <label class="label label-danger">You're not suitable</label>
                          @endif
                          @endif
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

                          <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".viewrequest{{ $request->id }}"><i class="fa fa-folder"></i> View </a>

                          @if($request->status == 0)
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".deleterequest{{ $request->id }}"><i class="fa fa-trash-o"></i> Delete </a>
                          @elseif($request->status == 1 && $request->training->trainer_id == $user->id)
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".canceltraining{{ $request->id }}"><i class="fa fa-trash-o"></i> Cancel </a>
                          @endif
                        </td>
                      </tr>

                      <div class="modal fade bs-example-modal-lg viewrequest{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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

                                <div class="row">
                                  <div class="col-md-3">
                                    Name:
                                  </div>
                                  <div class="col-md-9">
                                    <b><a href="/room/profile/{{ $request->user->id }}">{{ $request->user->name }} ({{ $request->user->vid }})</a></b>
                                    <input type="hidden" name="request_id" value="{{ $request->id }}">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Recent Rating:
                                  </div>
                                  <div class="col-md-9">
                                    {{ $request->user->atcrating->name }} / {{ $request->user->pilotrating->name }}
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Email:
                                  </div>
                                  <div class="col-md-9">
                                    <a href="{{ $request->email }}">{{ $request->email }}</a>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Training Type:
                                  </div>
                                  <div class="col-md-9">
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
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Proposed Training Time:
                                  </div>
                                  <div class="col-md-9">
                                    <b>{{ $request->training_time }}z</b>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Trainee Message:
                                  </div>
                                  <div class="col-md-9">
                                    {{ $request->note }}
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    Your Message:
                                  </div>
                                  <div class="col-md-9">
                                    <textarea class="form-control" rows="3" placeholder='You may specify the training details here...' name="note"></textarea>
                                  </div>
                                </div>



                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                @if($request->type == 1)
                                @if($nextRating->id <= $user->atc_rating_id)
                                <button type="submit" class="btn btn-success">Assign me as the trainer!</button>
                                @else
                                <a class="btn btn-danger disabled">You're not suitable for this request!</a>
                                @endif
                                @else
                                @if($nextRating->id <= $user->pilot_rating_id)
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

                      <div class="modal fade bs-example-modal-lg deleterequest{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">


                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">Delete Request</h4>
                            </div>
                            <div class="modal-body">

                              <h4>Are you sure to delete this training request?</h4>
                              <p>This action cannot be reversible!</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                              <a href="/room/request/delete/{{ $request->id }}" class="btn btn-danger">Yes, delete this request!</a>


                            </div>
                            
                          </div>
                        </div>
                      </div>

                      @endforeach

                      @endif

                      @if($trainings != '[]')
                      @foreach($trainings as $training)
                      @if($training->request->trainee_id != $profile->id)
                      @continue
                      @endif
                      <tr>

                        <td>
                          @if($training->request->status != 0 && $training->request->status != 2)
                          <a>{{ $training->trainer->name }} ({{ $training->trainer->vid }})</a>
                          <br />
                          <small>Assigned at {{ $training->created_at }}</small>
                          @endif
                        </td>
                        <td>
                          @if($training->request->type == 1)
                          ATC ({{ $training->request->user->atcrating->getNextRatingByRating($training->request->user->atc_rating_id)->name }})
                          @else
                          Pilot ({{ $training->request->user->pilotrating->getNextRatingByRating($training->request->user->pilot_rating_id)->name }})
                          @endif
                        </td>
                        <td>
                          {{ $training->request->created_at }}
                        </td>
                        <td>
                          @if($training->request->status == 3)
                          {{ $training->history->created_at }}
                          @else
                          -
                          @endif
                        </td>
                        <td>
                          <label class="label label-default">Completed</label>
                        </td>
                        <td>

                          @if($training->request->status == 1)
                          <label class="label label-success">Assigned</label>
                          @elseif($request->status == 2)
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
                          @if($training->trainer_id == $user->id && $request->status != 3)
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
                      @endif
                    </tbody>
                  </table>

                </div>

              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection