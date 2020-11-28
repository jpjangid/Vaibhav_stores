@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Blogs
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('BlogController@create',Session::get('userrightPages')))
                                <a href="{{ route('blogs.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                            <th>Title</th>
                            <th>Modified</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td class="align-middle">
                                {{ $blog->title }}
                            </td>
                            <td class="align-middle"><?php echo humanTiming($blog->updated_at); ?></td>
                            <td class="align-middle">
                                @if ($blog->status=='draft')
                                    <span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">Draft</span>
                                @else
                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Published</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('blogs.edit', $blog->id) }}" title="Edit blog" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $blogs->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
