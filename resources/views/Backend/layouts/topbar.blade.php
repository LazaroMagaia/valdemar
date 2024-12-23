
<div id="main-content" class="w-full md:w-[calc(100%-16rem)] flex flex-col transition-all duration-300 ml-0 md:ml-64">
<!-- Topbar with sidebar toggle button on mobile -->

<header class="bg-white shadow p-4 flex justify-between items-center fixed top-0 left-0 right-0 z-10 md:left-64">
  <div class="flex items-center space-x-4">
    <!-- Sidebar Toggle Button for Mobile -->
    <button onclick="toggleSidebar()" class="p-2 rounded-md bg-gray-200 md:hidden">☰</button>
    <div class="text-xl font-bold">Dashboard</div>
  </div>

  <div class="flex items-center space-x-4">
    <!-- Notificações -->
     <!--
    <div class="relative">
      <button onclick="toggleDropdown('notification-dropdown')" class="p-2 rounded-full bg-gray-200 relative">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
        </svg>
        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
      </button>
      <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20">
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Notificação 1</a>
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Notificação 2</a>
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Notificação 3</a>
      </div>
    </div>
    -->
    <!-- Profile Picture with Dropdown -->
    <div class="relative">
      <img src="{{asset('images/user.png')}}" alt="User Profile" class="w-10 h-10 rounded-full cursor-pointer" onclick="toggleDropdown('profile-dropdown')" />
      <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20">
 
        @if(auth()->user()->role == 'user')
        <a href="{{route('client.perfil')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Perfil</a>
        @endif
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-200">Sair</button>
        </form>
      </div>
    </div>
  </div>
</header>