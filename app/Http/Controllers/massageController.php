<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Http\Request;

class massageController extends Controller
{
	public function store()
	{
		$message = request()->validate([
		'name' => 'required',
		'email' => 'required|email',
		'subject' => 'required',
		'content' => 'required|min:3'
		], [
			'name.required' => __('I need your name')
		]);
		//enviar el Email
		Mail::to('ivanbuelvas1023@gmail.com')->queue(new MessageReceived($message));

		return back()->with('status', 'Recibimos tu mensaje, te daremos respuesta cuanto antes.');
	}
}
