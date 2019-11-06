<?php

namespace App\Jobs;

use App\Screen;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReceiveScreenshort implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The queue connection that should handle the job.
     *
     * @var string
     */
    #public $connection = 'redis';

    protected $screen;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Screen $screen)
    {
        $this->screen = $screen;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$screen = 'http://delivrd.ys/theme/Mtro/assets/admin/layout/img/logo.png';
        $this->screen->screen = 'SUCCESS';
        $this->screen->save();
    }
}
