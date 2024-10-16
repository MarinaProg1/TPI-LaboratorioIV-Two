<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'area_code', 'people_id'];

    public function people()
    {
        return $this->belongsTo(People::class);
    }

}
