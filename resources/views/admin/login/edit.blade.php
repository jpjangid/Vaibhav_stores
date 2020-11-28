@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Update User
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('users.update', $admin->id) }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $admin->name }}" required  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $admin->email }}" required >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Password </label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        <small id="passwordHelp" class="form-text text-muted">keep this blank, if you don't want to change the password.</small>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('users.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection

@section ('footer-script')

<script type="text/javascript">
    var KTFormWidgets = function() {
    var e;
    return {
        init: function() {
            ! function() {
                $("#permission").select2({
                    placeholder: "Select a permission"
                }), $("#permission").on("select2:change", function() {
                    e.element($(this))
                });
            }()
        }
    }
}();
jQuery(document).ready(function() {
    KTFormWidgets.init()
});
</script>

@endsection
