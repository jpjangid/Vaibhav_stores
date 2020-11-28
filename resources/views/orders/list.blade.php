@extends('layouts.front')

@section('content')
<section class="user-order--wrapper">
    <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="title-ui--wrap">
                <div class="title-text--middle">
                   <h2>Your Orders</h2>
                </div>
             </div>
         </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <table class="profile-tab--menu">
                    <tr>
                        <td><a href="{{ route('users.profile') }}">My Profile</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('orders.list') }}">My Orders</a></td>
                    </tr>
                </table>
            </div>
            @if ($orders->count() > 0)
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="list-orders--table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Order Date</th>
                                    <th>Order Amount</th>
                                    <th>Order Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->order_no}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>{{$order->order_amount}}</td>
                                        <td><a href="{{ route('orders.show',[$order->id]) }}">Order Details</a></td>
                                        <td><a href="{{ route('orders.downloadPDF',[$order->id]) }}">Download Invoice</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 thank-you--wrapper">
                    <div class="thank-you--details">
                        <h2><i class="fa fa-ban" aria-hidden="true" style="color:red"></i> No order available.</<h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
