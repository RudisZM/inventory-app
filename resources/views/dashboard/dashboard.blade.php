@extends('layout.navbar')
@section('content')
    @if (session()->has('success_attachment'))
        <div id="dismiss-alert"
            class="mb-4 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
            role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </div>
                <div class="ms-2">
                    <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                        File has been successfully uploaded.
                    </h3>
                </div>
                <div class="ps-3 ms-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button"
                            class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                            data-hs-remove-element="#dismiss-alert">
                            <span class="sr-only">Dismiss</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 border-b pb-10 pt-5 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Card -->
            <div
                class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                <div class="inline-flex justify-center items-center">
                    <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                    <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Total Asset
                        Balance</span>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl lg:text-3xl font-semibold text-gray-800 dark:text-neutral-200">
                        @currency($totalAssetBalance)
                    </h3>
                </div>

                <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
                    <dt class="pe-3">
                        <span class="text-green-600">
                            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                            <span class="inline-block text-sm">
                                {{ round($persentaseBalanceSatuBulanTerakhir, 2) }}%
                            </span>
                        </span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">perubahan</span>
                    </dt>
                    <dd class="text-start ps-3">
                        <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">1 bulan</span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">terakhir</span>
                    </dd>
                </dl>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                <div class="inline-flex justify-center items-center">
                    <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
                    <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Total Asset
                        Inventaris</span>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
                        {{ $totalAssetInventaris }}
                    </h3>
                </div>

                <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
                    <dt class="pe-3">
                        <span class="text-green-600">
                            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                            <span class="inline-block text-sm">
                                {{ round($persentaseAssetInventaris, 2) }}%
                            </span>
                        </span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">perubahan</span>
                    </dt>
                    <dd class="text-start ps-3">
                        <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">1 bulan</span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">terakhir</span>
                    </dd>
                </dl>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                <div class="inline-flex justify-center items-center">
                    <span class="size-2 inline-block bg-red-500 rounded-full me-2"></span>
                    <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Total Barang
                        Masuk</span>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
                        {{ $totalBarangMasuk }}
                    </h3>
                </div>

                <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
                    <dt class="pe-3">
                        <span class="text-red-600">
                            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                            <span class="inline-block text-sm">
                                {{ round($persentaseBarangMasuk, 2) }}%
                            </span>
                        </span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">perubahan</span>
                    </dt>
                    <dd class="text-start ps-3">
                        <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">1 bulan</span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">terakhir</span>
                    </dd>
                </dl>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                <div class="inline-flex justify-center items-center">
                    <span class="size-2 inline-block bg-red-500 rounded-full me-2"></span>
                    <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Total Barang
                        Keluar</span>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
                        {{ $totalBarangKeluar }}
                    </h3>
                </div>

                <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
                    <dt class="pe-3">
                        <span class="text-red-600">
                            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                            <span class="inline-block text-sm">
                                {{ round($persentaseBarangKeluar, 2) }}%
                            </span>
                        </span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">perubahan</span>
                    </dt>
                    <dd class="text-start ps-3">
                        <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">1 bulan</span>
                        <span class="block text-sm text-gray-500 dark:text-neutral-500">terakhir</span>
                    </dd>
                </dl>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->

    <!-- Comparison Table -->
    <div class="relative">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 mx-auto">

            <!-- Header -->
            <div class="hidden lg:block sticky top-0 start-0 py-2 bg-white/60 backdrop-blur-md dark:bg-neutral-900/60">
                <!-- Grid -->
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-2">
                        <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
                            Tipe Pengeluaran
                        </span>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-1">
                        <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
                            Jual
                        </span>
                        <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                            Penjualan
                        </p>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-1">
                        <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
                            Angkringan
                        </span>
                        <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                            Penggunaan untuk angkringan
                        </p>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-1">
                        <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
                            Personal
                        </span>
                        <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                            Penggunaan untuk personal
                        </p>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-1">
                        <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
                            Kantor
                        </span>
                        <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                            Penggunaan untuk kantor
                        </p>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
            <!-- End Header -->

            <!-- Section -->
            <div class="space-y-4 lg:space-y-0">
                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 lg:py-3">
                        <span class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Barang Keluar
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->

                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 pb-1.5 lg:py-3">
                        <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
                            1 minggu terakhir
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Penjualan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarTerjualSatuMingguTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Angkringan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarAngkringanSatuMingguTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Personal
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarPribadiSatuMingguTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Kantor
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarKantorSatuMingguTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->

                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 pb-1.5 lg:py-3">
                        <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
                            1 bulan terakhir
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Penjualan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarTerjualSatuBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Angkringan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarAngkringanSatuBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Personal
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarPribadiSatuBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Kantor
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarKantorSatuBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->

                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 pb-1.5 lg:py-3">
                        <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
                            6 bulan terakhir
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Penjualan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarTerjualEnamBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Angkringan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarAngkringanEnamBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Personal
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarPribadiEnamBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Kantor
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarKantorEnamBulanTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->

                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 pb-1.5 lg:py-3">
                        <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
                            1 tahun terakhir
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Penjualan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarTerjualSatuTahunTerakhir }}
                            </span>
                            </svg>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Angkringan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarAngkringanSatuTahunTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Personal
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarPribadiSatuTahunTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Kantor
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarKantorSatuTahunTerakhir }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->
            </div>
            <!-- End Section -->

            <!-- Section -->
            <div class="mt-6 space-y-4 lg:space-y-0">
                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 lg:py-3">
                        <span class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Total Pengeluaran
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->

                <!-- List -->
                <ul class="grid lg:grid-cols-6 lg:gap-6">
                    <!-- Item -->
                    <li class="lg:col-span-2 pb-1.5 lg:py-3">
                        <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
                            Total
                        </span>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Penjualan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarTerjual }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Angkringan
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarAngkringan }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Personal
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarPribadi }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
                        <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
                            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
                                Kantor
                            </span>
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                                {{ $totalBarangKeluarKantor }}
                            </span>
                        </div>
                    </li>
                    <!-- End Item -->
                </ul>
                <!-- End List -->

            </div>
            <!-- End Section -->

        </div>
    </div>
    <!-- End Comparison Table -->
@endsection
