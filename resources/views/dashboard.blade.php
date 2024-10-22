@extends('default')

@section('content')
<div class="container mx-auto p-6 mt-12 bg-gray-50 rounded-lg shadow-lg min-h-screen">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
        <div class="flex items-center w-1/4">
            <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mr-2">
                Tahun Ajaran
            </label>
            <select id="tahun_ajaran" name="tahun_ajaran" class="block w-full py-1 px-2 border border-gray-300 bg-white rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option>2024/2025</option>
                <option>2023/2024</option>
                <option>2022/2023</option>
            </select>
        </div>
        <div class="w-1/3 text-right">
            <button id="downloadBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300 text-sm">
                <i class="fa-solid fa-file-arrow-down mr-2"></i> Download Jadwal
            </button>
        </div>
    </div>

    <!-- Elemen yang akan diunduh sebagai PDF -->
    <div class="overflow-x-auto shadow rounded-lg border border-gray-200 bg-white bg-nota" id="pdfContent">
      <div class="text-center mb-4">
          <h1 class="text-2xl font-bold">Jadwal Kuliah</h1>
          <p class="text-lg">Tahun Ajaran 2024/2025</p>
      </div>
      <table class="w-full border-separate border-spacing-0 text-sm text-black" id="jadwalTable">
        <thead class="bg-gray-200 text-gray-800">
            <tr>
                <th class="p-2 text-left">Hari</th>
                <th class="p-2 text-left">Jam</th>
                <th class="p-2 text-left">Mata Kuliah</th>
                <th class="p-2 text-left">Dosen Pengampu</th>
                <th class="p-2 text-left">Kelas</th>
                <th class="p-2 text-left">Semester</th>
                <th class="p-2 text-left">Ruangan</th>
                <th class="p-2 text-left">Teknisi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @php
                $jadwal = [
                    ['hari' => 'Senin', 'jam' => '08:00 - 10:00', 'mata_kuliah' => 'Algoritma', 'dosen' => 'Dr. John Doe', 'kelas' => 'A', 'semester' => 1, 'ruangan' => 'Lab Komputer 1', 'teknisi' => 'Jane Smith'],
                    ['hari' => 'Selasa', 'jam' => '10:00 - 12:00', 'mata_kuliah' => 'Database', 'dosen' => 'Prof. Jane Doe', 'kelas' => 'B', 'semester' => 2, 'ruangan' => 'Lab Komputer 2', 'teknisi' => 'Tom James'],
                    ['hari' => 'Rabu', 'jam' => '13:00 - 15:00', 'mata_kuliah' => 'Jaringan', 'dosen' => 'Dr. Alan Turing', 'kelas' => 'C', 'semester' => 3, 'ruangan' => 'Lab Jaringan', 'teknisi' => 'Anna Clark'],
                    ['hari' => 'Kamis', 'jam' => '15:00 - 17:00', 'mata_kuliah' => 'Pemrograman Web', 'dosen' => 'Mr. Linus Torvalds', 'kelas' => 'D', 'semester' => 4, 'ruangan' => 'Lab Komputer 3', 'teknisi' => 'David Johnson'],
                    ['hari' => 'Jumat', 'jam' => '08:00 - 10:00', 'mata_kuliah' => 'Kecerdasan Buatan', 'dosen' => 'Ms. Ada Lovelace', 'kelas' => 'E', 'semester' => 5, 'ruangan' => 'Lab AI', 'teknisi' => 'Sarah White'],
                ];
            @endphp

            @foreach($jadwal as $data)
            <tr class="border-b border-gray-200">
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['hari'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['jam'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['mata_kuliah'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['dosen'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['kelas'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['semester'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['ruangan'] }}</td>
                <td class="px-4 py-4 text-sm text-gray-700">{{ $data['teknisi'] }}</td>
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
</script>
@endsection
