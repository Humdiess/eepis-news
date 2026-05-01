<x-dashboard-layout :role="'admin'" :pageTitle="'Kelola Pengguna'" :title="'Pengguna'">
<div x-data="{ showModal: false, editMode: false, deleteModal: false, deleteTarget: '',
    form: { name: '', email: '', role: 'penulis', password: '' },
    openCreate() { this.editMode = false; this.form = { name: '', email: '', role: 'penulis', password: '' }; this.showModal = true; },
    openEdit(u) { this.editMode = true; this.form = { name: u.name, email: u.email, role: u.role, password: '' }; this.showModal = true; }
}">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <x-dashboard.section-header title="Kelola Pengguna" />
        <button @click="openCreate()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-semibold text-sm rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Pengguna
        </button>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <x-dashboard.stat-card title="Total Pengguna" value="8" icon="users" color="cyan" />
        <x-dashboard.stat-card title="Admin" value="2" icon="users" color="blue" />
        <x-dashboard.stat-card title="Penulis" value="6" icon="users" color="green" />
    </div>

    {{-- Users Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Pengguna</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden sm:table-cell">Email</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden md:table-cell">Role</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden lg:table-cell">Bergabung</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden lg:table-cell">Berita</th>
                        <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @php
                        $users = [
                            ['name' => 'Ahmad Fauzi', 'email' => 'ahmad.fauzi@pens.ac.id', 'role' => 'admin', 'date' => '1 Jan 2025', 'posts' => 24, 'initial' => 'AF', 'gradient' => 'from-pens-cyan to-pens-blue'],
                            ['name' => 'Dr. Ir. Zainal Arifin', 'email' => 'zainal@pens.ac.id', 'role' => 'admin', 'date' => '1 Jan 2025', 'posts' => 5, 'initial' => 'ZA', 'gradient' => 'from-violet-500 to-purple-600'],
                            ['name' => 'Siti Nurhaliza', 'email' => 'siti.nurhaliza@pens.ac.id', 'role' => 'penulis', 'date' => '15 Feb 2025', 'posts' => 12, 'initial' => 'SN', 'gradient' => 'from-rose-400 to-pink-600'],
                            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@pens.ac.id', 'role' => 'penulis', 'date' => '20 Mar 2025', 'posts' => 8, 'initial' => 'BS', 'gradient' => 'from-amber-400 to-orange-500'],
                            ['name' => 'Dewi Anggraini', 'email' => 'dewi.anggraini@pens.ac.id', 'role' => 'penulis', 'date' => '5 Apr 2025', 'posts' => 3, 'initial' => 'DA', 'gradient' => 'from-emerald-400 to-teal-600'],
                            ['name' => 'Rizky Pratama', 'email' => 'rizky.pratama@pens.ac.id', 'role' => 'penulis', 'date' => '10 Jun 2025', 'posts' => 6, 'initial' => 'RP', 'gradient' => 'from-blue-400 to-indigo-600'],
                        ];
                    @endphp

                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $user['gradient'] }} flex items-center justify-center text-white font-bold text-sm shadow-sm flex-shrink-0">
                                        {{ $user['initial'] }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-pens-navy">{{ $user['name'] }}</p>
                                        <p class="text-xs text-gray-400 sm:hidden">{{ $user['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                <p class="text-sm text-gray-500">{{ $user['email'] }}</p>
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <x-dashboard.badge :type="$user['role']" variant="role" />
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 hidden lg:table-cell whitespace-nowrap">{{ $user['date'] }}</td>
                            <td class="px-6 py-4 hidden lg:table-cell">
                                <span class="text-sm font-semibold text-pens-navy">{{ $user['posts'] }}</span>
                                <span class="text-xs text-gray-400">berita</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-1">
                                    <button @click="openEdit({ name: '{{ $user['name'] }}', email: '{{ $user['email'] }}', role: '{{ $user['role'] }}' })" class="p-2 text-gray-400 hover:text-pens-cyan hover:bg-pens-cyan/10 rounded-lg transition-all" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <button @click="deleteModal = true; deleteTarget = '{{ $user['name'] }}'" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create/Edit User Modal --}}
    <x-dashboard.modal id="showModal" :title="''" maxWidth="md">
        <template x-if="showModal">
            <div>
                <h3 class="text-lg font-bold text-pens-navy mb-1" x-text="editMode ? 'Edit Pengguna' : 'Tambah Pengguna'"></h3>
                <p class="text-sm text-gray-400 mb-5" x-text="editMode ? 'Perbarui informasi pengguna.' : 'Tambahkan pengguna baru ke sistem.'"></p>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-pens-navy mb-1.5">Nama Lengkap</label>
                        <input type="text" x-model="form.name" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan" placeholder="Nama lengkap">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-pens-navy mb-1.5">Email</label>
                        <input type="email" x-model="form.email" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan" placeholder="email@pens.ac.id">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-pens-navy mb-1.5">Role</label>
                        <select x-model="form.role" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                            <option value="penulis">Penulis</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-pens-navy mb-1.5" x-text="editMode ? 'Password Baru (opsional)' : 'Password'"></label>
                        <input type="password" x-model="form.password" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan" placeholder="••••••••">
                    </div>
                </div>
            </div>
        </template>
        <x-slot name="footer">
            <button @click="showModal = false" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
            <button @click="showModal = false" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all" x-text="editMode ? 'Simpan Perubahan' : 'Tambah Pengguna'"></button>
        </x-slot>
    </x-dashboard.modal>

    {{-- Delete Modal --}}
    <x-dashboard.modal id="deleteModal" title="Hapus Pengguna">
        <div class="text-center py-4">
            <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
            </div>
            <h4 class="text-lg font-bold text-pens-navy mb-2">Yakin ingin menghapus?</h4>
            <p class="text-sm text-gray-500">Pengguna "<span class="font-semibold" x-text="deleteTarget"></span>" akan dihapus permanen.</p>
        </div>
        <x-slot name="footer">
            <button @click="deleteModal = false" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
            <button @click="deleteModal = false" class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">Ya, Hapus</button>
        </x-slot>
    </x-dashboard.modal>
</div>
</x-dashboard-layout>
