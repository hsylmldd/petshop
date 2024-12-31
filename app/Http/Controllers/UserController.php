<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.page.user.index', [
            'data' => User::latest()->get(),
            'title'=>'LIST USER'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.user.create',[
            'title'=>'TAMBAH USER'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:6',
            'kota' => 'required'
        ]);

        $validate['password'] = bcrypt($request->password);
        User::create($validate);


            return redirect('/dashboard/user')->with('success', 'User Berhasil Ditambahkan');
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('backend.page.user.edit', [
            'data' => User::find($id),
            'title'=>'EDIT USER'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'kota' => 'required'
        ]);

        if ($request->password) {
            $validate['password'] = bcrypt($request->password);
        } else {
            unset($validate['password']); // Jangan update password jika tidak diisi
        }

        $user->update($validate);

        return redirect('/dashboard/user')->with('success', 'User Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/dashboard/user')->with('success', 'User Berhasil Dihapus');
    }


    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function loginAction(Request $request)
    {
        $validate = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($validate))
        {
            if(Auth::user()->role=="admin")
            {
                return redirect('/dashboard')->with('success','Welcome to Admin');
            }
            return redirect('/')->with('success','Berhasil Login');
        }

        return back()->with('failed','Email Atau Password Salah');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registerAction(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:6',
            'kota' => 'required'
        ]);

        $validate['password'] = bcrypt($request->password);
        User::create($validate);

        return redirect('/login')->with('success', 'Berhasil Register');
    }
}
