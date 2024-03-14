<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class mController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function read(){
        $id = [1,2];
        $data = DB::table('dummy')->whereIn('id', $id)->get();

        foreach($data as $ll)
        return view('v1', ['data' => $ll->anything]);

    }
    public function index($id)
    {
        //
        return "3ash ya maroooo" .$id ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "this is marwan coding and studying";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id , $name )
    {
        //
        // return view("v1")->with("id", $id);
        return view("v1" , compact("id" , "name"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function editNew( $id , $name )
    {
    return view("v1" , compact("id" , "name"));
    }

}


