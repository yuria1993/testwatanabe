<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquesnt\Collection;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'gender', 'email', 'building_name', 'postcode', 'address', 'opinion'
    ];

    public function content()
    {
        return $this->hasMany(Contact::class);
    }
}
