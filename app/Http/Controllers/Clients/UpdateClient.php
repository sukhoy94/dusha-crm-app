<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Http\Requests\Clients\UpdateClientRequest;
use App\Models\Child;
use App\Models\Client;
use App\Models\FamilyRelation;
use App\RelationshipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateClient extends Controller
{
    public function __invoke(UpdateClientRequest $request, Client $client)
    {
        DB::beginTransaction();
        $client->update($request->validated());
        if ($request->has('children')) {
            foreach ($request->input('children') as $childData) {
                if (!empty($childData['_delete']) && $childData['_delete'] == 1) {
                    if (isset($childData['id'])) {
                        $child = Child::find($childData['id']);
                        if ($child) {
                            // Usuwanie relacji
                            FamilyRelation::where('child_id', $child->id)->delete();
                            // Usuwanie dziecka
                            $child->delete();
                        }
                    }
                } elseif (!empty($childData['id'])) {
                    // Aktualizacja istniejącego dziecka
                    $child = Child::find($childData['id']);
                    if ($child) {
                        $child->update($childData);
                    }
                } else {
                    // Dodawanie nowego dziecka
                    $newChild = Child::create($childData);
                    FamilyRelation::create([
                        'guardian_id' => $client->id,
                        'child_id' => $newChild->id,
                        'relationship_type' => RelationshipType::Parent,
                    ]);
                }
            }
        }
        DB::commit();
        return redirect()->route('clients.index')->with('success', __('messages.client_updated'));
    }
}
