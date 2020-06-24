<?php

namespace App\Http\Controllers\Attendee;

use App\Attendee;
use App\AttendeeTalk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendeeTalkRequest;
use App\Talk;
use App\Traits\ApiResponse;

class AttendeeTalkController extends Controller
{
    use ApiResponse;
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendeeTalkRequest $request)
    {
        $attendee_talk = AttendeeTalk::create($request->all());
        return $attendee_talk ? response()->json("Attendee has been successfully added to talk",201) : $this->errorResponse("Operation Unseuccessful",500);
    }

    public function allAttendeeTalk(Attendee $attendee)
    {
        return $attendee ? $this->talks($attendee->talks) : $this->errorResponse("Attendee does not have any talk",500);       
    }
    
    public function allTalkAttendee(Talk $talk)
    {
        return $talk ? $this->attendees($talk->attendees) : $this->errorResponse("Talk does not have any attendee",500);       
    }
    
}