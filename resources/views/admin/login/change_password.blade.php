@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Update Password
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('admin.updatepassword') }}" id="reset-password-form" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="name">Reset Password </label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password </label>
                        <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('Admin.dashboard') }}">Cancel</a>
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
    var KTFormControls= {
        init:function() {
            $("#reset-password-form").validate({
                rules: {
                    password: {
                        required: !0
                    },
                    password_confirm: {
                        required: !0,
                        equalTo: "#password"
                    }
                }
                , errorPlacement:function(e, r) {
                    var i=r.closest(".input-group");
                    i.length?i.after(e.addClass("invalid-feedback")): r.after(e.addClass("invalid-feedback"))
                }
                , invalidHandler:function(e, r) {
                    $("#kt_form_1_msg").removeClass("kt--hide").show(), KTUtil.scrollTop()
                }

            });
        }
    };

    jQuery(document).ready(function() {
        KTFormControls.init()
    });

</script>
@endsection
