@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')
@include('Backend.layouts.successErrors')
    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        <h1 class="text-2xl font-semibold mb-6">Pagina inicial</h1>
        <div class="grid grid-cols-12 gap-6">
            
            <!-- Card de Usuários -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">{{ $vaga_total }}</div>
                        <div class="text-gray-500">vagas</div>
                    </div>
                    <p class="mt-4 text-gray-600">Quantidade total de vagas disponibilizadas pela empresa</p>
                </div>
            </div>
            <!-- col -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">{{ $total_candidaturas }}</div>
                        <div class="text-gray-500">Candidaturas</div>
                    </div>
                    <p class="mt-4 text-gray-600">Quantidade de candidaturas as vagas da empresa</p>
                </div>
            </div>
            <!-- col -->
            
        </div>
    </main>
   
@include('Backend.layouts.footer')