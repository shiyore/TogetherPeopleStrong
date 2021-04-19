<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Businesses\UserService;
use App\User;
use App\Models\AffinityModel;

class UserController
{
    public function editUserInfo(Request $request)
    {
        $uid = Auth::id();
        $serv = new UserService();
        $user = $serv->getUserModel($uid);
        if ($user->getSsn() == null || $user->getSsn() == "")
            $exists = true;
        else
            $exists = false;
        return view("editUserInfo")->with(["user" => $user, "exists" => $exists]);
    }
    public function processUserEdit(Request $request)
    {
        $serv = new UserService();
        $email = $request->get('email');
        $ssn = $request->get('ssn');
        $name = $request->get('name');
        $serv->addSsn($name, $email, $ssn);
        return view("home");
    }
    
    public function createAffinity(Request $request)
    {
        $serv = new UserService();
        $uid = Auth::id();
        $serv->createAffinity($request->get('title'), $uid);
        return $this->getAllAffinities($request);
    }
    
    //Join affinity
    public function addThisAffinity()
    {
        $serv = new UserService();
        $uid = Auth::id();
        if ($serv->addThisAffinity(session()->get('affId'), $uid))
        {
            $affinity = $serv->getAffinity(session()->get('affId'));
            $users = $serv->getUsersFromAffinity(session()->get('affId'));
            session()->put('affId', $affinity->getId());
            $owner = $affinity->getOwner() == Auth::id();
            return view("affinityDetails")->with(["users" => $users, "affinity"=> $affinity, "joined" => true, "owner" => $owner]);
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
            $owner = $affinity->getOwner() == Auth::id();
            return view("affinityDetails")->with(["users" => $users, "affinity"=> $affinity, "joined" => false, "owner" => $owner]);
        }
        return $this->viewAffinity(session()->get('affId'));
    }
    
    public function editThisAffinity()
    {
        $serv = new UserService();
        $aff = $serv->getAffinity(session()->get('affId'));
        return view("affinityEdit")->with("affinity", $aff);
    }
    
    public function processEdit(Request $request)
    {
        $serv = new UserService();
        $affID = $request->get('id');
        $title = $request->get('title');
        $aff = new AffinityModel($affID, $title, Auth::id());
        $serv->updateAffinity($aff);
        return $this->getAllAffinities($request);
    }
    
    public function deleteThisAffinity(Request $request)
    {
        $serv = new UserService();
        $serv->deleteAffinity(session()->get('affId'));
        return $this->getAllAffinities($request);
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
        $owner = $affinity->getOwner() == Auth::id();
        $users = $serv->getUsersFromAffinity($id);
        session()->put('affId', $affinity->getId());
        return view("affinityDetails")->with(["users" => $users, "affinity"=> $affinity, "joined" => $joined, "owner" => $owner]);
    }
}

