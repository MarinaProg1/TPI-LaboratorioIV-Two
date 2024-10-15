<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    use HasFactory;
    protected $fillable = ['first_name', 'document_type'];

    protected $table ='people';
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'persona_address');
    }

}
