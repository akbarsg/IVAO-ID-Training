@extends('layouts.core')
@section('content')
<!-- 
        ================================================== 
            Global Page Section Start
            ================================================== -->
         <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>Training Request</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Request</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
          </section> <!--/#page-header-->


        <!-- 
        ================================================== 
            Contact Section Start
            ================================================== -->
            <section id="contact-section">
              <div class="container">
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                    <div class="block">
                      <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">Request a Training Session <a href="/dashboard" class="btn pull-right btn-default">Go to Dashboard</a></h2>

                      @php
                          $request = App\RequestModel::where('trainee_id', Auth::user()->id);

                          if($request->count() > 0){
                            $email = $request->first()->email;
                          } else {
                            $email = '';
                          }

                          $pendingRequest = '';
                          $newRequest = $request->where('status', 0)->orWhere('status', 1);

                          if($newRequest->count() > 0){
                            $pendingRequest = $newRequest->first();
                          }
                      @endphp
                      
                      @if($pendingRequest != '' && $newRequest->count() > 1)
                        
                        <div class="alert alert-danger">
                          <h4>Sorry</h4>
                        You cannot request more than 2 training session if it's not completed yet!
                        </div>

                      @else
                      <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                        Fill out this form to request a training session with one of our Training Department staff member.
                      </p>
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <div class="contact-form">
                        <form id="contact-form" method="post" action="/training" role="form">
                          
                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label>VID:</label>
                            <input type="text" placeholder="VID" value="{{ $user->vid }}" disabled class="form-control" name="vid" id="vid">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label>Name:</label>
                            <input type="text" placeholder="Name" disabled value="{{ $user->name }}" class="form-control" name="name" id="name">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label>Next rating:</label>
                            <input type="text" placeholder="nextrating" disabled value="{{ $nextATCRating->name }} / {{ $nextPilotRating->name }}" class="form-control" name="nextrating" id="nextrating">
                            <input type="hidden" name="atc_rating_id" value="{{ $nextATCRating->id }}">
                            <input type="hidden" name="pilot_rating_id" value="{{ $nextPilotRating->id }}">
                          </div>
                          

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label>Email:</label>
                            <input type="email" placeholder="Email" class="form-control" name="email" id="email" value="{{ $email }}" @if($request->count() > 0) readonly @endif>
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label for="type">Select training type:</label>
                            <select class="form-control" id="type" name="type">
                              @if($pendingRequest != '')
                                @if($pendingRequest->type == 2)
                                  <option value="1">ATC</option>
                                @else
                                  <option value="2">Pilot</option>
                                @endif
                              @else
                                <option value="1">ATC</option>
                                <option value="2">Pilot</option>
                              @endif
                            </select>
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label>Select preferred training date & time (UTC):</label>
                            <input type="datetime-local" placeholder="Date" class="form-control" name="training_time" id="training_time">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <label>Additional message (optional):</label>
                            <textarea rows="6" placeholder="Message" class="form-control" name="note" id="note"></textarea>    
                          </div>


                          <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".1s">
                            <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Request">
                          </div>                      

                        </form>
                      </div>
                      @endif
                    </div>
                  </div>
                  
              </div>
            </div>
          </section>
          @endsection