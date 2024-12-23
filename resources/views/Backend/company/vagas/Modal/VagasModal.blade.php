<!-- Modal -->
<div id="createVaga" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Nova Vaga</h2>
        <form action="{{route('company.vagas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-5">
                
                <!-- Título da Vaga -->
                <div class="col-span-12 md:col-span-6">
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título da Vaga
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="titulo" name="name" value="{{ old('name') }}" class="form-control 
                        mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring
                        focus:ring-indigo-200" 
                        placeholder="Ex.: Desenvolvedor Full Stack" required>
                </div>

                <!-- Salário -->
                <div class="col-span-12 md:col-span-6">
                    <label for="salario" class="block text-sm font-medium text-gray-700">Salário</label>
                    <input type="number" step="0.01" id="salario" name="salary" value="{{ old('salary') }}" 
                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Ex.: 5000.00">
                </div>

                <!-- Tipo de Contrato -->
                <div class="col-span-12 md:col-span-6">
                    <label for="tipo_contrato" class="block text-sm font-medium text-gray-700">Tipo de Contrato
                        <span class="text-red-500">*</span>
                    </label>
                    <select id="tipo_contrato" name="contract_type" class="form-control mt-1 block 
                        w-full border border-gray-300  rounded-md shadow-sm focus:ring 
                        focus:ring-indigo-200" required>
                        <option value="" disabled {{ old('contract_type') ? '' : 'selected' }}>Selecione um tipo</option>
                        <option value="Tempo_Integral" 
                            {{ old('contract_type') == 'Tempo Integral' ? 'selected' : '' }}>
                            Tempo Integral
                        </option>
                        <option value="Part-Time" {{ old('contract_type') == 'Part-Time' ? 'selected' : '' }}>
                            Meio Período
                        </option>
                        <option value="Estágio" {{ old('contract_type') == 'Estágio' ? 'selected' : '' }}>
                            Estágio
                        </option>
                        <option value="Temporário" {{ old('contract_type') == 'Temporário' ? 'selected' : '' }}>
                            Temporário
                        </option>
                        <option value="Freelancer" {{ old('contract_type') == 'Freelancer' ? 'selected' : '' }}>
                            Freelancer
                        </option>
                    </select>
                </div>
                <div class="col-span-12 md:col-span-6">
                    <label for="tipo_contrato" class="block text-sm font-medium text-gray-700">Categoria da vaga
                        <span class="text-red-500">*</span>
                    </label>
                    <select id="tipo_contrato" name="category_id" class="form-control mt-1 block 
                        w-full border border-gray-300  rounded-md shadow-sm focus:ring 
                        focus:ring-indigo-200" required>
                        <option value="" disabled {{ old('contract_type') ? '' : 'selected' }}>Selecione uma 
                            categoria
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                       
                    </select>
                </div>

                <!-- Localização -->
                <div class="col-span-12 md:col-span-6">
                    <label for="localizacao" class="block text-sm font-medium text-gray-700">Localização</label>
                    <input type="text" id="localizacao" name="address" value="{{ old('address') }}" class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                        placeholder="Ex.: Remoto, Maputo">
                </div>
                <div class="col-span-12 md:col-span-6">
                    <label for="provincia" class="block text-sm font-medium text-gray-700">Província</label>
                    <select id="provincia" name="provincia" class="form-control mt-1 block w-full border 
                            border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                        <option value="" disabled selected>Selecione uma província</option>
                        @foreach([
                            'Maputo', 'Gaza', 'Inhambane', 'Sofala', 'Manica', 'Tete', 'Zambézia',
                            'Nampula', 'Cabo Delgado', 'Niassa'
                        ] as $provincia)
                            <option value="{{ $provincia }}" {{ old('provincia') == $provincia ? 'selected' : '' }}>
                                {{ $provincia }}
                            </option>
                        @endforeach
                    </select>
                </div>

                
                <!-- Data -->
                <div class="col-span-12 md:col-span-6">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">
                        Data de expiracao da vaga</label>
                    <input type="date" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}"
                         class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                </div>
                <!-- Imagem da Vaga -->
                <div class="col-span-12">
                    <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem da Vaga</label>
                    <input type="file" id="imagem" name="image" class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                <!-- Descrição -->
                <div class="col-span-12">
                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição da Vaga</label>
                    <textarea id="descricao" name="description" rows="4" class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                        placeholder="Descrição completa da vaga">{{ old('description') }}</textarea>
                </div>
            </div>

            <!-- Botões -->
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Criar Vaga</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
@foreach($vagas as $vaga)
<div id="editVaga{{$vaga->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Editar Vaga</h2>
        <form action="{{ route('company.vagas.update', $vaga->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Adicionando o método PUT para atualizar -->
            <div class="grid grid-cols-12 gap-5">
                
                <!-- Título da Vaga -->
                <div class="col-span-12 md:col-span-6">
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título da Vaga
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="titulo" name="name" value="{{ $vaga->name }}" class="form-control 
                        mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring
                        focus:ring-indigo-200" 
                        placeholder="Ex.: Desenvolvedor Full Stack" required>
                </div>

                <!-- Salário -->
                <div class="col-span-12 md:col-span-6">
                    <label for="salario" class="block text-sm font-medium text-gray-700">Salário</label>
                    <input type="number" step="0.01" id="salario" name="salary" value="{{ $vaga->salary }}" 
                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Ex.: 5000.00">
                </div>

                <!-- Tipo de Contrato -->
                <div class="col-span-12 md:col-span-6">
                    <label for="tipo_contrato" class="block text-sm font-medium text-gray-700">Tipo de Contrato
                        <span class="text-red-500">*</span>
                    </label>
                    <select id="tipo_contrato" name="contract_type" class="form-control mt-1 block 
                        w-full border border-gray-300  rounded-md shadow-sm focus:ring 
                        focus:ring-indigo-200" required>
                        <option value="" disabled {{ $vaga->contract_type ? '' : 'selected' }}>Selecione um tipo</option>
                        <option value="Tempo_Integral" 
                            {{ $vaga->contract_type == 'Tempo Integral' ? 'selected' : '' }}>
                            Tempo Integral
                        </option>
                        <option value="Part-Time" {{ $vaga->contract_type == 'Part-Time' ? 'selected' : '' }}>
                            Meio Período
                        </option>
                        <option value="Estágio" {{ $vaga->contract_type == 'Estágio' ? 'selected' : '' }}>
                            Estágio
                        </option>
                        <option value="Temporário" {{ $vaga->contract_type == 'Temporário' ? 'selected' : '' }}>
                            Temporário
                        </option>
                        <option value="Freelancer" {{ $vaga->contract_type == 'Freelancer' ? 'selected' : '' }}>
                            Freelancer
                        </option>
                    </select>
                </div>
                <div class="col-span-12 md:col-span-6">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria da vaga
                        <span class="text-red-500">*</span>
                    </label>
                    <select id="category_id" name="category_id" class="form-control mt-1 block 
                        w-full border border-gray-300  rounded-md shadow-sm focus:ring 
                        focus:ring-indigo-200" required>
                        <option value="" disabled {{ $vaga->category_id ? '' : 'selected' }}>Selecione uma 
                            categoria
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ $vaga->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Localização -->
                <div class="col-span-12 md:col-span-6">
                    <label for="localizacao" class="block text-sm font-medium text-gray-700">Localização</label>
                    <input type="text" id="localizacao" name="address" value="{{ $vaga->address }}" class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                        placeholder="Ex.: Remoto, Maputo">
                </div>
                   
                <div class="col-span-12 md:col-span-6">
                    <label for="provincia" class="block text-sm font-medium text-gray-700">Província</label>
                    <select id="provincia" name="provincia" class="form-control mt-1 block w-full border 
                            border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                        <option value="" disabled>Selecione uma província</option>
                        @foreach([
                            'Maputo', 'Gaza', 'Inhambane', 'Sofala', 'Manica', 'Tete', 'Zambézia',
                            'Nampula', 'Cabo Delgado', 'Niassa'
                        ] as $provincia)
                            <option value="{{ $provincia }}" {{ old('provincia', $vaga->provincia) == $provincia ? 'selected' : '' }}>
                                {{ $provincia }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Data -->
                <div class="col-span-12 md:col-span-6">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">
                        Data de expiração da vaga</label>
                    <input type="date" id="expiration_date{{$vaga->id}}" name="expiration_date" 
                        value="{{ $vaga->expiration_date }}"
                         class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                </div>
                <!-- Imagem da Vaga -->
                <div class="col-span-12">
                    <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem da Vaga</label>
                    <input type="file" id="imagem" name="image" class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                <!-- Descrição -->
                <div class="col-span-12">
                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição da Vaga</label>
                    <textarea id="descricao" name="description" rows="4" class="form-control mt-1 block w-full border 
                        border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                        placeholder="Descrição completa da vaga">{{ $vaga->description }}</textarea>
                </div>
            </div>

            <!-- Botões -->
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Atualizar Vaga</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
            $("#expiration_date{{$vaga->id}}").flatpickr({
                dateFormat: "Y-m-d", // Formato de data
                // Adicione outras opções conforme necessário
            });
        });
</script>
@endforeach

@foreach($vagas as $vaga)
<div id="deleteVaga{{$vaga->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Remover Vaga {{$vaga->name}}</h2>
        <form action="{{ route('company.vagas.destroy', $vaga->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="grid grid-cols-12 gap-5">
                
                <!-- Título da Vaga -->
                <div class="col-span-12">
                    <label for="titulo" class="block text-md font-medium text-gray-700">
                        Tem certeza que deseja remover a vaga {{$vaga->name}}?
                    </label>
                </div>
            </div>
            <!-- Botões -->
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach


company.vagas.destroy
<script>
    $(document).ready(function() {
            $("#expiration_date").flatpickr({
                dateFormat: "Y-m-d", // Formato de data
                // Adicione outras opções conforme necessário
            });
        });
</script>