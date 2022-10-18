<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    public function index()
    {
        //
        return view('login');
    }

    public function login(Request $request)
    {
        //
        $request->validate(
            [
                'name'=>'required',
                'phone'=>'required',
            ]);

            //$this->student->doLogin();
           /* $student1= new student();
            $check= $student1->doLogin($request);
*/
            $check=student::where([
                ['name', '=', $request->name],
                ['phone', '=', $request->phone],

            ])->first();

            if(isset($check) && $check !="")
            {

                $set_data = array(
                    'user_id'     			=> $check->id,
                    'user_name'     	    => $check->name,
                    'roll_no'     	        => $check->rollno,
                    'phone'     	        => $check->phone,
                    'logged_in' 			=> 'Front'
                );
                session($set_data);
            }
            else
            {
                $request->session()->flash("status","User does not exist");
                return redirect('login');
            }
            

            return redirect('home');
        }

    public function logout()
    {
        //
        session()->flush();
        return redirect('home');
    }

    
    public function store(Request $request)
    {
        //
        
    }

   
    public function show(student $student)
    {
        
    }
   
    public function update(Request $request, student $student, $id)
    {
       

    }
    
    public function edit(Request $request, student $student, $id)
    {

      


    }

    
    public function destroy(Request $request, student $student,$id)
    {
    }
}
