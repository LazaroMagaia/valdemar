<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vagas_candidatura;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\Vagas;

class ClientController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['candidaturas'] = vagas_candidatura::where('user_id', $data['user']->id)->count();
        $data['candidaturas_aprovadas'] = vagas_candidatura::where('user_id', $data['user']->id)
        ->where('status','Aprovada')->count();
        $data['profile'] = UserProfile::where('user_id', $data['user']->id)->first();
        return view('Backend.client.index',$data);
    }
    public function perfil()
    {
        $data['user'] = Auth::user();
        $data['profile'] = UserProfile::where('user_id', $data['user']->id)->first();
        return view('Backend.client.perfil',$data);
    }
    public function applied_candidates()
    {
        $data['user'] = Auth::user();
        $data['candidaturas'] = vagas_candidatura::where('user_id', $data['user']->id)
        ->with('vaga')->get();
        return view('Backend.client.applied_candidates',$data);
    }
}
