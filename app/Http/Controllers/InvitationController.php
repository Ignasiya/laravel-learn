<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function __invoke(Invitation $invitation, $answer, Request $request): void
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }
    }
}
