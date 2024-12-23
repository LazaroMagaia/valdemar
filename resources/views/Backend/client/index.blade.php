@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')

    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        <h1 class="text-2xl font-semibold mb-6">Pagina inicial</h1>
        <div class="p-4 bg-white rounded-lg shadow-md my-5">
            <!-- Verificar se o perfil está completo -->
            @if (!$profile->profile_complete)
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-lg font-semibold text-red-500">Seu perfil não está concluído</p>
                        <p class="text-sm text-gray-500 mt-2">Complete seu perfil para aproveitar todos os recursos.</p>
                    </div>
                    <div>
                        <a href="{{ route('client.perfil') }}" class="text-blue-600 hover:underline">
                            Complete agora
                        </a>
                    </div>
                </div>
            @else
                <p class="text-lg font-semibold text-green-500">Seu perfil está completo!</p>
            @endif
        </div>

        <div class="grid grid-cols-12 gap-6">
            <!-- Card de Usuários -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">{{ $candidaturas }}</div>
                        <div class="text-gray-500">Candidaturas</div>
                    </div>
                    <p class="mt-4 text-gray-600">Quantidade de candidaturas do usuario</p>
                </div>
            </div>
            <!-- col -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-indigo-100">
                    <div class="flex justify-between items-center">
                        <div class="text-indigo-600 text-3xl font-bold">{{ $candidaturas_aprovadas }}</div>
                        <div class="text-gray-500">Candidaturas Aprovadas</div>
                    </div>
                    <p class="mt-4 text-gray-600">Quantidade de candidaturas aprovadas do usuario</p>
                </div>
            </div>
            <!-- col -->
        </div>
    </main>
   
@include('Backend.layouts.footer')