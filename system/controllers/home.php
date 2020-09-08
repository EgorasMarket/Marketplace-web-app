<?php

/**
 *
 */
class Home extends Controller
{

	public function index($name = '', $otherName = '')
	{
		$data = "";
		//$this->view('home/about-us', $data);
		$this->view('home/index', $data);
	}




	public function referal($value = '')
	{
		if (setcookie("refer", $value, time() + 96000 * 50, '/')) {
			redirect_to("/");
		}
	}
}
