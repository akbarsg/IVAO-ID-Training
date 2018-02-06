@extends('layouts.core')
@section('content')
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2>ATC Documents</h2>
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


<section class="works service-page">
	<div class="container">
		<h2 class="subtitle wow fadeInUp animated" data-wow-delay=".3s" data-wow-duration="500ms">ATC Documents</h2>
		<p class="subtitle-des wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="500ms">
			Below are a number of useful documents & guides for the controller.
		</p>
		<div class="row">
			<div class="col-sm-3">
				<figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
					<div class="img-wrapper">
						<img src="images/portfolio/item-1.jpg" class="img-responsive" alt="this is a title" >
						<div class="overlay">
							<div class="buttons">
								<a rel="gallery" class="fancybox" href="http://www.ivao.web.id/atc/Introduction_to_ATC.pdf">View</a>        
								<a target="_blank" href="http://www.ivao.web.id/atc/Introduction_to_ATC.pdf">Download</a>
							</div>
						</div>
					</div>
					<figcaption>
						<h4>
							<a href="#">
								Introduction to ATC        
							</a>
						</h4>
						<p>
							A brief explanation of ATC.
						</p>
					</figcaption>
				</figure>
			</div>

			<div class="col-sm-3">
				<figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
					<div class="img-wrapper">
						<img src="images/portfolio/item-2.jpg" class="img-responsive" alt="this is a title" >
						<div class="overlay">
							<div class="buttons">
								<a rel="gallery" class="fancybox" href="http://www.ivao.web.id/resources/ATC%20Training%20Handbook%20v.1.2.pdf">View</a>        
								<a target="_blank" href="http://www.ivao.web.id/resources/ATC%20Training%20Handbook%20v.1.2.pdf">Download</a>
							</div>
						</div>
					</div>
					<figcaption>
						<h4>
							<a href="#">
								ATC Training Handbook v1.2      
							</a>
						</h4>
						<p>
							IVAO Indonesia ATC Training Handbook (2012).
						</p>
					</figcaption>
				</figure>
			</div>

			<div class="col-sm-3">
				<figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
					<div class="img-wrapper">
						<img src="images/portfolio/item-3.jpg" class="img-responsive" alt="" >
						<div class="overlay">
							<div class="buttons">
								<a rel="gallery" class="fancybox" href="http://www.ivao.web.id/resources/IVAO%20INDONESIA%20DIVISION%20Training%20Advance.pdf">View</a>        
								<a target="_blank" href="http://www.ivao.web.id/resources/IVAO%20INDONESIA%20DIVISION%20Training%20Advance.pdf">Download</a>
							</div>
						</div>
					</div>
					<figcaption>
						<h4>
							<a href="#">
								ATC Advance Training Handbook      
							</a>
						</h4>
						<p>
							IVAO Indonesia ATC Advance Training Handbook (2012).
						</p>
					</figcaption>
				</figure>
			</div>

			<div class="col-sm-3">
				<figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
					<div class="img-wrapper">
						<img src="images/portfolio/item-4.jpg" class="img-responsive" alt="" >
						<div class="overlay">
							<div class="buttons">
								<a rel="gallery" class="fancybox" href="https://ivao.aero/training/atc/TOC_documents.asp">View</a>        
								<a target="_blank" href="https://ivao.aero/training/atc/TOC_documents.asp">Visit</a>
							</div>
						</div>
					</div>
					<figcaption>
						<h4>
							<a href="#">
								IVAO ATC Documents       
							</a>
						</h4>
						<p>
							ATC Documents hosted by IVAO HQ.
						</p>
					</figcaption>
				</figure>
			</div>



		</div>
	</div>
</section>
<script type="text/javascript">
	$(".fancybox").fancybox({
    width  : '100%',
    height : '100%',
    type   :'iframe'
});
</script>

@endsection