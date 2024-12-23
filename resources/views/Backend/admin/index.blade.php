@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')

    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
    <h1 class="text-2xl font-semibold mb-6">Pagina inicial</h1>
        <div class="grid grid-cols-12 gap-6">
            
            <!-- Card de Usuários -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">{{ $users }}</div>
                        <div class="text-gray-500">Usuários</div>
                    </div>
                    <p class="mt-4 text-gray-600">Quantidade de usuários cadastrados no sistema.</p>
                </div>
            </div>
            
            <!-- Card de Categorias -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">{{ $categories }}</div>
                        <div class="text-gray-500">Categorias</div>
                    </div>
                    <p class="mt-4 text-gray-600">Total de categorias disponíveis no sistema.</p>
                </div>
            </div>

            <!-- Exemplo de Card Adicional -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">11</div>
                        <div class="text-gray-500">Outro Resumo</div>
                    </div>
                    <p class="mt-4 text-gray-600">Descrição adicional para o resumo.</p>
                </div>
            </div>
            
            <!-- Repita outros cards conforme necessário -->
        </div>
    </main>
   
@include('Backend.layouts.footer')