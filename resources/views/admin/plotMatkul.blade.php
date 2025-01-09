@extends('admin.default')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <div class="container mx-auto p-6 mt-12 min-h-screen">
        <div class="flex items-center justify-between p-2 py-5">
            <div class="flex items-center">
                <form action="{{ route('adminPlotMatkul') }}" method="GET" class="flex items-center">
                    <select name="tahun_ajaran" id="tahun_ajaran"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 mr-2"
                        required>
                        @foreach ($tahunAjaran as $tahun)
                            <option value="{{ $tahun->tahun_ajaran }}" @if ($tahunAjaranSelected === $tahun->tahun_ajaran) selected @endif>
                                {{ $tahun->tahun_ajaran }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 text-sm">
                        Pilih
                    </button>
                </form>
            </div>
            <div class="flex-1 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Penjadwalan</h1>
            </div>
        </div>

        <div class="overflow-x-auto  shadow rounded-lg border border-gray-200 bg-white bg-nota p-5">
            <table id="dataTable" class="w-full border-separate border-spacing-0 text-sm text-black">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-2 text-center" rowspan="2">No</th>
                        <th class="p-2 text-center" rowspan="2">Kode</th>
                        <th class="p-2 text-center" rowspan="2">Nama Mata Kuliah</th>
                        <th class="p-2 text-center" colspan="3">SKS</th>
                        <th class="p-2 text-center" rowspan="2">SMT</th>
                        <th class="p-2 text-center" rowspan="2">Koordinator</th>
                        <th class="p-2 text-center" colspan="{{ $dataJadwal->max('jumlah_dosen') }}" rowspan="2">Tim
                            Matakuliah</th>
                        <th class="p-2 text-center" colspan="{{ $dataJadwal->max('jumlah_teknisi') }}" rowspan="2">
                            Teknisi
                        </th>
                    </tr>
                    <tr>
                        <th>J</th>
                        <th>T</th>
                        <th>P</th>

                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($dataJadwal as $i => $dt)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->kd_matkul }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->nama_matkul }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                {{ $dt->matkul->sks_teori + $dt->matkul->sks_praktikum }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->sks_teori }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->sks_praktikum }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->semester }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->matkul->koor_matkul->nama_dosen ?? '' }}
                            </td>
                            @for ($i = 0; $i < $dataJadwal->max('jumlah_dosen'); $i++)
                                <td class="px-4 py-4 text-sm text-gray-700">{{ $dt->dosens[$i]->dosen->nama_dosen ?? '' }}
                                </td>
                            @endfor
                            @for ($i = 0; $i < $dataJadwal->max('jumlah_teknisi'); $i++)
                                <td class="px-4 py-4 text-sm text-gray-700">
                                    {{ $dt->teknisis[$i]->teknisi->nama_teknisi ?? '' }}
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script>
        $('#dataTable').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
@endsection
