<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;

class Child extends Model
{
    protected $fillable = ['first_name', 'last_name', 'age', 'birth_date', 'notes'];

    public function guardians(): HasManyAlias
    {
        return $this->hasMany(FamilyRelation::class, 'child_id');
    }

}
