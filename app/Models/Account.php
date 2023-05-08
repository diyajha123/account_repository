<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;


class Account extends Model
{
    use HasFactory;
    use uuid;
    protected $fillable=['name','contact','email','gender','hobbies'];
    public function sethobbiesAttribute($value)
    {
        $this->attributes['hobbies']=implode(',',(array)$value);
      
    }

}

