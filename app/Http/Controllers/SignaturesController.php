<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\Request;

class SignaturesController extends Controller
{
    /**
     * Display the GuestBook homepage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //return view('signatures.index');
        return view('spa');
    }

    /**
	 * Display the GuestBook form page.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
	    return view('signatures.sign');
	}

	/**
	 * Display signature.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(Signature $signature)
	{
		$data = [
			'signature' => $signature
		];

	    return view('signatures.show', $data);
	}
}
