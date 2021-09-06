<?php

namespace App\Controllers;

use App\Models\Places;

class Contribute extends BaseController
{
	public function index()
	{
		$data = [
			"keywords" => "Random keyword",
			"meta_title" => "Contribution Panel - Sighty",
			"meta_description" => "Contribution Panel - Sighty",
			"title" => "Contribution Panel",
			"footer_content" => "&copy All rights reserved for asc3rr"
		];

		return view('contribute/index', $data);
	}

    public function new(){
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];

        $title = $_POST["title"];
        $shortdesc = $_POST["shortdesc"];
        $description = $_POST["description"];

        $data_to_save = [
            "latitude" => $latitude,
            "longitude" => $longitude,
            "place_name" => $title,
            "place_shortdesc" => base64_encode($shortdesc),
            "place_description" => base64_encode($description)
        ];

        $model = new Places();
        $model->save($data_to_save);

        $this->response->redirect("/");
    }
}
