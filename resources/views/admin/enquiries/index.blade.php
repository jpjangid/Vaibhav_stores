@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Search Enquiry 
                          <?php  $privious_url=URL::full(); ?>
                         {{ session()->put('enquire_page',$privious_url)}}
                       

                        
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
                                <label for="ticket_no">Customer Name</label>
                                <input type="text" placeholder="Customer Name" id="name" name="name" value="{{$request->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ticket_no">Status</label>
                                <select class="form-control" name="status"  value="{{$request->status}}">
                                    <option value="">---Select Status---</option>
                                    <option value="pending" {{($request->status=='pending')?'selected':''}}>Open</option>
                                    <option value="closed" {{($request->status=='closed')?'selected':''}}>Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ticket_no" class="text-center" style="display:block;">Action</label>
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
                        Enquiry
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
                            <th>Enquiry Source</th>
                            <th>Product Name</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Opened</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($enquiries as $enquiry)
                        <tr>
                            <td class="align-middle">
                                {{ $enquiry->enquiry_type }}
                            </td>
                            

                            @if ($enquiry->enquiry_type=='brand')
                            <td class="align-middle">
                            	{{ @$enquiry->Brand->name }}
                            </td>
                            @else
                            <td class="align-middle">
                            	{{ @$enquiry->Product->name }}
                            </td>
                            @endif

                            <td class="align-middle">{{ $enquiry->name }}</td>
                            <td class="align-middle">{{ $enquiry->email }}</td>
                            <td class="align-middle">{{ $enquiry->mobile_no }}</td>
                            <td class="align-middle">{{ $enquiry->created_at}}</td>
                            <td>
                                <select class="form-control enquiry-status" name="status">
                                <option attr-id="{{ $enquiry->id }}" value="pending" {{($enquiry->status=='pending')?'selected':''}}>Open</option>
                                    <option attr-id="{{ $enquiry->id }}" value="closed" {{($enquiry->status=='closed')?'selected':''}}>Closed</option>
                                </select>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('enquiries.show', $enquiry->id) }}"> View</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $enquiries->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('footer-script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change','.enquiry-status',function(e){
        var status = $(this).val();
        var id = $('option:selected',this).attr('attr-id');
        $.ajax({
            type:'POST',
            url:"{{ route('enquiries.updateStatus') }}",
            data:{status:status, id:id},
            success:function(data){
            }
        });

    });
</script>
@endsection
