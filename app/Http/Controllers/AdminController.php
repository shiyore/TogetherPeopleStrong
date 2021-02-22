<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Businesses\SecurityService;
use App\Models\AdminModel;
use App\Models\UserModel;

class AdminController extends Controller
{
    public function login(Request $request){
        
        $admin_user = new AdminModel(request()->get('user_name'),request()->get('password'));
        
        //instantiate bussiness service
        $service = new SecurityService();
        
        $isValid = $service->login($admin_user);
        
        if($isValid){
            return view('AdminPortal')->with('users', $service->getUsers());
        }else{
            return view('admin_login');
        }
        /**
         * //put all form values into an array
         $formValues = $request->all();
         //get username
         $userName = request()->get('user_name');
         return $request->all();
         */
    }
    
    //validation for activity 3
    private function validate_form(Request $request){
        //setup data validation rules for login form
        $rules = ['user_name'=> 'Required | Between: 4, 10 | Alpha',
            'password'=> 'Required | Between: 4, 10'];
        $this->validate($request,$rules);
    }
    
    
    //this is to manage a user account through the admin portal
    public function manageUser(Request $request){
        $service = new SecurityService();
        //getting user data
        $user = new UserModel($request->get('name'), $request->get('email'),$request->get('password'));
        
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
    
    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    
    //use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('guest')->except('logout');
    //}
    
}
