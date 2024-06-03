<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;

class RegisteredUserController extends Controller
{
    public function store(int $id): JsonResponse
    {
        $user = User::findOrFail($id);

        Mail::to($user->email)->send(new Welcome($user));

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID'),
            'parse_mode' => 'html',
            'text' => 'Пользователь ' . $user->name . ' зарегистрирован.'
        ]);

        return response()->json(['status' => 'success']);
    }
}
