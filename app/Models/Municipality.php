<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    public $timestamps = false;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * getter to convert name to uppercase
     */
    public function getNameAttribute()
    {
        return strtoupper($this->name);
    }
}
