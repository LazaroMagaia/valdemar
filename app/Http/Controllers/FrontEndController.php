<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Vagas;
class FrontEndController extends Controller
{
    public function home()
    {
        // Filtra as vagas para garantir que o 'end_date' seja até hoje
        $data['vagas'] = Vagas::with('category', 'company')
            ->whereDate('expiration_date', '<=', now()) 
            ->orderBy('id', 'desc')
            ->get();
        $data['vagas_recentes'] = Vagas::with('category', 'company')
            ->whereDate('expiration_date', '>=', now()) 
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $data['categories'] = Categories::all();
        foreach ($data['categories'] as $category) {
            $category->vagas = $category->vagas()
                ->whereDate('expiration_date', '>=', now()) 
                ->get();
            $category->icon = $category->icon ?: 'fa-solid fa-user';
        }
            
        return view('frontend.home', $data);
    }
    
    public function show($id)
    {
        $data['vaga'] = Vagas::where('id',$id)->with('category','company','funcoes','requisitos')->first();
        return view('frontend.show',$data);
    }

    public function showVagas(Request $request)
    {
        $request->validate([
            'categorie' => 'nullable|exists:categories,id',
            'vaga' => 'nullable|string|max:255',
        ]);
    
        $query = Vagas::query();
    
        // Filtrar pela categoria, se fornecida
        if ($request->filled('categorie')) {
            $query->where('category_id', $request->categorie);
        }
    
        // Filtrar pelo nome da vaga, se fornecido
        if ($request->filled('vaga')) {
            $query->where('name', 'like', '%' . $request->vaga . '%');
        }
    
        // Filtrar pela data de término para garantir que seja até hoje
        $query->whereDate('expiration_date', '>=', now());  // "now()" retorna a data atual

        // Obtenha os resultados da pesquisa
        $vagas = $query->get();
        $data['vagas'] = $vagas;
    
        return view('frontend.search_vaga', $data);
    }
    
    public function notPermited()
    {
        return view('Backend.errors.permissions');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
