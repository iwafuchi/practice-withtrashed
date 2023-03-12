<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Q5 extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Q5';

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
        $in1 = ['S1001', 'S1002', 'S1003'];

        $in2 = ['山田', '鈴木', '佐藤'];

        //////////////////////////////////
        //       SOME CODE HERE         //
        //////////////////////////////////

        $out = array_combine($in1, $in2);
        var_dump($out);

        /*
        array (size=3)
          'S1001' => string '山田' (length=6)
          'S1002' => string '鈴木' (length=6)
          'S1003' => string '佐藤' (length=6)
        */
    }
}
