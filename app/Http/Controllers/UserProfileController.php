<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
class UserProfileController extends Controller
{

    public function userUpdate(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'bio' => 'nullable|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'province' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'profile_complete' => 'nullable|boolean',
            'education_level' => 'required|in:Básico,Médio,Técnico,Licenciatura,Mestrado,Doutorado',
        ],[
            'education_level.required' => 'O nível de instrução é obrigatório.',
            'education_level.in' => 'Selecione um nível de instrução válido.',
            'cv.mimes' => 'O CV deve estar nos formatos: PDF, DOC ou DOCX.',
            'cv.max' => 'O CV não pode ter mais que 10 MB.',
            'address.required' => 'O endereço é obrigatório.',
            'address.max' => 'O endereço não pode ter mais de 255 caracteres.',
            'phone.required' => 'O telefone é obrigatório.',
            'phone.max' => 'O telefone não pode ter mais de 20 caracteres.',
            'bio.string' => 'A biografia deve ser um texto válido.',
            'gender.required' => 'O gênero é obrigatório.',
            'birthdate.required' => 'A data de nascimento é obrigatória.',
            'birthdate.date' => 'A data de nascimento deve ser uma data válida.',
            'province.required' => 'A província é obrigatória.',
            'province.max' => 'A província não pode ter mais de 255 caracteres.',
            'city.max' => 'A cidade não pode ter mais de 255 caracteres.',
        ]);

        // Pegando o usuário autenticado
        $user = Auth::user();

        // Preparando os dados para inserir/atualizar
        $data = $request->only([
            'address',
            'phone',
            'bio',
            'gender',
            'birthdate',
            'province',
            'city',
            'education_level',
        ]);

        // Verifica se um arquivo de CV foi enviado
        if ($request->hasFile('cv')) {
            // Armazena o CV no diretório 'public/cv'
            $data['cv'] = $request->file('cv')->store('cv', 'public');
        }

        // Atualiza ou cria os dados no banco
        $updateOrCreate = UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            $data              
        );
        // Verifica se o perfil está completo
        $isComplete = $this->checkProfileCompletion($data);

        // Atualiza a coluna profile_complete
        $updateOrCreate->update(['profile_complete' => $isComplete]);

        if($updateOrCreate)
        {
            return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar o perfil!');
        }
    }

    private function checkProfileCompletion(array $data): bool
        {
            $requiredFields = ['address', 'phone', 'bio', 'gender', 'birthdate', 'province', 'city', 'cv'];
            foreach ($requiredFields as $field) {
                if (empty($data[$field])) {
                    return false;
                }
            }
            return true;
        }

}
