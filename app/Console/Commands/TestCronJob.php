<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A simple test cron job that runs every 2 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('✅ Test Cron Job is working! Time: ' . now());

        // Optional: test mail
         Mail::raw('Test cron ran at '.now(), function($msg) {
             $msg->to('goweya9391@fintehs.com')->subject('Cron Test');
         });

        $this->info('Test Cron Job executed successfully!');
    }
}
