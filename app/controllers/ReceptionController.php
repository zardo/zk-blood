<?php

class ReceptionController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		return View::make('reception.index');
	}

	public function getCall()
	{
		$donation = Donation::where('queue', 1)->orderby('created_at', 'asc')->first();

		if ($donation == null) {
			return Redirect::back()->withErrors(['Não há doadores aguardando']);
		}

		$donation->queue = 2;
		$donation->save();

		if ($donation->donator_id == null) {
			return Redirect::to('reception/' . $donation->id . '/identification');
		}

		return Redirect::to('reception/' . $donation->id . '/treatment');
	}

	public function getIdentification($donation)
	{
		return View::make('reception.identification', array('donation' => $donation));
	}

	public function getRegistration($donation)
	{
		return View::make('reception.registration', array('donation' => $donation));
	}

	public function postRegistration($donation)
	{
		$donator = new Donator;
		$donator->name = Input::get('name');
		$donator->rg = Input::get('rg');
		$donator->cpf = Input::get('cpf');
		$donator->mother_name = Input::get('mother_name');
		$donator->address = Input::get('address');
		$donator->district = Input::get('district');
		$donator->city = Input::get('city');
		$donator->state = Input::get('state');
		$donator->save();

		return Redirect::to('/reception/' . $donation->id . '/link/' . $donator->id);
	}

	public function postIdentification($donation)
	{
		$donators = Donator::where('name', 'LIKE', "%" . Input::get('donator_info') . "%")->orWhere('cpf', Input::get('donator_info'))->get();
		return View::make('reception.identification', array('donation' => $donation, 'donators' => $donators));
	}

	public function getLink($donation, $donator)
	{
		$donation->donator_id = $donator->id;
		$donation->save();
		return Redirect::to('/reception/' . $donation->id . '/treatment');
	}

	public function getTreatment($donation)
	{
		return View::make('reception.treatment', array('donation' => $donation));
	}

	public function postTreatment($donation)
	{
		$donator = $donation->donator;
		$donator->name = Input::get('name');
		$donator->rg = Input::get('rg');
		$donator->cpf = Input::get('cpf');
		$donator->mother_name = Input::get('mother_name');
		$donator->address = Input::get('address');
		$donator->district = Input::get('district');
		$donator->city = Input::get('city');
		$donator->state = Input::get('state');
		$donator->save();
		return Redirect::back();
	}

	public function getFinalization($donation)
	{
		$donation->queue = 3;
		$donation->save();
		return Redirect::to('/reception')->with('message', 'Doador identificado com sucesso. Oriente-o a aguardar a chamada pela pré-triagem.');
	}

}
