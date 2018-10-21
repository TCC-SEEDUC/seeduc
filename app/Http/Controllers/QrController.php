<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrController extends Controller
{
	public function make()
	{
		$activity = new \stdClass();
		$activity->id = 0;
		$file = public_path("images/activity-$activity->id.png");
		return QRCode::text("http://localhost:8080/api/subscriptions/$activity->id")->setOutfile($file)->png();  
	}
}
