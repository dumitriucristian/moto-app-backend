<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\EventFilter;
use App\Filters\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Http\Resources\V1\EventResource;
use App\Http\Resources\V1\EventCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : EventCollection
    {

        $filter = new EventFilter();
        $query = $filter->setQuery($request);
        $data = Event::where($query)->paginate();
        return new EventCollection($data->appends($request->query()));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(StoreEventRequest $request) :EventResource
    {


        return new EventResource(Event::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Event $event): EventResource
    {
        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    /*public function edit(Event $event)
    {
        //
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {

        return $event->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
