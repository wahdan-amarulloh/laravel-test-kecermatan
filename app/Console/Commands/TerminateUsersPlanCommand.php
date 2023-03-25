<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TerminateUsersPlanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'terminate:plan {user?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Terminate expired plans by setting expired_at and subscription_id to null.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = $this->argument('user');

        if ($user) {
            $user = User::find($user);

            if (! $user) {
                $this->error('User not found!');

                return 1;
            }

            $this->terminateUserPlan($user);
            $this->info("User's plan has been terminated successfully!");
        } else {
            $users = User::whereNotNull('expired_at')->where('expired_at', '<', Carbon::now())->get();

            foreach ($users as $user) {
                $this->terminateUserPlan($user);
            }

            $this->info('All expired plans have been terminated successfully!');
        }

        return 0;
    }

    /**
     * Terminate the user's plan by setting expired_at and subscription_id to null.
     *
     * @param  User  $user
     * @return void
     */
    protected function terminateUserPlan(User $user)
    {
        $user->expired_at = null;
        $user->subscription_id = null;
        $user->save();

        info("User's plan has been terminated. User ID: {$user->id}");
    }
}
