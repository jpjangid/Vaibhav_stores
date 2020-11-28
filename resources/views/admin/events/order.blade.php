@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ $event->name }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a class="btn btn-secondary" href="{{ route('events.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Date</th>
                            <th>Payment Status</th>
                            <th>Amount</th>
                        </tr>
                        @foreach ($eventOrders as $order)
                        <tr>
                            <td class="align-middle">{{ $order->order_no }}</td>
                            <td class="align-middle">{{ $order->name }}</td>
                            <td class="align-middle">{{ $order->email }}</td>
                            <td class="align-middle">{{ $order->mobile }}</td>
                            <td class="align-middle">{{ date('d-m-Y h:i A', strtotime($order->order_date)) }}</td>
                            <td class="align-middle">{{ ucfirst($order->payment_status) }}</td>
                            <td class="align-middle">{{ $order->order_amount }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $eventOrders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
