@extends ('layouts.front')

@section ('content')

<section class="page--wrapper">
    <div class="container-fluid">
    	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    		<?php echo $page->content; ?>
    	</div>
	</div>
</section>

@endsection
