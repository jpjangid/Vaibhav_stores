@extends ('layouts.backend')
<style>
    .kt-widget.kt-widget--user-profile-3 .kt-widget__top .kt-widget__content .kt-widget__subhead a:hover{
        color:#74788d !important;
    }
    .kt-widget.kt-widget--user-profile-3 .kt-widget__top .kt-widget__content .kt-widget__head .kt-widget__username:hover{
        color:#48465b !important;
    }
</style>
@section ('content')

<div class="row">
    <div class="col-md-12">

        <!--begin:: Widgets/Support Tickets -->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ $Enquiry->enquiry_type }}
                        @if ($Enquiry->enquiry_type=='brand')
                                ({{ @$Enquiry->Brand->name }})
                        @else ($Enquiry->product_id)
                            ({{ @$Enquiry->Product->name }})
                        @endif
                    </h3>
                </div>
                <div class="kt-portlet__head-label">
                    <a class="btn btn-secondary" style="float:right" href=" {{ session()->get('enquire_page') }}">Back</a>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget kt-widget--user-profile-3">
                    <div class="kt-widget__top">
                        <div class="kt-widget__content">
                            <div class="kt-widget__head">
                                <span class="kt-widget__username">
                                    {{ $Enquiry->name }} &nbsp;&nbsp;&nbsp;{{ humanTiming($Enquiry->created_at) }}
                                </span>

                                <div class="kt-widget__action">
                                    <button type="button" class="btn btn-label-success btn-sm btn-upper">{{ $Enquiry->status }}</button>
                                </div>
                            </div>

                            <div class="kt-widget__subhead">
                                <a href="javascript:void(0)"><i class="flaticon2-new-email"></i>{{ $Enquiry->email }}</a>
                                @if ($Enquiry->contact_no)
                                <a  href="javascript:void(0)"><i class="flaticon2-phone"></i>{{ $Enquiry->contact_no }} </a>
                                @endif
                                @if ($Enquiry->mobile_no)
                                <a  href="javascript:void(0)"><i class="flaticon2-phone"></i>{{ $Enquiry->mobile_no }}</a>
                                @endif
                            </div>
                            @if ($Enquiry->address)
                            <div class="kt-widget__subhead">
                                Address: <a href="javascript:void(0)">{{ $Enquiry->address }}</a>
                            </div>
                            @endif
                            @if ($Enquiry->state || $Enquiry->country)
                            <div class="kt-widget__subhead">
                                State: <a  href="javascript:void(0)">{{ $Enquiry->state }} </a>
                                Country: <a  href="javascript:void(0)">{{ $Enquiry->country }}</a>
                            </div>
                            @endif

                            <div class="kt-widget__info">
                                <div class="kt-widget__desc">
                                    {{ $Enquiry->enquiry_message }}<br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

