<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gestioncontacts.society';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'city',
        'address',
        'postal_code',
        'website',
    ];

    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
}
