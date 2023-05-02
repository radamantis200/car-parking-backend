<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response as Status;

class PasswordUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json([
            'message' => 'Your password has been updated.',
        ], Status::HTTP_ACCEPTED);
    }
}
