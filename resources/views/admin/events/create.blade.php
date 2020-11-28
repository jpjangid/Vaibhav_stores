@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-8">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add New Event
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('events.store') }}" id="event-form" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="name">Event Name *</label>
                        <input type="text" id="name" name="name" placeholder="Event Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Next</button>
                        <a class="btn btn-secondary" href="{{ route('events.index') }}">Cancel</a>
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
        $("#event-form").validate({
            rules: {
                name: {
                    required: !0
                }

            }
            , errorPlacement:function(e, r) {
                var i=r.closest(".input-group");
                i.length?i.after(e.addClass("invalid-feedback")): r.after(e.addClass("invalid-feedback"))
            }
            , invalidHandler:function(e, r) {
                $("#kt_form_1_msg").removeClass("kt--hide").show(), KTUtil.scrollTop()
            }

        })
    }
};
    jQuery(document).ready(function(){
        KTFormControls.init()
    });
</script>
@endsection
