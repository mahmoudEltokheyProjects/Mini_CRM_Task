<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName' , 'lastName' , 'phone' , 'email' , 'company_id'
    ];

    // "1:M" Relationship : Between "company" and "employee" table
    public function companyRelation()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
