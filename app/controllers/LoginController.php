<?php

class LoginController extends \BaseController {

	public function getIndex()
	{
		return View::make('login');
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

	public function postIndex()
	{
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
		    return Redirect::intended(Auth::getUser()->type);
		} else {
		    return Redirect::back()->withErrors(['Autenticação falhou. Email ou senha incorretos.']);
		}
	}

}