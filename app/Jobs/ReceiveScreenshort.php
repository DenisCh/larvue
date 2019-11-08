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
        
        $file = public_path('images/screens/'. $this->screen->id .'-'. md5($this->screen->url) . '.jpg');
        $cmd = escapeshellcmd('phantomjs '. resource_path('js/screen.js') .' '. $this->screen->url .' '. $file .' 1200x1200');
        passthru($cmd);
        
        $this->screen->description = $cmd;
        $this->screen->screen = 'images/screens/'. $this->screen->id .'-'. md5($this->screen->url) . '.jpg';
        $this->screen->screened_at = \Carbon\Carbon::now();
        $this->screen->save();

        $this->screen->save();
    }
}
