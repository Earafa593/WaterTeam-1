<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\River;

class RiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://environment.data.gov.uk/catchment-planning/so/WaterBody.json?_limit=100');
    	$statusCode = $response->getStatusCode();
        $data = json_decode($response->getBody()->getContents(), true);
        foreach ($data['items'] as $item){
            if ($item['type'][0] == 'http://environment.data.gov.uk/catchment-planning/def/water-framework-directive/River')
            {
                $resent_year = 0;
                $river = new River;
                $river->name = $item['label'];
                $id = str_replace( 'http://environment.data.gov.uk/catchment-planning/so/WaterBody/', '', $item['isVersionOf']['@id']);
                $response = $client->request('GET', 'https://environment.data.gov.uk/catchment-planning/so/WaterBody/'. $id .'/classifications.json');
                $class_data = json_decode($response->getBody()->getContents(), true);
                foreach ($class_data['items'] as $class_item){
                    if ($class_item['classificationItem']['label'] == 'Overall Water Body'){
                        if ($class_item['classificationYear'] > $resent_year){
                            $resent_year = $class_item['classificationYear'];
                            $class = $class_item['classificationValue']['label'];
                        }
                    }
                }
                $id = DB::table('water_qualities')->where('name', $class)->value('id');
                $river->water_quality_id = $id;
                $river->save();
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
