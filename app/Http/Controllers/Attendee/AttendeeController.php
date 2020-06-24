<?php

namespace App\Http\Controllers\Attendee;

use App\Attendee;
use App\Traits\ApiResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendeeRequest;
use App\Http\Requests\UpdateAttendeeRequest;

class AttendeeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendee = Attendee::latest()->get();
        return $attendee ? $this->attendees($attendee) : response()->json("No Attendee Available",204);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendeeRequest $request)
    {
        $data = $request->all();
        $attendee = Attendee::create($data);
        return $attendee ? $this->attendee($attendee,201) : $this->errorResponse("Attendee not created",500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function show(Attendee $attendee)
    {
        return $this->attendee($attendee,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendeeRequest $request, Attendee $attendee)
    {
        $data = $request->all();      
        return $attendee->update($data) ? $this->talk($attendee,200) : $this->errorResponse("Attendee not updated",500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        return $attendee->delete() ? response()->json("Attendee successfully deleted",200) : $this->errorResponse("Attendee not deleted",500);
    }
}