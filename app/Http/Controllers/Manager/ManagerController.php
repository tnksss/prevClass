<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Enrollment;
use App\Models\Supply;
use App\Models\Concept;

use Auth;


class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = Auth::guard('manager')->user();
        $enrollments = Enrollment::join('grades','grades.id','=','enrollments.grade_id')
                                 ->join('courses','courses.id','=', 'grades.course_id')
                                 ->where('courses.unity_id', $manager->unity_id)
                                 ->get();
                                         
        $grades = Grade::join('courses','courses.id','=', 'grades.course_id')
                        ->where('courses.unity_id', $manager->unity_id)
                        ->get();

        $supplies = Supply::join('grades', 'grades.id','=','supplies.grade_id')
                                 ->join('courses','courses.id','=', 'grades.course_id')
                                 ->where('courses.unity_id', $manager->unity_id)
                                 ->get();

        $concepts = Concept::join('enrollments', 'enrollments.id','=','concepts.enrollment_id')
                                 ->join('grades','grades.id','=','enrollments.grade_id')
                                 ->join('courses','courses.id','=', 'grades.course_id')
                                 ->where('courses.unity_id', $manager->unity_id)
                                 ->get();
                            
        return view('manager.home',compact('manager','grades', 'enrollments','supplies','concepts'));
    }
    
    public function profile()
    {
        $manager = Auth::guard('manager')->user();
        return view('manager.profile', compact('manager'));
    }
        
    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $manager = Auth::guard('manager')->user();
        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $data['avatar'] = $manager->avatar;
        
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid())
        {               
            $avatarName = $manager->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $data['avatar'] = $avatarName;
            $upload = $request->avatar->storeAs('managers', $avatarName);
            if (!$upload)
            {
                return redirect()
                            ->back()
                            ->with('error', 'Falhou ao fazer upload de imagem.');    
            }
        }

        $update = $manager->update($data);
        
        if($update)
            return redirect()
                        ->route('manager.profile')
                        ->with('success', 'Sucesso ao atualizar');
        return redirect()
                        ->back()
                        ->with('error', 'Falhou ao atualizar o perfil');
    }
    public function myUnity()
    {
        $manager = Auth::guard('manager')->user();
        $unity = $manager->unity;
        
        return view('manager.unity.show',compact('unity'));
    }
}
