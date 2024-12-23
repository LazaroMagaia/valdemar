@foreach($candidatos as $candidato)
<div id="VerUsuario{{$candidato->user->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold mb-4">Detalhes do Usuário</h2>
            <button class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>   

        <div class="grid grid-cols-12 gap-5">
                
            <!-- Nome do Usuário -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->name }}</div>
                </div>
            </div>

            <!-- Email do Usuário -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->email }}</div>
                </div>
            </div>

            <!-- Endereço do Usuário -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->profile->address ?? 'Não fornecido' }}</div>
                </div>
            </div>

            <!-- Telefone do Usuário -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->profile->phone ?? 'Não fornecido' }}</div>
                </div>
            </div>

            <!-- Gênero do Usuário -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gênero</label>
                    <div class="mt-1 text-gray-800">
                        @if($candidato->user->profile->gender)
                            @if($candidato->user->profile->gender == 'male')
                                Masculino
                            @elseif($candidato->user->profile->gender == 'female')
                                Feminino
                            @else
                                {{ $candidato->user->profile->gender }}
                            @endif
                        @else
                            Não especificado
                        @endif
                    </div>
                </div>
            </div>


            <!-- Data de Nascimento do Usuário -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->profile->birthdate ?? 'Não fornecido' }}</div>
                </div>
            </div>

             <!-- Data de Nascimento do Usuário -->
             <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Idade</label>
                    <div class="mt-1 text-gray-800">
                    @if($candidato->user->profile->birthdate)
                            {{ \Carbon\Carbon::parse($candidato->user->profile->birthdate)->age }} anos
                        @else
                            Não fornecido
                        @endif
                    </div>
                </div>
            </div>
          
            <!-- Nível de Instrução -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="education_level" class="block text-sm font-medium text-gray-700">Nível de Instrução</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->profile->education_level ?? 'Não fornecido' }}</div>
                </div>
            </div>

            <!-- Província -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="province" class="block text-sm font-medium text-gray-700">Província</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->profile->province ?? 'Não fornecido' }}</div>
                </div>
            </div>

            <!-- Cidade -->
            <div class="col-span-12 sm:col-span-6">
                <div class="form-group mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                    <div class="mt-1 text-gray-800">{{ $candidato->user->profile->city ?? 'Não fornecido' }}</div>
                </div>
            </div>

            <!-- Botão de Fechar Modal -->
            <div class="col-span-12 flex justify-end">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md modal-close"
                >Fechar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
