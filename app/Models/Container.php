<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;


//    protected $with=['tasks'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_editing_container',
        'is_adding_card',
     
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_editing_container' => 'boolean',
        'is_adding_card' => 'boolean',
    ];
    
    public function tasks(){

        return $this->hasMany(Task::class, 'container_id','id');

    }
}
