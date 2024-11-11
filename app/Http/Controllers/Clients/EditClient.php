<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class EditClient extends Controller
{
    public function __invoke(Client $client)
    {
        return view('clients.edit', compact('client'));
    }
}