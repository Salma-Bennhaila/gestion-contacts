<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gestioncontacts.contact';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'civility',
        'service',
        'fonction',
        'date_of_birth',
        'society_id'
        ];

    protected $dates = ['date_of_birth'];

    /**
     * Get the society record associated with the user.
     */
    public function society()
    {
        return $this->belongsTo('App\Society');
    }
}
