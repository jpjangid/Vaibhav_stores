@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Users
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('AdminController@create',Session::get('userrightPages')))
                            <a href="{{ route('users.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                            <th>Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php $sr_no=1; ?>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>

                            <td class="text-center">
                                <form action="{{ route('users.destroy',$admin->id) }}" method="POST">
                                    @if (in_array('AdminController@edit',Session::get('userrightPages')))
                                        <a href="{{route('users.edit', $admin->id)}}" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                                    @endif
                                    @if (in_array('UserRightController@edit',Session::get('userrightPages')))
                                        <a href="{{route('user-rights.edit', $admin->id)}}" title="User rights" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-user"></i></a>
                                    @endif
                                    @if (in_array('AdminController@destroy',Session::get('userrightPages')))
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#kt_modal_{{$sr_no}}" type="button"><i class="la la-trash"></i></button>
                                        <div class="modal fade" id="kt_modal_{{$sr_no++}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete record?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $admins->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
