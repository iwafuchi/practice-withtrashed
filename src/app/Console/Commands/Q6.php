<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Q6 extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Q6';

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
        $in1 = 'x';
        $in2 = 5;

        //////////////////////////////////
        //       SOME CODE HERE         //
        //////////////////////////////////

        $out = array_fill(0, $in2, $in1);
        var_dump($out);

        /*
        array (size=5)
          0 => string 'x' (length=1)
          1 => string 'x' (length=1)
          2 => string 'x' (length=1)
          3 => string 'x' (length=1)
          4 => string 'x' (length=1)
        */
    }
}
