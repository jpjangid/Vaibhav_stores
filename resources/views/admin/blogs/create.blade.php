@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-8">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add New Blog
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="title">Blog Title *</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required  autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Next</button>
                        <a class="btn btn-secondary" href="{{ route('blogs.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->            
        </div>
    </div>
</div>

@endsection

