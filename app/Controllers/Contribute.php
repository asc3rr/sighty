<?php

namespace App\Controllers;

use App\Models\Places;

class Contribute extends BaseController
{
    private $rules = [
        "latitude" => [
            "rules" => "required",
            "errors" => [
                "required" => "Latitude field is required."
            ]
        ],
        "longitude" => [
            "rules" => "required",
            "errors" => [
                "required" => "Longitude field is required."
            ]
        ],
        "title" => [
            "rules" => "required|min_length[3]|max_length[40]",
            "errors" => [
                "required" => "Title field is required.",
                "min_length" => "Minimum title length is 3 characters.",
                "max_length" => "Maximum title length is 40 characters."
            ]
        ],
        "shortdesc" => [
            "rules" => "required|max_length[60]",
            "errors" => [
                "required" => "Short description field is required.",
                "max_length" => "Maximum short description length is 60 characters."
            ]
        ],
        "description" => [
            "rules" => "required|min_length[30]",
            "errors" => [
                "required" => "Description field is required.",
                "min_length" => "Minimum description length is 30 characters."
            ]
        ]
    ];

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
        helper(["contribute/index"]);

        if($this->request->getMethod() == "post"){
            $data = [
                "keywords" => $_ENV["keywords"],
                "meta_title" => "Contribution Panel - Sighty",
                "meta_description" => "Contribution Panel - Sighty",
                "title" => "Contribution Panel",
                "footer_content" => $_ENV["footer"]
            ];

            $data_to_save = [
                "latitude" => $this->request->getPost("latitude"),
                "longitude" => $this->request->getPost("longitude"),
                "place_name" => $this->request->getPost("title"),
                "place_shortdesc" => base64_encode($this->request->getPost("shortdesc")),
                "place_description" => base64_encode($this->request->getPost("description"))
            ];

            if($this->validate($this->rules)){
                $model = new Places();
                $model->save($data_to_save);

                $this->response->redirect("/");
            }
            else{
                $data["validation"] = $this->validator;

                return view("contribute/index", $data);
            }
        }
        else{
            $this->response->redirect("/contribute/");
        }
    }

    public function edit_view($id, $validation=null){
        $model = new Places();
        $place = $model->find($id);

        $data = [
			"keywords" => $_ENV["keywords"],
			"meta_title" => "Editing Panel - Sighty",
			"meta_description" => "Editing Panel - Sighty",
			"title" => "Editing Panel",
			"footer_content" => $_ENV["footer"],
            "place" => $place,
            "validation" => $validation
		];

        return view("contribute/edit", $data);
    }

    public function edit($id){
        helper(["contribute/index"]);

        if($this->request->getMethod() == "post"){
            $data = [
                "keywords" => $_ENV["keywords"],
                "meta_title" => "Edit Panel - Sighty",
                "meta_description" => "Edit Panel - Sighty",
                "title" => "Edit Panel",
                "footer_content" => $_ENV["footer"]
            ];

            $data_to_save = [
                "latitude" => $this->request->getPost("latitude"),
                "longitude" => $this->request->getPost("longitude"),
                "place_name" => $this->request->getPost("title"),
                "place_shortdesc" => base64_encode($this->request->getPost("shortdesc")),
                "place_description" => base64_encode($this->request->getPost("description"))
            ]; 

            if($this->validate($this->rules)){
                $model = new Places();
                $model->update($id, $data_to_save);

                $this->response->redirect("/");
            }
            else{
                return $this->edit_view($id, $this->validator);
            }
        }
        else{
            $this->response->redirect("/contribute/");
        }
    }
}
