<?php


namespace App\Services;

use App\Contact;

class ContactService
{
    public static function searchContact(string $param)
    {
        return Contact::where('name', 'LIKE', '%' . $param . '%')
                        ->orwhere('email', 'LIKE', '%' . $param . '%')
                        ->orwhere('last_name', 'LIKE', '%' . $param . '%')
                        ->get();
    }

    public static function getContacts($order = 'asc')
    {
        if (!in_array($order, ['asc', $order]))
            throw new \Exception('invalide order value "' . $order . '"');

        return Contact::orderBy('created_at', $order)->get();
    }

}