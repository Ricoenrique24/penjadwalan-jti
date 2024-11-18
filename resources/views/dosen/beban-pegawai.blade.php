@extends('dosen.default')

@section('content')
    <div class="container mx-auto p-6 mt-12 bg-gray-50 rounded-lg shadow-lg min-h-screen">
        <div
            class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0 p-4 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg shadow-md">
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3M3 11h18M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"></path>
                </svg>
                <p class="text-white text-lg font-semibold">Beban Kerja Pegawai</p>
            </div>
        </div>

        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 bg-white">
            <table class="w-full border-separate border-spacing-0 text-sm text-gray-700" id="jadwalTable">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-3 text-left">No.</th>
                        <th class="p-3 text-left">Mata Kuliah</th>
                        <th class="p-3 text-left">Kelas</th>
                        <th class="p-3 text-left">SKS</th>
                        <th class="p-3 text-left">Jam</th>
                        <th class="p-3 text-left">Ruangan</th>
                        <th class="p-3 text-left">Dosen</th>
                        <th class="p-3 text-left">Teknisi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-150">
                        <td class="px-4 py-4">1</td>
                        <td class="px-4 py-4">Pemrograman Web</td>
                        <td class="px-4 py-4">TI-3A</td>
                        <td class="px-4 py-4">3</td>
                        <td class="px-4 py-4">08:00 - 10:30</td>
                        <td class="px-4 py-4">Lab Komputer 1</td>
                        <td class="px-4 py-4">Dr. Junia Vitasari, S.Tr.Kom., M.T.</td>
                        <td class="px-4 py-4">Budi Santoso</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
