<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function getMenuHome(){
        return array(
            'title' => 'Home',
            'route' => '/home',
            'active' => true
        );
    }

    public function getMenuAdmin(){
        return array(
            'title' => 'Admin',
            'route' => '/admin',
            'active' => false
        );
    }

    function getMenus() {
        $currentRole = auth()->guard('api')->user()->role;                
        if($currentRole == 1){ //normalUser
            $menus_array = array($this->getMenuHome());
        } else if($currentRole == 2) { //admin
            $menus_array = array($this->getMenuHome(), $this->getMenuAdmin());
        }
        return $menus_array;
    }

}
