<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'province', 'street_id'];

    protected $table ='addresses';

    public function people()
    {
        return $this->belongsToMany(People::class, 'persona_address');
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }

}
