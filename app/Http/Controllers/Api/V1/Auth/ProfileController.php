<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response as Status;

class ProfileController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        return response()->json($request->user()->only('name', 'email'));
    }

    public function update(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user())],
        ]);

        $request->user()->update($validatedData);

        return response()->json($validatedData, Status::HTTP_ACCEPTED);
    }
}
