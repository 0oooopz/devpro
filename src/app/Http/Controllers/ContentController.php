<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return view('content.index', compact('user'));
    }

    public function history(): View
    {
        $user = Auth::user();

        $history = $user
            ->history()
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('history.history', compact('history'));
    }
}
