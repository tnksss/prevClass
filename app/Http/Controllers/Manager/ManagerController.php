<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('manager.home',compact('manager'));
    }
    
    public function profile()
    {
        $manager = Auth::guard('manager')->user();
        return view('manager.profile', compact('manager'));
    }
        
    public function profileUpdate(Request $request)
    {
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
}
