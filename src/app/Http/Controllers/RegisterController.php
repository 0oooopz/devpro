<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Services\DataManager;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegistrationRequest;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('registration.registration');
    }

    public function register(RegistrationRequest $request): RedirectResponse
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                DataManager::make()->getData()
            )
        );

        if ($user) {
            auth()->login($user);
        }

        return redirect()
            ->route('content.index', compact('user'));
    }
}
