<?php

namespace App\Listeners;

use App\Events\SignatureAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlertUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SignatureAdded  $event
     * @return void
     */
    public function handle(SignatureAdded $event)
    {
        //
    }
}
