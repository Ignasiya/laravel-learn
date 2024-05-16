<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PdfGeneratorController extends Controller
{
    public function index(int $id): Response|JsonResponse
    {
        $client = Client::query()->where('id', $id)->first();

        if (!$client) {
            return response()->json(['error' => 'Пользователь не найден'], 404);
        }

        $pdf = PDF::loadView('homework/pdf', ['user' => $client]);

        return $pdf->stream('client.pdf');
    }
}
