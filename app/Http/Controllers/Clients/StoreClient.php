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
        Client::create($request->validated());

        return redirect()->route('clients.index')->with('success', __('messages.client_created'));
    }
}
