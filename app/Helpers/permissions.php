<?php
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

function Permissions()
{
	$routes = Route::getRoutes();
	foreach ($routes as $key_father => $value)
	{
		if($value->getName() !== null)
		{
			if(isset($value->getAction()['title']) && !isset($value->getAction()['admin']))
			{
                if(isset($value->getAction()['child']) )
                {
                    echo '<div class="col-4">';
                        echo '  <div class="card">';
                            echo ' <div class="card-header">';
                            echo '<h4 class="card-title">';
                            echo '<fieldset>';
                            echo ' <div class="vs-checkbox-con vs-checkbox-success">';
                            echo '  <input type="checkbox" class="father" data-id="'.$key_father.'" >';
                            echo '  <span class="vs-checkbox">';
                            echo '       <span class="vs-checkbox--check">';
                            echo '           <i class="vs-icon feather icon-check"></i>';
                            echo '          </span>';
                            echo '             </span>';
                            echo '          <span class="">'.$value->getAction()['title'].'</span>';
                            echo '      </div>';
                            echo '    </fieldset>';
                            echo '  </h4>';
                            echo ' </div>';

                            echo '  <div class="card-content">';
                            echo ' <div class="card-body">';
                            echo '   <ul class="list-unstyled mb-0">';
                            echo '      <li class="d-block mr-2">';
                            echo '        <fieldset>';
                            echo '             <div class="vs-checkbox-con vs-checkbox-primary">';
                            echo '                  <input type="checkbox" class="permission child'.$key_father.'" name="permission[]" id="checkboxPrimary'.$key_father.'" value="'.$value->getName().'">';
                            echo '                   <span class="vs-checkbox">';
                            echo '                    <span class="vs-checkbox--check">';
                            echo '                       <i class="vs-icon feather icon-check"></i>';
                            echo '                    </span>';
                            echo '                  </span>';
                            echo '                  <span class="">' .$value->getAction()['title'].'</span>';
                            echo '               </div>';
                            echo '         </fieldset>';
                            echo '       </li>';




                                foreach ($value->getAction()['child'] as $child)
                                {
                                    # foreach for child links
                                    $routes = Route::getRoutes();
                                    foreach ($routes as $key => $route)
                                    {
                                        if($route->getName() == $child)
                                        {

                                            echo '      <li class="d-block mr-2">';
                                            echo '        <fieldset>';
                                            echo '             <div class="vs-checkbox-con vs-checkbox-primary">';
                                            echo '                  <input type="checkbox" class="permission child'.$key_father.'" name="permission[]" id="checkboxPrimary'.$key.'" value="'.$route->getName().'">';
                                            echo '                   <span class="vs-checkbox">';
                                            echo '                    <span class="vs-checkbox--check">';
                                            echo '                       <i class="vs-icon feather icon-check"></i>';
                                            echo '                    </span>';
                                            echo '                  </span>';
                                            echo '                  <span class="">' .$route->getAction()['title'].'</span>';
                                            echo '               </div>';
                                            echo '         </fieldset>';
                                            echo '       </li>';

                                        }
                                    }
                                }
                                echo '   </ul>';
                                echo ' </div>';
                            echo '  </div>';
                        echo '</div>';
                    echo '</div>';
                }elseif(!isset($value->getAction()['child']) && isset($value->getAction()['icon']) && !isset($value->getAction()['hasFather'])){

                    echo '<div class="col-4">';
                    echo '  <div class="card">';
                        echo ' <div class="card-header">';
                        echo '<h4 class="card-title">';
                        echo '<fieldset>';
                        echo ' <div class="vs-checkbox-con vs-checkbox-success">';

                        echo '  <span class="vs-checkbox">';
                        echo '       <span class="vs-checkbox--check">';
                        echo '           <i class="vs-icon feather icon-check"></i>';
                        echo '          </span>';
                        echo '             </span>';
                        echo '          <span class="">'.$value->getAction()['title'].'</span>';
                        echo '      </div>';
                        echo '    </fieldset>';
                        echo '  </h4>';
                        echo ' </div>';

                        echo '  <div class="card-content">';
                        echo ' <div class="card-body">';
                        echo '   <ul class="list-unstyled mb-0">';
                        echo '      <li class="d-block mr-2">';
                        echo '        <fieldset>';
                        echo '             <div class="vs-checkbox-con vs-checkbox-primary">';
                        if($value->getName() === 'admin.home')
                        {
                            echo '  <input type="checkbox" checked class="father" data-id="'.$key_father.'" >';
                        }else{
                            echo '  <input type="checkbox" class="father" data-id="'.$key_father.'" >';
                        }
                        echo '                   <span class="vs-checkbox">';
                        echo '                    <span class="vs-checkbox--check">';
                        echo '                       <i class="vs-icon feather icon-check"></i>';
                        echo '                    </span>';
                        echo '                  </span>';
                        echo '                  <span class="">' .$value->getAction()['title'].'</span>';
                        echo '               </div>';
                        echo '         </fieldset>';
                        echo '       </li>';
                        echo '   </ul>';
                        echo ' </div>';
                        echo '  </div>';
                        echo '</div>';
                    echo '</div>';
                }
            }
        }
	}
}

function EditPermissions($id)
{


    $roles = Role::where('id',$id)->first();
    $permissions = $roles->routes;
    $current_permission    = json_decode($permissions);

    $routes = Route::getRoutes();
    foreach ($routes as $key_father => $value)
    {
        if($value->getName() !== null)
        {
            if(isset($value->getAction()['title']) && !isset($value->getAction()['admin']))
            {
                if(isset($value->getAction()['child']) )
                {
                    echo '<div class="col-4">';
                    echo '  <div class="card">';
                        echo ' <div class="card-header">';
                        echo '<h4 class="card-title">';
                        echo '<fieldset>';
                        echo ' <div class="vs-checkbox-con vs-checkbox-success">';
                        echo ' <div class="vs-checkbox-con vs-checkbox-success">';
                        echo '<input type="checkbox" class="father" data-id="'.$key_father.'" style="float: right;margin-left: 5px;">';
                        echo '  <span class="vs-checkbox">';
                        echo '       <span class="vs-checkbox--check">';
                        echo '           <i class="vs-icon feather icon-check"></i>';
                        echo '          </span>';
                        echo '             </span>';
                        echo '          <span class="">'.$value->getAction()['title'].'</span>';
                        echo '      </div>';
                        echo '    </fieldset>';
                        echo '  </h4>';
                        echo ' </div>';
                        echo '  <div class="card-content">';
                        echo ' <div class="card-body">';
                        echo '   <ul class="list-unstyled mb-0">';
                        echo '      <li class="d-block mr-2">';
                        echo '        <fieldset>';
                        echo '             <div class="vs-checkbox-con vs-checkbox-primary">';
                        if(in_array($value->getName(),$current_permission))
                        {
                            echo '<input type="checkbox" checked="" class="permission child'.$key_father.'" name="permission[]" id="checkboxPrimary'.$key_father.'" value="'.$value->getName().'">';
                        }else{
                            echo '<input type="checkbox" class="permission child'.$key_father.'" name="permission[]" id="checkboxPrimary'.$key_father.'" value="'.$value->getName().'">';
                        }
                        echo '                   <span class="vs-checkbox">';
                        echo '                    <span class="vs-checkbox--check">';
                        echo '                       <i class="vs-icon feather icon-check"></i>';
                        echo '                    </span>';
                        echo '                  </span>';
                        echo '                  <span class="">' .$value->getAction()['title'].'</span>';
                        echo '               </div>';
                        echo '         </fieldset>';
                        echo '       </li>';



                                foreach ($value->getAction()['child'] as $child)
                                {
                                    # foreach for child links
                                    $routes = Route::getRoutes();
                                    foreach ($routes as $key => $route)
                                    {
                                        if($route->getName() == $child)
                                        {

                                            echo '      <li class="d-block mr-2">';
                                            echo '        <fieldset>';
                                            echo '             <div class="vs-checkbox-con vs-checkbox-primary">';
                                            if(in_array($route->getName(),$current_permission))
                                            {
                                                echo '<input type="checkbox" checked="" class="permission child'.$key_father.'" name="permission[]" id="checkboxPrimary'.$key.'" value="'.$route->getName().'">';
                                            }else{
                                                echo '<input type="checkbox" class="permission child'.$key_father.'" name="permission[]" id="checkboxPrimary'.$key.'" value="'.$route->getName().'">';
                                            }
                                            echo '                   <span class="vs-checkbox">';
                                            echo '                    <span class="vs-checkbox--check">';
                                            echo '                       <i class="vs-icon feather icon-check"></i>';
                                            echo '                    </span>';
                                            echo '                  </span>';
                                            echo '                  <span class="">' .$route->getAction()['title'].'</span>';
                                            echo '               </div>';
                                            echo '         </fieldset>';
                                            echo '       </li>';

                                        }
                                    }
                                }
                                echo '   </ul>';
                                echo ' </div>';
                            echo '  </div>';
                        echo '</div>';
                    echo '</div>';
                }elseif(!isset($value->getAction()['child']) && isset($value->getAction()['icon']) && !isset($value->getAction()['hasFather'])){
                    echo '<div class="col-4">';
                    echo '  <div class="card">';
                        echo ' <div class="card-header">';
                        echo '<h4 class="card-title">';
                        echo '<fieldset>';
                        echo ' <div class="vs-checkbox-con vs-checkbox-success">';

                        echo '  <span class="vs-checkbox">';
                        echo '       <span class="vs-checkbox--check">';
                        echo '           <i class="vs-icon feather icon-check"></i>';
                        echo '          </span>';
                        echo '             </span>';
                        echo '          <span class="">'.$value->getAction()['title'].'</span>';
                        echo '      </div>';
                        echo '    </fieldset>';
                        echo '  </h4>';
                        echo ' </div>';

                        echo '  <div class="card-content">';
                        echo ' <div class="card-body">';
                        echo '   <ul class="list-unstyled mb-0">';
                        echo '      <li class="d-block mr-2">';
                        echo '        <fieldset>';
                        echo '             <div class="vs-checkbox-con vs-checkbox-primary">';
                        if(in_array($value->getName(),$current_permission))
                        {
                            if($value->getName() === 'admin.home')
                            {
                                echo '<input type="checkbox" checked="" disabled class="permission" name="permission[]" id="checkboxPrimary'.$key_father.'" value="'.$value->getName().'">';
                            }else{
                                echo '<input type="checkbox" checked="" class="permission" name="permission[]" id="checkboxPrimary'.$key_father.'" value="'.$value->getName().'">';
                            }
                        }else{
                            echo '<input type="checkbox" class="permission" name="permission[]" id="checkboxPrimary'.$key_father.'" value="'.$value->getName().'">';
                        }
                        echo '                   <span class="vs-checkbox">';
                        echo '                    <span class="vs-checkbox--check">';
                        echo '                       <i class="vs-icon feather icon-check"></i>';
                        echo '                    </span>';
                        echo '                  </span>';
                        echo '                  <span class="">' .$value->getAction()['title'].'</span>';
                        echo '               </div>';
                        echo '         </fieldset>';
                        echo '       </li>';
                        echo '   </ul>';
                        echo ' </div>';
                        echo '  </div>';
                        echo '</div>';
                    echo '</div>';


                }
            }
        }
    }
}



#current route
function currentRoute()
{
    $routes = Route::getRoutes();
    foreach ($routes as $value)
    {
        if($value->getName() === Route::currentRouteName())
        {
            if(isset($value->getAction()['title']))
            {

                echo $value->getAction()['title'] ;
                # echo $value->getAction()['icon'] ;
            }
            // return $value->getAction() ;
        }
    }
}

function QuickAccess()
{
    $permissions = Auth::user()->Role->routes;
    $permissions    = json_decode($permissions);
	$routes = Route::getRoutes();
	foreach ($routes as $value)
	{
		if($value->getName() !== null)
		{
			if(isset($value->getAction()['q_a']))
            {
                if(in_array($value->getName(),$permissions))
                {
                    if(Route::currentRouteName() === $value->getName())
                    {
                        echo '<li class="breadcrumb-item"><a href="'.route($value->getName()).'">' . $value->getAction()['title'] .'</a></li>';
                    }else{
                        echo '<li class="breadcrumb-item"><a href="'.route($value->getName()).'">' . $value->getAction()['title'] .'</a></li>';
                    }
                }
            }
        }
    }
}

function QuickAccessAdmin()
{

	$routes = Route::getRoutes();
	foreach ($routes as $value)
	{
		if($value->getName() !== null)
		{
			if(isset($value->getAction()['q_a']) && isset($value->getAction()['admin']))
            {

                if(Route::currentRouteName() === $value->getName())
                {
                    echo '<li class="breadcrumb-item"><a href="'.route($value->getName()).'">' . $value->getAction()['title'] .'</a></li>';
                }else{
                    echo '<li class="breadcrumb-item"><a href="'.route($value->getName()).'">' . $value->getAction()['title'] .'</a></li>';
                }
            }
        }
    }
}
