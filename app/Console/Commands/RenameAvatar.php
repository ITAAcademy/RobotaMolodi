<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class RenameAvatar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rename:avatar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change name in field Avatar in tabel User to path+avatar_name. 
                             To use this command you should in APP/User commit field implement... 
                             and field /use Authenticatable, Authorizable, CanResetPassword;/ 
                             After change return all back!!!';

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

        $users = User::all();
//        dd($users);
        foreach ($users as $user){
            if ($user->avatar){
                $user->avatar = 'image/user/' . $user->id . '/avatar/' . $user->avatar;
               // dd($user);
                $user->update();
            }
        }
    }
}
