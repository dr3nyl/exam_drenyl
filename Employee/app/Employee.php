<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $table = 'employee';
    protected $fillable = ['first_name', 'last_name', 'address', 'contact_number', 'gender', 'company_id', 'title'];
}
