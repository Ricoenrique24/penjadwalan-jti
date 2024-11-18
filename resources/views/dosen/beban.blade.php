@extends('dosen.default')

@section('content')
    <div class="container mx-auto p-6 mt-10 min-h-screen">

        <div class="flex items-center justify-between p-2 border-b">
            <div class="flex-1 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Beban Kinerja Pegawai</h1>
            </div>
        </div>
        <div class="overflow-x-auto">

            <form class="max-w-md mx-auto my-4">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                {{-- <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Temukan disini..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div> --}}
            </form>
            <table class="w-full border-separate border-spacing-0 text-sm text-gray-700" id="jadwalTable">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="p-3 text-left">No.</th>
                        <th class="p-3 text-left">Mata Kuliah</th>
                        <th class="p-3 text-left">SKS</th>
                        <th class="p-3 text-left">Total Tim Teaching</th>
                        <th class="p-3 text-left">SKS per Individu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matkuls as $index => $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-150">
                            <td class="px-4 py-4">{{ $index + 1 }}</td>
                            <td class="px-4 py-4">{{ $item['matkul'] }}</td>
                            <td class="px-4 py-4">{{ $item['sks'] }}</td>
                            <td class="px-4 py-4">{{ $item['tim_teaching'] }} orang</td>
                            <td class="px-4 py-4">{{ number_format($item['sks_individu'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-bold bg-gray-200">
                        <td colspan="4" class="px-4 py-4 text-right">Total Beban SKS</td>
                        <td class="px-4 py-4"> {{ $total_beban }} </td>
                    </tr>
                </tfoot>
            </table>

        </div>
    @endsection
