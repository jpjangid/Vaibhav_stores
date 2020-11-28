@extends ('layouts.backend')

@section ('content')


 

<div class="row">
    <div class="col-lg-4">
            <!--Begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                    Enquiry <span style="margin-left: 136px;">  <a href="{{ route('enquiries.index') }}"><button type="button" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">View All</button></a></span>
                  </h3>
                </div>
                
              </div>
              <div class="kt-portlet__body">
                <!--Begin::Timeline 3 -->
                  <table class="table table-striped list-table table-hover">
                            <thead>
                              <tr>
                             
                              <th>Enquiry Type</th>
                              <th>Details</th>

                              </tr>
                          </thead>
                  
                              <tbody>
                                <?php 
                                 foreach($enquiries as $enquiry): ?>
                                <tr> 
                                   <td> {{ $enquiry->enquiry_type }} </td>
                                  <td>
                                    {{ $enquiry->name }}<br/>
                                   <a href="{{ route('enquiries.show', $enquiry->id) }}">{{ $enquiry->email }}</a>
                                            
                                </td> 

                                 
                                </tr>
                                <?php endforeach; ?>
                               </tbody>
                            </table>

                            <br/>

                  

                <!--End::Timeline 3 -->
              </div>
            </div>
        <!--End::Portlet--> 
      </div>

      <div class="col-lg-8">
            <!--Begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                    Orders <span style="margin-left: 480px;">  <a href="{{ route('customer.order') }}"><button type="button" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">View All</button></a></span>
                  </h3>
                </div>
                
              </div>
              <div class="kt-portlet__body">
                <!--Begin::Timeline 3 -->
                    <div class="table-responsive">
                        <table class="table table-striped list-table table-hover">
                          <thead>
                            <tr>
                              <th width="10%">Product</th>
                              <th width="10%">Order#</th>
                              <th width="15%">Customer</th>
                              <th width="10%">Payment Status</th>
                            
                              <th width="8%" class="text-right">Total Amount</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($orders as $order):   ?>
                            <tr>
                              <td class="datatable-cell-sorted datatable-cell" data-field="Product" aria-label="null">
                                <span style="width: 160px;">
                                  <div class="d-flex align-items-center">  
                                     <div class="symbol symbol-50 symbol-sm flex-shrink-0">  
                                       <div class="symbol-label">  
                                           <img class="h-75 align-self-end" style="width:50px;height:50px;" src="{{ asset('storage/product/'.$order->OrderRows[0]->product->product_image_primary->image) }}" alt="photo">
                                        </div>   
                                     </div> 
                                          <div class="ml-4">
                                            <a class="text-dark-75 font-weight-bolder font-size-lg mb-0"><?php echo $order->OrderRows[0]->product->name; ?></a>  
                                           </div>  
                                 </div>
                              </span>
                            </td>
                              <td><a href="{{ route('customer.orderDetail',$order->id) }}">#<?php echo $order->order_no; ?></a></td>
                              <td>
                                <?php echo $order->bill_name ?><br>
                                <small style="font-size:12px;"><?php echo $order->bill_mobile ?></small>
                              </td>
                              <td><span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill"><?php echo $order->payment_status; ?></span></td>
                             
                              <td class="text-right"><?php echo $order->order_amount ?></td>
                             
                            </tr>
                            <?php endforeach; ?>
                           </tbody>
                        </table>
                        </div>
                                        <br/>

                              

                            <!--End::Timeline 3 -->
                          </div>
                        </div>
                    <!--End::Portlet--> 
      </div>


      <div class="col-lg-4">
        <!--Begin::Portlet-->
          <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                Total Order/Event Chart 
                </h3>
              </div>
              
            </div>
            <div class="kt-portlet__body">
              <!--Begin::Timeline 3 -->
                <canvas id="myChart" width="250" height="250" style="width: 250px !important; height: 250px !important;"></canvas>
              <!--End::Timeline 3 -->
            </div>
          </div>
          <!--End::Portlet--> 
      </div> 

    <div class="col-lg-8">
            <!--Begin::Portlet-->
              <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                  <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                    Enquiry Chart 
                    </h3>
                  </div>
                  
                </div>
                <div class="kt-portlet__body">
                  <!--Begin::Timeline 3 -->
                  <div class="col-lg-7" style="margin-left: 120px;">
                    <canvas id="myChart1" width="250" height="250" style="width: 250px !important; height: 250px !important;"></canvas>
                  <!--End::Timeline 3 -->
                </div>
                </div>
              </div>
              <!--End::Portlet--> 
      </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var ctx1 = document.getElementById('myChart1').getContext('2d');

data = {
    datasets: [{
        data: [<?php echo $order_count;?>, <?php echo $event_count; ?>],
         backgroundColor: [
                'Red',
                'Blue'
                
            ],
            hoverBackgroundColor:[
              '#ffb822',
              '#ffb822',
              
            ],
           
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Total order',
        'Total Event'
    ]
};

data1 = {
    datasets: [{
        data: [<?php echo $total_brand;?>,<?php echo $total_care;?>,<?php echo $total_fruniture;?>,<?php echo $total_consumable;?>,<?php echo $total_electrical;?>,<?php echo $total_subscribe;?>],
         backgroundColor: [
                'red',
                'blue',
                'DarkGray',
                'Chocolate',
                'Coral',
                'DarkSeaGreen'
                
            ],
             hoverBackgroundColor:[
              '#ffb822',
              '#ffb822',
              '#ffb822',
              '#ffb822',
               '#ffb822',
               '#ffb822'
              
            ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Brand','Care','Fruniture','Consumable','Electrical','Subscribe'
    ]
};

var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: data
});

var myChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data1
   
});

</script>

@endsection

