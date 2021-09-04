<?php

namespace App\Controllers;

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
}
