<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendDailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily sales reports';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $yesterday = Carbon::yesterday();

        // $allOrders = Order::whareDate('created_at', $yesterday);
        // $totalSales = $allOrders->sum('total');
        // $orderCount = $allOrders->count();

        $totalSales = 15_000_000;
        $orderCount = 15;

        $this->info("Daily Report for {$yesterday->format('Y-m-d')}");
        $this->line("Total Sales: $" . number_format($totalSales, 2));
        $this->line("Orders: {$orderCount}");

        Log::channel('daily')->info('Daily report generated', [
            'date' => $yesterday->toDateString(),
            'total_sales' => $totalSales,
            'order_count' => $orderCount,
            'changes' => 'ahfk'
        ]);

        return Command::SUCCESS;
    }
}
