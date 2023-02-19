<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\DataManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function generateLink(): RedirectResponse
    {
        $user = Auth::user();

        $user->update(DataManager::make()->getData());

        return back()->with('update.link', 'Link updated');
    }

    public function deactivateLink(): RedirectResponse
    {
        $user = Auth::user();

        $user->update([
            'expired_at' => DataManager::make()->generateDate(),
        ]);

        return back()->with('deactivate.link', 'Link deactivated');
    }

    public function linkControl(Request $request): RedirectResponse
    {
        if ($uniqueLink = $request->get('link')) {

            $user = User::where('link', 'like', "%{$uniqueLink}")->first();
            if ($user && $user->expired_at > Carbon::now()){

                auth()->login($user);

                return redirect()->route('content.index');
            }
        }

        return redirect()->route('register.index');
    }
}
