<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyRelation extends Model
{
    use HasFactory;

    protected $fillable = ['guardian_id', 'child_id', 'relationship_type'];

    protected $casts = [
        'relationship_type' => RelationshipType::class,
    ];

    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'guardian_id');
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
