<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    //Fillable example
    //protected $fillable = ['name', 'email', 'active'];

    // Guarded example - Use This because we are already validating and using array data to send to database
    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    public function getActiveAttribute($attribute)
    {
      return $this->activeOptions()[$attribute];
    }


    public function scopeActive($query)
    {
        return $query->where('active', 1);

    }

    public function scopeinActive($query)
    {
        return $query->where('active', 0);

    }

    public function company()

    {
        return $this->belongsTo(Company::class);
    }

    public function activeOptions()
    {

        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress',
        ];

    }
}
