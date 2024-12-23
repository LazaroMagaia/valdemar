@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')
@include('Backend.company.candidatos.Modal.CandidatoModal')
@include('Backend.layouts.successErrors')
    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        <h1 class="text-2xl font-semibold mb-6">Candidatos a vaga - {{$vaga->name}}</h1>
        @include('Backend.layouts.errors')
        <div class="grid grid-cols-12 gap-6">
            <!-- Example cards -->
            <div class="col-span-12">
                <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Contêiner para permitir o scroll horizontal -->
                    <div class="overflow-x-auto">
                        <table id="userTable" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500
                                            uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500
                                            uppercase tracking-wider">
                                        Nivel Academico
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 
                                        uppercase tracking-wider">
                                        Curriculum Vitae
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 
                                        uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($candidatos as $candidato)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $candidato->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $candidato->user->profile->education_level }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <a href="{{ asset('storage/' . $candidato->user->profile->cv) }}" 
                                        class="text-blue-600 hover:underline" 
                                        target="_blank">
                                            Ver CV
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 flex gap-4">
                                        <button class="text-green-600 hover:text-green-900" 
                                            data-modal-target="#VerUsuario{{$candidato->user->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button>
                                        <form action="{{route('company.candidates.status',$candidato->id)}}"
                                        method="POST"> @csrf
                                            <button class="text-blue-600 hover:text-blue-900">
                                            @if($candidato->status == 'Pendente')
                                                <input type="hidden" name="status" value="Aprovada">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            @else
                                                <input type="hidden" name="status" value="Pendente">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                                                </svg>
                                            @endif
                                            </button>
                                        </form>
                                     
                                        <form action="{{route('company.candidates.status',$candidato->id)}}"
                                            method="POST"> @csrf
                                            <input type="hidden" name="status" value="Rejeitada">
                                            
                                            <button class="text-red-600 hover:text-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
   



<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            // Opções adicionais podem ser configuradas aqui
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [5, 10, 25, 50, 100],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ total de registros)",
                "search": "Pesquisar:",
                "paginate": {
                    "next": "<i class='fas fa-chevron-right'></i> ", // Ícone de seta para a direita
                    "previous": "<i class='fas fa-chevron-left'></i> " // Ícone de seta para a esquerda
                }
            },
            
        });
    });
</script>
@include('Backend.layouts.footer')