<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use App\Const\ParamsConst;
use ReflectionClass;

class UserController extends Controller {
    public function index() {

        /**
         * DBファサードで返却値にカラムを追加する処理の書き方
         */
        $query1 = User::query()->select(['id', 'name']);
        $collection1 = $query1->get();

        $collection2 = $query1->leftJoin('phones', 'users.id', '=', 'phones.id')
            ->select('users.id as users.id', 'users.name as users.name', 'phones.name as phones.name', 'phones.deleted_at')->get();

        // $query1->leftJoin('phones', 'users.id', '=', 'phones.id');

        $result1 = [];
        foreach ($collection1 as $array) {
            array_push($result1, $array->nickname);
        }
        dd($result1);

        $result2 = [];
        foreach ($collection2 as $array) {
            $result1 = $array;
            // dd($array, $array->nickname);
        }
        dd($result1);
        //with()で特定のカラムのみ取得する リレーションするテーブル:外部キー,カラム,カラム・・・etcの書き方で指定する
        $query3 = User::with('phone:user_id,name,id')->get();

        $query4 = User::with(['phone' => function ($query) {
            $query->withTrashed();
        }])->get();

        $withValue2 = ['phone' => function ($query) {
            $query->withTrashed();
        }];
        $query5 = User::with($withValue2)->get();

        //withTrashed()を付与しないと論理削除されたカラムは取得されない
        $phone = Phone::all()->toArray();

        dd($result1, $query3, $query4, $query5, $phone);
    }
    public function params($request = 'index') {
        $displayFlg = "{$request}_flg";
        $result = array_column(array_filter(ParamsConst::ARRAY, function ($flg) use ($displayFlg) {
            return $flg[$displayFlg];
        }), 'description', 'key');
        dd($result);
    }
}
