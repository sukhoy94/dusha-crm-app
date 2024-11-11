<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class SearchClient extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('query');

        $clients = Client::where('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->paginate(30);

        return view('clients.partials.client_table', compact('clients'))->render();
    }
}
