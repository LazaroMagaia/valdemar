<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(!$user)
        {
            return redirect()->route('login');
        }
        $data['users'] = User::count();
        $data['categories'] = Categories::count();
        return view('Backend.admin.index',$data);
    }
    public function painelControle()
    {
        $user = Auth::user();
        if(!$user)
        {
            return redirect()->intended(route('login', absolute: false));
        }
        if ($user->role =='admin') {
            return redirect()->intended(route('admin.index', absolute: false));
        }elseif ($user->role =='user') {
            return redirect()->intended(route('client.index', absolute: false));
        }elseif ($user->role =='company') {
            return redirect()->intended(route('company.index', absolute: false));
        }
    }
    public function userIndex()
    {
        $user = Auth::user();
        if(!$user)
        {
            return redirect()->intended(route('login', absolute: false));
        }
        $data['users'] = User::all();
        return view('Backend.admin.users.index',$data);
    }
    public function userStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->back()->with('success', 'Usuário criado com sucesso');
    }
    public function userUpdate($id,Request $request)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Usuário atualizado com sucesso');
    }
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Usuário deletado com sucesso');
    }
}
