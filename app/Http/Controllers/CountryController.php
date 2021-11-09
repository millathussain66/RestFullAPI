<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;



class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Country::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Add some Validationm

        $roule = [

            "iso"        =>"required |min:2",
            "name"       =>"required",
            "dname"      =>"required",
            "iso3"       =>"required",
            "position"   =>"required",
            "numcode"   =>"required",
            "phonecode" =>"required",
            "created"   =>"required",
            "register_by"=>"required",
            "modified"  =>"required",
            "modified_by"=>"required",
            "record_deleted"=>"required"

        ];

     $validator = Validator::make($request->all(),$roule);


        if ($validator->fails()) {

            return response()->json($validator->errors(),400);
        }



      $data =   Country::create($request->all());
      return response()->json($data,201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find =  Country::find($id);
        // Validation Part
        if (is_null($find)) {
            return response()->json(['message','This Fild is not Found ! ']);
        }else {

            return response()->json($find);
        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $country =  Country::find($id); //Find A data Form Database
        if (is_null($country)) {
            return response()->json(['message'=>"Not Field Found"]);

        }else {
        $roule = [
            "iso"        =>"required |min:2",
            "name"       =>"required",
            "dname"      =>"required",
            "iso3"       =>"required",
            "position"   =>"required",
            "numcode"   =>"required",
            "phonecode" =>"required",
            "created"   =>"required",
            "register_by"=>"required",
            "modified"  =>"required",
            "modified_by"=>"required",
            "record_deleted"=>"required"

        ];
     $validator = Validator::make($request->all(),$roule);


        if ($validator->fails()) {

            return response()->json($validator->errors(),400);
        }else {

            $country->update($request->all());
            return response()->json($country);

        }
    }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country =  Country::find($id);

        if (is_null($country)) {
            return response()->json(['message'=>"Not Field Found"]);

        }else {
            $country->delete();

        return response()->json(['message'=>'Fild Delete Success']);
        }
    }
}
