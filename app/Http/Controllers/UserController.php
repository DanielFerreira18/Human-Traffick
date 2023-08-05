<?php

namespace App\Http\Controllers;

use App\User;
use App\Report;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function show(User $user){
        $reports = Report::where("idUsers", $user->id)->get();
        $reportNum = Report::where("idUsers", $user->id)->count();
        $reportSucc = Report::where("idUsers", $user->id)->where("idReportState", 2)->count();
        $reportNeg = Report::where("idUsers", $user->id)->where("idReportState", 3)->count();

        return view('showUser', compact('user', 'reports', 'reportNum', 'reportSucc', 'reportNeg'));
    }

    public function updateSuspensao($id) {
        $user = User::findOrFail($id);


        if($user->idUserType <= 3){
            $user->update(['idUserType' => 4]);

        }elseif($user->idUserType == 4){
            $user->update(['idUserType' => 3]);
            
        }

        return redirect('');
    }

    public function updateEliminar($id) {

        $user = User::findOrFail($id);


        if($user->idUserType <= 3){
            $user->update(['idUserType' => 5]);

        }elseif($user->idUserType == 4){
            $user->update(['idUserType' => 5]);

        }elseif($user->idUserType == 5){
            $user->update(['idUserType' => 3]);
        }

        return redirect('');
    }

    public function settings(){
        $user = Auth::user();

        return view('editUser', compact('user'));
    }

    public function search()
    {
        $inputValue = request()->searchBarUser;
        $user = User::where('name','LIKE','%'. $inputValue .'%')->orWhere('email','LIKE','%'. $inputValue .'%')->orWhere('id', 'LIKE', '%'. $inputValue.'%')->get();

        if(count($user) > 0){
            return view('/searchUser')->withDetails($user)->withQuery($inputValue);
        }else{
            $collection = collect(null);
            return view ('/searchUser')->withDetails($collection);
        }
    }
    public function updatephoto(Request $request) {

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('editUser', array('user' => Auth::user()));
    }

    public function map(){
        $report = Report::all();
        $max = sizeof($report);

        return view('welcome', compact('report'));

    }
}
