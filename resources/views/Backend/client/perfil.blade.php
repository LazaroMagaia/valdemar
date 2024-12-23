@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')
@include('Backend.layouts.successErrors')
    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        @include('Backend.layouts.errors')
        <h1 class="text-2xl font-semibold mb-6">Perfil</h1>
        <div class="w-full max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div id="step-progress-bar" class="flex items-center justify-between mb-6">
                <div class="flex-1 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full h-1 bg-gray-200"></div>
                    </div>
                    <div class="relative flex justify-between">
                        <div class="w-8 h-8 flex items-center justify-center bg-blue-500 text-white rounded-full">1</div>
                        <div class="w-8 h-8 flex items-center justify-center bg-gray-300 rounded-full">2</div>
                        <div class="w-8 h-8 flex items-center justify-center bg-gray-300 rounded-full">3</div>
                    </div>
                </div>
            </div>

            <!-- Formulário -->
            <form id="multi-step-form" action="{{route('client.perfil.Update')}}" method="POST" 
                enctype="multipart/form-data"> @csrf @method('PUT')
                <!-- Etapa 1: Dados Pessoais -->
                <div class="step" id="step-1">
                    <h2 class="text-lg font-semibold mb-4">Informações Pessoais</h2>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="text" id="phone" name="phone" value="{{ $profile->phone }}"
                            class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                        <input type="date" id="birthdate" name="birthdate" value="{{ $profile->birthdate }}"
                            class="form-control mt-1 block w-full border border-gray-300 rounded-md 
                            shadow-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gênero</label>
                        <select id="gender" name="gender"
                            class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                            <option value="">Selecione</option>
                            <option value="male" {{ old('gender', $profile->gender) == 'male' ? 'selected' : '' }}>Masculino</option>
                            <option value="female" {{ old('gender', $profile->gender) == 'female' ? 'selected' : '' }}>Feminino</option>
                        </select>
                    </div>
                </div>

                <!-- Etapa 2: Localização -->
                <div class="step hidden" id="step-2">
                    <h2 class="text-lg font-semibold mb-4">Informações de Localização</h2>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input type="text" id="address" name="address" value="{{ $profile->address }}"
                            class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="province" class="block text-sm font-medium text-gray-700">Província</label>
                        <select id="province" name="province"
                                class="form-control mt-1 block w-full border border-gray-300 rounded-md
                                    shadow-sm focus:ring focus:ring-blue-300">
                                <option value="" {{ old('province', $profile->province) == '' ? 'selected' : '' }}>Selecione</option>
                                <option value="Maputo" {{ old('province', $profile->province) == 'Maputo' ? 'selected' : '' }}>Maputo</option>
                                <option value="Gaza" {{ old('province', $profile->province) == 'Gaza' ? 'selected' : '' }}>Gaza</option>
                                <option value="Inhambane" {{ old('province', $profile->province) == 'Inhambane' ? 'selected' : '' }}>Inhambane</option>
                                <option value="Sofala" {{ old('province', $profile->province) == 'Sofala' ? 'selected' : '' }}>Sofala</option>
                                <option value="Manica" {{ old('province', $profile->province) == 'Manica' ? 'selected' : '' }}>Manica</option>
                                <option value="Zambézia" {{ old('province', $profile->province) == 'Zambézia' ? 'selected' : '' }}>Zambézia</option>
                                <option value="Nampula" {{ old('province', $profile->province) == 'Nampula' ? 'selected' : '' }}>Nampula</option>
                                <option value="Cabo Delgado" {{ old('province', $profile->province) == 'Cabo Delgado' ? 'selected' : '' }}>Cabo Delgado</option>
                                <option value="Niassa" {{ old('province', $profile->province) == 'Niassa' ? 'selected' : '' }}>Niassa</option>
                                <option value="Tete" {{ old('province', $profile->province) == 'Tete' ? 'selected' : '' }}>Tete</option>
                            </select>

                            </div>
                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                                <input type="text" id="city" name="city" value="{{ $profile->city }}"
                                    class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                            </div>
                        </div>

                        <!-- Etapa 3: Biografia e Revisão -->
                        <div class="step hidden" id="step-3">
                            <h2 class="text-lg font-semibold mb-4">Biografia e Revisão</h2>
                            <div class="mb-4">
                                <label for="education_level" class="block text-sm font-medium 
                                    text-gray-700">Nível de Instrução</label>
                                    <select id="education_level" name="education_level" class="form-control mt-1
                                        block w-full border border-gray-300 rounded-md shadow-sm focus:ring 
                                        focus:ring-indigo-200">
                                    <option value="" disabled {{ old('education_level', $profile->education_level ?? '') == '' ? 'selected' : '' }}>Selecione o nível de instrução</option>
                                    <option value="Básico" {{ old('education_level', $profile->education_level ?? '') == 'Básico' ? 'selected' : '' }}>Básico</option>
                                    <option value="Médio" {{ old('education_level', $profile->education_level ?? '') == 'Médio' ? 'selected' : '' }}>Médio</option>
                                    <option value="Técnico" {{ old('education_level', $profile->education_level ?? '') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                    <option value="Licenciatura" {{ old('education_level', $profile->education_level ?? '') == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                                    <option value="Mestrado" {{ old('education_level', $profile->education_level ?? '') == 'Mestrado' ? 'selected' : '' }}>Mestrado</option>
                                    <option value="Doutorado" {{ old('education_level', $profile->education_level ?? '') == 'Doutorado' ? 'selected' : '' }}>Doutorado</option>
                                </select>

                                @error('education_level')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Campo para Upload do CV -->
                            <div class="mb-4">
                                 <label for="cv" class="block text-sm font-medium text-gray-700">Upload do CV</label>

                                <!-- Se já houver um CV no banco, exibe o link de download -->
                                @if ($profile->cv) <!-- Verifica se existe um CV no banco -->
                                    <input type="file" id="cv" name="cv"
                                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                                    <p class="text-sm text-gray-500 mt-2">Envie seu CV no formato PDF ou DOCX.</p>
                                    <p class="text-sm text-gray-500 mt-2">
                                        <a href="{{ asset('storage/' . $profile->cv) }}" 
                                        class="text-blue-600 hover:underline" 
                                        target="_blank">
                                        Você já enviou um CV. Clique aqui para fazer o download.
                                        </a>
                                    </p>
                                @else
                                    <input type="file" id="cv" name="cv"
                                        class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                                    <p class="text-sm text-gray-500 mt-2">Envie seu CV no formato PDF ou DOCX.</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="bio" class="block text-sm font-medium text-gray-700">Biografia</label>
                                <textarea id="bio" name="bio" value="{{ $profile->bio }}"
                                    class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300"
                                    rows="4" placeholder="Conte-nos sobre você..."></textarea>
                            </div>
                            <p class="text-gray-600">Revise suas informações antes de enviar.</p>
                        </div>

                        <!-- Navegação -->
                        <div class="flex justify-between mt-6">
                            <button type="button" id="prev-button"
                                class="hidden px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Anterior</button>
                            <button type="button" id="next-button"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md">Próximo</button>
                        </div>
                    </form>
            </div>
        </main>
   <script>
        document.addEventListener('DOMContentLoaded', () => {
        const steps = document.querySelectorAll('.step');
        const progressCircles = document.querySelectorAll('#step-progress-bar .w-8');
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        let currentStep = 0;

        function updateFormSteps() {
            steps.forEach((step, index) => {
                step.classList.toggle('hidden', index !== currentStep);
            });

            progressCircles.forEach((circle, index) => {
                if (index <= currentStep) {
                    circle.classList.remove('bg-gray-300');
                    circle.classList.add('bg-blue-500', 'text-white');
                } else {
                    circle.classList.add('bg-gray-300');
                    circle.classList.remove('bg-blue-500', 'text-white');
                }
            });

            prevButton.classList.toggle('hidden', currentStep === 0);
            nextButton.textContent = currentStep === steps.length - 1 ? 'Enviar' : 'Próximo';
        }

        nextButton.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
            } else {
                document.getElementById('multi-step-form').submit();
            }
            updateFormSteps();
        });

        prevButton.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
            }
            updateFormSteps();
        });

        updateFormSteps();
    });


   </script>
   <script>
    $(document).ready(function() {
            $("#birthdate").flatpickr({
                dateFormat: "Y-m-d", // Formato de data
                // Adicione outras opções conforme necessário
            });
        });
</script>
@include('Backend.layouts.footer')