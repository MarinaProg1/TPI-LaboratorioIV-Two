<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
