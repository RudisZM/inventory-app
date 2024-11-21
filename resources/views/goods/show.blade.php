@extends('layout.navbar')

@section('content')
    @foreach (session()->all() as $key => $message)
        @if (in_array($key, ['error', 'failed']))
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 mb-4 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
                                class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 dark:bg-transparent dark:text-red-600 dark:hover:bg-red-800/50 dark:focus:bg-red-800/50"
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="col-span-1 rounded-xl">
            <div data-hs-carousel='{"loadingClasses": "opacity-0"}' class="relative h-full">
                <div class="hs-carousel relative overflow-hidden w-full bg-red-500 min-h-96 h-full bg-white rounded-lg">
                    <div
                        class="hs-carousel-body h-full absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        <div class="hs-carousel-slide h-full">
                            <button type="button" class="w-full h-full" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-good-image-modal" data-hs-overlay="#hs-good-image-modal">
                                @if ($goods->is_imported)
                                    <img src="{{ $goods->image != 'null' ? '/images/' . $goods->image : '/images/no-image.png' }}"
                                        alt="{{ $goods->name }}" class="h-full mx-auto w-full object-cover max-w-full">
                                @else
                                    <img src="/images/{{ $goods->image }}" alt="{{ $goods->name }}"
                                        class="h-full mx-auto w-full object-cover max-w-full">
                                @endif
                            </button>
                        </div>
                        <div class="hs-carousel-slide">
                            <button type="button" class="w-full h-full" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-package-image-modal" data-hs-overlay="#hs-package-image-modal">
                                <img class="h-full mx-auto w-full object-cover max-w-full"
                                    src="/images/{{ $goods->packaging_image != null ? $goods->packaging_image : 'no-image.png' }}"
                                    alt="{{ $goods->name }}">
                            </button>
                        </div>
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                    <span class="text-2xl bg-gray-200/75 flex items-center justify-center size-8 rounded-full"
                        aria-hidden="true">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>

                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl bg-gray-200/75 flex items-center justify-center size-8 rounded-full"
                        aria-hidden="true">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                </div>
            </div>
            <!-- End Slider -->

            <div id="hs-good-image-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog" tabindex="-1" aria-labelledby="hs-good-image-modal-label">
                <div
                    class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-6xl sm:w-6xl sw:min-w-6xl m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div
                        class="w-5xl mx-auto flex flex-col pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="flex justify-between items-center py-3 px-4 dark:border-neutral-700 z-10">
                            <div></div>
                            <button type="button"
                                class="size-10 -mr-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#hs-good-image-modal">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        @if ($goods->is_imported)
                            <img src="{{ $goods->image != 'null' ? '/images/' . $goods->image : '/images/no-image.png' }}"
                                alt="{{ $goods->name }}" class="min-w-full max-h-[calc(100vh-10rem)] -mt-8 rounded-xl">
                        @else
                            <img src="/images/{{ $goods->image }}" alt="{{ $goods->name }}"
                                class="min-w-full max-h-[calc(100vh-10rem)] -mt-8 rounded-xl">
                        @endif

                        <form action="{{ route('goods.update.image', $goods->id) }}" method="post"
                            enctype="multipart/form-data" class="mt-2">
                            @csrf
                            <input type="text" value="goods" name="type" class="hidden">
                            <div class="flex justify-center">
                                <label for="update_image" class="sr-only">Choose file</label>
                                <input type="file" name="update_image" id="update_image"
                                    class="block w-full bg-white shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                <button type="submit"
                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                    Update
                                </button>
                            </div>
                        </form>
                        <div class="max-w-sm mx-auto mt-2">
                            <form action="{{ route('goods.update.image', $goods->id) }}" method="post"
                                onsubmit="return confirm('Apa Anda yakin ingin menghapus data ini? Data yang terhapus tidak dapat dikembalikan.')"
                                class="w-full">
                                @csrf
                                <input type="text" value="goods_delete" name="type" class="hidden">
                                <button type="submit"
                                    class="flex items-center gap-x-3 py-2 px-3 bg-white rounded-lg w-full text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                    hapus gambar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="hs-package-image-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog" tabindex="-1" aria-labelledby="hs-package-image-modal-label">
                <div
                    class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-6xl sm:w-6xl sw:min-w-6xl m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div
                        class="w-5xl mx-auto flex flex-col pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="flex justify-between items-center py-3 px-4 dark:border-neutral-700 z-10">
                            <div></div>
                            <button type="button"
                                class="size-10 -mr-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#hs-package-image-modal">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <img src="/images/{{ $goods->packaging_image != null ? $goods->packaging_image : 'no-image.png' }}"
                            alt="{{ $goods->name }}" class="min-w-full max-h-[calc(100vh-10rem)] -mt-8 rounded-xl">

                        <form action="{{ route('goods.update.image', $goods->id) }}" method="post"
                            enctype="multipart/form-data" class="mt-2">
                            @csrf
                            <input type="text" value="packaging" name="type" class="hidden">
                            <div class="flex justify-center">
                                <label for="update_image" class="sr-only">Choose file</label>
                                <input type="file" name="update_image" id="update_image"
                                    class="block w-full bg-white shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                    file:bg-gray-50 file:border-0
                                    file:me-4
                                    file:py-2 file:px-4
                                    dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                <button type="submit"
                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                    Update
                                </button>
                            </div>
                        </form>

                        <div class="max-w-sm mx-auto mt-2">
                            <form action="{{ route('goods.update.image', $goods->id) }}" method="post"
                                onsubmit="return confirm('Apa Anda yakin ingin menghapus data ini? Data yang terhapus tidak dapat dikembalikan.')"
                                class="w-full">
                                @csrf
                                <input type="text" value="packaging_delete" name="type" class="hidden">
                                <button type="submit"
                                    class="flex items-center gap-x-3 py-2 px-3 bg-white rounded-lg w-full text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                    hapus gambar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-span-2 p-4 rounded-xl border">
            <div class="md:flex items-center justify-between px-4 mb-6 mt-2">
                <h1 class="text-2xl lg:text-4xl font-semibold text-gray-800 dark:text-neutral-200">Detail Barang
                </h1>
            </div>
            <div class="space-y-3 px-4">
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-neutral-800 pb-2">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Nama</span>
                        </dt>
                        <dd>
                            <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                <span class="me-1 mb-1">{{ $goods->name }}</span>
                            </div>
                        </dd>
                    </dl>
                    <div class="mt-1 mx-1 sm:mt-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                        <button id="hs-dropdown-edit-name" type="button"
                            class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            edit
                            <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-edit-name">
                            <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                @csrf
                                <div class="max-w-sm flex">
                                    <input type="text" name="new_name"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-s-lg text-sm focus:border-blue-500 focus:ring-blue-500 focus:ring-1 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        value="{{ $goods->name }}">
                                    <button type="submit"
                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-neutral-800 pb-2">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Harga</span>
                        </dt>
                        <dd>
                            <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                <span class="me-1 mb-1">@currency($goods->price)</span>
                            </div>
                        </dd>
                    </dl>
                    <div class="mt-1 mx-1 sm:mt-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                        <button id="hs-dropdown-edit-name" type="button"
                            class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            edit
                            <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-edit-name">
                            <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                @csrf
                                <div class="max-w-sm flex">
                                    <input type="number" name="new_price"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-s-lg text-sm focus:border-blue-500 focus:ring-blue-500 focus:ring-1 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        value="{{ $goods->price }}">
                                    <button type="submit"
                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-between items-center border-b border-gray-200 dark:border-neutral-800 pb-2 gap-x-2">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Deskripsi</span>
                        </dt>
                        <dd>
                            <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                @php
                                    if (Str::length($goods->description) > 130) {
                                        $description = Str::limit($goods->description, 130);
                                        $nextDescription = Str::substr($goods->description, 130);
                                    }
                                    $description = $goods->description;
                                    $word_limit = 20;

                                    $limited = Str::words($description, $word_limit, '...');

                                    $words = explode(' ', $description);
                                    $sisa_string = implode(' ', array_slice($words, $word_limit));
                                @endphp
                                <div>
                                    <p>
                                        {{ $limited != null ? $limited : '-' }}
                                    </p>
                                    @if (Str::length($goods->description) > 130)
                                        <div id="hs-show-hide-collapse-heading"
                                            class="hs-collapse hidden overflow-hidden transition-[height] duration-300"
                                            aria-labelledby="hs-show-hide-collapse">
                                            <p class="mt-2">
                                                {{ $sisa_string }}
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            <button type="button"
                                                class="hs-collapse-toggle inline-flex items-center gap-x-1 text-sm rounded-lg border border-transparent text-blue-600 hover:text-blue-700 hover:underline focus:outline-none focus:underline focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600"
                                                id="hs-show-hide-collapse" aria-expanded="false"
                                                aria-controls="hs-show-hide-collapse-heading"
                                                data-hs-collapse="#hs-show-hide-collapse-heading">
                                                <span class="hs-collapse-open:hidden">Read more</span>
                                                <span class="hs-collapse-open:block hidden">Read less</span>
                                                <svg class="hs-collapse-open:rotate-180 shrink-0 size-4"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m6 9 6 6 6-6"></path>
                                                </svg>
                                            </button>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </dd>
                    </dl>
                    <div class="mt-1 mx-1 sm:mt-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                        <button id="hs-dropdown-edit-description" type="button"
                            class="hs-dropdown-toggle h-10 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            edit
                            <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-edit-description">
                            <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                @csrf
                                <div class="max-w-full space-y-2">
                                    <textarea name="new_description"
                                        class="py-3 px-4 block w-[20rem] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        rows="3">{{ $goods->description }}</textarea>
                                    <button type="submit"
                                        class="py-1.5 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-neutral-800 pb-2">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Kategori</span>
                        </dt>
                        <dd class="flex items-center">
                            <div class="h-3.5 w-1 bg-red-500 rounded me-1"></div>
                            <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                <span
                                    class="me-1 mb-1">{{ $goods->goodsCategory ? $goods->goodsCategory->name : 'No category' }}</span>
                            </div>
                        </dd>
                    </dl>

                    <div class="mt-1 mx-1 sm:mt-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                        <button id="hs-dropdown-edit-description" type="button"
                            class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            edit
                            <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-edit-description">
                            <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                @csrf
                                <div class="max-w-sm w-[15rem] space-y-2">
                                    <select
                                        data-hs-select='{
                                        "placeholder": "Select option...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                        class="hidden" name="new_category_id">
                                        <option value="">Choose</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $goods->goodsCategory && $goods->goodsCategory->id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    <!-- End Select -->
                                    <p class="mt-3 text-end">
                                        <button type="button"
                                            class="hs-collapse-toggle py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            id="hs-basic-collapse" aria-expanded="false"
                                            aria-controls="hs-basic-collapse-heading"
                                            data-hs-collapse="#hs-basic-collapse-heading">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                                    <button type="submit"
                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between border-b border-gray-200 dark:border-neutral-800 pb-2">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Tag/Alias</span>
                        </dt>
                        <dd>
                            <ul>
                                @if ($goods->tag->isNotEmpty())
                                    @foreach ($goods->tag as $tag)
                                        <li class="me-1 mb-1 inline-flex items-center text-gray-800 dark:text-neutral-200">
                                            <div
                                                class="inline-flex flex-nowrap items-center bg-white border border-gray-200 rounded-lg py-1 px-2 dark:bg-neutral-900 dark:border-neutral-700">
                                                <div
                                                    class="whitespace-nowrap text-sm font-medium text-gray-800 dark:text-white">
                                                    {{ $tag->name }}
                                                </div>
                                                <form action="{{ route('goods.remove.tag') }}" method="post"
                                                    onsubmit="return confirm('Are you sure want to delete this tag?');">
                                                    @csrf
                                                    <input type="number" name="tag_id" value="{{ $tag->id }}"
                                                        class="hidden">
                                                    <button type="submit"
                                                        class="tags ms-2.5 inline-flex justify-center items-center size-5 rounded-full text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 dark:bg-neutral-700/50 dark:hover:bg-neutral-700 dark:text-neutral-400 cursor-pointer">
                                                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6 6 18"></path>
                                                            <path d="m6 6 12 12"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    no tags
                                @endif
                            </ul>
                        </dd>
                    </dl>
                    <div class="mt-1 mx-1 sm:mt-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                        <button id="hs-dropdown-edit-description" type="button"
                            class="hs-dropdown-toggle py-2 px-4 h-10 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            edit
                            <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-edit-description">
                            <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                @csrf
                                <div class="max-w-sm flex">
                                    <input type="text" name="new_tag"
                                        class="py-2 px-4 block w-full border-gray-200 rounded-s-lg text-sm focus:border-blue-500 focus:ring-blue-500 focus:ring-1 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Add new tag">
                                    <button type="submit"
                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-b border-gray-200 dark:border-neutral-800 pb-2">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Total stock</span>
                        </dt>
                        <dd>
                            <div class="text-gray-800 flex items-center dark:text-neutral-200">
                                <span class="me-1 mb-1">{{ $goods->total_stock }}
                                    @if ($goodsExcessStock > 0)
                                        <span class="inline text-blue-600 dark:text-blue-500">— {{ $goodsExcessStock }}
                                            stock belum
                                            memiliki penyimpanan</span>
                                    @endif
                                </span>
                            </div>
                        </dd>
                    </dl>
                    @if ($goodsExcessStock > 0)
                        <div class="mx-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                            <button id="hs-dropdown-edit-description" type="button"
                                class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                atur penyimpanan
                                <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </button>
                            <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                role="menu" aria-orientation="vertical"
                                aria-labelledby="hs-dropdown-edit-description">
                                <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                    @csrf
                                    <input type="number" name="goods_excess_stock" value="{{ $goodsExcessStock }}"
                                        class="hidden">
                                    <div class="max-w-sm space-y-2">
                                        <div class="max-w-full space-y-3">
                                            <div>
                                                <!-- Section -->
                                                <div class="py-2 first:pt-0 last:pb-0">
                                                    <div class="mt-2 space-y-3">
                                                        <div class="max-w-full space-y-3">
                                                            <div>
                                                                <!-- Input Number -->
                                                                <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                                                    data-hs-input-number="">
                                                                    <div
                                                                        class="w-full flex justify-between items-center gap-x-3">
                                                                        <div>
                                                                            <span
                                                                                class="block font-medium text-sm text-gray-800 dark:text-white">
                                                                                stock
                                                                            </span>
                                                                            <span
                                                                                class="block text-xs text-gray-500 dark:text-neutral-400">
                                                                                tentukan jumlah stock yang diinginkan
                                                                            </span>
                                                                        </div>
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
                                                                                class="p-0 w-10 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                                                style="-moz-appearance: textfield;"
                                                                                type="number" name="stock"
                                                                                aria-roledescription="Number field"
                                                                                value="0"
                                                                                data-hs-input-number-input=""
                                                                                max="{{ $goodsExcessStock }}" required>
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
                                                                </div>
                                                                <!-- End Input Number -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Section -->
                                            </div>
                                        </div>
                                        <div class="max-w-full space-y-3">
                                            <div>
                                                <!-- Select -->
                                                <select
                                                    data-hs-select='{
                                                    "placeholder": "Pilih penyimpanan",
                                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                                    }'
                                                    class="hidden" name="placement_id">
                                                    <option value="">Choose</option>
                                                    @foreach ($placements as $placement)
                                                        <option value="{{ $placement->id }}">
                                                            {{ $placement->place ? $placement->place->name : '-' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex justify-between">
                    <dl class="flex gap-1">
                        <dt class="min-w-40">
                            <span class="block text-gray-500 dark:text-neutral-500">Weight</span>
                        </dt>
                        <dd>
                            <div>
                                <div class="text-gray-800 dark:text-neutral-200 flex items-center">gross -
                                    {{ $goods->gross_weight }}({{ $goods->gross_weight_unit }}) / nett -
                                    {{ $goods->nett_weight }}({{ $goods->nett_weight_unit }})
                                </div>
                            </div>
                        </dd>
                    </dl>
                    <div class="mx-1 hs-dropdown [--auto-close:inside] sm:inline-flex">
                        <button id="hs-dropdown-edit-description" type="button"
                            class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            edit
                            <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-edit-description">
                            <form action="{{ route('goods.update.data', $goods->id) }}" method="post">
                                @csrf
                                <div class="max-w-sm space-y-2">
                                    <div class="max-w-full space-y-3">
                                        <div>
                                            <label for="new_gross_weight"
                                                class="block text-sm text-gray-600 mb-2 dark:text-white">gross
                                                weight</label>
                                            <div class="relative">
                                                <input type="number" id="new_gross_weight" name="new_gross_weight"
                                                    class="py-3 px-4 ps-24 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    value="{{ $goods->gross_weight }}">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center text-gray-500 ps-px">
                                                    <label for="new_gross_weight_unit" class="sr-only">Weight</label>
                                                    <select id="new_gross_weight_unit" name="new_gross_weight_unit"
                                                        class="block w-full border-transparent rounded-lg focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800">
                                                        <option value="gram"
                                                            {{ $goods->gross_weight_unit == 'gram' ? 'selected' : '' }}>
                                                            gram</option>
                                                        <option value="once"
                                                            {{ $goods->gross_weight_unit == 'once' ? 'selected' : '' }}>
                                                            once</option>
                                                        <option value="kg"
                                                            {{ $goods->gross_weight_unit == 'kg' ? 'selected' : '' }}>
                                                            kg</option>
                                                        <option value="ton"
                                                            {{ $goods->gross_weight_unit == 'ton' ? 'selected' : '' }}>
                                                            ton</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="max-w-full space-y-3">
                                        <div>
                                            <label for="new_nett_weight"
                                                class="block text-sm text-gray-600 mb-2 dark:text-white">nett
                                                weight</label>
                                            <div class="relative">
                                                <input type="number" id="new_nett_weight" name="new_nett_weight"
                                                    class="py-3 px-4 ps-24 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    value="{{ $goods->nett_weight }}">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center text-gray-500 ps-px">
                                                    <label for="new_nett_weight_unit" class="sr-only">Weight</label>
                                                    <select id="new_nett_weight_unit" name="new_nett_weight_unit"
                                                        class="block w-full border-transparent rounded-lg focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800">
                                                        <option value="gram"
                                                            {{ $goods->nett_weight_unit == 'gram' ? 'selected' : '' }}>gram
                                                        </option>
                                                        <option value="once"
                                                            {{ $goods->nett_weight_unit == 'once' ? 'selected' : '' }}>once
                                                        </option>
                                                        <option value="kg"
                                                            {{ $goods->nett_weight_unit == 'kg' ? 'selected' : '' }}>kg
                                                        </option>
                                                        <option value="ton"
                                                            {{ $goods->nett_weight_unit == 'ton' ? 'selected' : '' }}>ton
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-6 border-gray-200 dark:border-neutral-700">

    {{-- INVENTORY --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div>
            <div class="flex items-center gap-1 mb-4 justify-between">
                <div class="flex items-center gap-1 bg-gray-100 px-3 py-1 rounded-lg">
                    <div class="w-1.5 h-4 rounded bg-green-500"></div>
                    <p class="text-sm uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">Inventory
                    </p>
                </div>
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-custom-icon-trigger" type="button"
                        class="hs-dropdown-toggle flex justify-center items-center py-1 px-1.5 rounded-lg text-sm font-semibold bg-white text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <svg class="size-4 text-gray-600 dark:text-neutral-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="4"
                                d="M6 12h.01m6 0h.01m5.99 0h.01" />
                        </svg>
                    </button>

                    <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-icon-trigger">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <button
                                class="flex items-center w-full gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-new-location"
                                data-hs-overlay="#hs-add-new-location">
                                <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm0 0v6M9.5 9A2.5 2.5 0 0 1 12 6.5" />
                                </svg>
                                Tambah lokasi penyimpanan
                            </button>
                        </div>
                    </div>
                </div>

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
                                                <option selected value="0" hidden>-- pilih place --
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
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                                                <option hidden value="0">-- pilih area --</option>
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
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                                                <option hidden value="0">-- pilih rak/etalase --</option>
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
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                                                <option hidden value="0">-- pilih shap --</option>
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
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                                <div
                                    class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        data-hs-overlay="#hs-add-new-location">
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
            @foreach ($placements as $placement)
                <div
                    class="relative flex w-full mb-4 flex-col p-4 md:p-5 bg-white border hover:shadow-lg shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                    <div class="px-4 inline-flex gap-x-4 relative">
                        <div>
                            <p class="text-gray-800 font-medium text-lg">
                                {{ $placement->place ? $placement->place->name : '-' }}</p>
                            <p class="text-gray-500">stock: {{ $placement->stock }}</p>
                        </div>

                        <div class="hs-dropdown inline-flex absolute top-0 right-0">
                            <button id="hs-dropdown-custom-icon-trigger" type="button"
                                class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg bg-white text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                role="menu" aria-orientation="vertical"
                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                <button
                                    class="flex items-center w-full gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-update-location-{{ $loop->iteration }}"
                                    data-hs-overlay="#hs-update-location-{{ $loop->iteration }}">
                                    <svg class="size-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                                    </svg>
                                    update location
                                </button>
                                <button
                                    class="flex items-center w-full gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-update-stock-{{ $loop->iteration }}"
                                    data-hs-overlay="#hs-update-stock-{{ $loop->iteration }}">
                                    <svg class="size-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                    </svg>
                                    update stock
                                </button>
                                <button
                                    class="flex items-center w-full gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-split-stock"
                                    data-hs-overlay="#hs-split-stock">
                                    <svg class="shrink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                    </svg>
                                    Split stock
                                </button>
                                @if ($placement->stock <= 0)
                                    <form action="{{ route('inventory.destroy', $placement->id) }}" method="post"
                                        onsubmit="return confirm('Apa Anda yakin ingin menghapus data ini? Data yang terhapus tidak dapat dikembalikan.')"
                                        class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <div id="inputContainer" class="hidden">
                                        </div>
                                        <button type="submit"
                                            class="flex items-center gap-x-3 py-2 px-3 rounded-lg w-full text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                                <path
                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                            </svg>
                                            hapus inventori
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <x-modal title="Update Location" labelId="update-location-{{ $loop->iteration }}"
                            href="{{ route('goods.update.location', $placement->id) }}" method="post">
                            <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">

                                <div class="space-y-2">
                                    <div
                                        class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                        <div class="mt-2 space-y-3">
                                            <select id="place_id" name="place_id"
                                                class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih place --
                                                </option>
                                                @foreach ($places as $place)
                                                    <option value="{{ $place->id }}">
                                                        {{ $place->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="area_id" name="area_id"
                                                class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih area --
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="rak_id" name="rak_id"
                                                class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih rak/etalase --
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="shap_id" name="shap_id"
                                                class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih shap --
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                        <x-modal title="Update Stock" labelId="update-stock-{{ $loop->iteration }}"
                            href="{{ route('goods.update.location.stock', $placement->id) }}" method="post">
                            <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">

                                <div class="space-y-2">
                                    <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                        data-hs-input-number="">
                                        <div class="w-full flex justify-between items-center gap-x-3">
                                            <div>
                                                <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                                    add new stock
                                                </span>
                                                <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                    this form will replace old stock with new stock
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-x-1.5">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Decrease"
                                                    data-hs-input-number-decrement="">
                                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <input
                                                    class="p-0 w-16 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                    name="new_stock" style="-moz-appearance: textfield;"
                                                    type="number" aria-roledescription="Number field" value="0"
                                                    data-hs-input-number-input="">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Increase"
                                                    data-hs-input-number-increment="">
                                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                        data-hs-input-number="">
                                        <div class="w-full flex justify-between items-center gap-x-3">
                                            <div>
                                                <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                                    Increase Stock
                                                </span>
                                                <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                    This form will increase old stock
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-x-1.5">
                                                <!-- Button Decrease -->
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Decrease"
                                                    data-hs-input-number-decrement="">
                                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>

                                                <!-- Input Field -->
                                                <input
                                                    class="p-0 w-16 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                    name="increase_stock" style="-moz-appearance: textfield;"
                                                    type="number" step="0.5" min="0"
                                                    aria-roledescription="Number field" value="0.00"
                                                    data-hs-input-number-input="">

                                                <!-- Button Increase -->
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Increase"
                                                    data-hs-input-number-increment="">
                                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </x-modal>

                        <x-modal title="Split stock" labelId="split-stock"
                            href="{{ route('goods.split.stock', $goods->id) }}" method="post">
                            <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">

                                <div class="space-y-2">
                                    <input type="number" name="placement_id" value="{{ $placement->id }}"
                                        class="hidden">
                                    <div
                                        class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                        <div class="mt-2 space-y-3">
                                            <select id="place_id" name="place_id"
                                                class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih place --
                                                </option>
                                                @foreach ($places as $place)
                                                    <option value="{{ $place->id }}">
                                                        {{ $place->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="area_id" name="area_id"
                                                class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih area --
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="rak_id" name="rak_id"
                                                class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih rak/etalase --
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="shap_id" name="shap_id"
                                                class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih shap --
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="py-2 first:pt-0 last:pb-0">
                                        <div class="mt-2 space-y-3">
                                            <div class="max-w-full space-y-3">
                                                <div>
                                                    <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                                        data-hs-input-number="">
                                                        <div class="w-full flex justify-between items-center gap-x-3">
                                                            <div>
                                                                <span
                                                                    class="block font-medium text-sm text-gray-800 dark:text-white">
                                                                    stock
                                                                </span>
                                                                <span
                                                                    class="block text-xs text-gray-500 dark:text-neutral-400">
                                                                    for this location
                                                                </span>
                                                            </div>
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
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                    </svg>
                                                                </button>
                                                                <input
                                                                    class="p-0 w-16 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                                    style="-moz-appearance: textfield;" type="number"
                                                                    name="stock" aria-roledescription="Number field"
                                                                    value="0" data-hs-input-number-input=""
                                                                    max="{{ $placement->stock }}" required>
                                                                <button type="button"
                                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                                    tabindex="-1" aria-label="Increase"
                                                                    data-hs-input-number-increment="">
                                                                    <svg class="shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                        <path d="M12 5v14"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                    <ul class="mt-3 flex flex-col">
                        <li
                            class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                            <div class="flex items-center justify-between w-full">
                                <div class="inline-flex items-end text-gray-500 gap-x-2">
                                    <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                                    </svg>
                                    <span class="text-md">Area: </span>
                                </div>
                                <span class="text-gray-700">{{ $placement->area ? $placement->area->name : '-' }}</span>
                            </div>
                        </li>
                        <li
                            class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                            <div class="flex items-center justify-between w-full">
                                <div class="inline-flex items-end text-gray-500 gap-x-2">
                                    <svg class="size-[1.1rem]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="1.5"
                                            d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                    </svg>
                                    <span class="text-md">Rak/Etalase: </span>
                                </div>
                                <span class="text-gray-700">{{ $placement->rak ? $placement->rak->name : '-' }}</span>
                            </div>
                        </li>
                        <li
                            class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                            <div class="flex items-center justify-between w-full">
                                <div class="inline-flex items-end text-gray-500 gap-x-2">
                                    <svg class="size-[1.1rem]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="1.5"
                                            d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                    </svg>
                                    <span class="text-md">Shap: </span>
                                </div>
                                <span
                                    class="text-md text-gray-700">{{ $placement->shap ? $placement->shap->name : '-' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @if ($loop->iteration == 3)
                @break
            @endif
        @endforeach

        @if ($placements->isEmpty())
            <div
                class="relative flex w-full mb-4 flex-col p-4 md:p-5 bg-white border hover:shadow-lg shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                <div class="px-4 inline-flex gap-x-4 relative">
                    <div>
                        <p class="text-gray-800 font-medium text-lg">
                            {{ $goods->import_placement ? $goods->import_placement : '-' }}</p>
                        <p class="text-gray-500">stock: {{ $goods->total_stock }}</p>
                    </div>

                    <div class="hs-dropdown inline-flex absolute top-0 right-0">
                        <button id="hs-dropdown-custom-icon-trigger" type="button"
                            class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg bg-white text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>

                        <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                            role="menu" aria-orientation="vertical"
                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                            <button
                                class="flex items-center w-full gap-x-1 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-update-location-0"
                                data-hs-overlay="#hs-update-location-0">
                                <svg class="size-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                                </svg>
                                update location
                            </button>
                            <button
                                class="flex items-center w-full gap-x-1 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-update-stock-0"
                                data-hs-overlay="#hs-update-stock-0">
                                <svg class="size-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                </svg>
                                update stock
                            </button>
                        </div>
                    </div>

                    <x-modal title="Update Location" labelId="update-location-0"
                        href="{{ route('goods.update.location', $goods->id) }}" method="post">
                        <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">

                            <div class="space-y-2">
                                <div
                                    class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                    <div class="mt-2 space-y-3">
                                        <select id="place_id" name="place_id"
                                            class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih place --
                                            </option>
                                            @foreach ($places as $place)
                                                <option value="{{ $place->id }}">
                                                    {{ $place->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <select id="area_id" name="area_id"
                                            class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih area --
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <select id="rak_id" name="rak_id"
                                            class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih rak/etalase --
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <select id="shap_id" name="shap_id"
                                            class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih shap --
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                    <x-modal title="Update Stock" labelId="update-stock-0"
                        href="{{ route('goods.update.location.stock', $goods->id) }}" method="post">
                        <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">

                            <div class="space-y-2">
                                <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                    data-hs-input-number="">
                                    <div class="w-full flex justify-between items-center gap-x-3">
                                        <div>
                                            <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                                Add new stock
                                            </span>
                                            <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                this form will replace old stock with new stock
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-x-1.5">
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Decrease"
                                                data-hs-input-number-decrement="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                </svg>
                                            </button>
                                            <input
                                                class="p-0 w-16 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                name="new_stock" style="-moz-appearance: textfield;"
                                                type="number" aria-roledescription="Number field" value="0"
                                                data-hs-input-number-input="">
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Increase"
                                                data-hs-input-number-increment="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                    data-hs-input-number="">
                                    <div class="w-full flex justify-between items-center gap-x-3">
                                        <div>
                                            <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                                Incerest stock
                                            </span>
                                            <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                this form will increase old stock
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-x-1.5">
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Decrease"
                                                data-hs-input-number-decrement="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                </svg>
                                            </button>
                                            <input
                                                class="p-0 w-16 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                name="increase_stock" style="-moz-appearance: textfield;"
                                                type="number" aria-roledescription="Number field" value="0"
                                                data-hs-input-number-input="">
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Increase"
                                                data-hs-input-number-increment="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                </div>
                <ul class="mt-3 flex flex-col">
                    <li
                        class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                        <div class="flex items-center justify-between w-full">
                            <div class="inline-flex items-end text-gray-500 gap-x-2">
                                <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                                </svg>
                                <span class="text-md">Area: </span>
                            </div>
                            <span class="text-gray-700">-</span>
                        </div>
                    </li>
                    <li
                        class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                        <div class="flex items-center justify-between w-full">
                            <div class="inline-flex items-end text-gray-500 gap-x-2">
                                <svg class="size-[1.1rem]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="1.5"
                                        d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                </svg>
                                <span class="text-md">Rak/Etalase: </span>
                            </div>
                            <span class="text-gray-700">-</span>
                        </div>
                    </li>
                    <li
                        class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                        <div class="flex items-center justify-between w-full">
                            <div class="inline-flex items-end text-gray-500 gap-x-2">
                                <svg class="size-[1.1rem]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="1.5"
                                        d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                </svg>
                                <span class="text-md">Shap: </span>
                            </div>
                            <span class="text-md text-gray-700">-</span>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </div>

    {{-- BARANG KELUAR MASUK --}}
    <div>
        <div class="flex items-center gap-1 mb-4 justify-between">
            <div class="flex items-center gap-1 bg-gray-100 px-3 py-1 rounded-lg">
                <div class="w-1.5 h-4 rounded bg-red-500"></div>
                <p class="text-sm uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">Barang
                    keluar masuk
                </p>
            </div>
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-custom-icon-trigger" type="button"
                    class="hs-dropdown-toggle flex justify-center items-center py-1 px-1.5 rounded-lg text-sm font-semibold bg-white text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="size-4 text-gray-600 dark:text-neutral-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="4"
                            d="M6 12h.01m6 0h.01m5.99 0h.01" />
                    </svg>
                </button>

                <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="py-2 first:pt-0 last:pb-0">
                        <button
                            class="flex items-center w-full gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-aliran-barang-keluar"
                            data-hs-overlay="#hs-aliran-barang-keluar">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                            </svg>
                            Buat aliran barang keluar
                        </button>
                        <button
                            class="flex items-center w-full gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-aliran-barang-masuk"
                            data-hs-overlay="#hs-aliran-barang-masuk">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>
                            Buat aliran barang masuk
                        </button>
                    </div>
                </div>

                <div id="hs-aliran-barang-masuk"
                    class="hs-overlay overflow-y-auto hide-scrollbar hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xl w-full z-[80] bg-white border-e dark:bg-neutral-800 dark:border-neutral-700"
                    role="dialog" tabindex="-1" aria-labelledby="hs-aliran-barang-masuk-label">
                    <div
                        class="relative overflow-hidden min-h-32 text-center bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-center">
                        <div class="absolute top-2 end-2">
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#hs-aliran-barang-masuk">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18" />
                                    <path d="m6 6 12 12" />
                                </svg>
                            </button>
                        </div>
                        <figure class="absolute inset-x-0 bottom-0 -mb-px">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                viewBox="0 0 1920 100.1">
                                <path fill="currentColor" class="fill-white dark:fill-neutral-800"
                                    d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                            </svg>
                        </figure>
                    </div>

                    <div class="relative z-10 -mt-12">
                        <span
                            class="mx-auto flex justify-center items-center size-[62px] rounded-full border border-gray-200 bg-white text-gray-700 shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                <path
                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </span>
                    </div>

                    <div class="p-4 sm:p-7 overflow-y-auto">
                        <form action="{{ route('goods.create.inbound', $goods->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <h3 id="hs-aliran-barang-masuk-label"
                                    class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                    Aliran Barang Masuk
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    Form ini memungkinkan Anda untuk membuat aliran barang masuk.
                                </p>
                            </div>
                            <input type="number" name="goods_id" value="{{ $goods->id }}" hidden>

                            <div class="space-y-2 mt-6">
                                <h4 class="text-md font-medium uppercase text-gray-800 dark:text-neutral-200">
                                    Hubungkan ke file attachment
                                </h4>
                                <!-- Select -->
                                <select
                                    data-hs-select='{
                                    "placeholder": "Pilih attachment",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }'
                                    class="hidden">
                                    <option value="">Choose</option>
                                    @foreach ($attachments as $attachment)
                                        <option>#ATTCH-{{ $attachment->id }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                            </div>

                            <div class="mt-5">
                                <h4 class="text-md font-medium uppercase text-gray-800 dark:text-neutral-200">
                                    Informasi dasar</h4>
                                <ul class="mt-3 flex flex-col">
                                    <li
                                        class="py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                        <select
                                            data-hs-select='{
                                            "placeholder": "Pilih jenis aliran barang",
                                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                            }'
                                            class="hidden" name="is_asset" id="jenis_aliran_barang">
                                            <option value="">Choose</option>
                                            <option value="0">inventory</option>
                                            <option value="1">asset</option>
                                        </select>
                                    </li>
                                    <li
                                        class="py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                        <!-- Input Number -->
                                        <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                            data-hs-input-number="">
                                            <div class="w-full flex justify-between items-center gap-x-5">
                                                <div class="grow">
                                                    <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                        Select quantity
                                                    </span>
                                                    <input
                                                        class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                        style="-moz-appearance: textfield;" type="number"
                                                        name="quantity" aria-roledescription="Number field"
                                                        value="1" data-hs-input-number-input="">
                                                </div>
                                                <div class="flex justify-end items-center gap-x-1.5">
                                                    <button type="button"
                                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                        tabindex="-1" aria-label="Decrease"
                                                        data-hs-input-number-decrement="">
                                                        <svg class="shrink-0 size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14"></path>
                                                        </svg>
                                                    </button>
                                                    <button type="button"
                                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                        tabindex="-1" aria-label="Increase"
                                                        data-hs-input-number-increment="">
                                                        <svg class="shrink-0 size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14"></path>
                                                            <path d="M12 5v14"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input Number -->
                                    </li>
                                    <li
                                        class="py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                        <div class="max-w-full space-y-3">
                                            <textarea name="description"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                rows="3" placeholder="Description box ..."></textarea>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="space-y-2 mt-6 hidden" id="placement_asset">
                                <h4 class="text-md font-medium uppercase text-gray-800 dark:text-neutral-200">
                                    Placement
                                </h4>
                                <!-- Section Location -->
                                <div
                                    class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                    <div class="mt-2 space-y-3">
                                        <!-- Select -->
                                        <select id="place_id" name="place_id"
                                            class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih place --
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
                                        <select id="area_id" name="area_id"
                                            class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih area --
                                            </option>
                                        </select>
                                        <!-- End Select -->
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <!-- Select -->
                                        <select id="rak_id" name="rak_id"
                                            class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih rak/etalase --
                                            </option>
                                        </select>
                                        <!-- End Select -->
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <!-- Select -->
                                        <select id="shap_id" name="shap_id"
                                            class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih shap --
                                            </option>
                                        </select>
                                        <!-- End Select -->
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2 mt-6 hidden" id="placement_base_inventory">
                                <h4 class="text-md font-medium uppercase text-gray-800 dark:text-neutral-200">
                                    Placement
                                </h4>
                                <!-- Section Location -->
                                <select
                                    data-hs-select='{
                                        "placeholder": "Pilih base inventory",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-[0.65rem] ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                    class="hidden" name="placement_id">
                                    <option value="">Choose</option>
                                    @foreach ($placements as $placement)
                                        <option value="{{ $placement->id }}">
                                            {{ $placement->place ? $placement->place->name : '-' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-5">
                                <label for="file-input-image" class="sr-only">Choose file</label>
                                <input type="file" name="image" id="file-input-image"
                                    class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                    file:bg-gray-50 file:border-0
                                    file:me-4
                                    file:py-3 file:px-4
                                    dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                    accept="image/*">
                            </div>
                            <div class="mt-5 flex justify-end gap-x-2">
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="hs-aliran-barang-keluar"
                    class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xl w-full overflow-y-auto hide-scrollbar z-[50] bg-white border-e dark:bg-neutral-800 dark:border-neutral-700"
                    role="dialog" tabindex="-1" aria-labelledby="hs-aliran-barang-keluar-label">
                    <div
                        class="relative overflow-hidden min-h-32 text-center bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-center">
                        <div class="absolute top-2 end-2">
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#hs-aliran-barang-keluar">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18" />
                                    <path d="m6 6 12 12" />
                                </svg>
                            </button>
                        </div>
                        <figure class="absolute inset-x-0 bottom-0 -mb-px">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                viewBox="0 0 1920 100.1">
                                <path fill="currentColor" class="fill-white dark:fill-neutral-800"
                                    d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                            </svg>
                        </figure>
                    </div>

                    <div class="relative z-10 -mt-12">
                        <span
                            class="mx-auto flex justify-center items-center size-[62px] rounded-full border border-gray-200 bg-white text-gray-700 shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                <path
                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </span>
                    </div>

                    <div class="p-4 sm:p-7">
                        <form action="{{ route('goods.create.outbound', $goods->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <h3 id="hs-aliran-barang-keluar-label"
                                    class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                    Aliran Barang Keluar
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    Form ini memungkinkan Anda untuk membuat aliran barang keluar.
                                </p>
                            </div>

                            <div class="mt-5 sm:mt-10 space-y-4">
                                <h4 class="text-md font-medium uppercase text-gray-800 dark:text-neutral-200">Base
                                    Inventory Storage</h4>
                                <select
                                    data-hs-select='{
                                        "placeholder": "Pilih base inventory",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-[0.65rem] ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                    class="hidden" name="placement_id">
                                    <option value="">Choose</option>
                                    @foreach ($placements as $placement)
                                        <option value="{{ $placement->id }}">
                                            {{ $placement->place ? $placement->place->name : '-' }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                    data-hs-input-number="">
                                    <div class="w-full flex justify-between items-center gap-x-5">
                                        <div class="grow">
                                            <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                Select quantity
                                            </span>
                                            <input
                                                class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                style="-moz-appearance: textfield;" type="number" name="quantity"
                                                aria-roledescription="Number field" value="1"
                                                data-hs-input-number-input="">
                                        </div>
                                        <div class="flex justify-end items-center gap-x-1.5">
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Decrease"
                                                data-hs-input-number-decrement="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Increase"
                                                data-hs-input-number-increment="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <select
                                    data-hs-select='{
                                    "placeholder": "Jenis barang keluar",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 z-[60] w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }'
                                    class="hidden" name="outbound_type_id">
                                    <option value="">Choose</option>
                                    @foreach ($outboundTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>

                                <div class="hs-tooltip flex items-center">
                                    <input type="checkbox" id="isBarangKembali" name="is_barang_kembali"
                                        class="hs-tooltip-toggle relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                    <label for="isBarangKembali"
                                        class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Barang
                                        kembali</label>
                                    <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                        role="tooltip">
                                        Mengaktifkan centang ini berarti barang harus dikembalikan pada jangka waktu
                                        yang ditentukan.
                                    </div>
                                </div>

                                <div id="dateFileWrapper" class="grid grid-cols-2 gap-4 hidden">
                                    <div class="relative z-[50]">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker type="text" name="return_date"
                                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tanggal barang dikembalikan">
                                    </div>

                                    <div class="max-w-full">
                                        <label for="file-input" class="sr-only">Pilih gambar</label>
                                        <input type="file" name="file_image" id="file-input"
                                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                    </div>
                                </div>

                                <div class="relative max-w-full">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input id="datepicker-actions" datepicker datepicker-buttons
                                        datepicker-autoselect-today type="text" name="created_at"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>

                                <div class="max-w-full space-y-3">
                                    <input type="text" name="operator_name"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Nama operator">
                                </div>
                                <div class="max-w-full space-y-3">
                                    <textarea name="description"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        rows="3" placeholder="Masukkan deskripsi ..."></textarea>
                                </div>
                            </div>

                            <div class="mt-5 flex justify-end gap-x-2">
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div
            class="max-h-[42.3rem] overflow-y-hidden hover:overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100  [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            @foreach ($flowOfGoods as $flow)
                {{-- <h4 class="text-lg font-medium text-gray-800">24 Agus 2024</h4> --}}
                <div class="hs-tooltip [--trigger:hover] sm:[--placement:right] inline-block w-full">
                    <div class="hs-tooltip-toggle block text-center">
                        <button type="button" class="mb-2 w-full">
                            <div class="hover:bg-gray-100 py-2 px-3 rounded-2xl flex items-center justify-between">
                                <div class="flex items-center gap-4">

                                    <div
                                        class="min-h-12 min-w-12 text-gray-600 bg-gray-200/75 flex items-center justify-center rounded-full">
                                        @if ($flow->goods_flow_type_id == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                                            </svg>
                                        @elseif ($flow->goods_flow_type_id == 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-lg text-start text-gray-800">
                                            @if ($flow->goods_flow_type_id == 1)
                                                Barang Masuk
                                            @elseif ($flow->goods_flow_type_id == 2)
                                                Barang Keluar
                                            @elseif ($flow->goods_flow_type_id == 3)
                                                Ubah Penyimpanan
                                            @elseif ($flow->goods_flow_type_id == 4)
                                                Split Penyimpanan
                                            @elseif ($flow->goods_flow_type_id == 5)
                                                Pindah ke Asset
                                            @elseif ($flow->goods_flow_type_id == 6)
                                                Update Stock
                                            @elseif ($flow->goods_flow_type_id == 7)
                                                Peminjaman
                                                @if ($flow->is_hanging)
                                                    <span
                                                        class="py-1 px-1.5 ms-1 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-500/10 dark:text-blue-500">
                                                        <svg class="shrink-0 size-3"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="12" x2="12" y1="2"
                                                                y2="6"></line>
                                                            <line x1="12" x2="12" y1="18"
                                                                y2="22"></line>
                                                            <line x1="4.93" x2="7.76" y1="4.93"
                                                                y2="7.76"></line>
                                                            <line x1="16.24" x2="19.07" y1="16.24"
                                                                y2="19.07"></line>
                                                            <line x1="2" x2="6" y1="12"
                                                                y2="12"></line>
                                                            <line x1="18" x2="22" y1="12"
                                                                y2="12"></line>
                                                            <line x1="4.93" x2="7.76" y1="19.07"
                                                                y2="16.24"></line>
                                                            <line x1="16.24" x2="19.07" y1="7.76"
                                                                y2="4.93"></line>
                                                        </svg>
                                                        Perpanjang
                                                    </span>
                                                @endif
                                            @elseif ($flow->goods_flow_type_id == 8)
                                                Pengembalian
                                            @endif
                                        </p>
                                        <p class="text-md text-start text-gray-500">
                                            @if ($flow->goods_flow_type_id == 3 || $flow->goods_flow_type_id == 4)
                                                {{ $flow->basePlacement->place ? $flow->basePlacement->place->name : 'no placement' }}
                                                <span class="italic font-medium underline">to</span>
                                                {{ $flow->destinationPlacement->place->name }}
                                            @elseif ($flow->goods_flow_type_id == 5)
                                                Pindah ke asset
                                            @elseif($flow->description)
                                                {{ $flow->description }}
                                            @else
                                                {{ $flow->goods->name }}
                                            @endif
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
                                            {{ $flow->description }}
                                        </dd>
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
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z" />
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                    aria-haspopup="dialog" aria-expanded="false"
                                                    aria-controls="hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}"
                                                    data-hs-overlay="#hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}">
                                                    Tunda pengembalian
                                                    <svg class="shrink-0 size-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                    <dt class="font-medium pt-3 first:pt-0 dark:text-white">Tanggal:
                                    </dt>
                                    <dd class="text-gray-600 dark:text-neutral-400">
                                        {{ $flow->created_at->isoFormat('D MMMM, Y') }}
                                    </dd>
                                </dl>

                                <hr class="mt-4 mb-2">

                                <button type="button"
                                    class="flex items-center gap-x-2 py-2 px-1 mb-1 rounded-lg w-full text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-update-good-flow-{{ $loop->iteration }}"
                                    data-hs-overlay="#hs-update-good-flow-{{ $loop->iteration }}">
                                    <svg class="shrink-0 size-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                    </svg>
                                    edit data
                                </button>
                                <form action="{{ route('goods.flow.destroy', $flow->id) }}" method="post"
                                    onsubmit="return confirm('Apa Anda yakin ingin menghapus data ini? Data yang terhapus tidak dapat dikembalikan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center gap-x-2 py-2 px-1 rounded-lg w-full text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
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

                <x-modal title="Update Data" labelId="update-good-flow-{{ $loop->iteration }}"
                    href="{{ route('goods.flow.update.data', $flow->id) }}" method="post">
                    <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">
                        <div class="space-y-2">
                            <label for="new_description" class="block text-sm text-gray-800 dark:text-neutral-200">
                                Deskripsi
                            </label>
                            <div class="max-w-full">
                                <input type="text" name="new_description"
                                    class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 focus:ring-1 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    value="{{ $flow->description }}">
                            </div>
                            <label for="new_description" class="block text-sm text-gray-800 dark:text-neutral-200">
                                Tanggal
                            </label>
                            <div class="relative z-[100]">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input datepicker type="text" name="new_created_at"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Pilih tanggal baru">
                            </div>
                        </div>
                    </div>
                </x-modal>

                <div id="hs-barang-dikembalikan-modal-{{ $loop->iteration }}"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog" tabindex="-1"
                    aria-labelledby="hs-barang-dikembalikan-modal-{{ $loop->iteration }}-label">
                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                        <div
                            class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                <h3 id="hs-barang-dikembalikan-modal-{{ $loop->iteration }}-label"
                                    class="font-bold text-gray-800 dark:text-white">
                                    Buat laporan barang telah dikembalikan
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                    aria-label="Close"
                                    data-hs-overlay="#hs-barang-dikembalikan-modal-{{ $loop->iteration }}">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('goods.return', $flow->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="p-4 space-y-4">

                                    <div class="max-w-full">
                                        <h4 class="text-gray-800 text-md font-medium mb-2">Masukkan laporan gambar
                                        </h4>
                                        <label for="file-input" class="sr-only">Choose file</label>
                                        <input type="file" name="file_image" id="file-input"
                                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                    </div>

                                    <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                        data-hs-input-number="">
                                        <div class="w-full flex justify-between items-center gap-x-3">
                                            <div>
                                                <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                                    Quantity
                                                </span>
                                                <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                    Masukkan jumlah pengembalian
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-x-1.5">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Decrease"
                                                    data-hs-input-number-decrement="">
                                                    <svg class="shrink-0 size-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <input
                                                    class="p-0 w-12 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                    style="-moz-appearance: textfield;" type="number"
                                                    name="quantity" aria-roledescription="Number field"
                                                    value="0" data-hs-input-number-input="">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Increase"
                                                    data-hs-input-number-increment="">
                                                    <svg class="shrink-0 size-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <input type="checkbox"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="hs-default-checkbox" name="return_same"
                                            value="{{ $flow->quantity }}">
                                        <label for="hs-default-checkbox"
                                            class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Jumlah
                                            pengembalian
                                            sama dengan jumlah yang dipinjam</label>
                                    </div>

                                    <select multiple=""
                                        data-hs-select='{
                                        "placeholder": "Pilih penyimpanan",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                        class="hidden" name="placement_id">
                                        <option value="">Choose</option>
                                        @foreach ($placements as $placement)
                                            <option value="{{ $placement->id }}">
                                                {{ $placement->place ? $placement->place->name : '-' }}</option>
                                        @endforeach
                                    </select>

                                    <div class="space-y-2 py-2">
                                        <h4 class="text-gray-800 text-md font-medium">Pilih penyimpanan baru</h4>
                                        <div
                                            class="first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                            <div class="mt-2 space-y-3">
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
                                            </div>
                                            <div class="mt-2 space-y-3">
                                                <select name="area_id"
                                                    class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option hidden value="0">-- pilih area --</option>
                                                </select>
                                            </div>
                                            <div class="mt-2 space-y-3">
                                                <select name="rak_id"
                                                    class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option hidden value="0">-- pilih rak/etalase --</option>
                                                </select>
                                            </div>
                                            <div class="mt-2 space-y-3">
                                                <select name="shap_id"
                                                    class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option hidden value="0">-- pilih shap --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="max-w-full space-y-3">
                                        <h4 class="text-gray-800 text-md font-medium">Tambahkan deskripsi</h4>
                                        <textarea
                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            name="description" rows="3" placeholder="Description box ..."></textarea>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        data-hs-overlay="#hs-barang-dikembalikan-modal-{{ $loop->iteration }}">
                                        Close
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

                <div id="hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[50] overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog" tabindex="-1"
                    aria-labelledby="hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}-label">
                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                        <div
                            class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                <h3 id="hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}-label"
                                    class="font-bold text-gray-800 dark:text-white">
                                    Tunda pengembalian barang
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                    aria-label="Close"
                                    data-hs-overlay="#hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('hanging.goods', $flow->id) }}" method="post">
                                @csrf
                                <div class="p-4 space-y-4">

                                    <h4 class="text-gray-800 text-md font-medium">Tentukan tanggal pengembalian</h4>
                                    <div class="relative z-[50]">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker type="text" name="return_date"
                                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tanggal barang dikembalikan">
                                    </div>

                                    <div class="max-w-full space-y-3">
                                        <h4 class="text-gray-800 text-md font-medium">Tambahkan deskripsi</h4>
                                        <textarea
                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            name="description" rows="3" placeholder="Description box ..."></textarea>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        data-hs-overlay="#hs-tunda-pengembalian-barang-modal-{{ $loop->iteration }}">
                                        Close
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
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                        data-hs-overlay="#hs-task-created-alert">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- @php
                    if ($loop->iteration == 9) {
                        break;
                    }
                @endphp --}}
            @endforeach
        </div>
    </div>

    {{-- ASSET --}}
    <div class="">
        <div class="flex items-center gap-1 mb-4 justify-between">
            <div class="flex items-center gap-1 bg-gray-100 px-3 py-1 rounded-lg">
                <div class="w-1.5 h-4 rounded bg-yellow-400"></div>
                <p class="text-sm uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">Asset
                </p>
            </div>
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-custom-icon-trigger" type="button"
                    class="hs-dropdown-toggle flex justify-center items-center py-1 px-1.5 rounded-lg text-sm font-semibold bg-white text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="size-4 text-gray-600 dark:text-neutral-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="4"
                            d="M6 12h.01m6 0h.01m5.99 0h.01" />
                    </svg>
                </button>
                <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <button
                        class="flex items-center w-full gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-buat-asset"
                        data-hs-overlay="#hs-buat-asset">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                        Buat asset
                    </button>
                </div>

                {{-- MODAL_BUAT_ASSET --}}
                <div id="hs-buat-asset"
                    class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xl w-full z-[80] bg-white border-e dark:bg-neutral-800 dark:border-neutral-700"
                    role="dialog" tabindex="-1" aria-labelledby="hs-buat-asset-label">
                    <div
                        class="relative overflow-hidden min-h-32 text-center bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-center">
                        <div class="absolute top-2 end-2">
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#hs-buat-asset">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18" />
                                    <path d="m6 6 12 12" />
                                </svg>
                            </button>
                        </div>
                        <figure class="absolute inset-x-0 bottom-0 -mb-px">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                viewBox="0 0 1920 100.1">
                                <path fill="currentColor" class="fill-white dark:fill-neutral-800"
                                    d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                            </svg>
                        </figure>
                    </div>

                    <div class="relative z-10 -mt-12">
                        <span
                            class="mx-auto flex justify-center items-center size-[62px] rounded-full border border-gray-200 bg-white text-gray-700 shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                <path
                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </span>
                    </div>

                    <div class="p-4 sm:p-7 overflow-y-auto">
                        <form action="{{ route('goods.create.asset', $goods->id) }}" method="post">
                            @csrf
                            <div class="text-center">
                                <h3 id="hs-buat-asset-label"
                                    class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                    Buat Asset
                                </h3>
                            </div>

                            <div class="mt-5">
                                <h4 class="text-md font-medium text-gray-800 dark:text-neutral-200">Pilih
                                    base inventory</h4>
                                <ul class="mt-3 flex flex-col">
                                    <li
                                        class="py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                        <select
                                            data-hs-select='{
                                            "placeholder": "Pilih base inventory",
                                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-[0.65rem] ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                            }'
                                            class="hidden" name="placement_id">
                                            <option value="">Choose</option>
                                            @foreach ($placements as $placement)
                                                <option value="{{ $placement->id }}">
                                                    {{ $placement->place ? $placement->place->name : '-' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li
                                        class="py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                        <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                            data-hs-input-number="">
                                            <div class="w-full flex justify-between items-center gap-x-5">
                                                <div class="grow">
                                                    <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                        Tentukan quantity
                                                    </span>
                                                    <input
                                                        class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                        style="-moz-appearance: textfield;" type="number"
                                                        name="quantity" aria-roledescription="Number field"
                                                        value="1" data-hs-input-number-input="">
                                                </div>
                                                <div class="flex justify-end items-center gap-x-1.5">
                                                    <button type="button"
                                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                        tabindex="-1" aria-label="Decrease"
                                                        data-hs-input-number-decrement="">
                                                        <svg class="shrink-0 size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14"></path>
                                                        </svg>
                                                    </button>
                                                    <button type="button"
                                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                        tabindex="-1" aria-label="Increase"
                                                        data-hs-input-number-increment="">
                                                        <svg class="shrink-0 size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14"></path>
                                                            <path d="M12 5v14"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                        <div class="max-w-full space-y-3">
                                            <textarea name="description"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                rows="3" placeholder="Description box ..."></textarea>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="text-md font-medium text-gray-800 mt-6 mb-2 dark:text-neutral-200">
                                Pilih
                                tempat penyimpanan asset</h4>
                            <div class="space-y-2">

                                <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                    data-hs-input-number="">
                                    <div class="w-full flex justify-between items-center gap-x-5">
                                        <div class="grow">
                                            <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                Masukkan sisa stok
                                            </span>
                                            <input
                                                class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                style="-moz-appearance: textfield;" type="number"
                                                name="rest_quantity" aria-roledescription="Number field"
                                                data-hs-input-number-input="">
                                        </div>
                                        <div class="flex justify-end items-center gap-x-1.5">
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Decrease"
                                                data-hs-input-number-decrement="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                tabindex="-1" aria-label="Increase"
                                                data-hs-input-number-increment="">
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                    <div class="mt-2 space-y-3">
                                        <select id="place_id" name="place_id"
                                            class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih place --
                                            </option>
                                            @foreach ($places as $place)
                                                <option value="{{ $place->id }}">
                                                    {{ $place->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <select id="area_id" name="area_id"
                                            class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih area --
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <select id="rak_id" name="rak_id"
                                            class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih rak/etalase --
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mt-2 space-y-3">
                                        <select id="shap_id" name="shap_id"
                                            class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" hidden>-- pilih shap --
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 flex justify-end gap-x-2">
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="max-h-[42.8rem] overflow-y-hidden hover:overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100  [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            @foreach ($assets as $asset)
                <div
                    class="relative flex w-full mb-4 flex-col p-4 md:p-5 bg-white border hover:shadow-lg shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                    <div class="px-4 inline-flex gap-x-4 relative">
                        <div>
                            <p class="text-gray-800 font-medium text-lg">
                                {{ $asset->place ? $asset->place->name : '-' }}</p>
                            <p class="text-gray-500">stock: {{ $asset->stock }}</p>
                        </div>
                        <div class="hs-dropdown inline-flex absolute top-0 right-0">
                            <button id="hs-dropdown-custom-icon-trigger" type="button"
                                class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg bg-white text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                role="menu" aria-orientation="vertical"
                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                <button
                                    class="flex items-center w-full gap-x-1 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                    aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-update-location-asset-{{ $loop->iteration }}"
                                    data-hs-overlay="#hs-update-location-asset-{{ $loop->iteration }}">
                                    <svg class="size-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                                    </svg>
                                    update location
                                </button>
                                <button
                                    class="flex items-center w-full gap-x-1 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                    aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-update-stock-asset-{{ $loop->iteration }}"
                                    data-hs-overlay="#hs-update-stock-asset-{{ $loop->iteration }}">
                                    <svg class="size-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                    </svg>
                                    update stock
                                </button>
                            </div>
                        </div>

                        <x-modal title="Update Location Asset"
                            labelId="update-location-asset-{{ $loop->iteration }}"
                            href="{{ route('goods.update.location.asset', $asset->id) }}" method="post">
                            <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">
                                <div class="space-y-2">
                                    <div
                                        class="py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent grid grid-cols-2 gap-4">
                                        <div class="mt-2 space-y-3">
                                            <select id="place_id" name="place_id"
                                                class="place_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih place --
                                                </option>
                                                @foreach ($places as $place)
                                                    <option value="{{ $place->id }}">
                                                        {{ $place->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="area_id" name="area_id"
                                                class="area_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih area --
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="rak_id" name="rak_id"
                                                class="rak_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih rak/etalase --
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-2 space-y-3">
                                            <select id="shap_id" name="shap_id"
                                                class="shap_id text-gray-900 text-sm rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" hidden>-- pilih shap --
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-modal>

                        <x-modal title="Update Stock Asset" labelId="update-stock-asset-{{ $loop->iteration }}"
                            href="{{ route('goods.update.stock.asset', $asset->id) }}" method="post">
                            <div class="p-4 pt-0 pb-6 first:pt-0 last:pb-0">
                                <div class="space-y-4">
                                    <select
                                        data-hs-select='{
                                        "placeholder": "Pilih base inventory",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-[0.65rem] ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                        }'
                                        class="hidden" name="placement_id">
                                        <option value="">Choose</option>
                                        @foreach ($placements as $placement)
                                            <option value="{{ $placement->id }}">
                                                {{ $placement->place ? $placement->place->name : '-' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                        data-hs-input-number="">
                                        <div class="w-full flex justify-between items-center gap-x-3">
                                            <div>
                                                <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                                    incerest stock
                                                </span>
                                                <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                                    this form will increase old stock
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-x-1.5">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Decrease"
                                                    data-hs-input-number-decrement="">
                                                    <svg class="shrink-0 size-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                </button>
                                                <input
                                                    class="p-0 w-16 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                    name="increase_stock" style="-moz-appearance: textfield;"
                                                    type="number" aria-roledescription="Number field"
                                                    value="0" data-hs-input-number-input="">
                                                <button type="button"
                                                    class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    tabindex="-1" aria-label="Increase"
                                                    data-hs-input-number-increment="">
                                                    <svg class="shrink-0 size-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>

                    <ul class="mt-3 flex flex-col">
                        <li
                            class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                            <div class="flex items-center justify-between w-full">
                                <div class="inline-flex items-end text-gray-500 gap-x-2">
                                    <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                                    </svg>
                                    <span class="text-md">Area: </span>
                                </div>
                                <span class="text-gray-700">{{ $asset->area ? $asset->area->name : '-' }}</span>
                            </div>
                        </li>
                        <li
                            class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                            <div class="flex items-center justify-between w-full">
                                <div class="inline-flex items-end text-gray-500 gap-x-2">
                                    <svg class="size-[1.1rem]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="1.5"
                                            d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                    </svg>
                                    <span class="text-md">Rak/Etalase: </span>
                                </div>
                                <span class="text-gray-700">{{ $asset->rak ? $asset->rak->name : '-' }}</span>
                            </div>
                        </li>
                        <li
                            class="inline-flex items-center gap-x-2 py-2 px-4 text-sm text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:text-neutral-200">
                            <div class="flex items-center justify-between w-full">
                                <div class="inline-flex items-end text-gray-500 gap-x-2">
                                    <svg class="size-[1.1rem]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="1.5"
                                            d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                    </svg>
                                    <span class="text-md">Shap: </span>
                                </div>
                                <span
                                    class="text-md text-gray-700">{{ $asset->shap ? $asset->shap->name : '-' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        @if ($assets->isEmpty())
            <div class="flex items-center justify-center h-24">
                <div>
                    <p class="text-center text-gray-500 mt-10 mb-6">Tidak ada data</p>
                    <button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-buat-asset"
                        data-hs-overlay="#hs-buat-asset">
                        Buat Asset
                        <svg class="shink-0 size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.013 6.175 7.006 9.369l5.007 3.194-5.007 3.193L2 12.545l5.006-3.193L2 6.175l5.006-3.194 5.007 3.194ZM6.981 17.806l5.006-3.193 5.006 3.193L11.987 21l-5.006-3.194Z" />
                            <path
                                d="m12.013 12.545 5.006-3.194-5.006-3.176 4.98-3.194L22 6.175l-5.007 3.194L22 12.562l-5.007 3.194-4.98-3.211Z" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection

@section('js')
<script src="https://unpkg.com/flowbite@0.0.1/dist/datepicker.js"></script>
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

    const dateFileWrapper = document.getElementById('dateFileWrapper');
    const isBarangKembali = document.getElementById('isBarangKembali');

    isBarangKembali.addEventListener('change', function() {
        if (isBarangKembali.checked) {
            dateFileWrapper.classList.remove('hidden');
        } else {
            dateFileWrapper.classList.add('hidden');
        }
    });
    const jenisAliranBarang = document.getElementById('jenis_aliran_barang');

    jenisAliranBarang.addEventListener('change', function() {
        if (jenisAliranBarang.value == 0) {
            document.getElementById('placement_base_inventory').classList.remove('hidden');
            document.getElementById('placement_asset').classList.add('hidden');
        } else {
            document.getElementById('placement_asset').classList.remove('hidden');
            document.getElementById('placement_base_inventory').classList.add('hidden');
        }
    });
</script>
@endsection
