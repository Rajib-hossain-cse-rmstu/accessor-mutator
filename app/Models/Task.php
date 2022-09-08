<?php

namespace App\Models;

use DateTime;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s a',
        'updated-at' => 'datetime:Y-m-d h:i:s a',
        'starting_time' => 'datetime:h:i:s a',
        'ending_time' => 'datetime:h:i:s a',
        'starting_date' => 'datetime:Y-m-d',
        'ending_date' => 'datetime:Y-m-d',
    ];

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id', 'id');
    }
    
    // protected function startingTime(): Attribute
    // {
    //     return Attribute::make(
    //         get:fn($value) => DateTime::createFromFormat('h:i:s a', $value),
    //         set:fn($value) => DateTime::createFromFormat('h:i:s a', $value),
    //     );
    // }
    
    // protected function endingTime(): Attribute
    // {
    //     return Attribute::make(
    //         get:fn($value) => DateTime::createFromFormat('h:i:s a', $value),
    //         set:fn($value) => DateTime::createFromFormat('h:i:s a', $value),
    //     );
    // }
    
    
    // protected function startingDate(): Attribute
    // {
    //     return Attribute::make(
    //         get:fn($value) => DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d'),
    //         set:fn($value) => DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d'),
    //     );
    // }
    
    // protected function endingDate(): Attribute
    // {
    //     return Attribute::make(
    //         get:fn($value) => DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d'),
    //         set:fn($value) => DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d'),
    //     );
    // }


}
