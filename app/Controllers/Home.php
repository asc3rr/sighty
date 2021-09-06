<?php

namespace App\Controllers;

use App\Models\Places;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			"keywords" => "Random keyword",
			"meta_title" => "Search Panel - Sighty",
			"meta_description" => "Search Panel - Sighty",
			"title" => "Search Panel",
			"footer_content" => "&copy All rights reserved for asc3rr"
		];

		return view('search_page', $data);
	}

	public function get_all(){
		$model = new Places();

		$places = $model->findAll();

		$data = [
			"keywords" => "Random keyword",
			"meta_title" => "All places - Sighty",
			"meta_description" => "All places - Sighty",
			"title" => "All Places",
			"footer_content" => "&copy All rights reserved for asc3rr",
			"places" => $places
		];

		return view("place/result", $data);
	}
}
