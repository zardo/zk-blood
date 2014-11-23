<?php

class CollectionController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex()
    {
        return View::make('collection.index');
    }

    public function getCall()
    {
        $donation = Donation::where('queue', 7)->orderby('created_at', 'asc')->first();

        if ($donation == null) {
            return Redirect::back()->withErrors(['Não há doadores aguardando']);
        }

        $donation->queue = 8;
        $donation->save();

        return Redirect::to('collection/' . $donation->id . '/treatment');
    }

    public function getTreatment($donation)
    {
        return View::make('collection.treatment', array('donation' => $donation));
    }

    public function postTreatment($donation)
    {
        $donation->collected_volume = Input::get('collected_volume');
        $donation->save();
        return Redirect::to('collection/' . $donation->id . '/finalization');
    }

    public function getFinalization($donation)
    {
        $donation->queue = 9;
        $donation->save();
        return Redirect::to('/collection')->with('message', 'Dados salvos com sucesso. A doação foi finalizada. Agradeça e dê um suco ao doador :)');
    }

}
