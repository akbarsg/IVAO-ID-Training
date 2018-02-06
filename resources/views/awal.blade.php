@extends('layouts.core')
@section('content')
<!--
        ==================================================
        Slider Section Start
        ================================================== -->
        <section id="hero-area" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="block wow fadeInUp" data-wow-delay=".3s">
                            
                            <!-- Slider -->
                            <section class="cd-intro">
                                <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                                <span>IVAO Indonesia Training Center</span><br>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Training Session</b>
                                    <b>Documentation</b>
                                </span>
                                </h1>
                                </section> <!-- cd-intro -->
                                <!-- /.slider -->
                                <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                                    We build-up your skills & knowledges
                                </h2>
                                <a href="/training" class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green" data-wow-delay=".9s">Let's Train!</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--/#main-slider-->
            <!--
            ==================================================
            Slider Section Start
            ================================================== -->
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                                <h2>
                                Welcome to IVAO Indonesia Training Department
                                </h2>
                                <p>
                                    This website dedicated for IVAO members to train as ATC and Pilot in IVAO network. Members can access IVAO training materials and request for special training session with IVAO Indonesia Training Department staff. With this facility, we hope the skills and knowledges of IVAO Indonesia member will be better.
                                </p>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                                <img src="images/about/about.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /#about -->

            <!--
            ==================================================
            Portfolio Section Start
            ================================================== -->
            <section id="feature">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">What we offer?</h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            We offer some facilities to support member training.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-plane"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Training Request</h4>
                                    <p>Train to be ATC or pilot in IVAO with the staff member.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-document-text"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Documentation</h4>
                                    <p>IVAO training documents</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-person-stalker"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Support</h4>
                                    <p>Contact the staff member for help</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section> <!-- /#feature -->
                            
            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">TRAINING REQUEST</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Request a training session with our Training Department staff member.</p>
                                <a href="training" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Let's Train!</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
@endsection