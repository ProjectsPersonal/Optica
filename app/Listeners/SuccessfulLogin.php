<?php

namespace optica\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DateTime;
use optica\Log;
use Carbon\Carbon;

class SuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
      $log= new Log;
      $log->last_time= Carbon::now();
      $log->id_user= $event->user->id;
      $log->save();
    }
}
