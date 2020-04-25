<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\County;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $client = new Client();
    	$response = $client->request('GET', 'http://environment.data.gov.uk/catchment-planning/so/RiverBasinDistrict.json');
        $data = json_decode($response->getBody()->getContents(), true);
        foreach ($data['items'] as $item){
            $ex = DB::table('counties')->where('name', $item['label'])->first();
            if (!is_null($ex)){
                continue;
            }
            $county = new County;
            $county->name = $item['label'];
            $id = str_replace( 'http://environment.data.gov.uk/catchment-planning/so/RiverBasinDistrict/', '', $item['@id']);
           // $response = $client->request('GET', 'https://environment.data.gov.uk/catchment-planning/so/RiverBasinDistrict/'. $id .'/polygon');
          //  $polydata = json_decode($response->getBody());           
            $county->save();
            $response = $client->request('GET', 'https://environment.data.gov.uk/catchment-planning/so/RiverBasinDistrict/'. $id .'/water-bodies.json');
            $waterBodies = json_decode($response->getBody()->getContents(), true);
            foreach ($waterBodies['items'] as $wbItem){
                $wb_id = DB::table('rivers')->where('name', $wbItem['label'])->value('id');
                $exists = $county->rivers()->where('id', $wb_id)->first();
                if (is_null($exists)){
                    $county->rivers()->attach($wb_id);
                }
            }    
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
