<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'first_contact_date',
        'last_contact_date',
        'email',
        'phone',
        'description',
        'special_notes',
        'gender',
        'age_range',
    ];
}
