<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['first_name', 'last_name', 'age', 'birth_date', 'notes'];
}
