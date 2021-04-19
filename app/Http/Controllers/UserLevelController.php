<?php
/*
 * Project: TogetherPeopleStrong ver.5
 * @author: Aiden Yoshioka
 * Module: Job Postings ver. 2
 * Date: 04/18/21
 * Synopsis: This controller handles the user side of job postings for viewing, searching, and applying to these postings.
 * References: This references the existing SecurityBusinessService, and uses the User and Posting models that are returned from the service.
 */
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\Businesses\SecurityService;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\Posting;

class UserLevelController extends Controller
{
    
    //returns the view to manage users
    public function viewPosting($id)
    {
        $serv = new SecurityService();
        $applied = $serv->checkApplied(Auth::id(), $id);
        return view('viewPosting')->with(['posting'=> $serv->getPosting($id)[0], 'id' => $id , 'applied'=>$applied]);
    }
    
    //applies for job
    public function addApplication(Request $request){
        $serv = new SecurityService();
        $serv->addApplication($request->get('user_id'),$request->get('posting_id'));
        return view('viewPosting')->with(['posting'=> $serv->getPosting($request->get('posting_id'))[0], 'id' => $request->get('posting_id'), 'applied' => true]);
    }
    
    //searching for job postings
    public function searchPostings(Request $request){
        $serv = new SecurityService();
        return view('viewPostings')->with(['postings'=> $serv->search_postings($request->get('posting_search'))]);
    }
    
}
