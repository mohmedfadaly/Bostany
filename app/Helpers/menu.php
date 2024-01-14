<?php
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
function menu()
{
    $permissions = Auth::user()->Role->routes;
    $permissions    = json_decode($permissions);
	$routes = Route::getRoutes();
   for ($i = 1; $i < count($routes); $i++) {

        foreach ($routes as $value)
        {
            if($value->getName() !== null && isset($value->getAction()['title']) && isset($value->getAction()['icon']))
            {
                if(isset($value->getAction()['sort'])){
                    if($value->getAction()['sort'] == $i){
                        if(isset($value->getAction()['child']) && isset($value->getAction()['subTitle'])  && isset($value->getAction()['subIcon']))
                        {
                            if(in_array($value->getName(),$permissions))
                            {
                                ItemsDrop(
                                    $value->getAction()['child'],
                                    $value->getAction()['title'],
                                    $value->getAction()['icon'],
                                    $value->getAction()['subTitle'],
                                    $value->getAction()['subIcon'],
                                    $value->getName()
                                );
                            }
                        }

                        if(!isset($value->getAction()['child']) && !isset($value->getAction()['subTitle'])  && !isset($value->getAction()['subIcon']) && isset($value->getAction()['icon']) && !isset($value->getAction()['hasFather']))
                        {
                            if(in_array($value->getName(),$permissions))
                            {
                                Item($value->getName(), $value->getAction()['icon'],$value->getAction()['title']);
                            }
                        }



                    }
                }
            }
        }
    }
}
function Item_Active($name)
{
    return Route::currentRouteName() === $name ? 'active' : 'nav-item';
}

function Item($name,$icon,$title)
{
    echo '<li class="'.Item_Active($name).'">';
    echo '<a href="'.route($name).'">';
    echo $icon === '' ? '<i class="feather icon-circle"></i>' : $icon ;
    echo '<span class="menu-title">'.$title.'</span>';
    echo '</a>';
    echo '</li>';
}

function ItemsDrop($child,$title,$icon,$subTitle,$subIcon,$name)
{

    $permissions = Auth::user()->Role->routes;
    $permissions    = json_decode($permissions);
    echo '<li class=" nav-item">';
        echo '<a href="#">';
            echo $icon;
            echo '<span class="menu-title">'.$title.'</span>';
       echo '</a>';
        echo '<ul class="menu-content">';
            Item($name, $subIcon,$subTitle);
            foreach ($child as $ch)
            {
                $routes = Route::getRoutes();
                foreach ($routes as $value)
                {
                    if($value->getName() !== null && isset($value->getAction()['icon']))
                    {
                        if($value->getName() === $ch)
                        {
                            if(in_array($value->getName(), $permissions))
                            {
                                Item($value->getName(),$value->getAction()['icon'],$value->getAction()['title']);
                            }
                        }
                    }
                }
            }
        echo '</ul>';
    echo '</li>';
}


function menuAdmin()
{
	$routes = Route::getRoutes();
   for ($i = 1; $i < count($routes); $i++) {

        foreach ($routes as $value)
        {
            if($value->getName() !== null && isset($value->getAction()['title']) && isset($value->getAction()['icon']))
            {
                if(isset($value->getAction()['sort'])){
                    if($value->getAction()['sort'] == $i){
                        if(isset($value->getAction()['child']) && isset($value->getAction()['subTitle'])  && isset($value->getAction()['subIcon'])  && isset($value->getAction()['admin']))
                        {

                            ItemsDropAdmin(
                                $value->getAction()['child'],
                                $value->getAction()['title'],
                                $value->getAction()['icon'],
                                $value->getAction()['subTitle'],
                                $value->getAction()['subIcon'],
                                $value->getName()
                            );
                        }

                        if(!isset($value->getAction()['child']) && !isset($value->getAction()['subTitle'])  && !isset($value->getAction()['subIcon']) && isset($value->getAction()['admin']) && isset($value->getAction()['icon']) && !isset($value->getAction()['hasFather']))
                        {

                            ItemAdmin($value->getName(), $value->getAction()['icon'],$value->getAction()['title']);
                        }



                    }
                }
            }
        }
    }
}
function Item_ActiveAdmin($name)
{
    return Route::currentRouteName() === $name ? 'active' : 'nav-item';
}

function ItemAdmin($name,$icon,$title)
{
    echo '<li class="'.Item_ActiveAdmin($name).'">';
    echo '<a href="'.route($name).'">';
    echo $icon === '' ? '<i class="feather icon-circle"></i>' : $icon ;
    echo '<span class="menu-title">'.$title.'</span>';
    echo '</a>';
    echo '</li>';
}

function ItemsDropAdmin($child,$title,$icon,$subTitle,$subIcon,$name)
{


    echo '<li class=" nav-item">';
        echo '<a href="#">';
            echo $icon;
            echo '<span class="menu-title">'.$title.'</span>';
       echo '</a>';
        echo '<ul class="menu-content">';
            ItemAdmin($name, $subIcon,$subTitle);
            foreach ($child as $ch)
            {
                $routes = Route::getRoutes();
                foreach ($routes as $value)
                {
                    if($value->getName() !== null && isset($value->getAction()['admin']) && isset($value->getAction()['icon']))
                    {
                        if($value->getName() === $ch)
                        {

                            ItemAdmin($value->getName(),$value->getAction()['icon'],$value->getAction()['title']);
                        }
                    }
                }
            }
        echo '</ul>';
    echo '</li>';
}
