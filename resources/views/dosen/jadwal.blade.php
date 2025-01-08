@extends('dosen.default')

@section('content')
    <div class="container mx-auto p-6 mt-12 bg-gray-50 rounded-lg shadow-lg min-h-screen">
        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 bg-white">
          <h1 class="text-2xl font-bold p-3 text-center">Jadwal Perkuliahan</h1>
            <table class="w-full border-separate border-spacing-0 text-sm text-gray-700" id="jadwalTable">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-3 text-left">Hari</th>
                        <th class="p-3 text-left">Mata Kuliah</th>
                        <th class="p-3 text-left">Jam</th>
                        <th class="p-3 text-left">Ruangan</th>
                        <th class="p-3 text-left">Dosen</th>
                        <th class="p-3 text-left">Teknisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataJadwal as $index => $jadwal)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-150">
                            <td class="px-4 py-4">{{ $jadwal->hari }}</td>
                            <td class="px-4 py-4">{{ $jadwal->matkul->nama_matkul ?? '-' }}</td> <!-- Menampilkan nama mata kuliah -->
                            <td class="px-4 py-4">{{ $jadwal->jam->jam_awal ?? '-' }} - {{ $jadwal->jam->jam_akhir ?? '-' }}</td> <!-- Menampilkan ID jam atau sesuaikan -->
                            <td class="px-4 py-4">{{ $jadwal->id_ruangan ?? '-' }}</td> <!-- Menampilkan ID ruangan atau sesuaikan -->
                            <td class="px-4 py-4">{{ $jadwal->dosen->nama_dosen ?? '-' }}</td> <!-- Menampilkan nama dosen -->
                            <td class="px-4 py-4">{{ $jadwal->teknisi->nama_teknisi ?? '-' }}</td> <!-- Menampilkan nama teknisi -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
