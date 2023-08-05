<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $reports = Report::where("idUsers", $user->id)->get();
        $reportNum = Report::where("idUsers", $user->id)->count();
        $reportSucc = Report::where("idUsers", $user->id)->where("idReportState", 2)->count();
        $reportNeg = Report::where("idUsers", $user->id)->where("idReportState", 3)->count();
        $users = User::all();

        return view('perfil', compact('user', 'users', 'reports', 'reportNum', 'reportSucc', 'reportNeg'));
    }

    
    public function update($id) {

        $user = User::findOrFail($id);
        
       $user->update(request()->validate([
            'name' => ['required', 'min:2', 'max:15'],
            'surname' => ['required', 'min:2', 'max:15'],
            'email' => ['required', 'email', 'max:30', Rule::unique('users')->ignore($user->id, 'id')],
        ]));

        return redirect('');
    }

    public function updateAdmin($id) {

       $user = User::findOrFail($id);
       $request = request();

       if($user->idUserType == 4){
            $request->request->add(['idUserType' => 4]);
       }else if($user->idUserType == 5){
            $request->request->add(['idUserType' => 5]);
       }
        
       $user->update(request()->validate([
            'name' => ['required', 'min:2', 'max:15'],
            'surname' => ['required', 'min:2', 'max:15'],
            'email' => ['required', 'email', 'max:30', Rule::unique('users')->ignore($user->id, 'id')],
            'idUserType' => ['required'],
        ]));
        return redirect('');

    }


    public function destroy($id) {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/login');
    }

    public function eliminarconta(Request $request, $id) {

        $user = User::findOrFail($id);

        $user->update(['idUserType' => 5]);

        Auth::logout();

        return redirect('/login');
    }

}
