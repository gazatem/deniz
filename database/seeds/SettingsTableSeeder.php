<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Carbon\Carbon as Carbon;

class SettingsTableSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('settings');
        $this->truncate('setting_groups');

        $setting_groups = [
            [
                'name'     => 'General',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            
         
            [
                'name'     => 'Sections',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],                        
        ];

        $settings = [
       
            [
                'setting_label'     => 'Analytics Tracking Code',
                'setting_name'      => 'analytics_tracking_code',
                'setting_value'     => '',
                'group_id'          => 1,
                'setting_type'     => 'textarea',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
            [
                'setting_label'     => 'Selected Theme',
                'setting_name'      => 'theme',
                'setting_value'     => 'starter',
                'group_id'          => 1,
                'setting_type'     => 'input',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],                    
        ];
        DB::table('setting_groups')->insert($setting_groups);   
        DB::table('settings')->insert($settings);     
        $this->enableForeignKeys();   
    }
}
