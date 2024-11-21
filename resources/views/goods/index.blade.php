@extends('layout.navbar')

@section('content')

    @foreach (session()->all() as $key => $message)
        @if (in_array($key, ['success']))
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 mb-4 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
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
                            {{ $message }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
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
    @endforeach

    <div>
        <h1 class="text-2xl lg:text-4xl font-semibold text-gray-800 dark:text-neutral-200 mt-6">Tabel Barang</h1>
    </div>

    <div class="mb-6">
        <!-- Header -->
        <div class="py-4 grid gap-3 md:flex md:justify-between md:items-center dark:border-neutral-700">

            <div class="sm:col-span-2 md:grow">
                <div class="flex justify-start gap-x-2">

                    <button
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-create-new-data-goods-modal"
                        data-hs-overlay="#hs-create-new-data-goods-modal">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                        Tambah data batang baru
                    </button>

                    <div
                        class="hs-dropdown relative inline-block [--placement:bottom-right]' data-hs-dropdown-auto-close="inside">
                        <button id="hs-as-table-table-filter-dropdown" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18" />
                                <path d="M7 12h10" />
                                <path d="M10 18h4" />
                            </svg>
                            mass edit
                            <span id="checked-items-count"
                                class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                0
                            </span>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                            <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <div class="flex p-1">
                                    <form action="{{ route('goods.mass.destroy') }}" method="post"
                                        onsubmit="return confirm('Apa Anda yakin ingin menghapus data ini? Data yang terhapus tidak dapat dikembalikan.')"
                                        class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <div id="inputContainer" class="hidden">
                                        </div>
                                        <button type="submit"
                                            class="flex items-center gap-x-3 py-2 px-3 rounded-lg w-full text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                                <path
                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                            </svg>
                                            hapus data
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-x-2">

                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                    <button id="hs-as-table-table-export-dropdown" type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:focus:outline-none focus:disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="shrink-0 size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Export
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-50 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-export-dropdown">
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
                                Print (on progress)
                            </a>
                        </div>
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span
                                class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                Download options
                            </span>
                            <form action="{{ route('goods.export.excel') }}">
                                <button type="submit"
                                    class="flex w-full items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                    Excel
                                </button>
                            </form>
                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                </svg>
                                .CSV (on progress)
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
                                .PDF (on progress)
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                    <button id="hs-as-table-table-export-dropdown" type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                        </svg>
                        Import
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-50 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-export-dropdown">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span
                                class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                Import options
                            </span>
                            {{-- <button
                                class="flex items-center gap-x-3 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                    <path
                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg>
                                Excel
                            </button> --}}

                            <button type="button"
                                class="flex items-center gap-x-3 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-slide-down-animation-modal"
                                data-hs-overlay="#hs-slide-down-animation-modal">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                </svg>
                                .CSV
                            </button>
                            {{-- <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="#">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    <path
                                        d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                </svg>
                                .PDF
                            </a> --}}
                        </div>
                    </div>
                </div>


                <div id="hs-slide-down-animation-modal"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog" tabindex="-1" aria-labelledby="hs-slide-down-animation-modal-label">
                    <div
                        class="hs-overlay-animation-target hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                        <div
                            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                <h3 id="hs-slide-down-animation-modal-label"
                                    class="font-bold text-gray-800 dark:text-white">
                                    Input file
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                    aria-label="Close" data-hs-overlay="#hs-slide-down-animation-modal">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                                <form action="{{ route('goods.import') }}" method="post" enctype="multipart/form-data"
                                    class="mt-2">
                                    @csrf
                                    <input type="text" value="packaging" name="type" class="hidden">
                                    <div class="flex justify-center">
                                        <label for="file_csv" class="sr-only">Choose file</label>
                                        <input type="file" name="file_csv" id="file_csv"
                                            class="block w-full bg-white shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                            accept=".csv">
                                        <button type="submit"
                                            class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                            Upload
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    data-hs-overlay="#hs-slide-down-animation-modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <form>
                    <input type="text" value="all" name="all" class="hidden">
                    <button type="submit"
                        class="py-2 px-3 min-w-32 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        <svg class="shrink-0 size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.75"
                                d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        </svg>
                        Lihat semua
                    </button>
                </form>
                <form class="flex items-center max-w-full mx-auto">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="voice-search" name="search"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari barang..." />
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>Cari
                    </button>
                </form>
            </div>

        </div>
        <!-- End Header -->

        <x-create-goods-modal>
            <!-- Section -->
            <div class="py-2 first:pt-0 last:pb-0">
                <label for="goods_name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                    Barang
                </label>
                <div class="mt-2 space-y-3">
                    <input id="goods_name" type="text" name="name"
                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Nama barang" required>
                    <div class="sm:col-span-9">
                        <textarea id="af-submit-application-bio" name="description"
                            class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="6" placeholder="Masukkan detail barang di sini ..."></textarea>
                    </div>
                    <input type="text" name="code"
                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Kode barang">
                    <input type="number" name="price"
                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Harga Barang">
                </div>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <label for="packaging_image" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                    Gambar Kemasan
                </label>
                <div class="mt-2 space-y-3">
                    <label for="packaging_image" class="sr-only">Choose
                        file</label>
                    <input type="file" name="packaging_image" id="packaging_image"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
                        accept="image/*">
                </div>
                <label for="goods_image" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                    Gambar Barang
                </label>
                <div class="mt-2 space-y-3">
                    <label for="goods_image" class="sr-only">Choose
                        file</label>
                    <input type="file" name="goods_image" id="goods_image"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
                        accept="image/*">
                </div>
            </div>
            <!-- End Section -->
            <!-- Section -->
            <div
                class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <label for="category" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                    Category
                </label>
                <div class="mt-2 space-y-3">
                    <!-- Select -->
                    <select
                        data-hs-select='{
                        "placeholder": "Pilih kategori barang",
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                        class="hidden" name="goods_category_id" id="category">
                        <option value="">Choose</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <!-- End Select -->
                    <p class="mt-3 text-end">
                        <button type="button"
                            class="hs-collapse-toggle py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            id="hs-basic-collapse" aria-expanded="false" aria-controls="hs-basic-collapse-heading"
                            data-hs-collapse="#hs-basic-collapse-heading">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            Tambah kategori baru
                        </button>
                    </p>
                    <div id="hs-basic-collapse-heading"
                        class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="hs-basic-collapse">
                        <!-- input new category -->
                        <div class="max-w-full space-y-3">
                            <input type="text" name="new_category"
                                class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Nama kategory">
                        </div>
                        <!-- End input new category -->
                    </div>
                </div>
            </div>
            <!-- End Section -->
            <!-- Section -->
            <div class="py-2 first:pt-0 last:pb-0">
                <div class="mt-2 space-y-3">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="max-w-full space-y-3">
                            <div>
                                <label for="gross_weight" class="block text-sm text-gray-600 mb-2 dark:text-white">gross
                                    weight</label>
                                <div class="relative">
                                    <input type="number" id="gross_weight" name="gross_weight"
                                        class="py-3 px-4 ps-24 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="0">
                                    <div class="absolute inset-y-0 start-0 flex items-center text-gray-500 ps-px">
                                        <label for="gross_weight_unit" class="sr-only">Weight</label>
                                        <select id="gross_weight_unit" name="gross_weight_unit"
                                            class="block w-full border-transparent rounded-lg focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800">
                                            <option value="gram">gram</option>
                                            <option value="once">once</option>
                                            <option value="kg">kg</option>
                                            <option value="ton">ton</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full space-y-3">
                            <div>
                                <label for="nett_weight" class="block text-sm text-gray-600 mb-2 dark:text-white">nett
                                    weight</label>
                                <div class="relative">
                                    <input type="number" id="nett_weight" name="nett_weight"
                                        class="py-3 px-4 ps-24 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="0">
                                    <div class="absolute inset-y-0 start-0 flex items-center text-gray-500 ps-px">
                                        <label for="nett_weight_unit" class="sr-only">Weight</label>
                                        <select id="nett_weight_unit" name="nett_weight_unit"
                                            class="block w-full border-transparent rounded-lg focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800">
                                            <option value="gram">gram</option>
                                            <option value="once">once</option>
                                            <option value="kg">kg</option>
                                            <option value="ton">ton</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Section -->
            <!-- Section -->
            <div class="py-2 first:pt-0 last:pb-0">
                <div class="mt-2 space-y-3">
                    <div class="max-w-full space-y-3">
                        <div>
                            <!-- Input Number -->
                            <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                data-hs-input-number="">
                                <div class="w-full flex justify-between items-center gap-x-3">
                                    <div>
                                        <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                            stock
                                        </span>
                                        <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                            for this goods
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-x-1.5">
                                        <button type="button"
                                            class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                            tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>
                                        <input
                                            class="p-0 w-10 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                            style="-moz-appearance: textfield;" type="number" name="stock"
                                            aria-roledescription="Number field" value="0"
                                            data-hs-input-number-input="">
                                        <button type="button"
                                            class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                            tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Input Number -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Section -->
            <!-- Section -->
            <div
                class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <label for="af-payment-billing-contact"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                    goods tags/alias
                </label>
                <!-- Input Group -->
                <div id="hs-wrapper-for-copy" class="space-y-3 mt-2">
                    <input id="hs-content-for-copy" type="text" name="tags[]"
                        class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Enter tags/alias">
                </div>
                <p class="mt-3 text-end">
                    <button type="button"
                        data-hs-copy-markup='{
                        "targetSelector": "#hs-content-for-copy",
                        "wrapperSelector": "#hs-wrapper-for-copy",
                        "limit": 3
                        }'
                        class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        Add new tags
                    </button>
                </p>
                <!-- End Input Group -->
            </div>
            <!-- End Section -->
            <div class="col-span-3">
                <label for="location" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                    Location
                </label>
            </div>
            <!-- End Col -->
            <div class="space-y-2">
                <!-- Section -->
                <div
                    class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                    <div class="mt-2 space-y-3">
                        <!-- Select -->
                        <select name="place_id"
                            class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="0" hidden>-- pilih place --
                            </option>
                            @foreach ($places as $place)
                                <option value="{{ $place->id }}">
                                    {{ $place->name }}
                                </option>
                            @endforeach
                        </select>
                        <!-- End Select -->
                    </div>
                    <div class="mt-2 space-y-3">
                        <!-- Select -->
                        <select name="area_id"
                            class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option hidden value="0">-- pilih area --</option>
                        </select>
                        <!-- End Select -->
                    </div>
                    <div class="mt-2 space-y-3">
                        <!-- Select -->
                        <select name="rak_id"
                            class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option hidden value="0">-- pilih rak/etalase --</option>
                        </select>
                        <!-- End Select -->
                    </div>
                    <div class="mt-2 space-y-3">
                        <!-- Select -->
                        <select name="shap_id"
                            class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option hidden value="0">-- pilih shap --</option>
                        </select>
                        <!-- End Select -->
                    </div>
                </div>
                <!-- End Section -->
            </div>
            <!-- End Col -->
            <p class="mt-3 text-end">
                <button type="button"
                    class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-new-location"
                    data-hs-overlay="#hs-add-new-location">
                    <svg class="shrink-0 size-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm0 0v6M9.5 9A2.5 2.5 0 0 1 12 6.5" />
                    </svg>
                    Lokasi yang diinginkan tidak ada? tambah sekarang
                </button>
            </p>
        </x-create-goods-modal>

        <div id="hs-add-new-location"
            class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="hs-add-new-location-label">
            <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div
                    class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <form action="{{ route('new.placement') }}" method="post">
                        @csrf
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                            <h3 id="hs-add-new-location-label" class="font-bold text-gray-800 dark:text-white">
                                Tambahkan lokasi
                            </h3>
                        </div>
                        <div class="p-4 overflow-y-auto space-y-4 grid grid-cols-12 items-center">
                            {{-- place --}}
                            <div class="max-w-full col-span-8">
                                <!-- Floating Select -->
                                <div class="relative">
                                    <select name="place_id"
                                        class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="0">-- pilih place --
                                        </option>
                                        @foreach ($places as $place)
                                            <option value="{{ $place->id }}">
                                                {{ $place->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Floating Select -->
                            </div>
                            <p class="mt-3 text-end col-span-4 items-start">
                                <button type="button"
                                    class="hs-collapse-toggle py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    id="hs-basic-collapse-place" aria-expanded="false"
                                    aria-controls="hs-basic-collapse-heading-place"
                                    data-hs-collapse="#hs-basic-collapse-heading-place">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    Add new place
                                </button>
                            </p>
                            <div id="hs-basic-collapse-heading-place"
                                class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300 col-span-12"
                                aria-labelledby="hs-basic-collapse-place">
                                <!-- input new place -->
                                <div class="max-w-full space-y-3">
                                    <input type="text" name="new_place"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Add new place">
                                </div>
                                <!-- End input new place -->
                            </div>
                            {{-- end place --}}

                            {{-- area --}}
                            <div class="max-w-full col-span-8">
                                <!-- Floating Select -->
                                <div class="relative">
                                    <select name="area_id"
                                        class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="0">-- pilih area --</option>
                                    </select>
                                </div>
                                <!-- End Floating Select -->
                            </div>
                            <p class="mt-3 text-end col-span-4">
                                <button type="button"
                                    class="hs-collapse-toggle py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    id="hs-basic-collapse-area" aria-expanded="false"
                                    aria-controls="hs-basic-collapse-heading-area"
                                    data-hs-collapse="#hs-basic-collapse-heading-area">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    Add new area
                                </button>
                            </p>
                            <div id="hs-basic-collapse-heading-area"
                                class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300 col-span-12"
                                aria-labelledby="hs-basic-collapse-area">
                                <!-- input new area -->
                                <div class="max-w-full space-y-3">
                                    <input type="text" name="new_area"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Add new area">
                                </div>
                                <!-- End input new area -->
                            </div>
                            {{-- end area --}}

                            {{-- rak/etalase --}}
                            <div class="max-w-full col-span-8">
                                <!-- Floating Select -->
                                <div class="relative">
                                    <select name="rak_id"
                                        class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="0">-- pilih rak/etalase --</option>
                                    </select>
                                </div>
                                <!-- End Floating Select -->
                            </div>
                            <p class="mt-3 text-end col-span-4">
                                <button type="button"
                                    class="hs-collapse-toggle py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    id="hs-basic-collapse-rak" aria-expanded="false"
                                    aria-controls="hs-basic-collapse-heading-rak"
                                    data-hs-collapse="#hs-basic-collapse-heading-rak">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    Add new rak
                                </button>
                            </p>
                            <div id="hs-basic-collapse-heading-rak"
                                class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300 col-span-12"
                                aria-labelledby="hs-basic-collapse-rak">
                                <!-- input new rak -->
                                <div class="max-w-full space-y-3">
                                    <input type="text" name="new_rak"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Add new rak">
                                </div>
                                <!-- End input new rak -->
                            </div>
                            {{-- end rak/etalase --}}

                            {{-- shap --}}
                            <div class="max-w-full col-span-8">
                                <!-- Floating Select -->
                                <div class="relative">
                                    <select name="shap_id"
                                        class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="0">-- pilih shap --</option>
                                    </select>
                                </div>
                                <!-- End Floating Select -->
                            </div>
                            <p class="mt-3 text-end col-span-4">
                                <button type="button"
                                    class="hs-collapse-toggle py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    id="hs-basic-collapse-shap" aria-expanded="false"
                                    aria-controls="hs-basic-collapse-heading-shap"
                                    data-hs-collapse="#hs-basic-collapse-heading-shap">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    Add new shap
                                </button>
                            </p>
                            <div id="hs-basic-collapse-heading-shap"
                                class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300 col-span-12"
                                aria-labelledby="hs-basic-collapse-shap">
                                <!-- input new shap -->
                                <div class="max-w-full space-y-3">
                                    <input type="text" name="new_shap"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Add new shap">
                                </div>
                                <!-- End input new shap -->
                            </div>
                            {{-- end shap --}}

                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#hs-create-new-data-goods-modal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div>
        <div class="max-w-full mx-auto">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="ps-6 py-2 text-start">
                                            <label htmlFor="hs-at-with-checkboxes-main" class="flex">
                                                <input type="checkbox"
                                                    class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-main" />
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </th>

                                        <th scope="col" class="ps-3 py-2 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase min-w-[200px] tracking-wide text-gray-800 dark:text-neutral-200">
                                                    Nama Barang
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-2 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                    Deskripsi
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-2 text-start">
                                            <div class="flex items-center gap-x-2 min-w-[100px]">
                                                <div
                                                    class="hs-dropdown [--auto-close:inside] relative sm:inline-flex z-20">
                                                    <button id="hs-dropdown-auto-close-inside" type="button"
                                                        class="hs-dropdown-toggle py-3 inline-flex items-center gap-x-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        Kategori
                                                        <span
                                                            class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                                            <svg class="shrink-0 size-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    @if ($categories->count() != 0)
                                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="hs-dropdown-auto-close-inside">
                                                            <form>
                                                                <div
                                                                    class="divide-y divide-gray-200 dark:divide-neutral-700 font-normal max-h-60 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                                                                    @foreach ($categories as $category)
                                                                        <label
                                                                            for="hs-as-{{ $category->name }}-{{ $category->id }}"
                                                                            class="flex py-2.5 px-3">
                                                                            <input type="checkbox" name="goods_category[]"
                                                                                value="{{ $category->id }}"
                                                                                class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                                                id="hs-as-{{ $category->name }}-{{ $category->id }}">
                                                                            <span
                                                                                class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ $category->name }}</span>
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                                <div class="px-3 py-2.5">
                                                                    <button type="submit"
                                                                        class="w-full py-2 px-4 mx-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 text-start">
                                            <div class="flex items-center gap-x-2">

                                                <div
                                                    class="hs-dropdown [--auto-close:inside] relative sm:inline-flex z-20">
                                                    <button id="hs-dropdown-auto-close-inside" type="button"
                                                        class="hs-dropdown-toggle py-3 inline-flex items-center gap-x-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        Penyimpanan
                                                        <span
                                                            class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                                            <svg class="shrink-0 size-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                            </svg>
                                                        </span>
                                                    </button>

                                                    <div class="hs-dropdown-menu transition-[opacity,margin] bg-white duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                        role="menu" aria-orientation="vertical"
                                                        aria-labelledby="hs-dropdown-auto-close-inside">
                                                        <form>
                                                            <div
                                                                class="divide-y divide-gray-200 dark:divide-neutral-700 font-normal max-h-60 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                                                                @foreach ($placements as $placement)
                                                                    <label
                                                                        for="hs-as-{{ $placement->name }}-{{ $placement->id }}"
                                                                        class="flex py-2.5 px-3">
                                                                        <input type="checkbox" name="placement[]"
                                                                            value="{{ $placement->id }}"
                                                                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                                            id="hs-as-{{ $placement->name }}-{{ $placement->id }}">
                                                                        <span
                                                                            class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ $placement->name }}</span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                            <div class="px-3 py-2.5">
                                                                <button type="submit"
                                                                    class="w-full py-2 px-4 mx-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-2 text-start">
                                            <div class="flex items-center gap-x-2 min-w-[100px]">
                                                <div
                                                    class="hs-dropdown [--auto-close:inside] relative sm:inline-flex z-20">
                                                    <button id="hs-dropdown-auto-close-inside" type="button"
                                                        class="hs-dropdown-toggle py-3 inline-flex items-center gap-x-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        Harga
                                                        <span
                                                            class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                                            <svg class="shrink-0 size-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                        role="menu" aria-orientation="vertical"
                                                        aria-labelledby="hs-dropdown-auto-close-inside">
                                                        <div
                                                            class="divide-y divide-gray-200 dark:divide-neutral-700 font-normal">
                                                            <label for="hs-as-filters-dropdown-all"
                                                                class="flex py-2.5 px-3 gap-x-2">
                                                                <form>
                                                                    <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                                                        data-hs-input-number="">
                                                                        <div class="flex items-center gap-x-1.5">
                                                                            <input
                                                                                class="p-0 w-full bg-transparent border-0 text-gray-800 focus:ring-0"
                                                                                type="number" name="price"
                                                                                placeholder="0">
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                                        Submit
                                                                    </button>
                                                                </form>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col" class="py-2 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <div
                                                    class="hs-dropdown [--auto-close:inside] relative sm:inline-flex z-20">
                                                    <button id="hs-dropdown-auto-close-inside" type="button"
                                                        class="hs-dropdown-toggle py-3 inline-flex items-center gap-x-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        Stock
                                                        <span
                                                            class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                                            <svg class="shrink-0 size-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                        role="menu" aria-orientation="vertical"
                                                        aria-labelledby="hs-dropdown-auto-close-inside">
                                                        <div
                                                            class="divide-y divide-gray-200 dark:divide-neutral-700 font-normal">
                                                            <label for="hs-as-filters-dropdown-all"
                                                                class="flex py-2.5 px-3 gap-x-2">
                                                                <form>
                                                                    <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                                                        data-hs-input-number="">
                                                                        <div class="flex items-center gap-x-1.5">
                                                                            <button type="button"
                                                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                                                tabindex="-1" aria-label="Decrease"
                                                                                data-hs-input-number-decrement="">
                                                                                <svg class="shrink-0 size-3.5"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path d="M5 12h14"></path>
                                                                                </svg>
                                                                            </button>
                                                                            <input
                                                                                class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                                                style="-moz-appearance: textfield;"
                                                                                type="number" name="stock"
                                                                                aria-roledescription="Number field"
                                                                                value="0"
                                                                                data-hs-input-number-input="">
                                                                            <button type="button"
                                                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                                                tabindex="-1" aria-label="Increase"
                                                                                data-hs-input-number-increment="">
                                                                                <svg class="shrink-0 size-3.5"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path d="M5 12h14"></path>
                                                                                    <path d="M12 5v14"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                                        Submit
                                                                    </button>
                                                                </form>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-2 text-end"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($goods as $good)
                                        <tr>
                                            <td class="">
                                                <div class="ps-6 py-2">
                                                    <label htmlFor="{{ $good->id }}" class="flex">
                                                        <input type="checkbox"
                                                            class="checkbox-in-table shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                            id="{{ $good->id }}" />
                                                        <span class="sr-only">Checkbox</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="ps-3 py-2">
                                                    <div class="flex items-center gap-x-3">
                                                        <button type="button" aria-haspopup="dialog"
                                                            aria-expanded="false"
                                                            aria-controls="hs-image-modal-{{ $loop->iteration }}"
                                                            data-hs-overlay="#hs-image-modal-{{ $loop->iteration }}">
                                                            @if ($good->is_imported)
                                                                <img class="inline-block size-[38px] rounded-lg object-cover"
                                                                    src="{{ $good->image != 'null' ? '/images/' . $good->image : '/images/no-image.png' }}"
                                                                    alt="{{ $good->name }}" width={38} height={38} />
                                                            @else
                                                                <img class="inline-block size-[38px] rounded-lg object-cover"
                                                                    src="/images/{{ $good->image ? $good->image : 'no-image.png' }}"
                                                                    alt="{{ $good->name }}" width={38} height={38} />
                                                            @endif
                                                        </button>
                                                        <div class="grow w-[50%]">
                                                            <a href="{{ route('goods.show', $good->id) }}"
                                                                class="block text-blue-600 hover:underline dark:text-neutral-200">
                                                                {{ $good->name }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-6 min-w-[200px]">
                                                    <span class="block text-sm text-gray-500 dark:text-neutral-500">
                                                        @php
                                                            $description = $good->description;
                                                            $description =
                                                                strlen($description) > 60
                                                                    ? substr($description, 0, 60) . '...'
                                                                    : $description;
                                                        @endphp
                                                        {{ $description == 0 ? '-' : $description }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px">
                                                <div class="px-6 py-2 flex items-center">
                                                    <div class="h-3.5 w-1 bg-red-500 rounded me-1"></div>
                                                    <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                                        <span
                                                            class="me-1 mb-1">{{ $good->goodsCategory ? $good->goodsCategory->name : 'no category' }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-2">
                                                    <span class="text-sm text-gray-500 dark:text-neutral-500">
                                                        @if ($good->import_placement)
                                                            {{ $good->import_placement != 'null' || $good->import_placement != 'null' ? '@' . $good->import_placement : '-' }}
                                                        @else
                                                            @foreach ($good->placement as $placement)
                                                                {{ $placement->place ? '@' . $placement->place->name : '-' }}
                                                                @php
                                                                    if ($loop->iteration == 2) {
                                                                        break;
                                                                    }
                                                                @endphp
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px">
                                                <div class="px-6 py-2 flex items-center">
                                                    <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                                        <span class="me-1 mb-1">@currency($good->price)</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="py-2">
                                                    <span class="text-sm text-gray-500 dark:text-neutral-500">
                                                        {{ $good->total_stock == null ? 0 : $good->total_stock }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-1.5 flex justify-end">
                                                    <div
                                                        class="group inline-flex items-center divide-x divide-gray-300 border border-gray-300 bg-white shadow-sm rounded-lg transition-all dark:divide-neutral-700 dark:bg-neutral-700 dark:border-neutral-700">
                                                        <div class="hs-tooltip inline-block">
                                                            <a href="{{ route('goods.show', $good->id) }}"
                                                                class="hs-tooltip-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-s-md bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                                aria-haspopup="dialog" aria-expanded="false"
                                                                aria-controls="hs-{{ $good->id }}-modal"
                                                                data-hs-overlay="#hs-{{ $good->id }}-modal">
                                                                <svg class="size-4" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="1.5"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="1.5"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                <span
                                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                                    role="tooltip">
                                                                    view detail
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                                            <button id="hs-table-dropdown-1" type="button"
                                                                class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                                aria-haspopup="menu" aria-expanded="false"
                                                                aria-label="Dropdown">
                                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                                    width="16" height="16" fill="currentColor"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                                </svg>
                                                            </button>
                                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                                role="menu" aria-orientation="vertical"
                                                                aria-labelledby="hs-table-dropdown-1">
                                                                <div class="py-2 first:pt-0 last:pb-0">
                                                                    <form action="{{ route('goods.destroy', $good->id) }}"
                                                                        method="post"
                                                                        onsubmit="return confirm('Apa Anda yakin ingin menghapus data ini? Data yang terhapus tidak dapat dikembalikan.')"
                                                                        class="w-full">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="flex items-center gap-x-3 py-2 px-3 rounded-lg w-full text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                                                            <svg class="size-4"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                                                                <path
                                                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                                            </svg>
                                                                            hapus data
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            @if ($good->is_imported)
                                                <x-image-modal
                                                    image="{{ $good->image != 'null' ? '/images/' . $good->image : '/images/no-image.png' }}"
                                                    alt="{{ $good->name }}" loop="{{ $loop->iteration }}"
                                                    href="{{ route('goods.update.image', $good->id) }}"></x-image-modal>
                                            @else
                                                <x-image-modal
                                                    image="/images/{{ $good->image ? $good->image : 'no-image.png' }}"
                                                    alt="{{ $good->name }}" loop="{{ $loop->iteration }}"
                                                    href="{{ route('goods.update.image', $good->id) }}"></x-image-modal>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($goods->count() === 0)
                                <!-- Body -->
                                <div class="max-w-sm w-full min-h-[400px] flex flex-col justify-center mx-auto px-6 py-4">
                                    <div
                                        class="flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
                                        @if (request()->search)
                                            <svg class="shrink-0 size-6 text-gray-600 dark:text-neutral-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                            </svg>
                                        @else
                                            <svg class="shrink-0 size-6 text-gray-600 dark:text-neutral-400"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                <path
                                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                        {{ request()->search ? 'Pencarian Tidak Ditemukan' : 'Belum Ada Data Barang' }}
                                    </h2>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                        {{ request()->search ? 'Coba cari dengan kata kunci yang lain.' : 'Data barang yang tersimpan akan muncul di sini.' }}
                                    </p>
                                </div>
                                <!-- End Body -->
                            @endif
                            @if ($goods->count() > 0)
                                <div
                                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-gray-200 dark:border-neutral-700">
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                                            Showing
                                            <span class="font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $goods->firstItem() }}
                                            </span>
                                            to
                                            <span class="font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $goods->lastItem() }}
                                            </span>
                                            of
                                            <span class="font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $goods->total() }}
                                            </span>
                                            results
                                        </p>
                                    </div>


                                    <!-- Pagination Wrapper -->
                                    <div class="grid justify-center sm:flex sm:justify-start sm:items-center gap-2 me-10">
                                        <div class="flex justify-center items-center gap-x-5">
                                            <!-- Dropdown -->
                                            <div class="hs-dropdown [--placement:top-left] relative inline-flex">
                                                <button id="hs-default-bordered-pagination-dropdown" type="button"
                                                    class="hs-dropdown-toggle py-2 px-2.5 inline-flex items-center gap-x-1 text-sm rounded-lg border border-gray-200 text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                                    @if (session()->get('page_paginator'))
                                                        {{ session()->get('page_paginator') }} page
                                                    @else
                                                        10 page
                                                    @endif
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m6 9 6 6 6-6"></path>
                                                    </svg>
                                                </button>
                                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 hidden z-50 transition-[margin,opacity] opacity-0 duration-300 mb-2 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                                    aria-labelledby="hs-default-bordered-pagination-dropdown">
                                                    <form action="#tabel-monitor" method="get" autocomplete="off">
                                                        <input type="number" value="10" name="page_paginator"
                                                            class="hidden">
                                                        <button type="submit"
                                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                                            10 page
                                                            @if (session()->get('page_paginator') == 10 || session()->get('page_paginator') == null)
                                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <form action="#tabel-monitor" method="get">
                                                        <input type="number" value="15" name="page_paginator"
                                                            class="hidden">
                                                        <button type="submit"
                                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                                            15 page
                                                            @if (session()->get('page_paginator') == 15)
                                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <form action="#tabel-monitor" method="get" autocomplete="off">
                                                        <input type="number" value="25" name="page_paginator"
                                                            class="hidden">
                                                        <button type="submit"
                                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                                            25 page
                                                            @if (session()->get('page_paginator') == 25)
                                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <form action="#tabel-monitor" method="get" autocomplete="off">
                                                        <input type="number" value="50" name="page_paginator"
                                                            class="hidden">
                                                        <button type="submit"
                                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                                            50 page
                                                            @if (session()->get('page_paginator') == 50)
                                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <form action="#tabel-monitor" method="get" autocomplete="off">
                                                        <input type="number" value="100" name="page_paginator"
                                                            class="hidden">
                                                        <button type="submit"
                                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                                            100 page
                                                            @if (session()->get('page_paginator') == 100)
                                                                <svg class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
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
                                    <!-- End Pagination Wrapper -->

                                    <div>
                                        <div class="inline-flex gap-x-2">
                                            @if ($goods->onFirstPage())
                                                <button
                                                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-300 shadow-sm disabled:opacity-50 disabled:pointer-events-none focus:outline-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m15 18-6-6 6-6" />
                                                    </svg>
                                                    Prev
                                                </button>
                                            @else
                                                <a href="{{ $goods->previousPageUrl() }}" disabled
                                                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m15 18-6-6 6-6" />
                                                    </svg>
                                                    Prev
                                                </a>
                                            @endif

                                            <div class="flex gap-x-2 items-center justify-center text-sm">
                                                <!-- Links Nomor Halaman -->
                                                @php
                                                    if ($goods->currentPage() < 4) {
                                                        if ($goods->lastPage() > 5) {
                                                            $numberOfPagesFirst = 5;
                                                        } else {
                                                            $numberOfPagesFirst = $goods->lastPage();
                                                        }
                                                        $numberOfPagesSecond = 0;
                                                    } elseif ($goods->currentPage() < 4 && $goods->currentPage() > 7) {
                                                        $numberOfPagesFirst = 2;
                                                        $numberOfPagesSecond = 0;
                                                    } else {
                                                        $numberOfPagesFirst = 2;
                                                        if ($goods->currentPage() == 4) {
                                                            $decrement = 1;
                                                        } else {
                                                            $decrement = 2;
                                                        }
                                                        if ($goods->currentPage() + 2 < $goods->lastPage()) {
                                                            $numberOfPagesSecond = $goods->currentPage() + $decrement;
                                                        } else {
                                                            $numberOfPagesSecond = $goods->lastPage();
                                                        }
                                                    }
                                                @endphp
                                                @for ($i = 1; $i <= $numberOfPagesFirst; $i++)
                                                    <a href="{{ $goods->url($i) }}"
                                                        class="py-2 px-2 rounded-lg hover:bg-gray-100 hover:text-blue-600 {{ $goods->currentPage() == $i ? 'bg-gray-100 font-medium text-blue-600' : 'text-gray-800' }}">
                                                        {{ $i }} </a>
                                                @endfor
                                                @if ($numberOfPagesFirst >= 5 || $numberOfPagesSecond > 0)
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                @endif
                                                @if ($numberOfPagesSecond != 0)
                                                    @for ($i = $goods->currentPage() - $decrement; $i <= $numberOfPagesSecond; $i++)
                                                        <a href="{{ $goods->url($i) }}"
                                                            class="py-2 px-2 rounded-lg hover:bg-gray-100 hover:text-blue-600 {{ $goods->currentPage() == $i ? 'bg-gray-100 font-medium text-blue-600' : 'text-gray-800' }}">
                                                            {{ $i }} </a>
                                                    @endfor
                                                @endif
                                            </div>

                                            @if ($goods->onLastPage())
                                                <button
                                                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-300 shadow-sm disabled:opacity-50 disabled:pointer-events-none focus:outline-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                    Next
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m9 18 6-6-6-6" />
                                                    </svg>
                                                </button>
                                            @else
                                                <a href="{{ $goods->nextPageUrl() }}"
                                                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                    Next
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m9 18 6-6-6-6" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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

        const checkboxes = document.querySelectorAll('.checkbox-in-table');
        let counter = 0;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', () => {
                if (checkbox.checked) {
                    counter++;
                    document.getElementById('checked-items-count').innerHTML = counter;

                    // Buat elemen div baru sebagai pembungkus input
                    const newDiv = document.createElement('div');

                    // Buat elemen input baru
                    const newInput = document.createElement('input');
                    // newInput.className = 'hidden';
                    newInput.id = 'append-input-' + checkbox.id;
                    newInput.type = 'text';
                    newInput.name = 'dynamicInput[]'; // Name array untuk menampung banyak input
                    newInput.value = checkbox.id;

                    // Tambahkan input ke dalam div
                    newDiv.appendChild(newInput);

                    // Tambahkan div ke container
                    inputContainer.appendChild(newDiv);
                } else {
                    counter--;
                    document.getElementById('checked-items-count').innerHTML = counter;
                    document.getElementById('append-input-' + checkbox.id).remove();
                }
            });
        });
    </script>
@endsection
