@extends('room.layouts.core')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users</h3>
      </div>

      <!-- <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div> -->
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <!-- <ul class="pagination pagination-split">
                  <li><a href="#">A</a></li>
                  <li><a href="#">B</a></li>
                  <li><a href="#">C</a></li>
                  <li><a href="#">D</a></li>
                  <li><a href="#">E</a></li>
                  <li>...</li>
                  <li><a href="#">W</a></li>
                  <li><a href="#">X</a></li>
                  <li><a href="#">Y</a></li>
                  <li><a href="#">Z</a></li>
                </ul> -->
              </div>

              <div class="clearfix"></div>
              @foreach($users as $pengguna)
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief">
                      <i>
                        @if($pengguna->isStaff == 1)
                        <strong>Staff</strong>
                        @else
                        Member
                        @endif
                        @if($pengguna->staff != null)
                         ({{ $pengguna->staff }})
                        @endif
                      </i>
                    </h4>
                    <div class="left col-xs-12">
                      <h2>{{ $pengguna->name }}</h2>
                      <p><strong>{{ $pengguna->vid }} </strong></p>
                      <!-- <p>{{ $pengguna->atcrating->name }} / {{ $pengguna->pilotrating->name }} </p> -->
                      <img src="{{ $pengguna->atcrating->image }}" alt="{{ $pengguna->atcrating->name }}" data-toggle="tooltip" title="{{ $pengguna->atcrating->name }}"> <img src="{{ $pengguna->pilotrating->image }}" alt="{{ $pengguna->pilotrating->name }}" data-toggle="tooltip" title="{{ $pengguna->pilotrating->name }}">
                      <!-- <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i> Address: </li>
                        <li><i class="fa fa-phone"></i> Phone #: </li>
                      </ul> -->
                    </div>
                    <!-- <div class="right col-xs-5 text-center">
                      <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                    </div> -->
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    
                    <div class="col-xs-12 col-sm-12 emphasis">
                      <a href="mailto:{{ $pengguna->email }}" class="btn btn-success btn-xs"> <i class="fa fa-user">
                      </i> <i class="fa fa-comments-o"></i> </a>
                      @if($pengguna->isStaff == 0)
                        <a href="/room/users/assignasstaff/{{ $pengguna->id }}" class="btn btn-success btn-xs">
                          <i class="fa fa-lock"> </i> Assign as Staff
                        </a>
                      @elseif($pengguna->staff != 'ID-TC' && $pengguna->staff != 'ID-TAC' && $pengguna->staff != 'ID-WM' && $pengguna->staff != 'ID-AWM' && $pengguna->staff != 'ID-DIR' && $pengguna->staff != 'ID-ADIR')
                        <a href="/room/users/unassignasstaff/{{ $pengguna->id }}" class="btn btn-danger btn-xs">
                          <i class="fa fa-unlock"> </i> Unassign as Staff
                        </a>
                      @endif
                      <a href="/room/profile/{{ $pengguna->id }}" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> View Profile
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection