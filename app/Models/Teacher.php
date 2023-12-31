<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone'];

    public function rooms(): BelongsToMany

    {
        return $this->belongsToMany(Room::class,'teacher_rooms','room_id','teacher_id');
    }
}
