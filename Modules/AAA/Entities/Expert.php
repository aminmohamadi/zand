<?php

namespace Modules\AAA\Entities;

use Database\Factories\ExpertFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expert extends Model implements
    \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory,Authenticatable;
public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'personality_id',
        'status',
        'gender',
        'password'
    ];
    protected $hidden = [
        'password'
    ];

    protected static function newFactory()
    {
        return ExpertFactory::new();
    }
}
