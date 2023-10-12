<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["parent_id", "titulo"];

    public function parent(){
        return $this->belongsTo(self::class, "parent_id");
    }

    public function subtasks(){
        return $this->hasMany(self::class, "parent_id");
    }
}
