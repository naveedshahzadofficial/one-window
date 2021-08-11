<?php
/**
 * Created by Naveed Shahzad.
 * User: naveed
 * Date: 28/05/2021
 * Time: 11:05 AM
 */

function getCollectionTitle($data, $key, $id){
    $row = $data->firstWhere('id', $id);
    return isset($row->{$key})?$row->{$key}:'';
}

if (!function_exists('isActiveRoute')) {

    function isActiveRoute($route, $output = "menu-item-active")
    {
        if (\Illuminate\Support\Facades\Route::currentRouteName() == $route) return $output;
    }

}

if (!function_exists('areActiveRoutes')) {

    function areActiveRoutes(Array $routes, $output = "menu-item-active menu-item-open")
    {
        foreach ($routes as $route)
        {
            if (\Illuminate\Support\Facades\Route::currentRouteName() == $route) return $output;
        }

    }
}
