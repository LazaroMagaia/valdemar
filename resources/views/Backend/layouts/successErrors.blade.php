@if (session('success') || session('error'))
    <div id="notification" class="fixed top-5 right-5 z-[9999] px-4 py-3 rounded-lg shadow-lg w-64 
            {{ session('success') ? 'bg-green-500' : 'bg-red-500' }} opacity-100 transition-opacity duration-500">
        <div class="flex justify-between items-center">
            <span class="text-white">{{ session('success') ?? session('error') }}</span>
            <!--<button onclick="closeNotification()" class="ml-4 text-white font-bold">&times;</button>
            -->
        </div>
        <div id="progressBar" class="mt-2 h-1 bg-white rounded-full" style="width: 0;"></div>
    </div>
@endif
