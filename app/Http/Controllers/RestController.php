<?php
/*
 * Project: TogetherPeopleStrong ver.6
 * @author: Carson Perry
 * Module: RestAPI ver. 1
 * Date: 04/18/21
 * Synopsis: Controller for the Rest API, this is where Service calls, retrieval, DTO creation, and data returning is done.
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DTO;
use App\Services\Businesses\UserService;
use App\Services\Businesses\SecurityService;

class RestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serv = new UserService();
        
        $userArr = $serv->getAllUsers();
        
        if (count($userArr) != 0)
        {
            $dto = new DTO(0, "retrieved all users", $userArr);
        }
        else
        {
            $dto = new DTO(1, "no users found", $userArr);
        }
        return json_encode($dto);
    }
    
    public function show()
    {
        $serv = new UserService();
        
        $userArr = $serv->getAllUsers();
        
        if (count($userArr) != 0)
        {
            $dto = new DTO(0, "retrieved all users", $userArr);
        }
        else
        {
            $dto = new DTO(1, "no users found", $userArr);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
    
    /*public function show($id)
    {
        $serv = new UserService();
        $id = (int) $id;
        
        $user = $serv->getUser($id);
        
        if (!is_null($user))
        {
            $dto = new DTO(0, "found user", $user);
        }
        else
        {
            $dto = new DTO(1, "no user found", $user);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }*/
    
    public function users()
    {
        $serv = new UserService();
        
        $userArr = $serv->getAllUsers();
        
        if (count($userArr) != 0)
        {
            $dto = new DTO(0, "no error", $userArr);
        }
        else
        {
            $dto = new DTO(1, "no users found", $userArr);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
    
    public function getUser($id)
    {
        $serv = new UserService();
        
        $user = $serv->getUser($id);
        
        if (!is_null($user))
        {
            $dto = new DTO(0, "no error", $user);
        }
        else
        {
            $dto = new DTO(1, "no user found", $user);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
    
    public function getUsersFromAffinity($id)
    {
        $serv = new UserService();
        
        $users = $serv->getUsersFromAffinity($id);
        
        if (!is_null($users))
        {
            $dto = new DTO(0, "no error", $users);
        }
        else
        {
            $dto = new DTO(1, "no user found for given affinity group", $users);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
    
    public function postings()
    {
        $serv = new SecurityService();
        
        $postings = $serv->getPostings();
        
        if (!is_null($postings))
        {
            $dto = new DTO(0, "no error", $postings);
        }
        else
        {
            $dto = new DTO(1, "no job postings found", $postings);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
    
    public function postingsByName($name)
    {
        $serv = new SecurityService();
        
        $postings = $serv->getPostingsByName($name);
        
        if (!is_null($postings))
        {
            $dto = new DTO(0, "no error", $postings);
        }
        else
        {
            $dto = new DTO(1, "no job posts found similar to given name", $postings);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
    
    public function postingsById($id)
    {
        $serv = new SecurityService();
        
        $posting = $serv->getPosting($id);
        
        if (!is_null($posting))
        {
            $dto = new DTO(0, "no error", $posting);
        }
        else
        {
            $dto = new DTO(1, "no job posts found for the given ID", $posting);
        }
        return json_encode($dto, JSON_PRETTY_PRINT);
    }
}
