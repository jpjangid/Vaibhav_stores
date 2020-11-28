@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Pages
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('PageController@create',Session::get('userrightPages')))
                            <a href="{{ route('pages.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                        @foreach ($pages as $page)
                        <tr>
                            <td class="align-middle">
                                {{ $page->title }}
                            </td>
                            <td class="align-middle"><?php echo humanTiming($page->updated_at); ?></td>
                            <td class="align-middle">
                                @if ($page->status=='draft')
                                    <span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">Draft</span>
                                @else
                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Published</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if (in_array('PageController@edit',Session::get('userrightPages')))
                                <a href="{{ route('pages.edit', $page->id) }}" title="Edit page" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $pages->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
