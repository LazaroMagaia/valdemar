<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-8">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>
            <form method="POST" action="{{ route('register') }}" >
                @csrf

                <!-- Nome -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nome') }}</label>
                    <span class="text-red-500">*</span>
                    <input id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md 
                        focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" 
                        name="name" required autofocus autocomplete="name" />
                    @error('name')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Endereço de Email -->
                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Endereço de Email') }}</label>
                    <span class="text-red-500">*</span>
                    <input id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none 
                        focus:ring-2 focus:ring-indigo-500" type="email" name="email" 
                            required autocomplete="username" />
                    @error('email')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Palavra-passe -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Palavra-passe') }}</label>
                    <span class="text-red-500">*</span>
                    <input id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md
                         focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" 
                         name="password" required autocomplete="new-password" />
                    @error('password')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirmar Palavra-passe -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirmar Palavra-passe') }}</label>
                    <span class="text-red-500">*</span>
                    <input id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md 
                        focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" 
                        name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Seleção de Role -->
                <div class="mt-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">{{ __('Tipo de Utilizador') }}</label>
                    <span class="text-red-500">*</span>
                    <select id="role" name="role" class="w-full px-4 py-2 border border-gray-300 rounded-md 
                        focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">{{ __('Selecione uma opção') }}</option>
                        <option value="company">{{ __('Empresa') }}</option>
                        <option value="user">{{ __('Candidato') }}</option>
                    </select>
                    @error('role')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="mt-6 flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-900">
                        {{ __('Já está registado?') }}
                    </a>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ __('Registar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>