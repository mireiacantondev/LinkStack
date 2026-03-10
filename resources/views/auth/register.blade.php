<x-guest-layout>
    <div class="w-full px-4 py-8">
        
        <div class="w-full max-w-xl mx-auto">
            
            <h1 class="font-sansation text-3xl md:text-4xl text-[#6A6ECF] mb-6 text-left">
                Sign Up
            </h1>

            <div class="bg-white p-6 md:p-10 rounded-2xl shadow-[0_0_20px_rgba(106,110,207,0.5),0_0_60px_rgba(106,110,207,0.3)] border border-gray-100">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    
                    <div>
                        <input type="text" name="name" placeholder="Name" required
                            class="block w-full rounded-full border-gray-300 shadow-sm focus:border-[#6A6ECF] focus:ring-[#6A6ECF] shadow-[0_0_10px_rgba(106,110,207,0.6),0_0_30px_rgba(106,110,207,0.4)] py-3 px-6 transition duration-200">
                    </div>

                    <div>
                        <input type="email" name="email" placeholder="Email" required
                            class="block w-full rounded-full border-gray-300 shadow-sm focus:border-[#6A6ECF] focus:ring-[#6A6ECF] shadow-[0_0_10px_rgba(106,110,207,0.6),0_0_30px_rgba(106,110,207,0.4)] py-3 px-6 transition duration-200">
                    </div>

                    <div>
                        <input type="password" name="password" placeholder="Password" required
                            class="block w-full rounded-full border-gray-300 shadow-sm focus:border-[#6A6ECF] focus:ring-[#6A6ECF] shadow-[0_0_10px_rgba(106,110,207,0.6),0_0_30px_rgba(106,110,207,0.4)] py-3 px-6 transition duration-200">
                    </div>

                    <div>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                            class="block w-full rounded-full border-gray-300 shadow-sm focus:border-[#6A6ECF] focus:ring-[#6A6ECF] shadow-[0_0_10px_rgba(106,110,207,0.6),0_0_30px_rgba(106,110,207,0.4)] py-3 px-6 transition duration-200">
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-[#6A6ECF] transition hover:underline">
                            Already registered?
                        </a>
                        <button type="submit" 
                            class="bg-[#6A6ECF] text-white px-8 py-3 rounded-full hover:bg-[#585db5] transition duration-200 ">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>