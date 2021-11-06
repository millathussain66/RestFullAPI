<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{


    public function country()
    {

         $data =   Country::all();

        return response()->json($data );


    }

}
