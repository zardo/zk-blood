<?php

class PrescreeningController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex()
    {
        return View::make('prescreening.index');
    }

    public function getCall()
    {
        $donation = Donation::where('queue', 3)->orderby('created_at', 'asc')->first();

        if ($donation == null) {
            return Redirect::back()->withErrors(['Não há doadores aguardando']);
        }

        $donation->queue = 4;
        $donation->save();

        return Redirect::to('prescreening/' . $donation->id . '/treatment');
    }

    public function getTreatment($donation)
    {
        return View::make('prescreening.treatment', array('donation' => $donation));
    }

    public function postTreatment($donation)
    {
        $donation->height = Input::get('height');
        $donation->weight = Input::get('weight');
        $donation->bpm = Input::get('bpm');
        $donation->blood_pressure_1 = Input::get('blood_pressure_1');
        $donation->blood_pressure_2 = Input::get('blood_pressure_2');
        $donation->temperature = Input::get('temperature');
        $donation->save();
        return Redirect::to('prescreening/' . $donation->id . '/finalization');
    }

    public function getFinalization($donation)
    {
        $donation->queue = 5;
        $donation->save();
        return Redirect::to('/prescreening')->with('message', 'Dados salvos com sucesso. Oriente-o a aguardar a chamada pela triagem.');
    }

}
