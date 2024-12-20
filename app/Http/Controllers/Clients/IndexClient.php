<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;

class IndexClient extends Controller
{
    public function __invoke()
    {
        $clients = Client::orderBy('first_name')->orderBy('last_name')->paginate(30);

        return view('clients.index', compact('clients'));
    }
}
