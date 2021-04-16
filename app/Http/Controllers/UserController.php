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
    
    public function addThisAffinity()
    {
        $serv = new UserService();
        $uid = Auth::id();
        if ($serv->addThisAffinity(session()->get('affId'), $uid))
        {
            $affinity = $serv->getAffinity(session()->get('affId'));
            $users = $serv->getUsersFromAffinity(session()->get('affId'));
            session()->put('affId', $affinity->getId());
            return view("affinityDetails")->with(["users" => $users, "affinity"=> $affinity, "joined" => true]);
        }
        return $this->viewAffinity(session()->get('affId'));
    }
    
    public function removeThisAffinity()
    {
        $serv = new UserService();
        $uid = Auth::id();
        if ($serv->removeThisAffinity(session()->get('affId'), $uid))
        {
            $affinity = $serv->getAffinity(session()->get('affId'));
            $users = $serv->getUsersFromAffinity(session()->get('affId'));
            session()->put('affId', $affinity->getId());
            return view("affinityDetails")->with(["users" => $users, "affinity"=> $affinity, "joined" => false]);
        }
        return $this->viewAffinity(session()->get('affId'));
    }
    
    public function getAllAffinities(Request $request)
    {
        $serv = new UserService();
        $aff = $serv->getAllAffinities();
        return view("affinityView")->with("affinities", $aff);
    }
    
    public function viewAffinity($id)
    {
        $serv = new UserService();
        $affinity = $serv->getAffinity($id);
        $joined = $serv->checkIfJoined($id);
        $users = $serv->getUsersFromAffinity($id);
        session()->put('affId', $affinity->getId());
        return view("affinityDetails")->with(["users" => $users, "affinity"=> $affinity, "joined" => $joined]);
    }
}

