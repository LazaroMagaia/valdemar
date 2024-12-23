@include('frontend.layouts.header')
@include('frontend.layouts.navbar')

<div class="relative w-full h-96 overflow-hidden">
    @if($vaga->image)
        <img src="{{ Storage::url($vaga->image) }}" alt="Banner" class="w-full h-full object-cover">
    @else
        <img src="{{asset('images/work1.jpg')}}" alt="Banner" class="w-full h-full object-cover">
    @endif
    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <h1 class="text-white text-3xl md:text-5xl font-bold text-center">{{$vaga->company->name}}</h1>
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

<main class="container mx-auto mt-8 p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800">{{ $vaga->name }}</h1>
        <!-- Botão para Candidatura -->
        <div class="mt-4">
            <a href="{{ route('frontend.vaga.store', $vaga->id) }}" class="inline-block text-white 
                bg-blue-600 hover:bg-blue-700 rounded px-4 py-2 transition duration-300">
                Candidatar-me
            </a>
        </div>

        <div class="grid grid-cols-12">
            @if($vaga->description != null)
            <div class="col-span-12">
                <div class="mt-4">
                    <p class="text-gray-600">{{ $vaga->description }}</p>
                </div>
            </div>
            @endif

            <div class="col-span-4">
                <div class="mt-4">
                    <p class="text-lg font-semibold text-gray-700">Salário:</p>
                    <p class="text-gray-600">{{ $vaga->salary }}</p>
                </div>
            </div>
            <div class="col-span-4">
                @php
                    $contractTypes = [
                        'Estágio' => 'Estágio',
                        'Temporário' => 'Temporário',
                        'Freelancer' => 'Freelancer',
                        'Tempo_Integral' => 'Tempo Integral',
                        'Part-Time' => 'Part-Time',
                    ];

                    $contractTypeLabel = $contractTypes[$vaga->contract_type] ?? 'Tipo de Contrato Indefinido';
                @endphp
                <div class="mt-4">
                    <p class="text-lg font-semibold text-gray-700">Tipo de Contrato:</p>
                    <p class="text-gray-600">{{ $contractTypeLabel }}</p>
                </div>
            </div>
            <div class="col-span-4">
                <div class="mt-4">
                    <p class="text-lg font-semibold text-gray-700">Localização:</p>
                    <p class="text-gray-600">{{ $vaga->address }}</p>
                </div>
            </div>
            @php
                $expirationDate = \Carbon\Carbon::parse($vaga->expiration_date);
                $currentDate = \Carbon\Carbon::now();

                // Calcula a diferença em dias considerando a direção
                $daysLeft = $currentDate->diffInDays($expirationDate, false);
            @endphp
            <div class="col-span-4">
                <div class="mt-4">
                    <p class="text-lg font-semibold text-gray-700">Expira:</p>
                    <p class="text-gray-600 flex items-center">
                        {{ $vaga->expiration_date }}
                        @if($daysLeft <= 5 && $daysLeft > 0)
                            <span class="ml-2 text-yellow-500" title="A vaga expira em {{ $daysLeft }} dias.">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                            </span>
                        @elseif($daysLeft > 5)
                            <span class="ml-2 text-green-500" title="A vaga está disponível e expira em {{ $daysLeft }} dias.">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25l.832 2.576c.151.464.64.802 1.134.798h2.745l-2.224 1.616c-.374.271-.51.787-.295 1.228l.832 2.576-2.224-1.616a.978.978 0 00-1.136 0L9.078 10.45l.832-2.576c.215-.441.08-.957-.295-1.228L7.391 5.624h2.745c.494-.004.983-.334 1.134-.798L12 2.25z" />
                                </svg>
                            </span>
                        @elseif($daysLeft <= 0)
                            <span class="ml-2 text-red-500" title="A vaga já expirou.">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                </svg>
                            </span>
                        @endif
                    </p>
                </div>
            </div>
            
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Funções</h2>
        <ul class="list-disc pl-2 mt-4 text-gray-600">
            @foreach($vaga->funcoes as $funcao)
                <li class="flex items-center mt-2">
                    <span class="flex items-center justify-center w-6 h-6 bg-blue-500 text-white rounded-full mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </span>
                    <p>
                        {{ $funcao->description }}
                    </p>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Requisitos</h2>
        <ul class="list-disc pl-2 mt-4 text-gray-600">
            @foreach($vaga->requisitos as $requisito)
                <li class="flex items-center mt-2">
                    <span class="flex items-center justify-center w-6 h-6 bg-blue-500 text-white rounded-full mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </span>
                    <p>
                        {{ $requisito->description }}
                    </p>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <a href="{{ route('frontend.home') }}" class="inline-block text-blue-600 hover:underline bg-blue-100 rounded px-4 py-2 transition duration-300">Voltar para a lista de vagas</a>
    </div>
</main>

@include('frontend.layouts.footer')
