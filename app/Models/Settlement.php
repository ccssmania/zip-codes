<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name', 'zone_type', 'settlement_type_id'];

    public $timestamps = false;

    /**
     * getter to convert name to uppercase
     */
    public function getNameAttribute()
    {
        return strtoupper($this->name);
    }

    /**
     * get settlement type
     */
    public function settlementType()
    {
        return $this->belongsTo('App\Models\SettlementType');
    }

}
