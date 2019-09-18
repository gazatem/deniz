<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Carbon\Carbon as Carbon;

class PageTableSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('pages');
  
        $content = '<!-- Icons Grid -->
        <section class="features-icons bg-light text-center">
        <div class="container">
        <div class="row">
        <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
        <div class="features-icons-icon d-flex">
        <i class="fas fa-desktop m-auto text-primary"></i>
        </div>
        <h3>Fully Responsive</h3>
        <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
        <div class="features-icons-icon d-flex">
        <i class="fab fa-bootstrap m-auto text-primary"></i>
        </div>
        <h3>Bootstrap 4 Ready</h3>
        <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
        <div class="features-icons-icon d-flex">
        <i class="far fa-check-square m-auto text-primary"></i>
        </div>
        <h3>Easy to Use</h3>
        <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        <!-- Image Showcases -->
        <section class="showcase">
        <div class="container-fluid p-0">
        <div class="row no-gutters">
        
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(\'https://picsum.photos/id/237/300/300\');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <h2>Fully Responsive Design</h2>
        <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it\'s a phone, tablet, or desktop the page will behave responsively!</p>
        </div>
        </div>
        <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url(\'http://lorempixel.com/400/400/\');"></div>
        <div class="col-lg-6 my-auto showcase-text">
        <h2>Updated For Bootstrap 4</h2>
        <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
        </div>
        
        </div>
        </div></section>';
        $page = [
       
            [
                'title'     => 'Home',
                'template'      => 'home',
                'content'     => $content,
                'slug'          => 'home',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
                 
        ];
        DB::table('pages')->insert($page);   
        $this->enableForeignKeys();   
    }
}
