<?php

namespace App\Http\Controllers\admin;

use App\Event;
use App\EventOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;
use File;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);

        return view('admin.events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Event::rules(), Event::messages());
       ;
        $event = Event::create($request->all());

        return redirect()->route('events.edit', $event->id)
                        ->with('success','Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $request->validate(Event::rules($event->id), Event::messages());

        if($request->hasFile('add_image'))
        {
            $oldImg = storage_path('app/public/event/'.$event->id.'/'.$event->getOriginal()['image']);
            if (file_exists($oldImg)) File::delete($oldImg);
            $file = $request->add_image;
            $extension = $request->add_image->extension();
            $fileName = time().'.'.$extension;
            $path = $request->add_image->storeAs('event/'.$event->id, $fileName);
            $request->request->add(['image' => $fileName]);
        }

        $event->update($request->all());

        return redirect()->route('events.index')
                        ->with('success','Event updated successfully');
    }

    /**
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function uploadImg(Request $request) {

        $file = $request->eventImg;
        $extension = $request->eventImg->extension();
        $fileName = time().'.'.$extension;
        if ($request->eventImg->storeAs('event/'.$request->event_id, $fileName)) {
            $url = '/storage/event/'.$request->event_id.'/'.$fileName;
            $data = ['status' => 'success', 'url' => $url];
        } else {
            $data = ['status' => 'fail'];
        }

        echo json_encode($data);
    }

    public function order($id)
    {
        $event = Event::find($id);
        $eventOrders = EventOrder::where('event_id',$id)->orderBy('order_no','DESC')->paginate(10);
        return view('admin.events.order',compact('event','eventOrders'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }
}
