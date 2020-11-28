@extends('layouts.backend')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" data-dismiss="alert">
        <strong>SUCCESS! &nbsp;</strong> {{ Session::get('success') }}
    </div>
@endif

<div class="row">
    <div class="col-md-12">      

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Redirection Rules
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('redirections.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i> New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>From URL</th>
                            <th>To URL</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($redirections as $redirection)
                        <tr>
                            <td class="align-middle">{{ $redirection->from_url }}</td>
                            <td class="align-middle">{{ $redirection->to_url }}</td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_1" data-id="{{ $redirection->id }}" title="Delete"> <i class="la la-trash"></i></button>

                                <form action="{{ route('redirections.destroy',$redirection->id) }}" method="POST" id="delete-form-{{$redirection->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if (count($redirections)==0)
                        <tr>
                            <td class="align-middle text-center" colspan="3">No Record</td>
                        </tr>
                        @endif
                    </table>
                </div>
                <div class="p-3">
                    {!! $redirections->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer-script')
<script type="text/javascript">
    var KTSweetAlert2Demo={
        init:function(){
            $(".kt_sweetalert_demo_1").click(function(e){
                var id = $(this).attr('data-id');

                swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!"}).then((e) => {
                    e.value&&$('#delete-form-'+id).submit();
                });
            })
        }};

    jQuery(document).ready(function(){KTSweetAlert2Demo.init()});
</script>
@endsection