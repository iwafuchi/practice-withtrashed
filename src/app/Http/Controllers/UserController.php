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

        dd($query1->get(), $query2, $query3);
    }
}
