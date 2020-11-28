@extends('layouts.pdf')
<style>
    .table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid
    #dee2e6;
        border-bottom-width: 2px;
}
.table-bordered td, .table-bordered th {
    border: 1px solid
    #dee2e6;
        border-bottom-color: rgb(222, 226, 230);
        border-bottom-style: solid;
        border-bottom-width: 1px;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.table.center { margin-left:auto; margin-right:auto; }
    </style>
@section('content')
<h3 style="text-align:center"><img style="vertical-align:middle" src="<?php echo public_path('/static/images/logo.png'); ?>" width="150px">&nbsp;&nbsp;&nbsp;<u style="vertical-align:top">INVOICE</u></h3>
<table width="100%">
    <tr>
        <td style="width:50%">
        <?php echo $companyDetail->meta_value ?>
        </td>
        <td>
            <div style="float:right">
                <table>
                    <tr>
                        <td>Invoice No.:</td><td>{{ $order->order_no }}</td>
                    </tr>
                    <tr>
                        <td>Invoice Date:</td><td>{{ date('d-m-Y', strtotime($order->order_date)) }}</td>
                    </tr>
                    <tr>
                        <td>Order No.:</td><td>{{ $order->order_no }}</td>
                    </tr>
                    <tr>
                        <td>Order Date:</td><td>{{ date('d-m-Y', strtotime($order->order_date)) }}</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<br><br>
    <table width="100%">
        <tr>
            <td>
                <h4>Shipping Addresss</h4>
                <span>{{ $order->ship_name }}</span><br>
                <span>{{ $order->ship_mobile }}</span><br>
                <span>{{ $order->ship_address }}</span><br>
                <span>{{ $order->ship_pincode }}</span><br>
                <span>{{ $order->ship_landmark }}</span><br>
                <span>{{ $order->ship_city }}</span><br>
                <span>{{ $order->ship_state }}</span><br>
            </td>
            <td>
                <div style="float:right">
                    <h4>Billing Address</h4>
                    <span>{{ $order->bill_name }}</span><br>
                    <span>{{ $order->bill_mobile }}</span><br>
                    <span>{{ $order->bill_address }}</span><br>
                    <span>{{ $order->bill_pincode }}</span><br>
                    <span>{{ $order->bill_landmark }}</span><br>
                    <span>{{ $order->bill_city }}</span><br>
                    <span>{{ $order->bill_state }}</span><br>
                </div>
            </td>
        </tr>
    </table>
<br><br>
    <table width="100%" class="table table-bordered center" style="border-collapse:collapse">
        <thead>
            <tr>
                <th style="text-align:left;">Item</th>
                <th style="text-align:center;">Quantity</th>
                <th style="text-align:right;">Price</th>
                <th style="text-align:right;">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->OrderRows as $OrderRow)
            <tr>
                <td style="text-align:left;">{{$OrderRow->product->name}}</td>
                <td style="text-align:center;">{{$OrderRow->quantity}}</td>
                <td style="text-align:right;">{{$OrderRow->price}}</td>
                <td style="text-align:right;">{{$OrderRow->amount}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="3"  style="text-align:center;"> Total Amount</th>
                <th style="text-align:right;"><b>{{$order->order_amount}}</b></th>
            </tr>
            <tr>
                <td colspan="4"  style="text-align:left;"> <b>Total Amount In Word:</b> <?php echo convertNumberToWord($order->order_amount); ?>.</td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <table width="100%">
        <tr>
            <th style="text-align: left">Signature</th>
        </tr>
    </table>

@endsection
