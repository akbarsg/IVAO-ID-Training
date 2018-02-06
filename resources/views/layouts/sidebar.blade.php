<div class="col-md-4">
	<div class="sidebar" style="padding-top: 50px">
		<div class="author widget">
			<h3 class="widget-head">My Profile</h3>
			<!-- <img class="img-responsive" src="images/author/author-bg.jpg"> -->
			<div class="author-body text-center">
				<!-- <div class="author-img">
					<img src="images/author/author.jpg">
				</div> -->
				<div class="author-bio">
					<h3>{{ $user->name }}</h3>
					<b><p>{{ $user->vid }}</p></b>
					<!-- <p>{{ $user->atcrating->name }} / {{ $user->pilotrating->name }}</p> -->
					<img src="{{ $user->atcrating->image }}" alt="{{ $user->atcrating->name }}" data-toggle="tooltip" title="{{ $user->atcrating->name }}"> <img src="{{ $user->pilotrating->image }}" alt="{{ $user->pilotrating->name }}" data-toggle="tooltip" title="{{ $user->pilotrating->name }}">
				</div>
			</div>
		</div>
						<!-- <div class="widget">
							<h3 class="widget-head">Training Request</h3>
							<p>Click the button below to request a training session with our Training Department staff member.</p>
							<a href="/training" class="btn btn-block btn-primary">Training Request</a>
						</div> -->
						
	</div>
</div>