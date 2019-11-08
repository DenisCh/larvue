<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    /**
	 * Field to be mass-assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['url', 'screen'];

	/**
	 * Ignore flagged Signature
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeIgnoreFlagged($query) {
		return $query->where('screened_at', null);
	}

	/**
	 * Flag the given signature.
	 *
	 * @return bool
	 */
	public function flag()
	{
	    return $this->update(['screened_at' => \Carbon\Carbon::now()]);
	}

	/**
	 * Get url to screen.
	 *
	 * @return string
	 */
	public function getScreenAttribute($value)
	{
		if($value) {
			return sprintf('/%s', $value);
		} else {
			return '';
		}
	    
	}
}
