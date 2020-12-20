<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use App\Models\Group;
use App\Models\User;
use Validator;
use Illuminate\Validation\Rule;
use App;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request) {
        return view('user.index', ["users"=>User::all()]);
    }

    public function show(Request $request, $hashid=null) {
        if($hashid==null) {
            $user = Auth::user();
        } else if(!$user = User::firstWhere('id', decodeId($hashid))) {
            abort(404);
        }
        return view('user.show', ["user"=>$user, "quotes"=>Quote::where('user', $hashid)->get()]);
    }

    public function quotes(Request $request, $hashid=null) {
        if($hashid==null) {
            $user = Auth::user();
        } else if(!$user = User::firstWhere('id', decodeId($hashid))) {
            abort(404);
        }
        return view('user.quotes', ["user"=>$user, "quotes"=>Quote::where('user', $hashid)->get()]);
    }

    public function edit(Request $request) {
        return view('user.edit', ["user"=>Auth::user()]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', Rule::unique('users', 'name')->ignore($user->id)],
            'email' => ['required','string','max:255', Rule::unique('users','email')->ignore($user->id)],
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return redirect()->route('home')
            ->with(['status'=>'success', 'content'=>'Profil modifié']);
    }

    public function changeRole(Request $request, $hashid) {
        $validator = Validator::make($request->all(), [
            'role' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        if(!$user = User::firstWhere('id', decodeId($hashid))) {
            abort(404);
        }
        $user->role = request("role");
        $user->save();

        return redirect()->route('user.show', $user->hashid)
            ->with(['status'=>'success', 'content'=>'Niveau de rôle modifié']);
    }
}
