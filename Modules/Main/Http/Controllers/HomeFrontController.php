<?php

namespace Modules\Main\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\About\Entities\About;
use Modules\About\Entities\Fuq;
use Modules\About\Entities\OtherService;
use Modules\About\Entities\OurFeature;
use Modules\About\Entities\OurService;
use Modules\Main\Entities\Section;
use Modules\Media\Entities\Gallary;
use Modules\Media\Entities\News;
use Modules\Setting\Entities\Setting;

class HomeFrontController extends Controller
{
    public function Index()
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.home',
        compact(
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

    public function about()
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $about = About::where('id',1)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.about',
        compact(
            'about',
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

    public function articles()
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.articles',
        compact(
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

    public function article($id)
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $modal = News::where('id',$id)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.article',
        compact(
            'modal',
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

    public function fuq()
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.fuq',
        compact(
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

    public function works()
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.works',
        compact(
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

    public function contact()
    {
        $model1 = Section::where('id',1)->latest()->first();
        $model2 = Section::where('id',2)->latest()->first();
        $model3 = Section::where('id',3)->latest()->first();
        $model4 = Section::where('id',4)->latest()->first();
        $model5 = Section::where('id',5)->latest()->first();
        $model6 = Section::where('id',6)->latest()->first();
        $model7 = Section::where('id',7)->latest()->first();
        $model8 = Section::where('id',8)->latest()->first();

        $Fuq = Fuq::latest()->get();
        $OurService = OurService::latest()->get();
        $OtherService = OtherService::latest()->get();
        $OurFeature = OurFeature::latest()->get();
        $gallary = Gallary::latest()->get();
        $news = News::latest()->get();
        $setting = Setting::first();


        return view('front.contact',
        compact(
            'model1',
            'model2',
            'model3',
            'model4',
            'model5',
            'model6',
            'model7',
            'model8',
            'Fuq',
            'setting',
            'OurService',
            'OtherService',
            'OurFeature',
            'gallary',
            'news',
            )

        );
    }

}
