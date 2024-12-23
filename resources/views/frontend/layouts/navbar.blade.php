  <!-- Cabeçalho -->
  <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                <a href="{{route('frontend.home')}}"> Vagas de Emprego</a></h1>
            <button class="md:hidden" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <nav class="hidden md:flex space-x-4">
                <ul class="flex space-x-4">
                    <li><a href="{{route('frontend.home')}}" class="hover:underline">Home</a></li>
                    <li><a href="{{route('frontend.about')}}" class="hover:underline">Sobre</a></li>
                    <li><a href="{{route('frontend.contact')}}" class="hover:underline">Contate-Nos</a></li>
                    @if(Auth::check())
                        <li><a href="{{route('admin.painel.index')}}" class="hover:underline">
                            Painel de controle</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="hover:underline">Sair</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{route('login')}}" class="hover:underline">Entrar</a></li>
                        <li><a href="{{route('register')}}" class="bg-blue-500 hover:bg-blue-400 text-white
                         py-2 px-4 rounded">Registrar</a></li>
                    @endif
                  
                </ul>
            </nav>
        </div>
    </header>

     <!-- Menu Mobile -->
     <div id="mobile-menu" class="md:hidden hidden bg-blue-600 text-white">
        <ul class="flex flex-col p-4 space-y-2">
            <li><a href="{{route('frontend.home')}}" class="hover:underline">Home</a></li>
            <li><a href="{{route('frontend.about')}}" class="hover:underline">Sobre</a></li>
            <li><a href="{{route('frontend.contact')}}" class="hover:underline">Contate-Nos</a></li>
            @if(Auth::check())
                <li><a href="{{route('admin.painel.index')}}" class="hover:underline">Painel de controle</a></li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="hover:underline">Sair</button>
                    </form>
                </li>
            @else
                <li><a href="{{route('login')}}" class="hover:underline">Entrar</a></li>
                <li><a href="{{route('register')}}" class="bg-blue-500 hover:bg-blue-400 text-white
                    py-2 px-4 rounded">Registrar</a></li>
            @endif
        </ul>
    </div>