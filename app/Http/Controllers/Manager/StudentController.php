<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }
    
    public function index(){

        $students = Student::orderBy('name')->paginate(10);
        return view('manager.student.index',compact('students'));
    }

    public function create()
    {
        return view('manager.student.create', [
            'student' => new Student()
        ]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|between:2,100',
            'cgm'       => 'required|between:2,10',
            'bornDate'  => 'required',
            'avatar'    => 'image',
        ]);

        $fields = $request->only('name', 'cgm','bornDate','avatar');
        $fields['name'] = strtoupper($fields['name']);
        (new Student($fields))->save();
            return redirect()
                ->route('students.index')
                ->with('success', 'Aluno cadastrado com sucesso');
    }

    public function edit($id)
    {
        return view('manager.student.edit', [
            'student' => Student::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|between:2,100',
            'cgm' => 'required|between:2,10',
            'bornDate' => 'required'
        ]);

        $fields = $request->only('name', 'cgm', 'bornDate');
        $fields['name'] = strtoupper($fields['name']);
        Student::find($id)->fill($fields)->save();

        return redirect()
            ->route('students.index')
            ->with('success', 'Aluno atualizado com sucesso.');
    }
    
    public function destroy($id)
    {
        
        Student::destroy($id);
        return redirect()
            ->route('students.index')
            ->with('success', 'Aluno deletado com sucesso.');
    }}
