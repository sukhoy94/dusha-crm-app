<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
    ];

    public function clients(): MorphToMany
    {
        return $this->morphedByMany(Client::class, 'projectable');
    }

    public function children(): MorphToMany
    {
        return $this->morphedByMany(Child::class, 'projectable');
    }
}
