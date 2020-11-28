@extends('layouts.backend')

@section ('header-css')
<link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/pages/invoices/invoice-1.css" rel="stylesheet" type="text/css" />
<style>
    .kt-invoice__value{
        text-transform: uppercase;
    }
    .kt-invoice-1 .kt-invoice__head .kt-invoice__items .kt-invoice__item{
        color:#74788d;
    }
    .kt-invoice-1 .kt-invoice__head .kt-invoice__items .kt-invoice__item .kt-invoice__text
    {
        color:#595d6e;
    }
    .kt-invoice-1 .kt-invoice__body table tbody tr td
    {
        font-weight: 500;
        font-size: 1rem;
    }
    .kt-invoice-1 .kt-invoice__footer .kt-invoice__total .kt-invoice__price {
    color: #6c757d;
    font-weight: 500;
    font-size: 22px;
}
.kt-invoice-1 .kt-invoice__body table tbody tr td:last-child {
    color: #6c757d !important;
}
</style>
@endsection


@section('content')
<section class="order-summery--wrapper">
   <div class="container">
      <div class="row">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Order
                    </h3>
                </div>
                <div class="kt-portlet__head-label">
                    <a class="btn btn-secondary" style="float:right" href="{{ route('customer.order') }}">Back</a>
                </div>

            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-invoice-1">
                    <div class="kt-invoice__head" style="padding: 0px 0;">
                        <div class="kt-invoice__container">
                            <div class="kt-invoice__items"  style="border-top:none; margin-top:0px">
                                <div class="kt-invoice__item" >
                                    <span class="kt-invoice__subtitle">DATE</span>
                                    <span class="kt-invoice__text">{{ date('d M, Y', strtotime($order->order_date)) }}</span>
                                </div>
                                <div class="kt-invoice__item">

                                </div>
                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__subtitle">Order No.</span>
                                    <span class="kt-invoice__text">#{{ $order->order_no }}</span>
                                </div>
                            </div>
                            <div class="kt-invoice__items" style="border-top:none; margin-top:0px">
                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__subtitle">Shipping Address</span>
                                    <span class="kt-invoice__text">{{ $order->ship_name }}</span>
                                    <span class="kt-invoice__text">{{ $order->ship_mobile }}</span>
                                    <span class="kt-invoice__text">{{ $order->ship_address }}</span>
                                    <span class="kt-invoice__text">{{ $order->ship_pincode }}</span>
                                    <span class="kt-invoice__text">{{ $order->ship_landmark }}</span>
                                    <span class="kt-invoice__text">{{ $order->ship_state }}</span>
                                </div>
                                <div class="kt-invoice__item">

                                </div>
                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__subtitle">Billing Address</span>
                                    <span class="kt-invoice__text">{{ $order->bill_name }}</span>
                                    <span class="kt-invoice__text">{{ $order->bill_mobile }}</span>
                                    <span class="kt-invoice__text">{{ $order->bill_address }}</span>
                                    <span class="kt-invoice__text">{{ $order->bill_pincode }}</span>
                                    <span class="kt-invoice__text">{{ $order->bill_landmark }}</span>
                                    <span class="kt-invoice__text">{{ $order->bill_state }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-invoice__body">
                        <div class="kt-invoice__container">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->OrderRows as $OrderRow)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/product/'.$OrderRow->product->product_image_primary->image) }}" width="50px">
                                            </td>
                                            <td>{{$OrderRow->product->name}}</td>
                                            <td>{{$OrderRow->quantity}}</td>
                                            <td>{{$OrderRow->price}}</td>
                                            <td class="kt-font-danger kt-font-lg">{{$OrderRow->amount}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="kt-invoice__footer">
                        <div class="kt-invoice__container">
                            <div class="kt-invoice__bank">
                                <div class="kt-invoice__title">PAYMENT METHOD</div>

                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__label">Order No.</span>
                                    <span class="kt-invoice__value">{{ $order->order_no }}</span>
                                </div>

                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__label">Payment Mode:</span>
                                    <span class="kt-invoice__value">{{ $order->payment_mode }}</span>
                                </div>

                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__label">Payment Status:</span>
                                    <span class="kt-invoice__value">{{ $order->payment_status }}</span>
                                </div>

                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__label">Order ID:</span>
                                    <span class="kt-invoice__value">{{ $order->razorpay_order_id }}</span>
                                </div>

                                <div class="kt-invoice__item">
                                    <span class="kt-invoice__label">Payment ID:</span>
                                    <span class="kt-invoice__value">{{ $order->razorpay_payment_id }}</span>
                                </div>

                            </div>
                            <div class="kt-invoice__total">
                                <span class="kt-invoice__title">TOTAL AMOUNT</span>
                                <span class="kt-invoice__price">{{ $order->order_amount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
   </div>
</section>
@endsection
