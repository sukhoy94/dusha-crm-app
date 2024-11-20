<?php

declare(strict_types=1);

namespace App;

enum RelationshipType: string
{
    case Parent = 'parent';
    case Grandparent = 'grandparent';
    case Sibling = 'sibling';
    case Other = 'other';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            self::Parent->value => 'Rodzic',
            self::Grandparent->value => 'Dziadek/Babcia',
            self::Sibling->value => 'Rodzeństwo',
            self::Other->value => 'Inna',
        ];
    }
}
