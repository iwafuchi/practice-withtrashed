<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Q2 extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Q2';

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
            'id' => 1,
            'code' => 'S1001',
            'name' => '山田',
            'pref' => 27,
        ];

        //////////////////////////////////
        //       SOME CODE HERE         //
        //////////////////////////////////

        $out = array_keys($in);
        dd($out);

        /*
        array (size=4)
          0 => string 'id' (length=2)
          1 => string 'code' (length=4)
          2 => string 'name' (length=4)
          3 => string 'pref' (length=4)
        */
    }
}
