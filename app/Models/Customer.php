<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the plural form of the model name
    protected $table = 'customers';

    // Specify which fields are mass assignable
    //protected $fillable = ['first_name', 'email', 'company'];

    // Optionally, you can define any relationships or additional methods here
}
