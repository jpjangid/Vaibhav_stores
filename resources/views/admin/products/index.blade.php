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
                        Products
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('ProductController@create',Session::get('userrightPages')))
                            <a href="{{ route('products.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Discount</th>
                            <th>Sale Price</th>
                            <th>GST Rate</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <?php $sr_no=1; ?>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category['name'] }}</td>
                            <td>{{ $product->subCategory['name'] }}</td>
                            <td>{{ $product->discount }}{{ ($product->discount)?'%':'' }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>{{ $product->gst_rate }}</td>
                            <td>{{($product->is_published)?'Published':'Draft'}}</td>
                            <td  class="text-center">
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST" id="delete-form-{{ $product->id }}">
                                    @if (in_array('ProductController@edit',Session::get('userrightPages')))
                                    <a href="{{ route('products.edit', $product->id) }}" title="Edit product" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        <i class="la la-edit"></i>
                                    </a>
                                    @endif

                                    @if (in_array('ProductController@destroy',Session::get('userrightPages')))
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_1" data-id="{{ $product->id }}" type="button"><i class="la la-trash"></i></button>

                                    @endif
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $products->links() !!}
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
