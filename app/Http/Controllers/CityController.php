<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Spinen\Geometry\Geometry;
use Spinen\Geometry\Geometries;
use geoPHP;
use Spinen\Geometry\Support\TypeMapper;
use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ini_set('max_execution_time', 300);
        $client = new Client();
    	$response = $client->request('GET', 'http://api.geonames.org/searchJSON?country=GB&cities=cities15000&maxRows=50&username=nikolaos');
        $data = json_decode($response->getBody()->getContents(), true);
        foreach ($data['geonames'] as $item){
            if ($item['adminCode1'] == 'ENG'){
                $city = new City;
                $city->name = $item['toponymName'];
                $city->lng = $item['lng'];
                $city->lat = $item['lat'];
                //To get 1000 cities with random county ids: set maxRows parameter on the link as 1000 and comment from here...
                for ($i = 2; $i <= 12; $i++){
                    if ($i == 3 || $i == 4 || $i == 6 || $i == 9 || $i == 11 || $i == 12){
                        $file = file_get_contents(storage_path('geojson'.$i.'.txt'));
                        $point = geoPHP::load('POINT ('.$item['lng'].' '.$item['lat'].')','wkt');
                        $polygon = geoPHP::load($file,'json');
                        $point_in_polygon = $polygon->pointInPolygon($point);
                        if ($point_in_polygon){
                            $id = $i;
                            break;
                        }
                    }
                    elseif ($i == 2 || $i == 5 || $i == 7){
                        $file = file_get_contents(storage_path('geojson'.$i.'a.txt'));
                        $point = geoPHP::load('POINT ('.$item['lng'].' '.$item['lat'].')','wkt');
                        $polygon = geoPHP::load($file,'json');
                        $point_in_polygon = $polygon->pointInPolygon($point);
                        if ($point_in_polygon){
                            $id = $i;
                            break;
                        }
                        $file = file_get_contents(storage_path('geojson'.$i.'b.txt'));
                        $point = geoPHP::load('POINT ('.$item['lng'].' '.$item['lat'].')','wkt');
                        $polygon = geoPHP::load($file,'json');
                        $point_in_polygon = $polygon->pointInPolygon($point);
                        if ($point_in_polygon){
                            $id = $i;
                            break;
                        }
                    }
                    elseif ($i == 8){
                        $file = file_get_contents(storage_path('geojson'.$i.'a.txt'));
                        $point = geoPHP::load('POINT ('.$item['lng'].' '.$item['lat'].')','wkt');
                        $polygon = geoPHP::load($file,'json');
                        $point_in_polygon = $polygon->pointInPolygon($point);
                        if ($point_in_polygon){
                            $id = $i;
                            break;
                        }
                        $file = file_get_contents(storage_path('geojson'.$i.'b.txt'));
                        $point = geoPHP::load('POINT ('.$item['lng'].' '.$item['lat'].')','wkt');
                        $polygon = geoPHP::load($file,'json');
                        $point_in_polygon = $polygon->pointInPolygon($point);
                        if ($point_in_polygon){
                            $id = $i;
                            break;
                        }
                        $file = file_get_contents(storage_path('geojson'.$i.'c.txt'));
                        $point = geoPHP::load('POINT ('.$item['lng'].' '.$item['lat'].')','wkt');
                        $polygon = geoPHP::load($file,'json');
                        $point_in_polygon = $polygon->pointInPolygon($point);
                        if ($point_in_polygon){
                            $id = $i;
                            break;
                        }
                    }
                }
                $response = $client->request('GET', 'https://environment.data.gov.uk/catchment-planning/so/RiverBasinDistrict/'.$id.'.json');
                $county_data = json_decode($response->getBody()->getContents(), true);
                foreach ($county_data['items'] as $county_item){
                    $county_id = DB::table('counties')->where('name', $county_item['label'])->value('id');                      
                }
                $city->county_id = $county_id;
                //...to here and uncomment this:
                //$city->county_id = rand(1, 10);
                $city->save();
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
