<?php

use Illuminate\Database\Seeder;

use App\Channel;
use Illuminate\Support\Str;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Channel::create([

            'name'=>'Laravel 5.8',
            'slug'=>Str::slug('Laravel 5.8','-')
        ]);
        Channel::create([

            'name'=>'Angular 7',
            'slug'=>Str::slug('Angular 7','-')
        ]);
        Channel::create([

            'name'=>'Vue Js 3',
            'slug'=>Str::slug('Vue Js 3','-')
        ]);
        Channel::create([

            'name'=>'Wordpress 4.0',
            'slug'=>Str::slug('Wordpress 4.0','-')
        ]);
    }
}
