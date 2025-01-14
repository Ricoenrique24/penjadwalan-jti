@extends('dosen.default')

@section('content')
    <div class="container mx-auto p-6 mt-12 bg-gray-50 rounded-lg shadow-lg min-h-screen">
        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 bg-white p-5">
            <h1 class="text-2xl font-bold p-3 text-center">Jadwal Perkuliahan</h1>
            <table class="w-full border-separate border-spacing-0 text-sm text-gray-700" id="dataTable">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-3 text-left">Hari</th>
                        <th class="p-3 text-left">Mata Kuliah</th>
                        <th class="p-3 text-left">Jam</th>
                        <th class="p-3 text-left">Kelas</th>
                        <th class="p-3 text-left">Ruangan</th>
                        <th class="p-3 text-left">Dosen</th>
                        <th class="p-3 text-left">Teknisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataJadwal as $index => $jadwal)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-150">
                            <td class="px-4 py-4">{{ $jadwal->hari }}</td>
                            <td class="px-4 py-4">{{ $jadwal->matkul->nama_matkul }}</td>
                            <td class="px-4 py-4">{{ $jadwal->jam->jam_awal }} - {{ $jadwal->jam->jam_akhir }}</td>
                            <td class="px-4 py-4">{{ $jadwal->kelas->golongan }} - {{ $jadwal->kelas->prodi }}
                            <td class="px-4 py-4">{{ $jadwal->ruangan->nama_ruangan }}</td>
                            <td class="px-4 py-4">
                                @foreach ($jadwal->dosens as $res)
                                    {{ $res->dosen->nama_dosen }}
                                    <hr>
                                    <br>
                                @endforeach
                            </td>
                            <td class="px-4 py-4">
                                @foreach ($jadwal->teknisis as $res)
                                    {{ $res->teknisi->nama_teknisi }}
                                    <hr>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#dataTable').DataTable();
    </script>
@endsection
