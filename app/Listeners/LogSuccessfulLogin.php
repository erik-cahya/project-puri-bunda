<?php

namespace App\Listeners;

use App\Models\LoginLogModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        LoginLogModel::create([
            'user_id' => $event->user->id,
            'login_at' => now(),
            'last_login_ip' => request()->getClientIp(),
        ]);
    }
}
