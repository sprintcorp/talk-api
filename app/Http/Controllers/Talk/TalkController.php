<?php

namespace App\Http\Controllers\Talk;

use App\Talk;
use App\Traits\ApiResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TalkRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTalkRequest;
use App\Http\Resources\TalkResources;

class TalkController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talks  = Talk::latest()->get();
        return $talks ? $this->talks($talks) : response()->json("No talks Available",204);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TalkRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title).'-'.md5(uniqid(rand(), true));
        $talk = Talk::create($data);
        return $talk ? $this->talk($talk,201) : $this->errorResponse("Talk not created",500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function show(Talk $talk)
    {
        return $this->talk($talk,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTalkRequest $request, Talk $talk)
    {
        $data = $request->all();
        if(!empty($data['title'])) $data['slug'] = Str::slug($request->title).'-'.md5(uniqid(rand(), true));        
        return $talk->update($data) ? $this->talk($talk,200) : $this->errorResponse("Talk not updated",500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talk $talk)
    {
        return $talk->delete() ? response()->json("Talk successfully deleted",200) : $this->errorResponse("Talk not deleted",500);
    }
}