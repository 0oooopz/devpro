<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\DataManager;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegistrationRequest;

class UsersController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(RegistrationRequest $request): RedirectResponse
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                DataManager::make()->getData()
            )
        );

        return back()->with('success', 'User created');
    }

    public function show(Request $request, User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function edit(Request $request, User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(RegistrationRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return back()->with('success', 'User updated');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('deleted', 'User deleted successfully');
    }
}
