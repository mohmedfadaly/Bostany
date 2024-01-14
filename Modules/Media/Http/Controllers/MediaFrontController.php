<?php

namespace Modules\Media\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\About\Entities\Files;
use Modules\About\Entities\OurJourney;
use Modules\Main\Entities\OurValue;
use Modules\Media\Entities\Gallary;
use Modules\Media\Entities\MediaSlider;
use Modules\Media\Entities\News;
use Str;
class MediaFrontController extends Controller
{
    public function index()
    {

        $news = News::latest()->get();
        $news_rand = News::take(5)->inRandomOrder()->get();
        $gallary = Gallary::latest()->get();
        $sliders = MediaSlider::latest()->get();

    	return view('media::front.home',compact('news','gallary','sliders','news_rand'));
    }
    public function details($id)
    {
        $data = News::findOrFail($id);
        $news_rand = News::take(6)->inRandomOrder()->get();

    	return view('media::front.details.home',compact('data','news_rand'));
    }

    public function search()
    {
        $search    = request()->search;
        $news = News::query();

        if(!is_null($search))
        {
            $news =  $news->where('title' , 'like' , "%". $search ."%")->get();
        }else{
            $news =  $news->take(6)->inRandomOrder()->get();

        }

    	return view('media::front.search',compact('news'));
    }

}
