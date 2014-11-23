<?php

class ScreeningController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex()
    {
        return View::make('screening.index');
    }

    public function getCall()
    {
        $donation = Donation::where('queue', 5)->orderby('created_at', 'asc')->first();

        if ($donation == null) {
            return Redirect::back()->withErrors(['Não há doadores aguardando']);
        }

        $donation->queue = 6;
        $donation->save();

        return Redirect::to('screening/' . $donation->id . '/treatment');
    }

    public function getTreatment($donation)
    {
        return View::make('screening.treatment', array('donation' => $donation));
    }

    public function postTreatment($donation)
    {
        $donation->sex_with_more_than_3_partners = Input::get('sex_with_more_than_3_partners');
        $donation->used_drugs = Input::get('used_drugs');
        $donation->had_surgery = Input::get('had_surgery');
        $donation->save();
        return Redirect::to('screening/' . $donation->id . '/finalization');
    }

    public function getFinalization($donation)
    {
        $donation->queue = 7;
        $donation->save();
        return Redirect::to('/screening')->with('message', 'Dados salvos com sucesso. Oriente-o a aguardar a chamada pela coleta.');
    }

}
