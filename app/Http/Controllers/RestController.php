<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DTO;
use App\Services\Businesses\UserService;

class RestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    
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
}
