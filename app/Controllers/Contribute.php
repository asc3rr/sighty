<?php

namespace App\Controllers;

use App\Models\Places;

class Contribute extends BaseController
{
	public function index()
	{
		$data = [
			"keywords" => $_ENV["keywords"],
			"meta_title" => "Contribution Panel - Sighty",
			"meta_description" => "Contribution Panel - Sighty",
			"title" => "Contribution Panel",
			"footer_content" => $_ENV["footer"]
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

    public function edit_view($id){
        $model = new Places();
        $place = $model->find($id);

        $data = [
			"keywords" => $_ENV["keywords"],
			"meta_title" => "Editing Panel - Sighty",
			"meta_description" => "Editing Panel - Sighty",
			"title" => "Editing Panel",
			"footer_content" => $_ENV["footer"],
            "place" => $place
		];

        return view("contribute/edit", $data);
    }

    public function edit($id){
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
        $model->update($id, $data_to_save);

        $this->response->redirect("/");
    }
}
