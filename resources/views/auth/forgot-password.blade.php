<x-guest-layout>
    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-pens-navy">Lupa Password?</h2>
        <p class="text-sm text-gray-400 mt-1 leading-relaxed">
            Tidak masalah. Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang password.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-600 mb-1.5">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan focus:bg-white transition-all"
                    placeholder="nama@pens.ac.id"
                    required autofocus>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit -->
        <button type="submit" class="w-full mt-6 px-6 py-3 bg-gradient-to-r from-pens-blue to-pens-cyan text-white font-semibold text-sm rounded-xl hover:shadow-lg hover:shadow-pens-cyan/25 focus:ring-4 focus:ring-pens-cyan/20 transition-all duration-300 transform hover:-translate-y-0.5">
            Kirim Link Reset Password
        </button>

        <!-- Back to Login -->
        <p class="text-center mt-6 text-sm text-gray-400">
            Ingat password Anda?
            <a href="{{ route('login') }}" class="font-semibold text-pens-cyan hover:text-pens-blue transition-colors">Kembali ke Login</a>
        </p>
    </form>
</x-guest-layout>
