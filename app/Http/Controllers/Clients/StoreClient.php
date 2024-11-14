<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Models\Client;

class StoreClient extends Controller
{
    public function __invoke(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());

        return redirect()->route('clients.edit', $client)
            ->with('success', __('messages.client_created'));
    }
}
