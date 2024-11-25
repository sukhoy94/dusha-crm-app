<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Models\Child;
use App\Models\Client;
use App\Models\FamilyRelation;
use App\RelationshipType;
use Illuminate\Support\Facades\DB;

class StoreClient extends Controller
{
    public function __invoke(StoreClientRequest $request)
    {
        DB::beginTransaction();

        $client = Client::create($request->validated());

        if ($request->has('children')) {
            foreach ($request->input('children') as $childData) {
                $child = Child::create($childData);
                FamilyRelation::create([
                    'guardian_id' => $client->id,
                    'child_id' => $child->id,
                    'relationship_type' => RelationshipType::Parent,
                ]);
            }
        }

        DB::commit();


        return redirect()->route('clients.edit', $client)
            ->with('success', __('messages.client_created'));
    }
}
