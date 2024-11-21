<?php

declare(strict_types=1);

namespace App\Models;

use App\RelationshipType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'additional_contact',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(FamilyRelation::class, 'guardian_id');
    }

    public static function booted(): void
    {
        static::deleting(function (Client $client) {
            $client->children->each(function (FamilyRelation $relation) {
                $relation->child->delete();
                $relation->delete();
            });
        });
    }
}
