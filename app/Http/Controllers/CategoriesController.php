<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
    public function index()
    {
        $data['categories'] = Categories::all();
        return view('Backend.admin.categories.index',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable',
        ]);
        $saveCategorie = Categories::create($request->all());
        if($saveCategorie)
        {
            return redirect()->route('admin.category.index')->with('success','Categoria criada com sucesso');
        }else
        {
            return redirect()->route('admin.category.index')->with('error','Categoria não criada');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable',
        ]);
        $updateCategorie = Categories::find($id)->update($request->all());
        if($updateCategorie)
        {
            return redirect()->route('admin.category.index')->with('success','Categoria atualizada com sucesso');
        }else
        {
            return redirect()->route('admin.category.index')->with('error','Categoria não atualizada');
        }
    }
    public function destroy($id)
    {
        $deleteCategorie = Categories::find($id)->delete();
        if($deleteCategorie)
        {
            return redirect()->route('admin.category.index')->with('success','Categoria deletada com sucesso');
        }else
        {
            return redirect()->route('admin.category.index')->with('error','Categoria não deletada');
        }
    }
}
