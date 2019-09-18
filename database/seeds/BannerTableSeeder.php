<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Carbon\Carbon as Carbon;

class BannerTableSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('banners');
  
  
        $banner = [
       
            [
                'title'     => 'Sample Banner',
                'description'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum volutpat tincidunt. Aenean mattis odio eu urna sodales consequat.',
                'image'     => '.',
                'link'          => '/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
                 
        ];
        DB::table('banners')->insert($banner);   
        $this->enableForeignKeys();   
    }
}
