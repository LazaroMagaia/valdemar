
<!-- Modal --> 
<div id="createCategorie" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Novo Categoria</h2>
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" class="form-control mt-1 block w-full border 
                            border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                            placeholder="Nome da categoria">
                        <p id="nameError" class="text-red-500 text-sm mt-1 hidden">Por favor, insira o nome da categoria.</p>
                        <!-- ID antigo: name -->
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="icon" class="block text-sm font-medium text-gray-700">Ícone</label>
                        <div class="flex items-center">
                            <!-- Exibição do ícone -->
                            <input type="text" id="icon" name="icon" class="form-control mt-1 block border 
                                border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                                placeholder="fa-icon">
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Insira o nome de um ícone do FontAwesome (ex: <strong>fa-user</strong>, <strong>fa-cogs</strong>).</p>
                        <p class="text-sm text-blue-600 mt-1">
                            <a href="https://fontawesome.com/icons" target="_blank" rel="noopener noreferrer">Veja todos os ícones no FontAwesome</a>
                        </p>
                        <p id="iconError" class="text-red-500 text-sm mt-1 hidden">Por favor, insira o ícone da categoria.</p>
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Descrição
                        </label>
                        <textarea name="description" id="description"
                        class="form-control mt-1 block w-full border border-gray-300 h-40 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Descrição"></textarea>
                    </div>
                </div>
              
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Registrar</button>
            </div>
        </form>
    </div>
</div>

@foreach($categories as $categorie)
<!-- Modal --> 
<div id="updateCategorie{{$categorie->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Editar Categoria</h2>
        <form action="{{ route('admin.category.update',$categorie->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" class="form-control mt-1 block w-full border 
                            border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                            placeholder="Nome da categoria" value="{{$categorie->name}}">
                        <p id="nameError" class="text-red-500 text-sm mt-1 hidden">Por favor, insira o nome da categoria.</p>
                        <!-- ID antigo: name -->
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="icon" class="block text-sm font-medium text-gray-700">Ícone</label>
                        <div class="flex items-center">
                            <!-- Exibição do ícone -->
                            <input type="text" id="icon" name="icon" class="form-control mt-1 block border 
                                border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                                placeholder="fa-icon" value="{{$categorie->icon}}">
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Insira o nome de um ícone do FontAwesome (ex: <strong>fa-user</strong>, <strong>fa-cogs</strong>).</p>
                        <p class="text-sm text-blue-600 mt-1">
                            <a href="https://fontawesome.com/icons" target="_blank" rel="noopener noreferrer">Veja todos os ícones no FontAwesome</a>
                        </p>
                        <p id="iconError" class="text-red-500 text-sm mt-1 hidden">Por favor, insira o ícone da categoria.</p>
                    </div>
                </div>
                <!-- col -->

                <!-- col -->
                <div class="col-span-12">
                    <div class="form-group mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Descrição
                        </label>
                        <textarea name="description" id="description"
                        class="form-control mt-1 block w-full h-40 border border-gray-300 rounded-md shadow-sm 
                        focus:ring focus:ring-indigo-200" placeholder="Descrição">{{$categorie->description}}</textarea>
                    </div>
                </div>
              
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endforeach


@foreach($categories as $categorie)
<!-- Modal --> 
<div id="removerCategorie{{$categorie->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Remover Categoria {{$categorie->name}}</h2>
        <form action="{{ route('admin.category.destroy',$categorie->id) }}" method="POST">
            @csrf @method('DELETE')
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="form-group mb-4">
                      <p>Tem certeza que deseja remover ?</p>
                    </div>
                </div>
                <!-- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-red-500  hover:bg-red-700 
                text-white px-4 py-2 rounded">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endforeach


