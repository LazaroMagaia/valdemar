@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
<div class="relative w-full h-64 overflow-hidden">
    <img src="{{asset('images/work1.jpg')}}" alt="Banner" class="w-full h-full object-cover">
    <div class="absolute inset-0 flex items-center flex-col justify-center bg-black bg-opacity-50">
        <h1 class="text-white text-3xl md:text-5xl font-bold text-center">Contacto</h1>
        <p class="mt-4 text-lg text-white max-w-2xl mx-auto text-center">
            Nossa missão é conectar talentos a oportunidades excepcionais, oferecendo um serviço 
            de qualidade tanto para candidatos quanto para empresas.
        </p>
    </div>
</div>
<div class="container mx-auto mt-10 p-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Informações de Contato</h2>
            <p class="text-gray-600 mb-2">✉️ Email: contato@llmagaia.com</p>
            <p class="text-gray-600 mb-2">📞 Telefone: (258) 824156987</p>
            <p class="text-gray-600">🏠 Endereço: Maputo, Bairro central</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Localização</h2>
            <div id="map" class="w-full h-64 rounded-lg shadow-md">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14349.93754074731!2d32.6035601!3d-25.9521498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ee69a4eb97f1a8f%3A0xa2740b06f55a4873!2sUniversidade%20Eduardo%20Mondlane!5e0!3m2!1spt-PT!2sus!4v1730261690396!5m2!1spt-PT!2sus" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 mb-10">
        <h2 class="text-3xl font-semibold mb-4 text-gray-800 text-center">Formulário de Contato</h2>
        <form action="" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-12 md:col-span-6">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Mensagem</label>
                        <textarea id="message" name="message" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" rows="4" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 rounded-lg px-4 py-3 transition duration-300">Enviar Mensagem</button>
        </form>
    </div>
</div>


@include('frontend.layouts.footer')