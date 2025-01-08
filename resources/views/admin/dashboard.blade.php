@extends('admin.default')

@section('content')
    <div class="container mx-auto p-6 mt-12 rounded-lg shadow-lg min-h-screen">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
            <div class="flex items-center w-1/4">
                {{-- <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mr-2">
                Tahun Ajaran
            </label>
            <select id="tahun_ajaran" name="tahun_ajaran" class="block w-full py-1 px-2 border border-gray-300 bg-white rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option>2024/2025</option>
                <option>2023/2024</option>
                <option>2022/2023</option>
            </select> --}}
            </div>
            <div class="w-1/3 text-right">
                <button id="downloadBtn"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300 text-sm">
                    <i class="fa-solid fa-file-arrow-down mr-2"></i> Download Jadwal
                </button>
            </div>
        </div>

        <!-- Elemen yang akan diunduh sebagai PDF -->
        <div class="overflow-x-auto shadow rounded-lg border border-gray-200 bg-white bg-nota p-5" id="pdfContent">
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">Jadwal Kuliah</h1>
                <p class="text-lg">Tahun Ajaran 2024/2025</p>
            </div>
            <table id="dataTable" class="w-full border-separate border-spacing-0 text-sm text-black" id="jadwalTable">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-2 text-left">Hari</th>
                        <th class="p-2 text-left">Jam</th>
                        <th class="p-2 text-left">Mata Kuliah</th>
                        <th class="p-2 text-left">Semester</th>
                        <th class="p-2 text-left">Ruangan</th>
                        <th class="p-2 text-left">Dosen Pengampu</th>
                        <th class="p-2 text-left">Teknisi</th>
                        <th class="p-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($dataJadwal as $i => $dt)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->hari }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->jam->jam_awal }} - {{ $dt->jam->jam_akhir }}
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->nama_matkul }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->semester }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->ruangan->nama_ruangan }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                @foreach ($dt->dosens as $item)
                                    {{ $item->dosen->nama_dosen }}<br>
                                @endforeach
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                @foreach ($dt->teknisis as $item)
                                    {{ $item->teknisi->nama_teknisi }}<br>
                                @endforeach
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                <span
                                    class="px-2 py-1 text-xs font-semibold leading-tight 
                                        @if ($dt->matkul->id_jenis_matkul == 1) text-blue-700 bg-blue-100 dark:bg-blue-700 dark:text-blue-100
                                        @elseif ($dt->matkul->id_jenis_matkul == 2)
                                        text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100 
                                        @else 
                                        text-yellow-700 bg-yellow-100 dark:bg-yellow-700 dark:text-yellow-100 @endif
                                        rounded-full ">
                                    {{ $dt->matkul->jenis_matkul->nama ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const element = document.querySelector('#pdfContent');
            html2pdf()
                .from(element)
                .set({
                    margin: 1,
                    filename: 'jadwal_kuliah.pdf',
                    html2canvas: {
                        scale: 2,
                        background: true,
                        useCORS: true
                    },
                    jsPDF: {
                        orientation: 'landscape',
                        unit: 'in',
                        format: 'letter',
                        compressPDF: true
                    }
                })
                .save();
        });

        $('#dataTable').DataTable();
    </script>
@endsection
