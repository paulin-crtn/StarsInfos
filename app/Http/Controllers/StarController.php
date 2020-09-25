<?php

namespace App\Http\Controllers;
use App\Http\Models\Star;

class StarController extends Controller
{
    /** Display homepage with last recorded stars. **/
    
    public function index()
    {
        $stars = Star::orderBy('id', 'desc')->limit(10)->get();
        
        $data = ['stars' => $stars];
        return view('front.home', $data);
    }


    /** Display a specific star record. **/

    public function show(int $id)
    {
        $star = Star::find($id);

        if (empty($star)) {
            return redirect('/')->with('error', 'Cette fiche n\'existe pas');
        }

        $data = ['star' => $star];
        return view('front.show-star', $data);
    }
}
