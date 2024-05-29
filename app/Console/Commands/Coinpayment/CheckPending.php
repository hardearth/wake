<?php

namespace App\Console\Commands\Coinpayment;

use App\Models\CoinpaymentTransaction;
use App\Models\Course;
use App\Models\CourseRegister;
use App\Models\UserBill;
use Hexters\CoinPayment\CoinPayment;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CheckPending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Coinpayment:checkpending';

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
    public function handle()
    {
        $limit = Carbon::now()->subHour(2)->format('y-m-d H:i:s');
        $transactions = CoinpaymentTransaction::where('status', "!=", '100')->where('created_at', '>', $limit)->get();
        foreach ($transactions as $transaction) {
            $result = CoinPayment::getstatusbytxnid($transaction->txn_id);
            if ($result['status'] == 100) {
                $bill = UserBill::where('uuid', $transaction->order_id)->first();
                $bill->status = 'A';
                $bill->save();

                $this->registerCourses($bill);
            }
        }
        return Command::SUCCESS;
    }

    public function registerCourses($bill)
    {
        foreach ($bill->courses as $json) {
            $course = Course::find($json->id);
            $register = new CourseRegister();
            $register->courses_id = $course->id;
            $register->users_id = $course->id;
            $register->created_user = $course->id;
            $register->save();
        }
    }
}
