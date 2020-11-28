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
                        Sub Categories
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('SubCategoryController@create',Session::get('userrightPages')))
                            <a href="{{ route('sub-categories.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th class="text-center">Sequence</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php $sr_no=1; ?>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->slug }}</td>
                            <td class="text-center">{{ $subcategory->sequence }}</td>
                            <td>
                                <img src="{{ asset('storage/subcategory/'.$subcategory->image) }}" width="60" height="60">
                            </td>

                            <td class="text-center">
                                <form action="{{ route('sub-categories.destroy',$subcategory->id) }}" method="POST"  id="delete-form-{{ $subcategory->id }}">
                                    @if (in_array('SubCategoryController@edit',Session::get('userrightPages')))
                                        <a href="{{route('sub-categories.edit', $subcategory->id)}}" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                                    @endif
                                    @if (in_array('SubCategoryController@destroy',Session::get('userrightPages')))
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_1" data-id="{{ $subcategory->id }}" type="button"><i class="la la-trash"></i></button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $subcategories->links() !!}
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
