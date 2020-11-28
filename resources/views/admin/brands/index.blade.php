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
                        Brands
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('BrandController@create',Session::get('userrightPages')))
                                <a href="{{ route('brands.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i> New
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Show On Home Page</th>
                            <th>Image</th>
                            <th>Logo</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php $sr_no=1; ?>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->name }}</td>
                            <td class="text-center">{{ ($brand->show_on_home_page==1)?'Yes':'No' }}</td>
                            <td>
                                <img src="{{ asset('storage/brand/'.$brand->image) }}" width="60" height="60">
                            </td>
                            <td>
                                <img src="{{ asset('storage/brand/'.$brand->logo) }}" width="60" height="60">
                            </td>

                            <td class="text-center">
                                <form action="{{ route('brands.destroy',$brand->id) }}" method="POST"  id="delete-form-{{$brand->id}}">
                                    @if (in_array('BrandController@edit',Session::get('userrightPages')))
                                        <a href="{{route('brands.edit', $brand->id)}}" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                                    @endif
                                    @if (in_array('BrandController@destroy',Session::get('userrightPages')))
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_1" data-id="{{ $brand->id }}" type="button"><i class="la la-trash"></i></button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $brands->links() !!}
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
