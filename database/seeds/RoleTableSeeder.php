<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
use Database\TruncateTable;
/**
 * Class RoleTableSeeder.
 */
class RoleTableSeeder extends Seeder
{ 
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [
            [
                'name'       => 'administrator',
                'display_name'  => 'Administrator',
                'all'        => true,
                'sort'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'editor',
                'display_name'  => 'Editor',
                'all'        => false,
                'sort'       => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'user',
                'display_name'  => 'User',
                'all'        => false,
                'sort'       => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}
