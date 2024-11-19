@extends('layout.navbar')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4">
        <div
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="text" name="flow_category" value="all" class="hidden">
                            <button type="submit"
                                class="flex w-full items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == 'all' || session()->get('flow_category') == '' ? 'bg-gray-100' : '' }} hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                                </svg>
                                Semua
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="number" name="flow_category" value="1" class="hidden">
                            <button type="submit"
                                class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == 1 ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                                </svg>
                                Barang masuk
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="number" name="flow_category" value="2" class="hidden">
                            <button type="submit"
                                class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == '2' ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                                Barang keluar
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="number" name="flow_category" value="3" class="hidden">
                            <button type="submit"
                                class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == '3' ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.49 12 3.75-3.751m0 0-3.75-3.75m3.75 3.75H3.74V19.5" />
                                </svg>
                                Pindah inventory
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="number" name="flow_category" value="4" class="hidden">
                            <button type="submit"
                                class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == 4 ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                </svg>
                                Split stock
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="number" name="flow_category" value="5" class="hidden">
                            <button type="submit"
                                class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == 5 ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                </svg>
                                Pindah ke asset
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('goods.flow') }}">
                            <input type="number" name="flow_category" value="6" class="hidden">
                            <button type="submit"
                                class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg {{ session()->get('flow_category') == '6' ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                Update stock
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="my-4 md:col-span-2 xl:col-span-3 space-y-1">
            <div
                class="pb-10 mb-6 border-b border-gray-200 dark:border-neutral-700 md:flex md:justify-between space-y-2 md:space-y-0">


                <div class="flex items-center">

                    <div class="mx-1 hs-dropdown [--auto-close:inside] relative sm:inline-flex z-20">
                        <button id="hs-dropdown-auto-close-inside" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:focus:outline-none focus:disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            Filter lokasi
                            <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16"
                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-auto-close-inside">
                            <form action="">
                                <div
                                    class="p-1 space-y-0.5 max-h-60 overflow-y-auto [&::-webkit-scrollbar]:w-2
                                    [&::-webkit-scrollbar-track]:bg-gray-100
                                    [&::-webkit-scrollbar-thumb]:bg-gray-300
                                    dark:[&::-webkit-scrollbar-track]:bg-neutral-700
                                    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                                    @php
                                        // Ambil array flow_placement dari sesi, gunakan array kosong jika tidak ada
                                        $flowPlacement = session()->get('flow_placement', []);
                                    @endphp

                                    @foreach ($placements as $placement)
                                        @php
                                            // Periksa apakah place_id ada di flowPlacement
                                            $selectedPlacement = in_array($placement->place_id, $flowPlacement);
                                        @endphp
                                        <div
                                            class="flex items-center gap-x-2 py-2 px-3 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700">
                                            <input id="hs-dropdown-item-checkbox-{{ $placement->place_id }}"
                                                name="flow_placement[]" type="checkbox"
                                                value="{{ $placement->place_id }}"
                                                class="shrink-0 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                {{ $selectedPlacement ? 'checked' : '' }}>
                                            <label for="hs-dropdown-item-checkbox-{{ $placement->place_id }}"
                                                class="grow">
                                                <span
                                                    class="block text-sm text-gray-800 dark:text-neutral-300">{{ $placement->place ? $placement->place->name : '-' }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit"
                                    class="py-2 px-3 mt-1 w-full flex justify-center inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid justify-center sm:flex sm:justify-start sm:items-center gap-2 me-10">
                        <div class="flex justify-center items-center gap-x-5">
                            <!-- Dropdown -->
                            <div class="hs-dropdown [--placement:top-left] relative inline-flex">
                                <button id="hs-default-bordered-pagination-dropdown" type="button"
                                    class="hs-dropdown-toggle py-2 px-2.5 font-medium inline-flex items-center gap-x-1 text-sm rounded-lg border border-gray-200 text-gray-800 shadow-sm hover:focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                    @if (session()->has('filter_date_range'))
                                        {{ session()->get('filter_date_range') }}
                                    @else
                                        Filter hari
                                    @endif
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </button>
                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 hidden z-50 transition-[margin,opacity] opacity-0 duration-300 mb-2 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                    aria-labelledby="hs-default-bordered-pagination-dropdown">
                                    <form action="" method="get" autocomplete="off">
                                        <input type="text" value="semua data" name="filter_date_range"
                                            class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            semua data
                                            @if (session()->get('filter_date_range') == null)
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="" method="get" autocomplete="off">
                                        <input type="text" value="hari ini" name="filter_date_range" class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            hari ini
                                            @if (session()->get('filter_date_range') == 'hari ini')
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="" method="get">
                                        <input type="text" value="7 hari terakhir" name="filter_date_range"
                                            class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            7 hari terakhir
                                            @if (session()->get('filter_date_range') == '7 hari terakhir')
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="" method="get" autocomplete="off">
                                        <input type="text" value="30 hari terakhir" name="filter_date_range"
                                            class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            30 hari terakhir
                                            @if (session()->get('filter_date_range') == '30 hari terakhir')
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="" method="get" autocomplete="off">
                                        <input type="text" value="90 hari terakhir" name="filter_date_range"
                                            class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            90 hari terakhir
                                            @if (session()->get('filter_date_range') == '90 hari terakhir')
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="" method="get" autocomplete="off">
                                        <input type="text" value="180 hari terakhir" name="filter_date_range"
                                            class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            180 hari terakhir
                                            @if (session()->get('filter_date_range') == '180 hari terakhir')
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="" method="get" autocomplete="off">
                                        <input type="text" value="1 tahun terakhir" name="filter_date_range"
                                            class="hidden">
                                        <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                            1 tahun terakhir
                                            @if (session()->get('filter_date_range') == '1 tahun terakhir')
                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                    </div>

                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                        <button id="hs-as-table-table-export-dropdown" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:focus:outline-none focus:disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            Export
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-50 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical"
                            aria-labelledby="hs-as-table-table-export-dropdown">
                            <div class="py-2 first:pt-0 last:pb-0">
                                <span
                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                    Options
                                </span>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    href="#">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                    </svg>
                                    Print
                                </a>
                            </div>
                            <div class="py-2 first:pt-0 last:pb-0">
                                <span
                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                    Download options
                                </span>
                                <button type="button"
                                    class="flex w-full items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-export-flow-data-excel"
                                    data-hs-overlay="#hs-export-flow-data-excel">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                    Excel
                                </button>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    href="#">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                    </svg>
                                    .CSV
                                </a>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    href="#">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                        <path
                                            d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                    </svg>
                                    .PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <x-modal title="Pilih Data Yang Ingin Diexport" labelId="export-flow-data-excel"
                        href="{{ route('flow.export.excel') }}" method="get">
                        <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">
                            <div class="space-y-4">
                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-tanggal" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span
                                                    class="block font-medium text-gray-800 dark:text-neutral-200">Tanggal</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport tanggal</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-tanggal" name="tanggal" value="Tanggal"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-nama-barang" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span class="block font-medium text-gray-800 dark:text-neutral-200">Nama
                                                    Barang</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport nama barang</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-nama-barang" name="nama_barang"
                                            value="Nama Barang"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-deskripsi" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span
                                                    class="block font-medium text-gray-800 dark:text-neutral-200">Desripsi</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport deskripsi</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-deskripsi" name="deskripsi"
                                            value="Deskripsi"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-type" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span class="block font-medium text-gray-800 dark:text-neutral-200">Tipe
                                                    Transaksi</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport tipe transaksi</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-type" name="tipe_transaksi"
                                            value="Tipe Transaksi"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-base-inventory" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span class="block font-medium text-gray-800 dark:text-neutral-200">Base
                                                    Inventory</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport base inventory</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-base-inventory" name="base_inventory"
                                            value="Base Inventory"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-destination" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span
                                                    class="block font-medium text-gray-800 dark:text-neutral-200">Destination
                                                    Inventory</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport destination inventory</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-destination" name="destination"
                                            value="Destination Inventory"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-tipe-pengeluaran" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span class="block font-medium text-gray-800 dark:text-neutral-200">Tipe
                                                    Pengeluaran</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport Type Pengeluaran</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-tipe-pengeluaran" name="tipe_pengeluaran"
                                            value="Tipe Pengeluaran"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-gambar" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span
                                                    class="block font-medium text-gray-800 dark:text-neutral-200">Jumlah</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport jumlah</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-gambar" name="jumlah" value="Jumlah"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-sisa-stok" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span class="block font-medium text-gray-800 dark:text-neutral-200">Sisa
                                                    Stok</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport sisa stock</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-sisa-stok" name="sisa_stok"
                                            value="Sisa Stok"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                                <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                    <label for="hs-export-nama-operator" class="flex gap-x-5 p-4 justify-between">
                                        <span class="flex gap-x-5">
                                            <span class="grow">
                                                <span class="block font-medium text-gray-800 dark:text-neutral-200">Nama
                                                    Operator</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">checklist
                                                    jika ingin mengexport nama operator</span>
                                            </span>
                                        </span>

                                        <input type="checkbox" id="hs-export-nama-operator" name="operator"
                                            value="Operator"
                                            class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none  dark:bg-neutral-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    </label>
                                </div>

                            </div>
                        </div>
                    </x-modal>

                </div>

                <form>
                    <div class="flex items-center gap-2">
                        <div id="date-range-picker" date-rangepicker class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date start"
                                    value="{{ session()->has('start') ? \Carbon\Carbon::parse(session()->get('start'))->format('m/d/Y') : '' }}">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date end"
                                    value="{{ session()->has('end') ? \Carbon\Carbon::parse(session()->get('end'))->format('m/d/Y') : '' }}">
                            </div>
                        </div>
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            @foreach ($flowOfGoods as $flow)
                {{-- @if ($flow->created_at != $flowOfGoods[$increaseIndex]->created_at)
                    <h4>{{ $flow->created_at->isoFormat('D MMMM, Y') }}</h4>
                @endif --}}
                <a href="{{ route('goods.show', $flow->goods_id) }}" class="mb-2">

                    <div class="hs-tooltip-toggle block text-center">
                        <button type="button" class="mb-2 w-full">
                            <div class="hover:bg-gray-100 py-2 px-3 rounded-2xl flex items-center justify-between">
                                <div class="flex gap-4">
                                    <div
                                        class="min-h-12 h-12 min-w-12 w-12 mt-1 text-gray-600 bg-gray-200/75 flex items-center justify-center rounded-full">
                                        @if ($flow->goods_flow_type_id == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                                            </svg>
                                        @elseif ($flow->goods_flow_type_id == 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-xl text-start text-gray-800">
                                            {{ $flow->goods->name }}
                                        </p>
                                        <p class="text-md text-start text-gray-500">
                                            @if ($flow->goods_flow_type_id == 3 || $flow->goods_flow_type_id == 4)
                                                {{ $flow->basePlacement->place ? $flow->basePlacement->place->name : 'no placement' }}
                                                <span class="italic font-medium underline">to</span>
                                                {{ $flow->destinationPlacement->place->name }}
                                            @elseif ($flow->goods_flow_type_id == 5)
                                                Pindah ke asset
                                            @else
                                                @php
                                                    $description = $flow->description;
                                                    $word_limit = 15;

                                                    $limited = Str::words($description, $word_limit, '...');
                                                @endphp
                                                {{ $limited }}
                                            @endif
                                        </p>
                                        <p class="text-md text-start text-gray-500 mt-2">
                                            {{ $flow->created_at->isoFormat('D MMMM, Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-end">
                                        <p class="text-sm text-gray-500">jumlah</p>
                                        <p
                                            class="font-medium text-lg {{ $flow->quantity >= 0 && $flow->goods_flow_type_id != 2 && $flow->goods_flow_type_id != 7 ? 'text-green-600' : 'text-red-600' }}">
                                            @if (
                                                $flow->goods_flow_type_id == 1 ||
                                                    $flow->goods_flow_type_id == 3 ||
                                                    $flow->goods_flow_type_id == 4 ||
                                                    $flow->goods_flow_type_id == 6 ||
                                                    $flow->goods_flow_type_id == 8)
                                                +
                                            @elseif ($flow->goods_flow_type_id == 5)
                                                {{ $flow->quantity < 0 ? '-' : '+' }}
                                            @else
                                                -
                                            @endif
                                            {{ $flow->quantity }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </button>

                        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible hidden opacity-0 transition-opacity absolute invisible z-10 max-w-sm bg-white border border-gray-100 text-start rounded-lg shadow-md dark:bg-neutral-800 dark:border-neutral-700"
                            role="tooltip">
                            <div class="py-3 px-4 text-sm text-gray-600 dark:text-neutral-400 min-w-[20rem]">
                                <dl>
                                    @if ($flow->goods_flow_type_id == 7 || $flow->goods_flow_type_id == 8)
                                        <img src="/images/{{ $flow->image ? $flow->image : 'no-image.png' }}"
                                            alt="{{ $flow->goods->name }}"
                                            class="mb-4 rounded-xl mx-auto min-w-full max-h-80 object-cover hover:object-scale-down">
                                    @endif
                                    <dt class="font-medium first:pt-0 dark:text-white">
                                        @if ($flow->goods_flow_type_id == 1)
                                            Barang Masuk:
                                        @elseif ($flow->goods_flow_type_id == 2)
                                            Barang Keluar:
                                        @elseif ($flow->goods_flow_type_id == 3)
                                            Ubah Penyimpanan:
                                        @elseif ($flow->goods_flow_type_id == 4)
                                            Split Penyimpanan:
                                        @elseif ($flow->goods_flow_type_id == 5)
                                            Pindah ke Asset:
                                        @elseif ($flow->goods_flow_type_id == 6)
                                            Update Stock:
                                        @elseif ($flow->goods_flow_type_id == 7)
                                            Peminjaman:
                                        @elseif ($flow->goods_flow_type_id == 8)
                                            Pengembalian:
                                        @endif
                                    </dt>
                                    <dd class="text-gray-600 dark:text-neutral-400">
                                        @if ($flow->goods_flow_type_id == 3 || $flow->goods_flow_type_id == 4)
                                            {{ $flow->basePlacement->place ? $flow->basePlacement->place->name : 'no placement' }}
                                            <span class="italic font-medium underline">to</span>
                                            {{ $flow->destinationPlacement->place->name }}
                                        @elseif ($flow->goods_flow_type_id == 5)
                                            Pindah ke asset
                                        @else
                                            {{ $flow->goods->name }}
                                        @endif
                                    </dd>
                                    @if ($flow->description)
                                        <dt class="font-medium pt-3 first:pt-0 dark:text-white">Deskripsi:</dt>
                                        <dd class="text-gray-600 dark:text-neutral-400">
                                            {{ $flow->description }}</dd>
                                    @endif
                                    @if ($flow->goods_flow_type_id == 7)
                                        <dt class="font-medium pt-3 first:pt-0 dark:text-white">Tanggal Peminjaman:
                                        </dt>
                                        <dd class="text-gray-600 dark:text-neutral-400">
                                            {{ $flow->created_at->isoFormat('D MMMM, Y') }}</dd>
                                        <dt class="font-medium pt-3 first:pt-0 dark:text-white">Tanggal Pengembalian:
                                        </dt>
                                        <dd class="text-gray-600 dark:text-neutral-400">
                                            {{ \Carbon\Carbon::parse($flow->return_date)->isoFormat('D MMMM, Y') }}
                                        </dd>
                                        <dt class="font-medium pt-3 first:pt-0 dark:text-white">Tanggal:</dt>
                                        <dd class="text-gray-600 dark:text-neutral-400">
                                            {{ $flow->created_at->isoFormat('D MMMM, Y') }}</dd>
                                        @if ($flow->is_hanging)
                                            <dt class="font-medium pt-3 first:pt-0 dark:text-white">Alasan
                                                perpanjangan
                                                peminjaman:
                                            </dt>
                                            <dd class="text-gray-600 dark:text-neutral-400 space-y-2 pt-2">
                                                <ul
                                                    class="marker:text-blue-600 list-disc ps-5 space-y-2 text-sm text-gray-600 dark:text-neutral-400">
                                                    @foreach ($flow->hangingGoods as $hanging)
                                                        <li>
                                                            {{ $hanging->description }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </dd>

                                            <dt class="font-medium pt-3 first:pt-0 dark:text-white">Tenggat
                                                Pengembalian:
                                            </dt>
                                            <dd class="text-gray-600 dark:text-neutral-400 space-y-2">
                                                <p class="mb-2">
                                                    {{ \Carbon\Carbon::parse($flow->return_date)->diffForHumans() }}
                                                </p>
                                            </dd>
                                        @endif

                                        @if ($flow->is_return == true)
                                            <div class="w-full mt-5 mb-2">
                                                <button type="button"
                                                    class="py-2 px-4 me-1 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                                    aria-haspopup="dialog" aria-expanded="false"
                                                    aria-controls="hs-barang-dikembalikan-modal-{{ $loop->iteration }}"
                                                    data-hs-overlay="#hs-barang-dikembalikan-modal-{{ $loop->iteration }}">
                                                    Dikembalikan
                                                    <svg class="shrink-0 size-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z" />
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:focus:outline-none focus:disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                    aria-haspopup="dialog" aria-expanded="false"
                                                    aria-controls="hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}"
                                                    data-hs-overlay="#hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}">
                                                    Tunda pengembalian
                                                    <svg class="shrink-0 size-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div id="hs-task-created-alert"
                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto"
                        role="dialog" tabindex="-1" aria-labelledby="hs-task-created-alert-label">
                        <div
                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                            <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
                                <div class="absolute top-2 end-2">
                                    <button type="button"
                                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                        aria-label="Close" data-hs-overlay="#hs-task-created-alert">
                                        <span class="sr-only">Close</span>
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                    <span
                                        class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-green-50 bg-green-100 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100">
                                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                                        </svg>
                                    </span>

                                    <h3 id="hs-task-created-alert-label"
                                        class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                                        Task successfully created!
                                    </h3>
                                    <p class="text-gray-500 dark:text-neutral-500">
                                        You can see the progress of your task in your <a
                                            class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                            href="#">personal account.</a> You will be notified of its completion.
                                    </p>

                                    <div class="mt-6 flex justify-center gap-x-4">
                                        <button type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                            data-hs-overlay="#hs-task-created-alert">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

@endsection
@section('js')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.place_id').on('change', function() {
                var kode_place = $(this).val();
                console.log(kode_place);
                if (kode_place) {
                    $.ajax({
                        url: '/place/' + kode_place,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('.area_id').empty();
                                $('.area_id').append(
                                    '<option hidden selected value="0">-- pilih area --</option>'
                                );
                                $.each(data, function(key, area) {
                                    $('select[name="area_id"]').append(
                                        '<option value="' + area.id + '">' +
                                        area.name + '</option>'
                                    );
                                });
                            } else {
                                $('.area_id').empty();
                            }
                        }
                    });
                } else {
                    $('.area_id').empty();
                }
            });
        });
        $(document).ready(function() {
            $('.area_id').on('change', function() {
                var kode_area = $(this).val();
                // console.log(kode_area);
                if (kode_area) {
                    $.ajax({
                        url: '/area/' + kode_area,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('.rak_id').empty();
                                $('.rak_id').append(
                                    '<option hidden selected value="0">-- pilih rak/etalase --</option>'
                                );
                                $.each(data, function(key, rak) {
                                    $('select[name="rak_id"]').append(
                                        '<option value="' + rak.id + '">' +
                                        rak.name + '</option>'
                                    );
                                });
                            } else {
                                $('.rak_id').empty();
                            }
                        }
                    });
                } else {
                    $('.rak_id').empty();
                }
            });
        });
        $(document).ready(function() {
            $('.rak_id').on('change', function() {
                var kode_rak = $(this).val();
                // console.log(kode_rak);
                if (kode_rak) {
                    $.ajax({
                        url: '/rak/' + kode_rak,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('.shap_id').empty();
                                $('.shap_id').append(
                                    '<option hidden selected value="0">-- pilih shap --</option>'
                                );
                                $.each(data, function(key, shap) {
                                    $('select[name="shap_id"]').append(
                                        '<option value="' + shap.id + '">' +
                                        shap.name + '</option>'
                                    );
                                });
                            } else {
                                $('.shap_id').empty();
                            }
                        }
                    });
                } else {
                    $('.shap_id').empty();
                }
            });
        });
    </script>
@endsection
