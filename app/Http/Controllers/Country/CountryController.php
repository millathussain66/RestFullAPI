<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{


    #get all data
    public function country()
    {
        $data = Country::all();
        return response()->json($data );

    }

    public function countryone($id)
    {
       $data = Country::find($id);
       return response()->json($data );
    }

    // Create Data from APi

    public function countryCreate(Request $request)
    {


        $data =  Country::create($request->all());

        if ($data== true) {

            return response()->json($data);


        }else{

            return "Some Problme";

        }






    }







}
