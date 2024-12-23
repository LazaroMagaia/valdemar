@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')

    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        <h1 class="text-2xl font-semibold mb-6">Aplicacoes</h1>
        <div class="grid grid-cols-12">
            @foreach($candidaturas as $candidatura)
            <div class="col-span-6 bg-white shadow-lg p-8 rounded-lg">
                <div class="flex justify-between">
                    <p class="text-[#E95432] bg-[#E95432] bg-opacity-20 px-4 py-2 
                        rounded-md">{{\App\Models\Categories::find($candidatura->vaga->category_id)->name}}</p>
                        <p class="px-4 py-2 rounded-md
                            @if ($candidatura->vaga->status == 'Pendente')
                                text-[#FF9800] bg-[#FF9800] bg-opacity-20
                            @elseif ($candidatura->status == 'Aprovada')
                                text-[#4CAF50] bg-[#4CAF50] bg-opacity-20
                            @elseif ($candidatura->status == 'Rejeitada')
                                text-[#F44336] bg-[#F44336] bg-opacity-20
                            @else
                                text-[#9E9E9E] bg-[#9E9E9E] bg-opacity-20 
                            @endif
                            ">
                            {{ $candidatura->status }}
                        </p>
                </div>
                <!-- title -->
                    <p class="font-semibold text-2xl text-[#183B56] mt-5">
                    {{$candidatura->vaga->name}}
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
                            $contractTypes[$candidatura->vaga->contract_type] ?? 'Tipo de Contrato Indefinido';
                        @endphp
                        {{$contractTypeLabel}}
                    </p>
                    <p class="">
                        <i class="fa-solid fa-location-dot"></i>
                        {{$candidatura->vaga->provincia}}
                    </p>
                </div>

                <div class="flex justify-between text-[#5A7184] mt-4">
                    <p class="">{{$candidatura->vaga->company->name}}</p>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('frontend.vaga.show', $candidatura->vaga->id) }}" target="_blank">
                            ver mais
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
   
    </main>
   
@include('Backend.layouts.footer')