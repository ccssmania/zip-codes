<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'locality', 'federal_entity_id', 'municipality_id'];

    public $timestamps = false;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Settlements reltion
     * 
     * @return BelongsToMany
     */
    public function settlements()
    {
        return $this->belongsToMany('App\Models\Settlement');
    }


    /**
     * get federal entity related
     */
    public function federalEntity()
    {
        return $this->belongsTo('App\Models\FederalEntity');
    }

    /**
     * get municipality related
     */
    public function municipality()
    {
        return $this->belongsTo('App\Models\Municipality');
    }
}
