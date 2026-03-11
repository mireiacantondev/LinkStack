<div class="hidden md:block">
    <x-guest-layout>
    <h1 class="font-sansation text-3xl md:text-4xl text-[#6A6ECF] mb-6 md:mb-8 text-center lg:text-left">
        Sign Up
    </h1>

    <div class="bg-white p-6 md:p-10 rounded-3xl shadow-[0_0_20px_rgba(106,110,207,1)] border border-gray-100">
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            
            <input type="text" name="name" placeholder="Name" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
            
            <input type="email" name="email" placeholder="Email" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
            
            <input type="password" name="password" placeholder="Password" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
            
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">

            <div class="flex flex-col sm:flex-row items-center justify-between pt-4 gap-4 m-2">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:underline order-2 sm:order-1">
                    Already registered?
                </a>
                <button type="submit" class="w-full sm:w-auto bg-[#6A6ECF] text-white px-10 py-3 rounded-full shadow-lg order-1 sm:order-2">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
</div>

<div class="md:hidden block min-h-screen bg-white font-sans">
    <div class="p-8">
        <div class="flex justify-center mb-5  mt-6">
            <img src="{{ asset('images/logo_color.png') }}" alt="LinkStack Logo" class="h-20 w-auto object-contain">
        </div>

        <h1 class="font-sansation text-3xl text-[#6A6ECF] mb-8 text-center">Sign Up</h1>

        <div class="bg-white p-6 md:p-10 rounded-3xl shadow-[0_0_20px_rgba(106,110,207,1)] border border-gray-100">
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            
            <input type="text" name="name" placeholder="Name" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
            
            <input type="email" name="email" placeholder="Email" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
            
            <input type="password" name="password" placeholder="Password" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
            
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required 
                class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">

            <button type="submit" class="w-full bg-[#6A6ECF] text-white py-4 rounded-2xl shadow-xl font-bold text-lg mt-8 active:scale-95 transition-transform">
                Sign Up
            </button>
            
            <div class="text-center pt-6">
                <p class="text-gray-400 text-sm">Have an account?</p>
                <a href="{{ route('login') }}" class="text-[#6A6ECF] font-bold text-sm">Log In here</a>
            </div>
        </form>
    </div>
        
    </div>
</div>