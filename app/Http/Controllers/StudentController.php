<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                'sname'=>'required',
                'phone'=>'required',
            ]);

        $name=$request->sname;
        $rollnumber=$request->rollnumber;

        $check=student::where([
            ['phone', '=', $request->phone],

        ])->first();


        if(isset($check) && $check !="")
        {
            
            $request->session()->flash("status","Phone No is already added");
            return redirect('insert');
        }

        $phone=$request->phone;

        if($request->file('student_image'))
        {
        $student_image=$request->file('student_image');
        
        $extension=$student_image->getClientOriginalExtension();
        $filename=time().".".$extension;
        $student_image->move('img_upload/',$filename);
        }
        else
        {
            $filename='';
        }
        $student_obj= new student();
        $student_obj->name=$name;
        $student_obj->rollno=$rollnumber;
        $student_obj->phone=$phone;
        $student_obj->photo=$filename;
        
        $student_obj->save();
        $request->session()->flash("status","Record has been added");
        return redirect('view');
    }

   
    public function show(student $student)
    {
        
        // $data=student::all();
        // return view('data_view')->with('data',$data);
        $data['data']=student::all();
        return view('data_view',$data);
    }
   
    public function update(Request $request, student $student, $id)
    {
        $record_stud['record_student']= student::find($id);   
        
        $record_stud['title']="Update Page";
        return view('update_form',$record_stud);

    }
    
    public function edit(Request $request, student $student, $id)
    {

        $name=$request->sname;
        $rollnumber=$request->rollnumber;
        $phone=$request->phone;
        $student_image=$request->file('student_image');
        
        $record_stud= student::find($id);

       if(isset($student_image) && $student_image !='')
       {
        $extension=$student_image->getClientOriginalExtension();
        $filename=time().".".$extension;
        $student_image->move('img_upload/',$filename);
       }
       else
       {
        $filename=$record_stud->photo;
       }

        $record_stud->name=$name;
        $record_stud->rollno=$rollnumber;
        $record_stud->phone=$phone;
        $record_stud->photo=$filename;
        
        $record_stud->save();
        $request->session()->flash("status","Record has been Updated");
        return redirect('view');


    }

    
    public function destroy(Request $request, student $student,$id)
    {
        $record_stud= student::find($id);
        if(file_exists(public_path('img_upload/'.$record_stud->photo))){
            unlink(public_path('img_upload/'.$record_stud->photo));
        }

        student::destroy($id);
        $request->session()->flash("status","Record has been Deleted");
        return redirect('view');
    }
}
