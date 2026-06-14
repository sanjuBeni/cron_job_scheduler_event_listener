<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schedule;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Welcome Mail';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('Email Send with Welcome message');

        return Command::SUCCESS;
    }
}
