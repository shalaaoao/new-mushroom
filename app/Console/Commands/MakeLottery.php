<?php

namespace App\Console\Commands;

use App\Http\Controllers\LotteryController;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class MakeLottery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:apii';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成抽奖记录';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $obj = new LotteryController();

        $i = 0;
        while($i<10000) {
            $obj->getLotteryPrizeCalc();
            $i++;
        }

        $obj->samePrizeStore();
    }

    protected function getArguments()
    {
        return array(
            array('function', InputArgument::REQUIRED, '执行的方法'),
            array('param_o', InputArgument::OPTIONAL, '参数1'),
            array('param_s', InputArgument::OPTIONAL, '参数2'),
            array('param_t', InputArgument::OPTIONAL, '参数3'),
        );
    }
}
