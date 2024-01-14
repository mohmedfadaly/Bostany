<?php

namespace Modules\Main\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\About\Entities\About;
use Modules\About\Entities\OurFeature;
use Modules\About\Entities\OurService;
use Modules\Main\Entities\Section;

class MainDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $Section1 = Section::updateOrCreate([
            'id' => 1
        ]);
        $Section2 = Section::updateOrCreate([
            'id' => 2
        ]);
        $Section3 = Section::updateOrCreate([
            'id' => 3
        ]);
        $Section4 = Section::updateOrCreate([
            'id' => 4
        ]);
        $Section5 = Section::updateOrCreate([
            'id' => 5
        ]);
        $Section6 = Section::updateOrCreate([
            'id' => 6
        ]);
        $Section7 = Section::updateOrCreate([
            'id' => 7
        ]);
        $Section8 = Section::updateOrCreate([
            'id' => 8
        ]);

        $About = About::updateOrCreate([
            'id' => 1
        ]);



        $OurService1 = OurService::updateOrCreate([
            'id' => 1
        ], [
            'title' => 'الخدمة 1',
        ]);
        $OurService2 = OurService::updateOrCreate([
            'id' => 2
        ], [
            'title' => 'الخدمة 2',
        ]);
        $OurService3 = OurService::updateOrCreate([
            'id' => 3
        ], [
            'title' => 'الخدمة 3',
        ]);
        $OurService4 = OurService::updateOrCreate([
            'id' => 4
        ], [
            'title' => 'الخدمة 4',
        ]);

        $OurFeature1 = OurFeature::updateOrCreate([
            'id' => 1
        ], [
            'title' => 'الميزة 1',
        ]);
        $OurFeature2 = OurFeature::updateOrCreate([
            'id' => 2
        ], [
            'title' => 'الميزة 2',
        ]);
        $OurFeature3 = OurFeature::updateOrCreate([
            'id' => 3
        ], [
            'title' => 'الميزة 3',
        ]);
        $OurFeature4 = OurFeature::updateOrCreate([
            'id' => 4
        ], [
            'title' => 'الميزة 4',
        ]);

        // $this->call("OthersTableSeeder");
    }
}
