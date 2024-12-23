<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vagas_candidatura;
use Illuminate\Support\Facades\Auth;
class VagasController extends Controller
{
    public function store(Request $request, $id)
    {
       
        $request->validate([
            'cover_letter' => 'nullable|string|max:1000',
        ]);
        $user = Auth::user();
        if(!$user)
        {
            session(['vaga_id' => $id]);
            return redirect()->route('login')
            ->with('error', 'Você precisa estar logado para se candidatar a uma vaga!');   
        }
        if($user->role == 'admin')
        {
            return redirect()->back()->with('error', 'Administradores não podem se candidatar a vagas!');
        }elseif($user->role == 'company')
        {
            return redirect()->back()->with('error', 'Empresas não podem se candidatar a vagas!');
        }else
        {
            $candidatura = vagas_candidatura::where('vaga_id', $id)->where('user_id', $user->id)->first();
            if($candidatura)
            {
                return redirect()->back()->with('error', 'Você já se candidatou a esta vaga!');
            }
        }
        // Criar nova candidatura
        $vaga = vagas_candidatura::create([
            'vaga_id' => $id,
            'user_id' => Auth::user()->id,
            'status' => 'Pendente',
        ]);
        if ($vaga) {
            return redirect()->back()->with('success', 'Candidatura enviada com sucesso!');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao enviar a candidatura!');
        }
    }
}
