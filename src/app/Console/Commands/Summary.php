<?php

namespace App\Console\Commands;

use App\Models\Phone;
use App\Models\User;
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

        $user = User::with('phone:user_id,name,id')->get();
        $phone = collect();
        $user->each(function ($value) use ($phone) {
            $phone->push($value->phone);
        });

        //リレーションを平坦化する
        dd($user->pluck('phone')->flatten()->toArray());

        Phone::updateOrCreate(
            ['id' => 1],
            ['name' => 'addName1', 'user_id' => 1, 'created_at' => $dt]
        );
    }
}
