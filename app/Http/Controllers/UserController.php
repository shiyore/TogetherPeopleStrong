<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Businesses\UserService;
use App\User;
use App\Models\AffinityModel;

class UserController
{
    public function checkAffinity(Request $request)
    {
        $serv = new UserService();
        $aff = $serv->checkAffinity($request->get('affinity'));
        return view("affinityAdd")->with("affinities", $aff);
    }
    
    public function addThisAffinity(Request $request)
    {
        $serv = new UserService();
        $uid = Auth::id();
        $serv->addThisAffinity($request->get('title'), $uid);
        return view("affinityAdd");
    }
    
    public function getAllAffinities(Request $request)
    {
        $serv = new UserService();
        $aff = $serv->getAllAffinities();
        return view("affinityView")->with($affinities, $aff);
    }
    
    public function viewAffinity(Request $request)
    {
        $affinity = new AffinityModel($request->get('id'), $request->get('title'));
        $serv = new UserService();
        $users = $serv->getAffinityUsers($request->get('id'));
        return view("affinityDetails")->with("users", $users);
    }
}

