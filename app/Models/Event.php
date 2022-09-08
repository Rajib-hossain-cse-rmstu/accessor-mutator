<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id', 'id');
    }

//     public function startingTime($date)
// {
//     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
//     // return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
// }


protected function startingTime(): Attribute
{
    return Attribute::make(
        get:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
        set:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
    );
}

protected function endingTime(): Attribute
{
    return Attribute::make(
        get:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
        set:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
    );
}


protected function startingDate(): Attribute
{
    return Attribute::make(
        get:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
        set:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
    );
}

protected function endingDate(): Attribute
{
    return Attribute::make(
        get:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
        set:fn($value) => Carbon::createFromFormat('Y-m-d H:i:s a', $value),
    );
}


}
