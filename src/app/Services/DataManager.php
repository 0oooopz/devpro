<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DataManager
{
    public static function make()
    {
        return app(static::class);
    }

    public function getData(): array
    {
        return [
            'link'       => $this->generateLink(),
            'expired_at' => $this->generateDate(7),
        ];
    }

    public function generateLink(): string
    {
        return env('APP_URL').':8080/generated-link?link=' . Str::random();
    }

    public function generateDate(int $days = 0): Carbon
    {
        return Carbon::now()->addDays($days);
    }
}
