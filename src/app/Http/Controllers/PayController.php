<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PayManager;
use Illuminate\Http\RedirectResponse;

class PayController extends Controller
{
    public function pay(): RedirectResponse
    {
        $pay = PayManager::make(auth()->user())->getFeelingLucky();

        return back()->with('pay', $pay);
    }
}
