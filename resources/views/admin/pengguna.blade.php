@extends('admin.default')
@section('content')
    <div class="container mx-auto p-6 mt-10 min-h-screen" x-data="{ userRole: 'dosen' }">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Total Admin -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Total Admin</h2>
                        <p class="mt-2 text-3xl font-bold text-blue-600">{{ $totalAdmin }}</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-full flex items-center justify-center  w-16 h-16">
                        <i class="fa-solid fa-user text-3xl text-blue-600"></i>
                    </div>
                </div>
            </div>

            <!-- Card Total Dosen -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Total Dosen</h2>
                        <p class="mt-2 text-3xl font-bold text-green-600">{{ $totalDosen }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-full flex items-center justify-center  w-16 h-16">
                        <i class="fa-solid fa-user-tie text-3xl text-green-600"></i>
                    </div>
                </div>

            </div>

            <!-- Card Total Teknisi -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Total Teknisi</h2>
                        <p class="mt-2 text-3xl font-bold text-red-600">{{ $totalTeknisi }}</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-full flex items-center justify-center  w-16 h-16">
                        <i class="fa-solid fa-user-gear text-3xl text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="flex justify-between items-center my-8">
                <!-- Filter Form -->
                <form class="flex items-center w-2/3">
                    <div class="flex w-full">
                        <label for="search-dropdown"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                        <button id="dropdown-button" data-dropdown-toggle="dropdown"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">Pilih Status
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dosen</button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Teknisi</button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin</button>
                                </li>
                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Temukan Pengguna Disini..." required />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Button Tambah Pengguna -->
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 text-sm ml-4"
                    type="button">
                    <i class="fa-solid fa-plus"></i> Pengguna
                </button>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto  shadow rounded-lg border border-gray-200 bg-white bg-nota p-5">
                <table id="dataTable" class="w-full border-separate border-spacing-0 text-sm text-black">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="p-2 text-center">Pengguna</th>
                            <th class="p-2 text-center">Email</th>
                            <th class="p-2 text-center">Status</th>
                            <th class="p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-center" id="dosenTableBody">
                        @foreach ($pengguna as $index => $item)
                            <tr class="border-b border-gray-200">
                                <td class="p-2">{{ $item->name }}</td>
                                <td class="p-2">{{ $item->email }}</td>
                                <td class="p-2">{{ $item->status }} </td>
                                <td class="p-2">
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('adminPengguna.destroy', $item->id) }}"method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-8 h-8 text-white bg-red-700 border border-red-600 rounded shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 ml-1"
                                            onclick="confirmDelete('{{ $item->id }}', '{{ $item->name }}')">
                                            <i class="fa-regular fa-trash-can text-base"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex items-center justify-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-black">Tambah Pengguna</h3>
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
                    <form action="{{ route('adminPengguna.store') }}" method="POST" class="p-4">
                        @csrf

                        <div class="text-left">
                            <label for="status" class="block text-sm font-medium text-gray-900">Status</label>
                            <select name="status" id="status" x-model="userRole"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="dosen">Dosen</option>
                                <option value="teknisi">Teknisi</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="text-left mt-4">
                            <label class="block text-sm font-medium text-gray-900 mb-1" for="pair"
                                x-show="userRole !== 'admin'">
                                Pilih <span x-text="userRole"></span>
                            </label>

                            <select id="dosen" name="dosen"
                                class="selectpicker-tag bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                style="width: 100%" data-placeholder="Select Koordinator" data-allow-clear="false"
                                title="Select Dosen..." x-show="userRole === 'dosen'" required>
                                <option selected disabled>
                                    Pilih Dosen</option>
                                @foreach ($dosen as $ds)
                                    <option value="{{ $ds->id }}">
                                        {{ $ds->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>

                            <select id="teknisi" name="teknisi"
                                class="selectpicker-tag bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                style="width: 100%" data-placeholder="Select Koordinator" data-allow-clear="false"
                                title="Select Teknisi..." x-show="userRole === 'teknisi'" required>
                                <option selected disabled>
                                    Pilih teknisi</option>
                                @foreach ($teknisi as $ts)
                                    <option value="{{ $ts->id }}">
                                        {{ $ts->nama_teknisi }}
                                    </option>
                                @endforeach
                            </select>


                        </div>

                        <div x-show="userRole === 'admin'">
                            <div class="text-left mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-900">Nama
                                    Pengguna</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    placeholder="Masukkan Nama Pengguna" required>
                            </div>

                            <div class="text-left mt-4">
                                <label for="email" class="block text-sm font-medium text-gray-900">Email
                                    Pengguna</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                    placeholder="Masukkan Email Pengguna" required>
                            </div>
                        </div>


                        <div class="text-left mt-4">
                            <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                placeholder="Masukkan Password" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 font-medium text-sm my-2">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Custom Pagination -->
        {{-- @if ($pengguna->total() > 5)
            <div class="flex flex-col items-center my-6">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Menampilkan <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $pengguna->firstItem() }}</span>
                    sampai
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $pengguna->lastItem() }}</span> dari
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $pengguna->total() }}</span> pengguna
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    <button {{ $pengguna->onFirstPage() ? 'disabled' : '' }}
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        {{ $pengguna->previousPageUrl() ? 'onclick=window.location.href=\'' . $pengguna->previousPageUrl() . '\'' : '' }}>
                        Sebelumnya
                    </button>
                    <button {{ !$pengguna->hasMorePages() ? 'disabled' : '' }}
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        {{ $pengguna->nextPageUrl() ? 'onclick=window.location.href=\'' . $pengguna->nextPageUrl() . '\'' : '' }}>
                        Selanjutnya
                    </button>
                </div>
            </div>
        @endif --}}
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

        function confirmDelete(id, nama) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan user " + nama,
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
        $(document).ready(function() {
            $('#dataTable').DataTable();
            $('.selectpicker').select2();
        });
    </script>
@endsection
