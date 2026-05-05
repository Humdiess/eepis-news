<x-guest-layout>
    {{-- Header --}}
    <div class="mb-6">
        <div class="w-14 h-14 rounded-2xl bg-pens-cyan/10 flex items-center justify-center mb-4">
            <svg class="w-7 h-7 text-pens-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-pens-navy">Verifikasi Email</h2>
        <p class="text-sm text-gray-400 mt-1 leading-relaxed">
            Terima kasih sudah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik link yang baru saja kami kirimkan. Jika tidak menerima email, kami akan dengan senang hati mengirimkan yang baru.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 p-4 bg-emerald-50 border border-emerald-100 rounded-xl">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-emerald-700 font-medium">
                    Link verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
                </p>
            </div>
        </div>
    @endif

    <div class="flex flex-col sm:flex-row items-center gap-3">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:flex-1">
            @csrf
            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-pens-blue to-pens-cyan text-white font-semibold text-sm rounded-xl hover:shadow-lg hover:shadow-pens-cyan/25 focus:ring-4 focus:ring-pens-cyan/20 transition-all duration-300 transform hover:-translate-y-0.5">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
            @csrf
            <button type="submit" class="w-full px-6 py-3 bg-gray-50 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-100 hover:text-gray-700 focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                Keluar
            </button>
        </form>
    </div>
</x-guest-layout>
