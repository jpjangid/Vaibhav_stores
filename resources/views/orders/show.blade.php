@extends('layouts.front')

@section('content')
<section class="order-summery--wrapper">
   <div class="container">
      <div class="row">
           <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               <table class="profile-tab--menu">
                   <tr>
                       <td><a href="{{ route('users.profile') }}">My Profile</a></td>
                   </tr>
                   <tr>
                       <td><a href="{{ route('orders.list') }}">My Orders</a></td>
                   </tr>
                   <tr>
                       <td><a href="{{ route('orders.downloadPDF',[$order->id]) }}">Download Invoice</a></td>
                   </tr>
               </table>
           </div>
           <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
               <div class="address-list--wrap">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="address-list--details">
                        <h4>Shipping Address</h4>
                        <span>{{ $order->ship_name }}</span><br>
                        <span>{{ $order->ship_mobile }}</span><br>
                        <span>{{ $order->ship_address }}</span><br>
                        <span>{{ $order->ship_pincode }}</span><br>
                        <span>{{ $order->ship_landmark }}</span><br>
                        <span>{{ $order->ship_city }}</span><br>
                        <span>{{ $order->ship_state }}</span><br>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="address-list--details">
                        <h4>Billing Address</h4>
                        <span>{{ $order->bill_name }}</span><br>
                        <span>{{ $order->bill_mobile }}</span><br>
                        <span>{{ $order->bill_address }}</span><br>
                        <span>{{ $order->bill_pincode }}</span><br>
                        <span>{{ $order->bill_landmark }}</span><br>
                        <span>{{ $order->bill_city }}</span><br>
                        <span>{{ $order->bill_state }}</span><br>
                    </div>
                  </div>
               </div>
               <div class="order-items--summery">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                      <div class="order-summery--table table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th></th>
                                      <th>Item</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>Amount</th>
                                      <th>Rate & Review</th>
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
                                      <td>{{$OrderRow->amount}}</td>
                                      <td>
                                          @if(!$OrderRow->is_reviewed)
                                          <a href="{{ route('write-review',['product_id'=>$OrderRow->product->id,'order_row_id'=>$OrderRow->id]) }}">Rate & Review Product</a>
                                          @endif
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
               </div>
           </div>
      </div>
   </div>
</section>
@endsection
