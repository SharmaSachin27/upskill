<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['firstname', 'lastname', 'email', 'company_id'];


    public function getCompany() 
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
