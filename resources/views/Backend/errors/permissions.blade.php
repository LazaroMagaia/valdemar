<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro - Sem Permissão</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-xl rounded-lg p-10 max-w-lg text-center">
        <div class="text-6xl text-red-500 mb-4 animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-16 h-16 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636zM15 9l-6 6m0-6l6 6" />
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Acesso Negado</h1>
        <p class="text-gray-600 mb-6">Você não possui permissão para acessar esta página.</p>
        
        <div class="mt-6">
            <a href="{{route('admin.painel.index')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold
                px-6 py-2 rounded transition-all duration-300 ease-in-out transform hover:scale-105 
                focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Voltar para a página inicial
            </a>
        </div>
    </div>

</body>
</html>
