<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;

class DestroyClient extends Controller
{
    public function __invoke(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', __('messages.client_deleted'));
    }
}
