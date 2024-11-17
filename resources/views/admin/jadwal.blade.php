@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@extends('admin.default')
@section('content')
    <div class="container mx-auto p-6 mt-12 min-h-screen">
        <div class="flex items-center justify-between p-2 border-b">
            <div class="flex-1 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Penjadwalan</h1>
            </div>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 text-sm"
                type="button">
                <i class="fa-solid fa-plus"></i> Penjadwalan
            </button>
        </div>

        <div class="overflow-x-auto shadow rounded-lg border border-gray-200 bg-white my-4">
            <table class="w-full border-separate border-spacing-0 text-sm text-black">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-2 text-left">Hari</th>
                        <th class="p-2 text-left">Jam</th>
                        <th class="p-2 text-left">Mata Kuliah</th>
                        <th class="p-2 text-left">Semester</th>
                        <th class="p-2 text-left">Dosen Pengampu</th>
                        <th class="p-2 text-left">Teknisi</th>
                        <th class="p-2 text-left">Ruangan</th>
                        <th class="p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @php
                        // Array jadwal kuliah contoh
                        $jadwal = [
                            [
                                'hari' => 'Senin',
                                'jam' => '08:00 - 10:00',
                                'mata_kuliah' => 'Algoritma',
                                'sks' => 3,
                                'semester' => 1,
                                'dosen' => 'Dr. John Doe',
                                'teknisi' => 'Jane Smith',
                                'ruangan' => 'Lab Komputer 1',
                            ],
                            [
                                'hari' => 'Selasa',
                                'jam' => '10:00 - 12:00',
                                'mata_kuliah' => 'Database',
                                'sks' => 3,
                                'semester' => 2,
                                'dosen' => 'Prof. Jane Doe',
                                'teknisi' => 'Tom James',
                                'ruangan' => 'Lab Komputer 2',
                            ],
                            [
                                'hari' => 'Rabu',
                                'jam' => '13:00 - 15:00',
                                'mata_kuliah' => 'Jaringan',
                                'sks' => 4,
                                'semester' => 3,
                                'dosen' => 'Dr. Alan Turing',
                                'teknisi' => 'Anna Clark',
                                'ruangan' => 'Lab Jaringan',
                            ],
                            [
                                'hari' => 'Kamis',
                                'jam' => '15:00 - 17:00',
                                'mata_kuliah' => 'Pemrograman Web',
                                'sks' => 4,
                                'semester' => 4,
                                'dosen' => 'Mr. Linus Torvalds',
                                'teknisi' => 'David Johnson',
                                'ruangan' => 'Lab Komputer 3',
                            ],
                            [
                                'hari' => 'Jumat',
                                'jam' => '08:00 - 10:00',
                                'mata_kuliah' => 'Kecerdasan Buatan',
                                'sks' => 3,
                                'semester' => 5,
                                'dosen' => 'Ms. Ada Lovelace',
                                'teknisi' => 'Sarah White',
                                'ruangan' => 'Lab AI',
                            ],
                        ];
                    @endphp

                    @foreach ($dataJadwal as $i => $dt)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['hari'] }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['jam'] }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['matkul'] }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['semester'] }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['dosen'] }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['teknisi'] }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt['ruangan'] }}</td>
                            <td class="p-2">
                                <button type="button" data-modal-target="#edit-item-modal-{{ $i }}"
                                    class="inline-flex items-center justify-center w-8 h-8 text-gray-800 bg-gray-200 border border-gray-300 rounded-sm shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </button>
                                <form id="delete-form-{{ $i }}" action="{{ route('adminJadwal.destroy', $i) }}"  method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-white bg-red-700 border border-red-600 rounded shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 ml-1"
                                        onclick="confirmDelete('{{ $i }}')">
                                        <i class="fa-regular fa-trash-can text-base"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal Edit Dosen -->
<div id="edit-item-modal-<?php echo $i; ?>" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto h-modal hidden">
    <div class="relative w-full max-w-full md:max-w-md h-full max-h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:text-gray-500 dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="#edit-item-modal-<?php echo $i; ?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-900 my-4">Edit Penjadwalan</h3>
                <form action="{{ route('adminJadwal.update', $i) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Hari -->
                        <div class="text-left">
                            <label for="hari" class="block text-sm font-medium text-gray-900">Hari</label>
                            <select name="hari" id="hari"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                <option value="Senin" {{ $dt->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $dt->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $dt->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $dt->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $dt->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            </select>
                        </div>

                        <!-- Jam -->
                        <div class="text-left">
                            <label for="jam" class="block text-sm font-medium text-gray-900">Jam</label>
                            <select name="jam" id="jam"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                @foreach ($jam as $item)
                                    <option value="{{ $item->jam_awal }} - {{ $item->jam_akhir }}" 
                                    {{ $dt->jam == $item->jam_awal . ' - ' . $item->jam_akhir ? 'selected' : '' }}>
                                        {{ $item->jam_awal }} - {{ $item->jam_akhir }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mata Kuliah -->
                        <div class="text-left">
                            <label for="mata_kuliah" class="block text-sm font-medium text-gray-900">Mata Kuliah</label>
                            <select name="mata_kuliah" id="mata_kuliah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                @foreach ($mataKuliah as $item)
                                    <option value="{{ $item->id }}" 
                                    {{ $dt->id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_matkul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tahun Ajaran -->
                        <div class="text-left">
                            <label for="tahun_ajaran" class="block text-sm font-medium text-gray-900">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" id="tahun_ajaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                placeholder="2023/2024" value="{{ $dt->tahun_ajaran }}" required>
                        </div>

                        <!-- Semester -->
                        <div class="text-left">
                            <label for="semester" class="block text-sm font-medium text-gray-900">Semester</label>
                            <select name="semester" id="semester"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ $dt->semester == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Dosen Pengampu -->
                        <div class="text-left">
                            <label for="dosen" class="block text-sm font-medium text-gray-900">Dosen Pengampu</label>
                            <select name="dosen" id="dosen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}" 
                                    {{ $dt->id_dosen == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Teknisi -->
                        <div class="text-left">
                            <label for="teknisi" class="block text-sm font-medium text-gray-900">Teknisi</label>
                            <select name="teknisi" id="teknisi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                @foreach ($teknisi as $item)
                                    <option value="{{ $item->id }}" 
                                    {{ $dt->id_teknisi == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_teknisi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Ruangan -->
                        <div class="text-left">
                            <label for="ruangan" class="block text-sm font-medium text-gray-900">Ruangan</label>
                            <select name="ruangan" id="ruangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                @foreach ($ruangan as $item)
                                    <option value="{{ $item->nama_ruangan }}" 
                                    {{ $dt->ruangan == $item->nama_ruangan ? 'selected' : '' }}>
                                        {{ $item->nama_ruangan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 font-medium text-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal Tambah Dosen -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex items-center justify-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-6 w-full max-w-lg max-h-full"> <!-- Memperbesar modal -->
                <div class="relative bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-black">Tambah Penjadwalan</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                            data-modal-toggle="crud-modal" data-modal-hide="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('adminJadwal.store') }}" method="POST" class="p-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-left">
                                <label for="hari" class="block text-sm font-medium text-gray-900">Hari</label>
                                <select name="hari" id="hari"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>

                            <div class="text-left">
                                <label for="jam" class="block text-sm font-medium text-gray-900">Jam</label>
                                <select name="jam" id="jam"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                    @foreach ($jam as $item)
                                        <option value="{{ $item->jam_awal }} - {{ $item->jam_akhir }}">{{ $item->jam_awal }} - {{ $item->jam_akhir }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-left">
                                <label for="mata_kuliah" class="block text-sm font-medium text-gray-900">Mata
                                    Kuliah</label>
                                <select name="mata_kuliah" id="mata_kuliah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                     @foreach ($mataKuliah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_matkul }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-left">
                                <label for="tahun_ajaran" class="block text-sm font-medium text-gray-900">Tahun
                                    Ajaran</label>
                                <input type="text" name="tahun_ajaran" id="tahun_ajaran"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    placeholder="2023/2024" required>
                            </div>

                            <div class="text-left">
                                <label for="semester" class="block text-sm font-medium text-gray-900">Semester</label>
                                <select name="semester" id="semester"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>

                            <div class="text-left">
                                <label for="dosen" class="block text-sm font-medium text-gray-900">Dosen
                                    Pengampu</label>
                                <select name="dosen" id="dosen"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                     @foreach ($dosen as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-left">
                                <label for="teknisi" class="block text-sm font-medium text-gray-900">Teknisi</label>
                                <select name="teknisi" id="teknisi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                     @foreach ($teknisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_teknisi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-left">
                                <label for="ruangan" class="block text-sm font-medium text-gray-900">Ruangan</label>
                                <select name="ruangan" id="ruangan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    required>
                                    @foreach ($ruangan as $item)
                                        <option value="{{ $item->nama_ruangan }}">{{ $item->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 font-medium text-sm">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('[data-modal-target]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-target');
                document.querySelector(modalId).classList.remove('hidden');
            });
        });
        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-hide');
                document.querySelector(modalId).classList.add('hidden');
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan jam perkuliahan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika konfirmasi, submit form penghapusan
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
