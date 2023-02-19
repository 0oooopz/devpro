<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\History;
use Illuminate\Contracts\Auth\Authenticatable;

class PayManager
{
    public function __construct(protected Authenticatable $user)
    {
    }

    public static function make(Authenticatable $user)
    {
        return app(static::class, compact('user'));
    }

    public function getFeelingLucky(): string
    {
        $randomNumber = rand(1, 1000);

        return match (true) {
            $randomNumber % 2 !== 0 => $this->handlePay(
                $randomNumber,
                'lose'
            ),
            $randomNumber > 900 => $this->handlePay(
                $randomNumber,
                'win',
                $this->getPay($randomNumber, 70)
            ),
            $randomNumber > 600 => $this->handlePay(
                $randomNumber,
                'win',
                $this->getPay($randomNumber, 50)
            ),
            $randomNumber > 300 => $this->handlePay(
                $randomNumber,
                'win',
                $this->getPay($randomNumber, 30)
            ),
            $randomNumber <= 300 => $this->handlePay(
                $randomNumber,
                'win',
                $this->getPay($randomNumber, 10)
            ),
            default => 'Something went wrong',
        };
    }

    protected function handlePay(int $randomNumber, string $result, int $pay = 0): string
    {
        $this->save($randomNumber, $result, $pay);

        return $this->getMessage($randomNumber, $result, $pay);
    }

    protected function getPay(int $randomNumber, int $percent): int
    {
        return intval($randomNumber * ($percent / 100));
    }

    protected function getMessage(int $randomNumber, string $result, int $pay = 0): string
    {
        return "You {$result}, score {$randomNumber}, your win is {$pay}";
    }

    protected function save(int $randomNumber, string $exodus, int $pay)
    {
        $history = new History();

        $history = $history->fill([
            'number' => $randomNumber,
            'result' => $exodus,
            'pay'    => $pay,
        ]);

        $this->user->history()->save($history);
    }
}
