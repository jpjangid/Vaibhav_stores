@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add New Redirection Rule
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('redirections.store') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="from_url">From URL *</label>
                        <input type="text" id="from_url" name="from_url" class="form-control @error('from_url') is-invalid @enderror" value="{{ old('from_url') }}" required  autofocus>

                        @error('from_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="to_url">To URL *</label>
                        <input type="text" id="to_url" name="to_url" class="form-control @error('to_url') is-invalid @enderror" value="{{ old('to_url') }}" required>

                        @error('to_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-secondary" href="{{ route('redirections.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->            
        </div>
    </div>
</div>

@endsection

