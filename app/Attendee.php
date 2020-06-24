<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = 'attendees';
    protected $guarded = [];
    
    public function talks()
    {
        return $this->belongsToMany(Talk::class,'attendee_talks');
    }
    
}