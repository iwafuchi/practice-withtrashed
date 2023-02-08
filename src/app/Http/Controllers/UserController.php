<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function index() {
        $query1 = DB::table('users')->select('users.id as users.id', 'users.name as users.name', 'phones.name as phones.name');
        $query1->leftJoin('phones', 'users.id', '=', 'phones.id');

        $query2 = User::with(['phone' => fn ($q) => $q->withTrashed()])->get();

        $query3 = User::with(['phone' => function ($query) {
            $query->withTrashed();
        }])->get();


        $withValue1 = ['phone' => fn ($q) => $q->withTrashed()];
        $query4 = User::with($withValue1)->get();


        $withValue2 = ['phone' => function ($query) {
            $query->withTrashed();
        }];
        $query5 = User::with($withValue2)->get();


        dd($query1->get(), $query2, $query3, $query4, $query5);
    }
}
