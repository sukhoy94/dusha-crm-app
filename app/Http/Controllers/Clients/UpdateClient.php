<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\UpdateClientRequest;
use App\Models\Client;

class UpdateClient extends Controller
{
    public function __invoke(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index')->with('success', __('messages.client_updated'));
    }
}
