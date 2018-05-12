<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function search()
    {
        $results = Customer::orderBy('firstname')
            ->when(request('q'), function ($query) {
                $query->where('firstname', 'like', '%' . request('q') . '%')
                    ->orWhere('lastname', 'like', '%' . request('q') . '%')
                    ->orWhere('email', 'like', '%' . request('q') . '%');
            })
            ->limit(6)
            ->get();

        return response()
            ->json(['results' => $results]);
    }
}
