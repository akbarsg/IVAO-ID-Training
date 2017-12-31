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
                                <li class="active">Contact</li>
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
                      <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Request a Training Session</h2>
                      <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                        Fill out this form to request a training session with one of our Training Department staff member.
                      </p>
                      <div class="contact-form">
                        <form id="contact-form" method="post" action="/training" role="form">
                          {{ csrf_field() }}
                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label>VID:</label>
                            <input type="text" placeholder="VID" value="{{ $user->vid }}" disabled class="form-control" name="vid" id="vid">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label>Name:</label>
                            <input type="text" placeholder="Name" disabled value="{{ $user->name }}" class="form-control" name="name" id="name">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label for="type">Select training type:</label>
                            <select class="form-control" id="type" name="type">
                              <option value="1">ATC</option>
                              <option value="2">Pilot</option>
                            </select>
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label>Next rating:</label>
                            <input type="text" placeholder="nextrating" disabled value="{{ $nextATCRating }} / {{ $nextPilotRating }}" class="form-control" name="nextrating" id="nextrating">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label>Email:</label>
                            <input type="email" placeholder="Email" class="form-control" name="email" id="email" >
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label>Select preferred training date & time (UTC):</label>
                            <input type="datetime-local" placeholder="Date" class="form-control" name="training_time" id="training_time">
                          </div>

                          <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <label>Additional message (optional):</label>
                            <textarea rows="6" placeholder="Message" class="form-control" name="note" id="note"></textarea>    
                          </div>


                          <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                            <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Request">
                          </div>                      

                        </form>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
          </section>
          @endsection