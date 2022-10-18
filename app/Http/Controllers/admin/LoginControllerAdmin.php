<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Admin_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginControllerAdmin extends Controller
{
   
    public function index()
    {
        //
        return view('admin/login');
    }

    public function login(Request $request)
    {
       
        //
        $request->validate(
            [
                'name'=>'required',
                'password'=>'required',
            ]);

            //$this->student->doLogin();
           /* $student1= new student();
            $check= $student1->doLogin($request);
*/

           // $pass=md5($request->password);

            $check=Admin_user::where([
                ['admin_user_name', '=', $request->name],
                //['admin_password', '=', $request->password],
                ['admin_password_md5', '=', md5($request->password)],
                ['admin_status', '=', 'Active'],
            ])->first();

            if(isset($check) && $check !="")
            {

                $set_data = array(
                    'user_id'     			=> $check->admin_id,
                    'user_name'     	    => $check->admin_user_name,
                    'logged_in' 			=> 'Admin'
                );
                session($set_data);
                return redirect('admin/home');    
            }
            else
            {
                $request->session()->flash("status","Invalid Credentials");
                return redirect('admin/login');
            }
            

            return redirect('home');
        }

    
}
