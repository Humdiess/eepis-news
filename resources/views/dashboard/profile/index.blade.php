<x-dashboard-layout :role="'admin'" :pageTitle="'Profil Saya'" :title="'Profil'">
<div x-data="{
    avatarPreview: null,
    handleAvatar(e) {
        const f = e.target.files[0];
        if (f) { const r = new FileReader(); r.onload = (ev) => { this.avatarPreview = ev.target.result; }; r.readAsDataURL(f); }
    },
    showPassword: false,
    saved: false,
    save() { this.saved = true; setTimeout(() => this.saved = false, 3000); }
}">
    <div class="max-w-3xl mx-auto space-y-6">

        {{-- Success Toast --}}
        <div x-show="saved" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-2" class="fixed top-20 right-6 z-50 flex items-center gap-3 px-5 py-3 bg-emerald-500 text-white rounded-xl shadow-lg shadow-emerald-500/30" style="display:none;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-semibold">Profil berhasil diperbarui!</span>
        </div>

        {{-- Avatar & Info --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <x-dashboard.section-header title="Foto Profil" />
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="relative group">
                    <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-pens-cyan to-pens-blue flex items-center justify-center text-white font-bold text-3xl shadow-lg shadow-pens-cyan/20 overflow-hidden">
                        <template x-if="avatarPreview">
                            <img :src="avatarPreview" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!avatarPreview">
                            <span>AF</span>
                        </template>
                    </div>
                    <label class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-2xl opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <input type="file" class="hidden" accept="image/*" @change="handleAvatar($event)">
                    </label>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-pens-navy">Ahmad Fauzi</h3>
                    <p class="text-sm text-gray-400">Administrator</p>
                    <p class="text-xs text-gray-400 mt-1">Bergabung sejak 1 Januari 2025</p>
                </div>
            </div>
        </div>

        {{-- Personal Information --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <x-dashboard.section-header title="Informasi Pribadi" />
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Nama Lengkap</label>
                    <input type="text" value="Ahmad Fauzi" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan focus:bg-white transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Email</label>
                    <input type="email" value="ahmad.fauzi@pens.ac.id" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan focus:bg-white transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Role</label>
                    <input type="text" value="Administrator" disabled class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl text-sm text-gray-500 cursor-not-allowed">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Bergabung</label>
                    <input type="text" value="1 Januari 2025" disabled class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl text-sm text-gray-500 cursor-not-allowed">
                </div>
            </div>
            <div class="mt-6 pt-5 border-t border-gray-100 flex justify-end">
                <button @click="save()" class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-0.5">
                    Simpan Perubahan
                </button>
            </div>
        </div>

        {{-- Password --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <x-dashboard.section-header title="Ubah Password" />
            <div class="space-y-5 max-w-md">
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Password Saat Ini</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan pr-10">
                        <button @click="showPassword = !showPassword" type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg x-show="!showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Password Baru</label>
                    <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-1.5">Konfirmasi Password Baru</label>
                    <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                </div>
            </div>
            <div class="mt-6 pt-5 border-t border-gray-100 flex justify-end">
                <button @click="save()" class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-0.5">
                    Ubah Password
                </button>
            </div>
        </div>

        {{-- Danger Zone --}}
        <div class="bg-white rounded-2xl shadow-sm border border-red-100 p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-1.5 h-8 bg-gradient-to-b from-red-400 to-red-600 rounded-full"></div>
                <h2 class="text-xl font-bold text-red-600">Zona Berbahaya</h2>
            </div>
            <p class="text-sm text-gray-500 mb-4">Setelah akun dihapus, semua data akan hilang secara permanen. Harap pastikan sebelum melanjutkan.</p>
            <button class="px-5 py-2.5 text-sm font-semibold text-red-600 border border-red-200 hover:bg-red-50 rounded-xl transition-colors">
                Hapus Akun Saya
            </button>
        </div>
    </div>
</div>
</x-dashboard-layout>
