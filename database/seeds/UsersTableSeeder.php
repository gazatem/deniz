<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon as Carbon;
use App\Models\Role;
use App\Models\User;
use Database\DisableForeignKeys;
use Database\TruncateTable;
class UsersTableSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');
 
        $user = [
            [
                'name'       => 'Administrator',
                'email'  => 'admin@example.org',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin'), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($user);
        $user = User::find(1);
        $user->attachRole(Role::where('name', 'administrator')->first());
        $this->enableForeignKeys();
    }
}
