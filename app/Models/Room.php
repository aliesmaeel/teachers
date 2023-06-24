<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    use HasFactory;
    protected $fillable=['number'];

    public function teachers(): BelongsToMany

    {
    return $this
     ->belongsToMany(Teacher::class,'teacher_rooms','room_id','teacher_id')
        ->withPivot('id','hour','created_at');
    }
}
