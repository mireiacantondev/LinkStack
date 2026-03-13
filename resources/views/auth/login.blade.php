<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="hidden md:block p-6 md:p-12 lg:p-16">
        <div class="max-w-xl mx-auto">
            <h1 class="font-sansation text-3xl md:text-4xl text-[#6A6ECF] mb-6 md:mb-8 text-center lg:text-left">
                Log In
            </h1>

            <div class="bg-white p-6 md:p-10 rounded-3xl shadow-[0_0_20px_rgba(106,110,207,1)] border border-gray-100">
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    
                    <div>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus
                            class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
                    </div>
                    
                    <div>
                        <input type="password" name="password" placeholder="Password" required 
                            class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
                    </div>

                    <div class="flex items-center justify-between px-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-[#6A6ECF] focus:ring-[#6A6ECF]">
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-[#6A6ECF] hover:underline" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-between pt-4 gap-4">
                        <a href="{{ route('register') }}" class="text-sm text-gray-500 hover:underline order-2 sm:order-1">
                            Don't have an account? Sign Up
                        </a>
                        <button type="submit" class="w-full sm:w-auto bg-[#6A6ECF] text-white px-10 py-3 rounded-full shadow-lg order-1 sm:order-2">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="md:hidden block min-h-screen bg-white font-sans">
        <div class="p-8">
            <div class="flex justify-center mb-5 mt-6">
                <img src="{{ asset('images/logo_color.png') }}" alt="LinkStack Logo" class="h-20 w-auto object-contain">
            </div>

            <h1 class="font-sansation text-3xl text-[#6A6ECF] mb-8 text-center">Log In</h1>

            <div class="bg-white p-6 rounded-3xl shadow-[0_0_20px_rgba(106,110,207,1)] border border-gray-100">
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    
                    <div>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required 
                            class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
                        <x-input-error :messages="$errors->get('email')" class="mt-1 ml-4" />
                    </div>
                    
                    <div>
                        <input type="password" name="password" placeholder="Password" required 
                            class="block w-full rounded-full border-gray-300 py-3 px-6 focus:ring-[#6A6ECF] shadow-[0_0_20px_rgba(106,110,207,1)]">
                        <x-input-error :messages="$errors->get('password')" class="mt-1 ml-4" />
                    </div>

                    <div class="flex flex-col gap-3 px-2">
                        @if (Route::has('password.request'))
                            <a class="text-xs text-[#6A6ECF] text-right hover:underline" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-[#6A6ECF] text-white py-4 rounded-2xl shadow-xl font-bold text-lg mt-4 active:scale-95 transition-transform">
                        Log In
                    </button>
                    
                    <div class="text-center pt-6">
                        <p class="text-gray-400 text-sm">New here?</p>
                        <a href="{{ route('register') }}" class="text-[#6A6ECF] font-bold text-sm">Create an account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>