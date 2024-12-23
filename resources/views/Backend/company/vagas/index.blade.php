@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')
@include('Backend.company.vagas.Modal.VagasModal')
@include('Backend.layouts.successErrors')
    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        <h1 class="text-2xl font-semibold mb-6">Vagas</h1>
        @include('Backend.layouts.errors')
        <div class="grid grid-cols-12 gap-6">
            <!-- Example cards -->
            <div class="col-span-12">
                <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Contêiner para permitir o scroll horizontal -->
                    <div class="overflow-x-auto">
                        <table id="userTable" class="min-w-full divide-y divide-gray-200">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded m-4" 
                                data-modal-target="#createVaga">Criar Vaga</button>
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500
                                            uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500
                                            uppercase tracking-wider">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 
                                        uppercase tracking-wider">
                                        Data Expiração
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 
                                        uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($vagas as $vaga)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $vaga->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $vaga->category->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $vaga->expiration_date}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 flex gap-4">
                                    <a class="text-green-600 hover:text-green-900" 
                                            href="{{route('company.candidates',$vaga->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>

                                        <a class="text-blue-600 hover:text-blue-900" 
                                            href="{{route('company.vagas.show',$vaga->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                            </svg>
                                        </a>
                                        <button class="text-orange-600 hover:text-orange-900" 
                                        data-modal-target="#editVaga{{$vaga->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900"
                                        data-modal-target="#deleteVaga{{$vaga->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        </button>
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