<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // public function events()
    // {
    //     return $this->hasMany(Event::class, 'event_id', 'id');
    // }

    // public function event()
    // {
    //     return $this->belongsTo(Event::class, 'event_id');
    // }


    // protected $fillable = [
    //     'title', 'start', 'end'
    // ];

    protected $fillable = [
        'user_id',
        "name",
        "dateStart",
        "timeStart",
        "dateEnd",
        "timeEnd"
    ];


    public function users(){
        return $this->belongsToMany(User::class);
    }

}
