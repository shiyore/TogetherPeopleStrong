<?php
/*
 * Project: TogetherPeopleStrong ver.5
 * @author: Aiden Yoshioka
 * Module: Admin ver. 3 and Job Postings ver. 1
 * Date: 04/18/21
 * Synopsis: The controller that deals with admin login, user administration, and job postings administration
 * References: This references the Admin Business Service for it's business logic.
 */
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\Businesses\SecurityService;
use App\Services\Businesses\UserService;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\Posting;
use App\Models\AffinityModel;

class AdminController extends Controller
{
    public function login(Request $request){
        
        $admin_user = new AdminModel(request()->get('user_name'),request()->get('password'));
        
        //instantiate bussiness service
        $service = new SecurityService();
        
        $isValid = $service->login($admin_user);
        if($isValid){
            session()->put("security","admin");
            return view('AdminPortal')->with('users', $service->getUsers());
        }else{
            return view('admin_login');
        }

    }
    
    //validation for a new job posting
    private function validate_job_posting(Request $request){
        //setup data validation rules for login form
        $rules = ['posting_title'=> 'Required | Between: 4, 15 ',
            'skills'=> 'Required | Between: 4, 60',
            'description'=> 'Required | Between: 20, 500'];
        $this->validate($request,$rules);
    }
    
    
    //this is to manage a user account through the admin portal
    public function manageUser(Request $request){
        $service = new SecurityService();
        //getting user data
        $user = new UserModel($request->get('name'), $request->get('email'),$request->get('password'),$request->get('ssn'));
        
        //if the edit button is pressed, the code below is run
        if($request->exists("suspend_button")){
            $service->suspendUser($user);
        }
        //if the delete button is pressed, the code below is run
        elseif($request->exists("delete_button")){
            $service->deleteUser($user);
        }
        return view('AdminPortal')->with('users', $service->getUsers());
    }
    
    public function editPostingRedirect(Request $request){
        $id = $request->get("id");
        
        //getting the posting from the ID
        $service = new SecurityService();
        $posting = $service->getPosting($id);
        
        return view('edit_posting')->with('posting',$posting);
    }
    
    public function updatePosting(Request $request){
        $posting = new Posting($request->get('id'),$request->get('posting_title'),$request->get('description'),$request->get('skills'));
        
        //updating the posting
        $service = new SecurityService();
        $posting = $service->updatePosting($posting);
        
        //returning to the page of all job postings
        $postings = $service->getPostings();
        return view('admin_postings')->with('postings',$postings);
    }
    
    //this is to handle new job postings
    public function newPosting(Request $request){
        $this->validate_job_posting($request);
        $title = $request->get('posting_title');
        $description = $request->get('description');
        $skills = $request->get('skills');
        
        $service = new SecurityService();
        $service->addPosting($title,$description,$skills);
        $postings = $service->getPostings();
       
        return view('admin_postings')->with('postings',$postings);
    }
    
    //redirect to verify if the admin wants to delete
    public function deleteRequest(Request $request){
        $id = $request->get('id');
        $service = new SecurityService();
        return view('DeleteConfirmation', ['posting' => $service->getPosting($id)[0]]);
    }
    public function deleteConfirmation(Request $request){
        $id = $request->get('id');
        $service = new SecurityService();
        if($request->exists("delete_button")){
            $service->deletePosting($id);
        }
        $postings = $service->getPostings();
        return view('admin_postings')->with('postings',$postings);
    }
    
    //determines whether the posting is being edited or deleted
    public function changePosting(Request $request){
        //if the edit button is pressed, the code below is run
        if($request->exists("delete_button")){
            return $this->deleteRequest($request);
        }
        //if the delete button is pressed, the code below is run
        else{
            return $this->editPostingRedirect($request);
        }
    }
    
    //returns the view to manage users
    public function viewUsers()
    {
        $serv = new SecurityService();
        return view('AdminPortal')->with('users', $serv->getUsers());
    }
    
    public function manageAffinity(Request $request)
    {
        if($request->exists("delete_button")){
            return $this->deleteAffinity($request);
        }
        //if the delete button is pressed, the code below is run
        else{
            return $this->editAffinityRedirect($request);
        }
    }
    
    public function deleteAffinity(Request $request)
    {
        $id = $request->get('id');
        $serv = new UserService();
        $serv->deleteAffinity($id);
        
        $affinities = $serv->getAllAffinities();
        return view('admin_affinities')->with('affinities', $affinities);
    }
    
    public function editAffinityRedirect(Request $request)
    {
        $id = $request->get('id');
        
        //getting the posting from the ID
        $serv = new UserService();
        $affinity = $serv->getAffinity($id);
        
        return view('edit_affinity')->with('affinity',$affinity);
    }
    
    public function updateAffinity(Request $request)
    {
        $affinity = new AffinityModel($request->get('id'), $request->get('title'));
        $serv = new UserService();
        $serv->updateAffinity($affinity);
        
        return $this->adminAffinities();
    }
    
    public function createAffinity (Request $request)
    {
        $title = $request->get('title');
        
        $serv = new UserService();
        $serv->createAffinity($title);
        $affinities = $serv->getAllAffinities();
        
        return view('admin_affinities')->with('affinities', $affinities);
    }
    
    public function adminAffinities()
    {
        $serv = new UserService();
        $affinities = $serv->getAllAffinities();
        return view('admin_affinities')->with('affinities', $affinities);
    }
    
}
