<?php

declare(strict_types=1);

namespace App\Enum;

enum ProjectType: string
{
    case INTEGRATION_SPORT = 'integracyjno-sportowy';
    case CULTURAL_EDUCATIONAL = 'kulturalno-edukacyjny';
    case ARTISTIC_WORKSHOP = 'warsztat-artystyczny';

    public function getId(): int
    {
        return match ($this) {
            self::INTEGRATION_SPORT => 1,
            self::CULTURAL_EDUCATIONAL => 2,
            self::ARTISTIC_WORKSHOP => 3,
        };
    }

    public function getDisplayName(): string
    {
        return match ($this) {
            self::INTEGRATION_SPORT => 'Integracyjno-Sportowy',
            self::CULTURAL_EDUCATIONAL => 'Kulturalno-Edukacyjny',
            self::ARTISTIC_WORKSHOP => 'Warsztat Artystyczny',
        };
    }
}
