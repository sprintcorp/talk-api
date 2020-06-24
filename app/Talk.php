<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'talks';
    protected $guarded = [];
    
    public function attendees()
    {
        return $this->belongsToMany(Attendee::class,'attendee_talks');
    }
}