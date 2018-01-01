@extends('room.layouts.core')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row top_tiles">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
          <div class="count">{{ $pending }}</div>
          <h3>Pending Request</h3>
          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-book"></i></div>
          <div class="count">{{ $upcoming }}</div>
          <h3>Upcoming Training</h3>
          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-check"></i></div>
          <div class="count">{{ $completed }}</div>
          <h3>Completed Training</h3>
          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count">{{ $tstaffs }}</div>
          <h3>Training Staff</h3>
          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
        </div>
      </div>
    </div>
    @if($mytrainings != '[]')
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Your Upcoming Training Sessions</h2>
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

            <p>List of your upcoming assigned training session.</p>

            <!-- start project list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <!-- <th style="width: 1%">#</th> -->
                  <th>Trainee Name</th>
                  <th>Training Type</th>
                  <th>Proposed Training Time</th>
                  <th>Contact</th>
                  <th style="width: 20%">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach($mytrainings as $mytraining)
                @if($mytraining->request->status != 1)
                @continue
                @endif
                <tr>
                  <td>
                    <a>{{ $mytraining->request->user->name }} ({{ $mytraining->request->user->vid }})</a>
                    <br />
                    <small>Requested at {{ $mytraining->request->created_at }}</small>
                  </td>
                  <td>
                    @if($mytraining->request->type == 1)
                    ATC ({{ $mytraining->request->user->atcrating->getNextRatingByRating($mytraining->request->user->atc_rating_id)->name }})
                    @else
                    Pilot ({{ $mytraining->request->user->pilotrating->getNextRatingByRating($mytraining->request->user->pilot_rating_id)->name }})
                    @endif
                  </td>
                  <td>
                    {{ $mytraining->request->created_at }}
                  </td>
                  <td>
                    <a href="mailto:{{ $mytraining->request->email }}">{{ $mytraining->request->email }}</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".mytraining{{ $mytraining->id }}"><i class="fa fa-folder"></i> View </a>
                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".mytrainingcompleted{{ $mytraining->id }}"><i class="fa fa-check"></i> Complete </a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".mytrainingcancel{{ $mytraining->id }}"><i class="fa fa-trash-o"></i> Cancel </a>
                  </td>
                </tr>

                <div class="modal fade bs-example-modal-lg mytraining{{ $mytraining->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <!-- <form action="/room/assignme" method="post"> -->

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Training Details</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-4">
                              <p>Trainee message</p>
                            </div>
                            <div class="col-md-8">
                              <p>{{ $mytraining->request->note }}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <p>Your message</p>
                            </div>
                            <div class="col-md-8">
                              <p>{{ $mytraining->note }}</p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                        </div>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                  <div class="modal fade bs-example-modal-lg mytrainingcompleted{{ $mytraining->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="/room/training/complete" method="post" data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Training Details</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Final Note <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="description" class="form-control" rows="3" placeholder='Type the training note...'></textarea>
                                <input type="hidden" name="training_id" value="{{ $mytraining->id }}">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Complete this training</button>


                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade bs-example-modal-lg mytrainingcancel{{ $mytraining->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <!-- <form action="/room/assignme" method="post"> -->

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Cancel the Training</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Are you sure to cancel this training?</h4>
                            <p>You will not be assigned to this training request and the other Training Department staff member will be able to assign himself.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="/room/training/cancel/{{ $mytraining->id }}" class="btn btn-danger">Yes, unassign me from this training!</a>

                          </div>
                          <!-- </form> -->
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </tbody>
                </table>
                <!-- end project list -->

              </div>
            </div>
          </div>
        </div>
        @endif

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

                <!-- start project list -->
                <table class="table table-striped projects">
                  <thead>
                    <tr>
                      <!-- <th style="width: 1%">#</th> -->
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
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".view{{ $request->id }}"><i class="fa fa-folder"></i> View </a>
                        <!-- <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                      </td>
                    </tr>
                    <div id="view{{ $request->id }}" class="modal fade" role="dialog">
                      <div class="modal-dialog">



                      </div>
                    </div>
                    @endforeach

                  </tbody>
                </table>
                <!-- end project list -->

              </div>
            </div>
          </div>
        </div>

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

                <p>Latest training sessions. You can check out member training logs here.</p>

                <!-- start project list -->
                <table class="table table-striped projects">
                  <thead>
                    <tr>
                      <!-- <th style="width: 1%">#</th> -->
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
                        @if($training->trainer_id == $user->id)
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
                              <!-- <a href="/room/training/cancel/{{ $mytraining->id }}" class="btn btn-danger">Yes, unassign me from this training!</a> -->

                            </div>
                          </div>
                        </div>
                      </div>
                      
                      @endforeach
                    </tbody>
                  </table>
                  <!-- end project list -->

                </div>
              </div>
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


      @endforeach
      @endsection