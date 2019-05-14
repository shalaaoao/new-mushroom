<?php

namespace App\Console\Commands;

use App\Http\Controllers\LotteryController;
use App\Http\Controllers\TestController;
use App\Model\LotteryGetLog;
use App\Model\User;
use App\Model\UserInfo;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:api {user=1111} {zyk=2222}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test';

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
        $user = $this->argument('user');
        var_dump($user);

        $zyk = $this->argument('zyk');
        var_dump($zyk);
//
//        $name = $this->ask('What is your name?');
//        var_dump($name);
//
//        $password = $this->secret('What is your password?');
//        var_dump($password);

//        if ($this->confirm('Do you wish to continue?')) {
//            echo 1;
//        } else {
//            echo 2;
//        }

//        $defaultIndex = 'cja';
//        $name = $this->choice('What is your name?', ['cja', 'CJA', 'shalaaoao'], $defaultIndex);
//        var_dump($name);

//        $headers = ['phone', 'email'];
//        $users = User::all(['phone', 'email'])->toArray();
//
//        $this->table($headers, $users);


//        $users = LotteryGetLog::all();
//        $bar = $this->output->createProgressBar(count($users));
//
//        foreach ($users as $user) {
////            var_dump($user->id);
//            sleep(1);
//
//            $bar->advance();
//        }
//
//        $bar->finish();


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
