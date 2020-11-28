@extends ('layouts.front')


@section ('content')
<section class="thank-you--wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="thank-you--details">
					<div class="thank-you--icon">
						<i class="fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<h1>Thank You</h1>
					<h3>Your order placed successfully.</h3>
					<a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection