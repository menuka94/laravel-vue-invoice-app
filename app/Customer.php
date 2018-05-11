<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'email', 'address'
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->attribute['firstname'] . ' - ' . $this->attributes['lastname'];
    }
}
