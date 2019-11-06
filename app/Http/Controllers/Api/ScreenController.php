<?php

namespace App\Http\Controllers\Api;

use App\Screen;
use App\Jobs\ReceiveScreenshort;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScreenResource;

class ScreenController extends Controller
{
    /**
     * Return a paginated list of screens.
     *
     * @return ScreenResource
     */
    public function index()
    {
    	/*if (rand(1, 10) < 3) {
		    abort(500, 'We could not retrieve the users');
		}*/
        $screens = Screen::latest()
            //->ignoreFlagged()
            ->paginate(20);

        return ScreenResource::collection($screens);
    }

    /**
     * Fetch and return the screen.
     *
     * @param Screen $screen
     * @return ScreenResource
     */
    public function show(Screen $screen)
    {
    	$cmd = escapeshellcmd('phantomjs /home/denis/libs/phantomjs-2.1.1-linux-x86_64/rasterize.js https://google.com /home/denis/www/exmpl/larvue/public/images/screens/google.jpg 1200x1200');
    	echo $cmd;
    	passthru($cmd);
    	#passthru("phantomjs -v");

exit;
        return new ScreenResource($screen);
    }

    /**
     * Validate and save a new url to the database.
     *
     * @param Request $request
     * @return ScreenResource
     */
    public function store(Request $request)
    {
        $screen = $this->validate($request, [
            'url' => 'required|url|max:250'
        ]);

        $screen = Screen::create($screen);

        
        //$redis = new Predis\Client();

        // Add to worker
    	//dispatch( (new ReceiveScreenshort($screen))->onQueue('my-channel') );
    	ReceiveScreenshort::dispatch($screen)
							->onConnection('redis')
							->onQueue('screens');;

        return new ScreenResource($screen);
    }
}
