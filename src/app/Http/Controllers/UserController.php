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
        $query1 = User::query();

        $result1 = $query1->leftJoin('phones', 'users.id', '=', 'phones.id')
            ->select('users.id as users.id', 'users.name as users.name', 'phones.name as phones.name', 'phones.deleted_at')
            ->get()->toArray();

        // $query1->leftJoin('phones', 'users.id', '=', 'phones.id');

        // $query1toArray = $query1->get()->toArray();
        // foreach ($query1toArray as $array) {
        //     $array->append_attribute = 'test attribute';
        // }

        //with()で特定のカラムのみ取得する リレーションするテーブル:外部キー,カラム,カラム・・・etcの書き方で指定する
        $query3 = User::with('phone:user_id,name,id')->get()->toArray();

        $query4 = User::with(['phone' => function ($query) {
            $query->withTrashed();
        }])->get()->toArray();

        $withValue2 = ['phone' => function ($query) {
            $query->withTrashed();
        }];
        $query5 = User::with($withValue2)->get()->toArray();

        //withTrashed()を付与しないと論理削除されたカラムは取得されない
        $phone = Phone::all()->toArray();

        dd($result1, $query3, $query4, $query5, $phone);
    }
}
