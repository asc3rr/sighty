<?php

namespace App\Controllers;

use App\Models\Places;

class Result extends BaseController
{
	public function index()
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
