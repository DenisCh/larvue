<?php

namespace App\Http\Controllers\Api;

use App\Signature;
use App\Events\SignatureAdded;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SignatureResource;

class SignatureController extends Controller
{
    /**
     * Return a paginated list of signatures.
     *
     * @return SignatureResource
     */
    public function index()
    {
    	/*if (rand(1, 10) < 3) {
		    abort(500, 'We could not retrieve the users');
		}*/
        //sleep(2);
        $signatures = Signature::latest()
            ->ignoreFlagged()
            ->paginate(20);

        return SignatureResource::collection($signatures);
    }

    /**
     * Fetch and return the signature.
     *
     * @param Signature $signature
     * @return SignatureResource
     */
    public function show(Signature $signature)
    {
        return new SignatureResource($signature);
    }

    /**
     * Validate and save a new signature to the database.
     *
     * @param Request $request
     * @return SignatureResource
     */
    public function store(Request $request)
    {
        $signature = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'body' => 'required|min:3'
        ]);

        $signature = Signature::create($signature);

        event(new SignatureAdded($signature));

        //broadcast(new SignatureAdded($signature))->toOthers();
        #$res = event(new SignatureAdded($signature));
        #dd($res);
        #exit;

        return new SignatureResource($signature);
    }
}
