@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
<div class="relative w-full h-64 overflow-hidden">
        <!-- Imagem de fundo -->
        <img src="{{ asset('images/work1.jpg') }}" alt="Banner" class="w-full h-full object-cover">
        
        <!-- Texto e card de pesquisa centralizados -->
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 px-4">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center mb-4">Resultado da pesquisa</h1>
        </div>
    </div>
    <!-- Seção de Resultados -->

    <main class="container mx-auto mt-8 p-4">
        @if (count($vagas) == 0)
            <div class="text-3xl font-semibold mb-4 text-red-600 mt-20 text-center">Nenhuma vaga encontrada.</div>
        @else
            <h2 class="text-3xl font-semibold mb-4">Vagas Disponíveis</h2>
        @endif
        <!-- Campo de busca -->
        <div class="mb-6">
            @if (count($vagas) != 0)
            <input type="text" id="search-input" placeholder="Buscar Vagas..." oninput="searchJobs()"
                class="p-2 border border-gray-300 rounded w-full md:w-1/3">
            @endif
        </div>
        <div id="no-results-message" class="hidden text-red-600 mb-4 text-lg">Nenhuma vaga encontrada.</div>
        <div class="grid grid-cols-12 gap-6">
            @foreach($vagas as $vaga)
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 bg-white rounded-lg shadow-md overflow-hidden job-card">
                    @if($vaga->image)
                        <img src="{{Storage::url($vaga->image)}}" alt="{{$vaga->image}}" class="w-full h-48 object-cover">
                    @else
                        <img src="{{asset('images/work1.jpg')}}" alt="Banner" class="w-full h-48 object-cover">
                    @endif    
                    <div class="p-4">
                        <h3 class="text-xl font-semibold job-title">{{$vaga->name}}</h3>
                        <p class="text-gray-600 company-name">{{$vaga->company->name}}</p>
                        <p class="text-gray-600">Localização: {{$vaga->address}}</p>
                        <p class="text-gray-500 job-type">{{$vaga->category->name}}</p>
                        <a href="{{route('frontend.vaga.show',$vaga->id)}}" class="mt-4 inline-block bg-blue-600 
                            text-white py-2 px-4 rounded hover:bg-blue-500">Ver mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@include('frontend.layouts.footer')
