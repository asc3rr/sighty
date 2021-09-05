<?php

namespace App\Controllers;

use App\Models\Places;

class Place extends BaseController
{
    public function index(){
        $id = $_GET["id"];

        $model = new Places();

        $result = $model->find($id);
        
        $place_name = $result["place_name"];
        $place_short = base64_decode($result["place_shortdesc"]);

        $data = [
            "keywords" => "Random keyword",
            "meta_title" => "$place_name - Sighty",
            "meta_description" => $place_short,
            "title" => "$place_name",
            "footer_content" => "&copy All rights reserved for asc3rr",
            "place" => $result
        ];

        return view('place', $data);
    }

	public function result()
	{
        $latitude = $_GET["latitude"];
        $longitude = $_GET["longitude"];

        $places = $this->getPlaces($latitude, $longitude);

        $data = [
            "keywords" => "Random keyword",
            "meta_title" => "Places - Sighty Results",
            "meta_description" => "Places results for Lat: $latitude and Lng: $longitude",
            "title" => "Places - Sighty Results",
            "footer_content" => "&copy All rights reserved for asc3rr",
            "places" => $places
        ];

		return view('result', $data);
	}

    public function getPlaces($latitude, $longitude){
        $model = new Places();

        $model->where("latitude", $latitude);
        $model->where("longitude", $longitude);

        $result = $model->findAll();

        return $result;
    }
}
