<?php

namespace App\Console\Commands;

use App\Models\admin\Plans;
use App\Models\User;
use App\Models\User\EasyPaisaMangement;
use App\Models\User\PlanDetails;
use App\Models\User\ReferalLevel;
use App\Models\User\Setting;
use App\Models\User\verificationText;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $easyPaisa = new EasyPaisaMangement();
        $easyPaisa->easy_name = 'test';
        $easyPaisa->easy_num = '9999999999';
        $easyPaisa->status = 1;
        $easyPaisa->save();

        // Plan Details
        $home_plan = new PlanDetails();
        $home_plan->plan_name = 'First Plan';
        $home_plan->details = 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available';
        $home_plan->status = 1;
        $home_plan->save();

        $home_plan = new PlanDetails();
        $home_plan->plan_name = 'Second Plan';
        $home_plan->details = 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available';
        $home_plan->status = 1;
        $home_plan->save();

        $home_plan = new PlanDetails();
        $home_plan->plan_name = 'Third Plan';
        $home_plan->details = 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available';
        $home_plan->status = 1;
        $home_plan->save();

        // Referal limite
        $setting = new Setting();
        $setting->min_widthraw = '50';
        $setting->max_widthraw = '500';
        $setting->planA = '100';
        $setting->planB = '200';
        $setting->planC = '300';
        $setting->status = 1;
        $setting->save();

        // Verification page text

        $verificationText = new verificationText();
        $verificationText->text = 'Welcome to MoviesPay website we will approve your account after checking your given details';
        $verificationText->status = 1;
        $verificationText->save();

        //    set level according to thier referal

        $level = new ReferalLevel();
        $level->level1 = 10;
        $level->level2 = 20;
        $level->level3 = 30;
        $level->level4 = 40;
        $level->level5 = 50;
        $level->level6 = 60;
        $level->level7 = 70;
        $level->level8 = 80;
        $level->level9 = 90;
        $level->level10 = 100;
        $level->status = 1;
        $level->save();

        $plan = new Plans();
        $plan->name = 'first';
        $plan->investment = 500;
        $plan->total_profit = 800;
        $plan->duration = 15;
        $plan->save();

        $plan = new Plans();
        $plan->name = 'second';
        $plan->investment = 1500;
        $plan->total_profit = 2200;
        $plan->duration = 30;
        $plan->save();

        $plan = new Plans();
        $plan->name = 'first';
        $plan->investment = 2000;
        $plan->total_profit = 2800;
        $plan->duration = 45;
        $plan->save();

        $user = new User();
        $user->name = 'Admin';
        $user->referral = 'default';
        $user->balance = '0';
        $user->package = 'Dimond';
        $user->mobile = '03000000000';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('asdfasdf');
        $user->status = 'approved';
        $user->role = 'admin';
        $user->save();


        $user = new User();
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->referral = 'default';
        $user->package = 'Dimond';
        $user->balance = '10';
        $user->mobile = '03000000000';
        $user->password = Hash::make('asdfasdf');
        $user->role = 'user';
        $user->status = 'approved';
        $user->save();

        return Command::SUCCESS;
    }
}
