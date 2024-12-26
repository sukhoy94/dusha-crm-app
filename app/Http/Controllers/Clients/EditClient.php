<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\FamilyRelation;

class EditClient extends Controller
{
    public function __invoke(int $clientId)
    {
        $client = Client::with('children')->findOrFail($clientId);

        return view('clients.edit', [
            'client' => $client,
            'children' => $client->children->map(function (FamilyRelation $relation) {
                $child = $relation->child;

                return [
                    'id' => $child->id,
                    'first_name' => $child->first_name,
                    'last_name' => $child->last_name,
                    'age' => $child->age,
                    'birth_date' => $child->birth_date,
                    'notes' => $child->notes,
                    '_delete' => 0,
                ];
            }),
        ]);
    }
}
