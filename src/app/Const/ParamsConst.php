<?php

namespace App\Const;

class ParamsConst {
    const ARRAY = [
        self::NAME_DESCRIPTION,
        self::ATTRIBUTE_DESCRIPTION
    ];

    const NAME_DESCRIPTION = [
        'key' => 'name',
        'index_flg' => 0,
        'edit_flg' => 1,
        'description' => 'これは名前です'
    ];
    const ATTRIBUTE_DESCRIPTION = [
        'key' => 'attribute',
        'index_flg' => 1,
        'edit_flg' => 0,
        'description' => 'これは属性です'
    ];
}
