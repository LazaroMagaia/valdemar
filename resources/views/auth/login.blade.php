
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>

            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- E-mail -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Seu e-mail" required>
                </div>

                <!-- Senha -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Sua senha" required>
                </div>

                <!-- Botão de Login (Azul) -->
                <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Entrar
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Esqueceu sua senha?</a>
            </div>

            <div class="mt-6 text-center">
                <span class="text-sm text-gray-600">Não tem uma conta? </span>
                <a href="/register" class="text-sm text-indigo-600 hover:text-indigo-800">Crie uma conta</a>
            </div>
        </div>
    </div>

</body>
</html>
