@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Search Customer
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper"></div>
                </div>
            </div>
            <form id="event-form" method="get" class="kt-form">
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" placeholder="Customer Name" id="name" name="name" value="{{$request->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label  class="text-center" style="display:block;">Action</label>
                                <button  type="submit" class="btn btn-primary form-control">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Customer
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper"></div>
                </div>
            </div>
            <div class="kt-portlet__body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Order</th>
                            <th>Last Order Date</th>
                            @if (in_array('CustomerController@order',Session::get('userrightPages')))
                            <th>Action</th>
                            @endif
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ @$user->orders_count }}</td>
                            <td class="align-middle">
                                @if ($user->orders_count > 0)
                                    {{ humanTiming($user->order->order_date) }}
                                @endif
                            </td>
                            @if (in_array('CustomerController@order',Session::get('userrightPages')))
                            <td class="align-middle">
                                @if ($user->orders_count > 0)
                                    <a href="{{ route('customer.order', 'id='.$user->id) }}"> Order</a>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
