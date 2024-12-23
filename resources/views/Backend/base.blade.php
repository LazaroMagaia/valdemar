@include('Backend.layouts.header')
@include('Backend.layouts.sidebar')
@include('Backend.layouts.topbar')
@include('Backend.layouts.successErrors')
    <main class="flex-grow p-8 pt-20 overflow-y-auto bg-gray-100">
        <h1 class="text-2xl font-semibold mb-6">Overview</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example cards -->
            <div class="bg-white p-6 rounded-lg shadow">Card 1</div>
            <div class="bg-white p-6 rounded-lg shadow">Card 2</div>
            <div class="bg-white p-6 rounded-lg shadow">Card 3</div>
            <div class="bg-white p-6 rounded-lg shadow">Card 4</div>
        </div>
    </main>
   
@include('Backend.layouts.footer')