@extends('layouts.core')
@section('content')
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2>Pilot Documents</h2>
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
		<h2 class="subtitle wow fadeInUp animated" data-wow-delay=".3s" data-wow-duration="500ms">Pilot Documents</h2>
		<p class="subtitle-des wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="500ms">
			Below are a number of useful documents & guides for the pilot.
		</p>
		<div class="row">
			<div class="col-sm-3">
				<figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
					<div class="img-wrapper">
						<img src="images/portfolio/item-1.jpg" class="img-responsive" alt="this is a title" >
						<div class="overlay">
							<div class="buttons">
								<a rel="gallery" class="fancybox" href="http://www.ivao.web.id/pilot/Basic%20Pilot%20Handbook%202.pdf">View</a>        
								<a target="_blank" href="http://www.ivao.web.id/pilot/Basic%20Pilot%20Handbook%202.pdf">Download</a>
							</div>
						</div>
					</div>
					<figcaption>
						<h4>
							<a class="fancybox" href="http://www.ivao.web.id/pilot/Basic%20Pilot%20Handbook%202.pdf">
								Pilot Basic Training Handbook        
							</a>
						</h4>
						<p>
							IVAO Indonesia basic training handbook for pilot.
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
								<a rel="gallery" class="fancybox" href="https://ivao.aero/training/pilot/TOC_documents.asp">View</a>        
								<a target="_blank" href="https://ivao.aero/training/pilot/TOC_documents.asp">Visit</a>
							</div>
						</div>
					</div>
					<figcaption>
						<h4>
							<a class="fancybox" href="https://ivao.aero/training/pilot/TOC_documents.asp">
								IVAO Pilot Documents
							</a>
						</h4>
						<p>
							Pilot Documents hosted by IVAO HQ.
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