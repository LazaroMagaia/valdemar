<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagas;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\vaga_funcoes;
use App\Models\Vaga_requirements;
use App\Models\vagas_candidatura;
class CompanyController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['vagas'] = Vagas::where('company_id', $data['user']->id)->get();
        $data['vaga_total'] = Vagas::where('company_id', $data['user']->id)->count();
        $totalCandidaturas = 0;
        foreach ($data['vagas'] as $vaga) {
            $totalCandidaturas += vagas_candidatura::where('vaga_id', $vaga->id)->count();
        }
        $data['total_candidaturas'] = $totalCandidaturas;
        return view('Backend.company.index',$data);
    }
    public function vagas()
    {
        $user =Auth::user();
        $data['vagas'] = Vagas::where('company_id', $user->id)->with('category','company')->get();
        $data['categories'] = Categories::all();
        return view('Backend.company.vagas.index',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'salary' => 'required',
            'contract_type' => 'required',
            'address' => 'required',
            'category_id' => 'required',
            'expiration_date' => 'required',
            'provincia' => 'required',
        ]);
        $user = Auth::user();
        $vagas = new Vagas();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('jobs/images', 'public');
            $vagas->image = $imagePath;
        }

        $vagas->name = $request->name;
        $vagas->description = $request->description;
        $vagas->salary = $request->salary;
        $vagas->contract_type = $request->contract_type;
        $vagas->address = $request->address;
        $vagas->company_id = $user->id;
        $vagas->category_id = $request->category_id;
        $vagas->expiration_date = $request->expiration_date;
        $vagas->provincia = $request->provincia;
        $vagas->save();
        if ($vagas) {
            return redirect()->back()->with('success', 'Vaga cadastrada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao cadastrar vaga');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'salary' => 'required',
            'contract_type' => 'required',
            'address' => 'required',
            'category_id' => 'required',
            'expiration_date' => 'required',
        ]);
        $vagas = Vagas::find($id);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('jobs/images', 'public');
            $vagas->image = $imagePath;
        }
        $vagas->name = $request->name;
        $vagas->description = $request->description;
        $vagas->salary = $request->salary;
        $vagas->contract_type = $request->contract_type;
        $vagas->address = $request->address;
        $vagas->category_id = $request->category_id;
        $vagas->expiration_date = $request->expiration_date;
        $vagas->provincia = $request->provincia;
        $vagas->save();
        if ($vagas) {
            return redirect()->back()->with('success', 'Vaga atualizada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar vaga');
        }
    }
    public function destroy($id)
    {
        $vagas = Vagas::find($id);
        $vagas->delete();
        if ($vagas) {
            return redirect()->back()->with('success', 'Vaga deletada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao deletar vaga');
        }
    }

    /**
     * Funcoes
     **/
    public function show($id)
    {
        $data['vaga'] = Vagas::find($id);
        $data['funcoes'] = vaga_funcoes::where('vaga_id', $id)->get();
        $data['requisitos'] = Vaga_requirements::where('vaga_id', $id)->get();
        return view('Backend.company.vagas.show.index',$data);
    }
    public function funcaoStore(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $funcao = new vaga_funcoes();
        $funcao->description = $request->description;
        $funcao->vaga_id = $request->vaga_id;
        $funcao->save();
        if ($funcao) {
            return redirect()->back()->with('success', 'Função cadastrada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao cadastrar função');
        }
    }
    public function funcaoUpdate(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $funcao = vaga_funcoes::find($request->funcao_id);
        $funcao->description = $request->description;
        $funcao->save();
        if ($funcao) {
            return redirect()->back()->with('success', 'Função atualizada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar função');
        }
    }
    public function funcaoDestroy($id)
    {
        $funcao = vaga_funcoes::find($id);
        $funcao->delete();
        if ($funcao) {
            return redirect()->back()->with('success', 'Função deletada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao deletar função');
        }
    }

    public function RequirementStore(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $requisito = new Vaga_requirements();
        $requisito->description = $request->description;
        $requisito->vaga_id = $request->vaga_id;
        $requisito->save();
        if ($requisito) {
            return redirect()->back()->with('success', 'Função cadastrada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao cadastrar função');
        }
    }
    public function RequirementUpdate(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $requisito = Vaga_requirements::find($request->requisito_id);
        $requisito->description = $request->description;
        $requisito->save();
        if ($requisito) {
            return redirect()->back()->with('success', 'Função atualizada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar função');
        }
    }
    public function RequirementDestroy($id)
    {
        $requisito = Vaga_requirements::find($id);
        $requisito->delete();
        if ($requisito) {
            return redirect()->back()->with('success', 'Função deletada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao deletar função');
        }
    }

    public function candidates($id)
    {
        $data['vaga'] = Vagas::find($id);
        $data['candidatos'] = vagas_candidatura::where('vaga_id', $id)->with('user.profile')->get();
        return view('Backend.company.candidatos.index',$data);
    }
    public function candidateStatus($id,Request $request)
    {
        $candidato = vagas_candidatura::find($id);
        $candidato->status = $request->status;
        $candidato->save();
        if ($candidato) {
            return redirect()->back()->with('success', 'Status do candidato alterado com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao alterar status do candidato');
        }
    }
}
