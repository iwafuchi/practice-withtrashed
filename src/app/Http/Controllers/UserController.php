<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function index() {

        /**
         * DBファサードで返却値にカラムを追加する処理の書き方
         */
        $query1 = DB::table('users')->select('users.id as users.id', 'users.name as users.name', 'phones.name as phones.name');
        $query1->leftJoin('phones', 'users.id', '=', 'phones.id');

        $query1toArray = $query1->get()->toArray();
        foreach ($query1toArray as $array) {
            $array->append_attribute = 'test attribute';
        }


        $query3 = User::with(['phone' => function ($query) {
            $query->withTrashed();
        }])->get()->toArray();

        $withValue2 = ['phone' => function ($query) {
            $query->withTrashed();
        }];
        $query5 = User::with($withValue2)->get();

        $phone = Phone::all();

        dd($query1toArray, $query3, $query5->toArray(), $phone->toArray());
    }
}
