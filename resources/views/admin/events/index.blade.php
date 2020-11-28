@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Event
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if (in_array('EventController@create',Session::get('userrightPages')))
                                <a href="{{ route('events.create') }}" class="btn btn-brand btn-sm btn-elevate btn-icon-sm">
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
                            <th>Date</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                        @foreach ($events as $event)
                        <tr>
                            <td class="align-middle">{{ $event->name }}</td>
                            <td class="align-middle">{{ $event->event_date }}</td>
                            <td class="align-middle">{{ $event->price }}</td>
                            <td>
                                @if($event->image == null)
                                <img src="{{url('/')}}/img/no-image.png" width="60" height="60">
                                @else
                                <img src="{{ asset('storage/event/'.$event->id.'/'.$event->image) }}" width="60" height="60">
                                @endif
                            </td>
                            <td class="text-center">
                                @if (in_array('EventController@edit',Session::get('userrightPages')))
                                    <a href="{{route('events.edit', $event->id)}}" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                                @endif
                                @if (in_array('EventController@order',Session::get('userrightPages')))
                                <a href="{{route('events.order', $event->id)}}" title="View Order" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-cart-arrow-down "></i></a>
                                @endif


                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="p-3 ">
                    {!! $events->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
