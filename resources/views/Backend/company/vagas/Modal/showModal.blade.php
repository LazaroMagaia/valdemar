
<!-- Modal --> 
<div id="createFuncao" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Novo Funcao</h2>
        <form action="{{ route('company.vagas.funcaoStore',$vaga->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-5">
                
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Descrição
                        </label>
                        <input type="hidden" name="vaga_id" value="{{$vaga->id}}"/>
                        <textarea name="description" id="description"
                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Descrição">{{old('description')}}</textarea>
                    </div>
                </div>
              <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal --> 
@foreach($funcoes as $funcao)
<div id="editFuncao{{$funcao->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center
     justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Editar Função</h2>
        <form action="{{route('company.vagas.funcaoUpdate', $funcao->id)}}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="funcao_id" value="{{ $funcao->id }}"> <!-- Para identificar qual função está sendo editada -->
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="description" id="description"
                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Descrição">{{ old('description', $funcao->description) }}</textarea>
                    </div>
                </div>
              <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endforeach



<!-- Edit Modal --> 
@foreach($funcoes as $funcao)
<div id="deleteFuncao{{$funcao->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Remover Função</h2>
        <form action="{{route('company.vagas.funcaoDestroy', $funcao->id)}}" method="POST">
            @csrf @method('DELETE')
            <input type="hidden" name="funcao_id" value="{{ $funcao->id }}">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="form-group mb-4">
                      <p> Tem certeza que deseja remover a função: <strong>{{$funcao->description}}</strong>?</p>
                    </div>
                </div>
              <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endforeach




<!-- REQUISITOS Modal --> 
<div id="createRequirement" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Novo requisito</h2>
        <form action="{{ route('company.vagas.RequirementStore',$vaga->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-5">
                
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Descrição
                        </label>
                        <input type="hidden" name="vaga_id" value="{{$vaga->id}}"/>
                        <textarea name="description" id="description"
                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Descrição">{{old('description')}}</textarea>
                    </div>
                </div>
              <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal --> 
@foreach($requisitos as $requisito)
<div id="editRequirement{{$requisito->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center
     justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Editar Requisito</h2>
        <form action="{{route('company.vagas.RequirementUpdate', $requisito->id)}}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="requisito_id" value="{{ $requisito->id }}"> <!-- Para identificar qual função está sendo editada -->
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="description" id="description"
                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Descrição">{{ old('description', $requisito->description) }}</textarea>
                    </div>
                </div>
              <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<!--- DELETE MODEL -->
@foreach($requisitos as $requisito)
<div id="deleteRequisito{{$requisito->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Remover Requisito</h2>
        <form action="{{route('company.vagas.RequirementDestroy', $requisito->id)}}" method="POST">
            @csrf @method('DELETE')
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="form-group mb-4">
                      <p> Tem certeza que deseja remover a função: <strong>{{$requisito->description}}</strong>?</p>
                    </div>
                </div>
              <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endforeach

