<?php

namespace App\Traits;

use App\Http\Resources\AttendeeResources;
use App\Http\Resources\TalkResources;

trait ApiResponse
{
    protected function successResponse($data,$code = 200)
    {
        return response()->json($data,$code);
    }

    protected function errorResponse($message,$code)
    {
        return response()->json(['error' => $message,'code'=>$code],$code);
    }

    protected function attendees($data,$code = 200){
        return $this->successResponse(AttendeeResources::collection($data),$code);
    }
    protected function talks($data,$code = 200){
        return $this->successResponse(TalkResources::collection($data),$code);
    }

    protected function attendee($data,$code = 200){
       
        return $this->successResponse(new AttendeeResources($data),$code);
    }
    
    protected function talk($data,$code = 200){
       
        return $this->successResponse(new TalkResources($data),$code);
    }
}