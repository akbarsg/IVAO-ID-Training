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
                    $nextRating = App\AtcRating::getNextRatingByRating($request->user->atc_rating_id)->name
                    @endphp
                    ATC ({{ $nextRating }})
                    @else
                    @php
                    $nextRating = App\PilotRating::getNextRatingByRating($request->user->pilot_rating_id)->name
                    @endphp
                    Pilot ({{ $nextRating }})
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
                  <th>Actual Training Time</th>
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
                    -
                  </td>
                  <td>

                    <label class="label label-success">Assigned</label>
                    
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    <!-- <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                  </td>
                </tr>
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
            <h2>Weekly Summary <small>Activity shares</small></h2>
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

            <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
              <div class="col-md-7" style="overflow:hidden;">
                <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                  <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                </span>
                <h4 style="margin:18px">Weekly sales progress</h4>
              </div>

              <div class="col-md-5">
                <div class="row" style="text-align: center;">
                  <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">Bounce Rates</h4>
                  </div>
                  <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">New Traffic</h4>
                  </div>
                  <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">Device Share</h4>
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
              $nextRating = App\AtcRating::getNextRatingByRating($request->user->atc_rating_id)->name
              @endphp
              ATC (<b>{{ $nextRating }}</b>)
              @else
              @php
              $nextRating = App\PilotRating::getNextRatingByRating($request->user->pilot_rating_id)->name
              @endphp
              Pilot (<b>{{ $nextRating }}</b>)
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
        <button type="submit" class="btn btn-success">Assign me as the trainer!</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endforeach
@endsection