<!-- Modal --> 
<div id="createUser" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Novo Utilizador</h2>
        <form onsubmit="return registrationForm()" action="{{ route('admin.userStore') }}" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" class="form-control mt-1 block w-full border 
                            border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                            placeholder="Nome completo">
                        <p id="nameError" class="text-red-500 text-sm mt-1 hidden">Por favor, insira seu nome completo.</p>
                        <!-- ID antigo: name -->
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="form-control mt-1 block w-full border
                         border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" placeholder="Email">
                        <p id="emailError" class="text-red-500 text-sm mt-1 hidden">Por favor, insira um email válido.</p>
                        <!-- ID antigo: email -->
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Função
                            <span class="text-red-500">*</span>
                        </label>
                        <select id="role" name="role" class="form-control mt-1 block w-full border border-gray-300 
                            rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                            <option value="" disabled selected>Selecione uma função</option>
                            <option value="admin">Administrador</option>
                            <option value="company">Empresa</option>
                            <option value="user">Candidato</option>
                        </select>
                        <p id="roleError" class="text-red-500 text-sm mt-1 hidden">Por favor, selecione uma função.</p>
                        <!-- ID antigo: role -->
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" id="password" class="form-control mt-1 block w-full
                            border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                            placeholder="Senha">
                        <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">A senha deve ter pelo menos 6 caracteres.</p>
                        <!-- ID antigo: password -->
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                        <input type="password" id="confirmPassword" name="password_confirmation" 
                            class="form-control mt-1 block w-full border border-gray-300 rounded-md
                            shadow-sm focus:ring focus:ring-indigo-200" 
                            placeholder="Confirmar Senha">
                        <p id="confirmPasswordError" class="text-red-500 text-sm mt-1 hidden">As senhas não coincidem.</p>
                        <!-- ID antigo: confirmPassword -->
                    </div>
                </div>
                <!--- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 
                    text-white px-4 py-2 rounded">Registrar</button>
            </div>
        </form>
    </div>
</div>
@php
    $my_user = Auth::user();
@endphp
<!-- UPDATE USER -->
@foreach($users as $user)
<div id="updateUser{{$user->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Editar Utilizador: {{$user->name}}</h2>
        <form action="{{ route('admin.userUpdate', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="name{{$user->id}}" class="block text-sm font-medium text-gray-700">Nome
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name{{$user->id}}" name="name" value="{{ old('name', $user->name) }}" 
                            class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                            focus:ring focus:ring-indigo-200" placeholder="Nome completo" 
                            {{$my_user->id == $user->id ? '' : 'disabled'}}>
                        <p id="nameError{{$user->id}}" class="text-red-500 text-sm mt-1 hidden">Por favor, insira seu nome completo.</p>
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="email{{$user->id}}" class="block text-sm font-medium text-gray-700">Email
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email{{$user->id}}" name="email" 
                            value="{{ old('email', $user->email) }}" class="form-control mt-1 block w-full border
                                border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" 
                                placeholder="Email" {{$my_user->id == $user->id ? '' : 'disabled'}}>
                        <p id="emailError{{$user->id}}" class="text-red-500 text-sm mt-1 hidden">Por favor, insira um email válido.</p>
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="role{{$user->id}}" class="block text-sm font-medium text-gray-700">Função
                            <span class="text-red-500">*</span>
                        </label>
                        <select id="role{{$user->id}}" name="role" class="form-control mt-1 block w-full border 
                            border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" disabled>
                            <option value="" {{$my_user->id == $user->id ? '' : 'disabled'}}>
                                Selecione uma função</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="company" {{ old('role', $user->role) == 'company' ? 'selected' : '' }}>Empresa</option>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Candidato</option>
                        </select>
                        <p id="roleError{{$user->id}}" class="text-red-500 text-sm mt-1 hidden">Por favor, selecione uma função.</p>
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="password{{$user->id}}" class="block text-sm font-medium text-gray-700">Senha
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" id="password{{$user->id}}" class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" placeholder="Senha" minlength="6">
                        <p id="passwordError{{$user->id}}" class="text-red-500 text-sm mt-1 hidden">A senha deve ter pelo menos 6 caracteres.</p>
                    </div>
                </div>
                <!-- col -->
                <div class="col-span-12 md:col-span-6">
                    <div class="form-group mb-4">
                        <label for="confirmPassword{{$user->id}}" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                        <input type="password" id="confirmPassword{{$user->id}}" name="password_confirmation" class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" placeholder="Confirmar Senha">
                        <p id="confirmPasswordError{{$user->id}}" class="text-red-500 text-sm mt-1 hidden">As senhas não coincidem.</p>
                    </div>
                </div>
                <!--- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 
                rounded">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endforeach



<!-- UPDATE USER -->
@foreach($users as $user)
<div id="deleteUser{{$user->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full h-auto max-h-[80vh] overflow-auto mx-2 md:mx-0">
        <h2 class="text-xl font-bold mb-4">Remover Utilizador: {{$user->name}}</h2>
        <form action="{{ route('admin.userDestroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 ">
                    <div class="form-group mb-4">
                        <p>Tem certeza que deseja remover ?</p>
                    </div>
                </div>
                <!--- col -->
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-700 modal-close">Cancelar</button>
                <button type="submit" class="ml-4 bg-red-500  hover:bg-red-700 
                text-white px-4 py-2 rounded">Confirmar</button>
            </div>
        </form>
    </div>
</div>

@endforeach










<script>
    function registrationForm() {
        let isValid = true;

        // Validar nome
        const name = document.getElementById('name').value.trim();
        const nameError = document.getElementById('nameError');
        if (name === '') {
            nameError.classList.remove('hidden');
            isValid = false;
        } else {
            nameError.classList.add('hidden');
        }

        // Validar email
        const email = document.getElementById('email').value.trim();
        const emailError = document.getElementById('emailError');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            emailError.classList.remove('hidden');
            isValid = false;
        } else {
            emailError.classList.add('hidden');
        }

        // Validar senha
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');
        if (password.length < 8) {
            passwordError.classList.remove('hidden');
            isValid = false;
        } else {
            passwordError.classList.add('hidden');
        }

        // Validar confirmação de senha
        const confirmPassword = document.getElementById('confirmPassword').value;
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        if (password !== confirmPassword) {
            confirmPasswordError.classList.remove('hidden');
            isValid = false;
        } else {
            confirmPasswordError.classList.add('hidden');
        }

        // Validar função
        const role = document.getElementById('role').value;
        const roleError = document.getElementById('roleError');
        if (role === '') {
            roleError.classList.remove('hidden');
            isValid = false;
        } else {
            roleError.classList.add('hidden');
        }

        return isValid;  // Se `isValid` for true, o formulário será enviado; caso contrário, será bloqueado.
    }
</script>