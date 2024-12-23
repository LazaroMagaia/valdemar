<aside id="sidebar" class="w-64 bg-blue-900 text-white flex flex-col fixed h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="p-4 font-bold text-2xl">Dashboard</div>
    <nav class="flex-grow mt-6">
    <ul>
      <li class="p-4 hover:bg-blue-700 cursor-pointer 
         {{ request()->routeIs('admin.index') || request()->routeIs('client.index') || 
          request()->routeIs('company.index') ? 'bg-blue-600' : '' }}">
          @if(auth()->user()->role == 'admin')
            <a href="{{route('admin.index')}}">Home</a>
          @elseif(auth()->user()->role == 'user')
            <a href="{{route('client.index')}}">Home</a>
          @elseif(auth()->user()->role == 'company')
            <a href="{{route('company.index')}}">Home</a>
          @endif
      </li>

      @if(auth()->user()->hasRole(['user']))
      <li class="p-4 hover:bg-blue-700 cursor-pointer 
         {{ request()->routeIs('client.applied_candidates') ? 'bg-blue-600' : '' }}">
         <a href="{{route('client.applied_candidates')}}">Candidaturas</a>
      </li>
      @endif

      
      @if(auth()->user()->hasRole(['admin']))
      <li class="p-4 hover:bg-blue-700 cursor-pointer 
         {{ request()->routeIs('admin.user.index') ? 'bg-blue-600' : '' }}">
         <a href="{{route('admin.user.index')}}">Utilizadores</a>
      </li>
      @endif

      @if(auth()->user()->hasRole(['admin']))
      <li class="p-4 hover:bg-blue-700 cursor-pointer 
         {{ request()->routeIs('admin.category.index') ? 'bg-blue-600' : '' }}">
         <a href="{{route('admin.category.index')}}">Categorias</a>
      </li>
      @endif
      @if(auth()->user()->hasRole(['company']))
      <li class="p-4 hover:bg-blue-700 cursor-pointer 
        {{ request()->routeIs('company.vagas.index') || request()->is('company/vagas/*') ? 'bg-blue-600' : '' }}">
         <a href="{{route('company.vagas.index')}}">Vagas</a>
      </li>
      @endif

      <li class="p-4 hover:bg-blue-700 cursor-pointer 
        {{ request()->is('settings') ? 'bg-blue-600' : '' }}">Settings</li>
  </ul>
    </nav>
    <footer class="p-4">
      <p>&copy; 2024 Dashboard</p>
    </footer>
  </aside>