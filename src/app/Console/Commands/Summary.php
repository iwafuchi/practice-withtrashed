<?php

namespace App\Console\Commands;

use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Summary extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Summary:phone';

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
        $dt = Carbon::now();
        $startAndEndRange = [
            $dt->copy()->startOfDay(),
            $dt->copy()->addMinute(30)
        ];
        $phones = [
            [
                'name' => 'user1',
                'user_id' => '1',
                'created_at' => $dt,
            ],
            [
                'name' => 'user2',
                'user_id' => '2',
                'created_at' => $dt,
            ],
            [
                'name' => 'user3',
                'user_id' => '3',
                'created_at' => $dt,
            ],
        ];
        Phone::updateOrCreate(
            ['id' => 1],
            ['name' => 'addName1', 'user_id' => 1, 'created_at' => $dt]
        );
    }
}
