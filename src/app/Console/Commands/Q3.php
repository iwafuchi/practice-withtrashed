<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Q3 extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Q3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $in = [
            [
                'id' => 1,
                'code' => 'S1001',
                'name' => '山田',
            ],
            [
                'id' => 2,
                'code' => 'S1003',
                'name' => '鈴木',
            ],
            [
                'id' => 3,
                'code' => 'S1002',
                'name' => '佐藤',
            ],
        ];

        //////////////////////////////////
        //       SOME CODE HERE         //
        //////////////////////////////////
        $out = array_column($in, 'name', 'code');
        dd($out);

        /*
        array (size=3)
          'S1001' => string '山田' (length=6)
          'S1002' => string '鈴木' (length=6)
          'S1003' => string '佐藤' (length=6)
        */
    }
}
