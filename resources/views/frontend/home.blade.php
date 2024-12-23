@include('frontend.layouts.header')
@include('frontend.layouts.navbar')

    <div class="relative w-full h-96 overflow-hidden">
        <!-- Imagem de fundo -->
        <img src="{{ asset('images/work1.jpg') }}" alt="Banner" class="w-full h-full object-cover">
        
        <!-- Texto e card de pesquisa centralizados -->
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 px-4">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center mb-4">Encontre sua vaga dos sonhos</h1>
            
            <!-- Card com grid para inputs e botão -->
            <div class="bg-white rounded-lg shadow-lg p-4 w-full max-w-lg">
                <form action="{{route('frontend.vaga.showVagas')}}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-3">
                        <select class="col-span-6 p-2 border border-gray-300 rounded-md focus:outline-none
                            focus:ring-2 focus:ring-blue-500" name="categorie">
                            <option value="">Selecione a área</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        <input type="text" placeholder="Digite o nome da vaga" name="vaga" 
                        class="col-span-6 p-2 border border-gray-300 rounded-md focus:outline-none 
                            focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="col-span-12 p-2 bg-blue-600 text-white font-bold rounded-md
                         hover:bg-blue-700">Buscar</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>

    @if (session('success') || session('error'))
        <div id="notification" class="fixed top-5 right-5 z-[9999] px-4 py-3 rounded-lg shadow-lg w-64 
                {{ session('success') ? 'bg-green-500' : 'bg-red-500' }} opacity-100 transition-opacity duration-500">
            <div class="flex justify-between items-center">
                <span class="text-white">{{ session('success') ?? session('error') }}</span>
                <!--<button onclick="closeNotification()" class="ml-4 text-white font-bold">&times;</button>
                -->
            </div>
            <div id="progressBar" class="mt-2 h-1 bg-white rounded-full" style="width: 0;"></div>
        </div>
    @endif

    <main class="">
        <!-- Seção de Parceiros-->
        <div class="bg-gray-100 p-8">
            <div class="container mx-auto flex flex-wrap justify-center gap-4">
                <img src="{{ asset('images/parceiros/coca.png') }}" alt="Parceiros" 
                    class="w-64 h-24 object-cover rounded-lg grayscale hover:grayscale-0 transition duration-300">
                <img src="{{ asset('images/parceiros/contact.jpeg') }}" alt="Parceiros" 
                    class="w-64 h-24 object-cover rounded-lg grayscale hover:grayscale-0 transition duration-300">
                <img src="{{ asset('images/parceiros/google.png') }}" alt="Parceiros" 
                    class="w-64 h-24 object-cover rounded-lg grayscale hover:grayscale-0 transition duration-300">
                <img src="{{ asset('images/parceiros/voda.png') }}" alt="Parceiros" 
                    class="w-64 h-24 object-cover rounded-lg grayscale hover:grayscale-0 transition duration-300">
            </div>
        </div>

        <!-- Seção de Categorias -->
        <section class="py-12 my-10 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Pesquisar por Categorias</h2>
                <div class="grid grid-cols-12 gap-5">
                    @foreach($categories as $category)
                        <div class="col-span-12 md:col-span-3 border border-[#EDEDED] p-4 rounded-lg hover:bg-gray-100 
                            hover:shadow-lg transition-all duration-300 ease-in-out group">
                            <form action="{{route('frontend.vaga.showVagas')}}" method="POST">
                                @csrf
                                <span class="inline-flex items-center justify-center p-2 bg-blue-400
                                    bg-opacity-60 group-hover:bg-opacity-100 text-white rounded-full my-5 
                                    transition-all duration-300 ease-in-out group-hover:scale-150 
                                    group-hover:shadow-lg">
                                    <i class="{{$category->icon}}"></i>
                                </span>
                                <p class="font-semibold text-lg mt-5">
                                    {{$category->name}}
                                </p>
                                <div class="flex justify-between">
                                    <p class="font-normal text-sm mt-2">
                                        {{count($category->vagas)}} vagas abertas
                                    </p>
                                    <input type="hidden" name="categorie" value="{{$category->id}}">
                                    <button type="submit" class="hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" 
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    <!--        col     -->
                    <div class="col-span-12 md:col-span-3 border border-[#EDEDED] p-4 rounded-lg bg-blue-500 
                            shadow-lg transition-all duration-300 ease-in-out group text-white">
                            <form action="{{route('frontend.vaga.showVagas')}}" method="POST">
                                @csrf
                                <div class="flex justify-between items-center mt-10">
                                    <p class="font-bold text-2xl mt-2">
                                        Explore mias de {{count($categories)}} categorias
                                    </p>
                                    <input type="hidden" name="categorie" value="">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" 
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    <!--col -->
                </div>
                <!--- grid -->
            </div>
        </section>

        <!-- work -->
        <section class="py-12 my-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-12 gap-5">
                    <div class="hidden md:block col-span-12 md:col-span-6">
                        <img src="{{ asset('images/work1.jpg') }}" alt="Trabalho" 
                            class=" w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="col-span-12 md:col-span-6">
                            <h1 class="font-bold text-4xl">Veja o trabalho da nossa plataforma</h1>
                            <div class="grid grid-cols-12">
                                
                                <!-- Criacao de Conta -->
                                <div class="col-span-12 bg-white p-4 mt-5 rounded-lg group hover:bg-gray-100 hover:shadow-xl transform transition-all duration-300 ease-in-out">
                                    <div class="flex gap-2 items-center">
                                        <div class="bg-white p-4 flex justify-center items-center shadow-lg rounded-full group-hover:bg-blue-500">
                                            <i class="fas fa-user text-blue-500 text-3xl group-hover:text-white"></i>
                                        </div>
                                        
                                        <div>
                                            <h2 class="font-bold text-xl">Criação de conta</h2>
                                            <p>
                                                Desenvolver de forma competente alinhamentos retrocompatíveis
                                                e recursos baseados em multimídia.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload de CV -->
                                <div class="col-span-12 bg-white p-4 mt-5 rounded-lg group hover:bg-gray-100 hover:shadow-xl transform transition-all duration-300 ease-in-out">
                                    <div class="flex gap-2 items-center">
                                        <div class="bg-white p-4 flex justify-center items-center shadow-lg rounded-full group-hover:bg-blue-500">
                                            <i class="fas fa-upload text-blue-500 text-3xl group-hover:text-white"></i>
                                        </div>
                                        
                                        <div>
                                            <h2 class="font-bold text-xl">Upload de CV (Currículo)</h2>
                                            <p>
                                                Faça o upload do seu currículo para que possamos avaliar suas
                                                qualificações.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Escolher Vaga -->
                                <div class="col-span-12 bg-white p-4 mt-5 rounded-lg group hover:bg-gray-100 hover:shadow-xl transform transition-all duration-300 ease-in-out">
                                    <div class="flex gap-2 items-center">
                                        <div class="bg-white p-4 flex justify-center items-center shadow-lg rounded-full group-hover:bg-blue-500">
                                            <i class="fas fa-check text-blue-500 text-3xl group-hover:text-white"></i>
                                        </div>

                                        <div>
                                            <h2 class="font-bold text-xl">Escolher Vaga</h2>
                                            <p>
                                                Explore as vagas disponíveis em nossa plataforma. Selecione a 
                                                oportunidade que mais combina com seu perfil profissional e dê o primeiro
                                                passo em direção ao seu próximo emprego.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Completar Candidatura -->
                                <div class="col-span-12 bg-white p-4 mt-5 rounded-lg group hover:bg-gray-100 hover:shadow-xl transform transition-all duration-300 ease-in-out">
                                    <div class="flex gap-2 items-center">
                                        <div class="bg-white p-4 flex justify-center items-center shadow-lg rounded-full group-hover:bg-blue-500">
                                            <i class="fas fa-briefcase text-blue-500 text-3xl group-hover:text-white"></i>
                                        </div>
                                        
                                        <div>
                                            <h2 class="font-bold text-xl">Completar Candidatura</h2>
                                            <p>
                                                Finalize o processo de candidatura fornecendo as informações necessárias e 
                                                envie sua inscrição.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
        </section>

        <section class="py-12 my-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col gap-2">
                        <p class="font-bold text-3xl">Vagas em Destaque</p>
                        <span class="font-normal text-sm text-gray-500">Confira as vagas mais recentes</span>
                    </div>
                    <div>
                        <form action="{{route('frontend.vaga.showVagas')}}" method="post">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white text-md font-semibold p-2 rounded-md
                                 hover:bg-blue-600">
                                Ver todas
                            </button>
                        </form>
                    </div>
                </div>
                <!--- title-->
                <div class="grid grid-cols-12 my-5">
                    @foreach($vagas_recentes as $vaga)
                    <div class="col-span-4 bg-white shadow-lg p-8 rounded-lg">
                        <div class="flex justify-between">
                            <p class="text-[#E95432] bg-[#E95432] bg-opacity-20 px-4 py-2 
                                rounded-md">categoria da vaga</p>
                            <p class="px-4 py-2 text-[#5A7184]">
                            {{ \Carbon\Carbon::parse($vaga->created_at)->diffForHumans() }}
                            </p>
                        </div>
                        <!-- title -->
                         <p class="font-semibold text-2xl text-[#183B56] mt-5">
                            {{$vaga->name}}
                         </p>
                         <!-- nome -->
                         <div class="flex justify-between text-[#5A7184] mt-4">
                            <p class="">
                                <i class="fa-solid fa-clock"></i>
                                @php
                                    $contractTypes = [
                                        'Estágio' => 'Estágio',
                                        'Temporário' => 'Temporário',
                                        'Freelancer' => 'Freelancer',
                                        'Tempo_Integral' => 'Tempo Integral',
                                        'Part-Time' => 'Part-Time',
                                    ];

                                    $contractTypeLabel = 
                                    $contractTypes[$vaga->contract_type] ?? 'Tipo de Contrato Indefinido';
                                @endphp
                                {{$contractTypeLabel}}
                            </p>
                            <p class="">
                                <i class="fa-solid fa-location-dot"></i>
                                {{$vaga->provincia}}
                            </p>
                        </div>

                        <div class="flex justify-between text-[#5A7184] mt-4">
                            <p class="">{{$vaga->company->name}}</p>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('frontend.vaga.store', $vaga->id) }}">
                                    Candidatar-me
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                           
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="container mx-auto px-8 py-5">
                <h1 class="font-bold text-3xl max-w-4xl text-center mx-auto py-5">
                    Mais de 20.000 pessoas ao redor do mundo encontraram oportunidades de emprego conosco
                </h1>
                <div class="grid grid-cols-12">
               
                    <div class="col-span-12 my-10">
                        <div class="flex justify-center items-center">
                            <img src="{{asset('images/Map.svg')}}" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>    
        </section>
    </main>


@include('frontend.layouts.footer')