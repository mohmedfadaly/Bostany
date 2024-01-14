<?php

namespace Modules\About\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\About\Entities\Files;
use Modules\About\Entities\OurJourney;
use Modules\About\Entities\Team;
use Modules\Main\Entities\OurValue;
use Str;
class AboutFrontController extends Controller
{
    public function index()
    {
        $our_values = OurValue::latest()->get();
        $files = Files::latest()->get();
        $our_journey = OurJourney::latest()->get();
    	return view('about::front.home',compact('our_values','files','our_journey'));
    }
    public function team()
    {
        $teams = Team::latest()->get();
    	return view('about::front.team.home',compact('teams'));
    }

}
