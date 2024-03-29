<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	protected $fillable = [
		'street',
		'city',
		'zip',
		'country',
		'state',
		'price',
		'description'
	];

	public static function locatedAt($zip, $street)
	{
		$street = str_replace('-', ' ', $street);

		return static::where(compact('zip', 'street'))->firstOrFail();
	}

	public function addPhoto(Photo $photo)
	{
		return $this->photos()->save($photo);
	}

    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
}
