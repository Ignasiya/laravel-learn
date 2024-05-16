<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function index()
    {
        return view('homework/client');
    }

    public function showAll(): JsonResponse
    {
        $clients = Client::all();

        return response()->json(['users' => $clients]);
    }

    public function showClient(int $id): JsonResponse
    {
        $client = Client::query()->where('id', $id)->first();

        return response()->json(['users' => $client]);
    }

    public function store(ClientStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $client = Client::create($data);

        return response()->json(['user' => $client]);
    }
}
