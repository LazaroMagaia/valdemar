@include('frontend.layouts.header')
@include('frontend.layouts.navbar')

<div class="relative w-full h-64 overflow-hidden">
    <img src="{{asset('images/work1.jpg')}}" alt="Banner" class="w-full h-full object-cover">
    <div class="absolute inset-0 flex items-center flex-col justify-center bg-black bg-opacity-50">
        <h1 class="text-white text-3xl md:text-5xl font-bold text-center">Sobre nos</h1>
        <p class="mt-4 text-lg text-white max-w-2xl mx-auto text-center">
            Nossa missão é conectar talentos a oportunidades excepcionais, oferecendo um serviço 
            de qualidade tanto para candidatos quanto para empresas.
        </p>
    </div>
</div>


<main class="container mx-auto mt-10 p-4">

    <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
        <div class="bg-white shadow-lg rounded-lg p-6 text-center transition duration-300 ease-in-out 
            transform hover:shadow-xl hover:bg-blue-100">
            <h2 class="text-2xl font-semibold text-gray-800">Missão</h2>
            <p class="mt-4 text-gray-600">
                Proporcionar as melhores oportunidades de emprego e soluções de recrutamento, valorizando a excelência e a transparência.
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 text-center transition duration-300 ease-in-out
            transform hover:shadow-xl hover:bg-blue-100">
            <h2 class="text-2xl font-semibold text-gray-800">Visão</h2>
            <p class="mt-4 text-gray-600">
                Ser reconhecida como a principal plataforma de recrutamento, inovando e adaptando-se às necessidades do mercado de trabalho.
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 text-center transition duration-300 ease-in-out
            transform hover:shadow-xl hover:bg-blue-100">
            <h2 class="text-2xl font-semibold text-gray-800">Valores</h2>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-blue-500 text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="ml-4 text-gray-600">Integridade</p>
                </div>
                <div class="flex items-center">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-green-500 text-white">
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="ml-4 text-gray-600">Excelência</p>
                </div>
                <div class="flex items-center">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-yellow-500 text-white">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <p class="ml-4 text-gray-600">Inovação</p>
                </div>
                <div class="flex items-center">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-red-500 text-white">
                        <i class="fas fa-users"></i>
                    </div>
                    <p class="ml-4 text-gray-600">Colaboração</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white shadow-lg rounded-lg p-6 mb-10">
        <h2 class="text-3xl font-semibold text-gray-800 text-center">Nosso Time</h2>
        <p class="mt-4 text-gray-600 text-center max-w-3xl mx-auto">
            Nossa equipe é composta por profissionais experientes em recrutamento e seleção, prontos para ajudar tanto candidatos quanto empresas a encontrarem a combinação perfeita.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6">
            <div class="bg-gray-100 p-4 rounded-lg text-center">
                <img src="{{ asset('images/work1.jpg') }}" alt="Membro da Equipe" 
                    class="w-24 h-24 rounded-full mx-auto object-cover">
                <h3 class="mt-4 text-lg font-semibold">Nome 1</h3>
                <p class="text-gray-600">Função 1</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg text-center">
                <img src="{{ asset('images/work.jpg') }}" alt="Membro da Equipe"
                     class="w-24 h-24 rounded-full mx-auto object-cover">
                <h3 class="mt-4 text-lg font-semibold">Nome 2</h3>
                <p class="text-gray-600">Função 2</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg text-center">
                <img src="{{ asset('images/work.jpg') }}" alt="Membro da Equipe" 
                class="w-24 h-24 rounded-full mx-auto object-cover">
                <h3 class="mt-4 text-lg font-semibold">Nome 3</h3>
                <p class="text-gray-600">Função 3</p>
            </div>
            <!-- Adicione mais membros da equipe conforme necessário -->
        </div>
    </section>

    <section class="bg-white shadow-lg rounded-lg p-6 mb-10">
        <h2 class="text-3xl font-semibold text-gray-800 text-center">Entre em Contato</h2>
        <p class="mt-4 text-gray-600 text-center">
            Se você tiver alguma dúvida ou quiser saber mais sobre nossos serviços, não hesite em 
            <a href="{{ route('frontend.contact') }}" class="text-blue-600 hover:underline">entrar em contato conosco</a>.
        </p>
    </section>
</main>

@include('frontend.layouts.footer')

