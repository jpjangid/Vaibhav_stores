@extends('layouts.backend')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" data-dismiss="alert">
        <strong>SUCCESS! &nbsp;</strong> {{ Session::get('success') }}
    </div>
@endif


@if(Session::has('fail'))
    <div class="alert alert-danger" role="alert" data-dismiss="alert">
        <strong>Fail! &nbsp;</strong> {{ Session::get('fail') }}
    </div>
@endif

<div class="row">
    <div class="col-md-8">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Blog-Categories
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('BlogCategoryController@create',Session::get('userrightPages')))
                                <a href="{{ route('blog-categories.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                            <th>Actions</th>
                        </tr>
                        @foreach ($blogCategories as $blogCategory)
                        <tr>
                            <td class="align-middle">{{ $blogCategory->name }}</td>
                            <td class="align-middle">
                                @if (in_array('BlogCategoryController@edit',Session::get('userrightPages')))
                                    <a href="{{ route('blog-categories.edit', $blogCategory->id) }}" title="Edit blog-category" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endif
                                @if (in_array('BlogCategoryController@destroy',Session::get('userrightPages')))
                                <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md kt_sweetalert_demo_1" data-id="{{ $blogCategory->id }}" title="Delete"> <i class="la la-trash"></i></button>

                                <form action="{{ route('blog-categories.destroy',$blogCategory->id) }}" method="POST" id="delete-form-{{$blogCategory->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $blogCategories->links() !!}
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
