<x-guest-layout>
    <nav class="w-full bg-white border-b border-gray-200 p-6 ">
        <div class="container mx-auto flex justify-between items-center">
            <h4 class="text-3xl font-bold">BuatNow</h4>
            <div>
                <a href="{{route('login')}}"  class="text-white px-6 py-4 bg-blue-600 font-semibold rounded-3xl">Login</a>
            </div>
        </div>

    </nav>
    <div class="py-32 flex items-center container mx-auto">

        <div class="w-1/2">
            <img src="{{ asset('img/loginImg.jpg') }}" alt="">
        </div>
        <div class="w-1/2">
            <h1 class="text-7xl font-bold px-8">Manage Your Task <span class="text-blue-700">Seamlessly</span> </h1>
        </div>
        
    </div>
</x-guest-layout>
