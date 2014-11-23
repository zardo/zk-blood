<?php

class Donation extends \Eloquent {
	protected $fillable = [];

    public function donator()
    {
        return $this->belongsTo('Donator');
    }
}