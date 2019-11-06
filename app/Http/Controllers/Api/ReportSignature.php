<?php

namespace App\Http\Controllers\Api;

use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportSignature extends Controller
{
    /**
     * Flag the given signature.
     *
     * @param Signature $signature
     * @return Signature
     */
    public function update(Signature $signature)
    {
        $res = $signature->flag();

        return $signature;
    }
}
