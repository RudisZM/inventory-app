@extends('layout.navbar')

@section('content')
    @foreach (session()->all() as $key => $message)
        @if (in_array($key, ['error']))
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
        @if (in_array($key, ['success_handle_attachment']))
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

    <div class="max-w-full mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">

                            <div class="sm:col-span-1">
                                <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <input type="text" id="hs-as-table-product-review-search"
                                        name="hs-as-table-product-review-search"
                                        class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Search">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                        <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        href="#">
                                        View all
                                    </a>

                                    <button type="button"
                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="hs-create-attachment-modal"
                                        data-hs-overlay="#hs-create-attachment-modal">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Create Attachment
                                    </button>
                                </div>
                            </div>

                            <div id="hs-create-attachment-modal"
                                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                                role="dialog" tabindex="-1" aria-labelledby="hs-create-attachment-modal-label">
                                <div
                                    class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                    <div
                                        class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                                        <div
                                            class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                            <h3 id="hs-create-attachment-modal-label"
                                                class="font-bold text-gray-800 dark:text-white">
                                                Form Attachment
                                            </h3>
                                            <button type="button"
                                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                                aria-label="Close" data-hs-overlay="#hs-create-attachment-modal">
                                                <span class="sr-only">Close</span>
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M18 6 6 18"></path>
                                                    <path d="m6 6 12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('attachment.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="p-4">
                                                <div class="py-6 first:pt-0 last:pb-0 space-y-4">
                                                    <div>
                                                        <label for="image" class="sr-only">Choose
                                                            file</label>
                                                        <input type="file" name="image" id="image"
                                                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                                            accept="image/*">
                                                    </div>
                                                    <div>
                                                        <select
                                                            class="py-3 px-3 pe-9 block w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                            name="category">
                                                            <option selected="" hidden value="0">Pilih kategori
                                                                attachment</option>
                                                            <option value="kantor">kantor</option>
                                                            <option value="owner">owner</option>
                                                            <option value="staff">staff</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <select multiple=""
                                                            data-hs-select='{
                                                            "placeholder": "Pilih barang yang ingin dihubungkan",
                                                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                                            "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200 \" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                                                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                                            }'
                                                            class="hidden" name="goods_id[]">
                                                            <option value="">Choose</option>
                                                            @foreach ($goodies as $goods)
                                                                <option value="{{ $goods->id }}"
                                                                    data-hs-select-option='{"icon": "<img class=\"shrink-0 size-5 rounded-full\" src=\"{{ $goods->is_imported ? '' : '/images/' }}{{ $goods->image ? $goods->image : 'default-produk-img.jpg' }}\" alt=\"{{ $goods->name }}\" />"}'>
                                                                    {{ $goods->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <!-- Input Number -->
                                                        <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700"
                                                            data-hs-input-number="">
                                                            <div class="w-full flex justify-between items-center gap-x-5">
                                                                <div class="grow">
                                                                    <span
                                                                        class="block text-xs text-gray-500 dark:text-neutral-700">
                                                                        Quantity
                                                                    </span>
                                                                    <input
                                                                        class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                                                        name="quantity"
                                                                        style="-moz-appearance: textfield;" type="number"
                                                                        aria-roledescription="Number field" value="1"
                                                                        data-hs-input-number-input="">
                                                                </div>
                                                                <div class="flex justify-end items-center gap-x-1.5">
                                                                    <button type="button"
                                                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
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
                                                                    <button type="button"
                                                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
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
                                                    <div>
                                                        <input type="text"
                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                            placeholder="Nama penerima" name="recipient">
                                                    </div>
                                                    <div>
                                                        <textarea
                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                            rows="3" placeholder="Description box ..." name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                                <button type="button"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                    data-hs-overlay="#hs-create-attachment-modal">
                                                    Close
                                                </button>
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
                            class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-neutral-900 dark:border-neutral-700">
                            <button type="button"
                                class="hs-collapse-toggle py-4 px-6 w-full flex items-center gap-2 font-semibold text-gray-800 dark:text-neutral-200"
                                id="hs-as-table" aria-expanded="false" aria-controls="hs-as-table-label"
                                data-hs-collapse="#hs-as-table-label">
                                <svg class="hs-collapse-open:rotate-90 size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                                Insights
                            </button>
                            <div id="hs-as-table-label"
                                class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="hs-as-table">
                                <div class="pb-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="size-5 flex justify-center items-center rounded-full bg-blue-600 text-white dark:bg-blue-500">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        </span>
                                        <span class="text-sm text-gray-800 dark:text-neutral-400">
                                            There are no insights for this period.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Nomor attachment
                                            </span>
                                            <div class="hs-tooltip">
                                                <div class="hs-tooltip-toggle">
                                                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                                        <path d="M12 17h.01" />
                                                    </svg>
                                                    <span
                                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                        role="tooltip">
                                                        Nomor attachment adalah identitas dari attachment.
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Penerima
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Category
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Quantity
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Created
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($attachments as $attachment)
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-{{ $attachment->id }}-modal"
                                                data-hs-overlay="#hs-{{ $attachment->id }}-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="font-mono hover:underline text-sm text-blue-600 dark:text-blue-500">#ATTCH-{{ $attachment->id }}</span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <span class="block px-6 py-2">
                                                <span class="text-sm text-gray-600 dark:text-neutral-400">
                                                    {{ $attachment->recipient ? $attachment->recipient : '-' }}</span>
                                            </span>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="inline-flex items-center gap-x-1">
                                                    <div class="h-4 w-1 rounded bg-green-600">
                                                    </div>
                                                    <span
                                                        class="text-gray-800">{{ $attachment->category ? $attachment->category : 'entahlah' }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <span class="block px-6 py-2">
                                                <span class="text-sm text-gray-600 dark:text-neutral-400">
                                                    {{ $attachment->quantity ? $attachment->quantity : '-' }}</span>
                                            </span>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="block">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $attachment->created_at->format('d M Y') }}</span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-{{ $attachment->id }}-modal"
                                                data-hs-overlay="#hs-{{ $attachment->id }}-modal">
                                                <span class="px-6 py-1.5">
                                                    <span
                                                        class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                            <path
                                                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                        </svg>
                                                        View
                                                    </span>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div id="hs-{{ $attachment->id }}-modal"
                                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                                        role="dialog" tabindex="-1"
                                        aria-labelledby="hs-{{ $attachment->id }}-modal-label">
                                        <div
                                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xl sm:w-full m-3 sm:mx-auto">
                                            <div
                                                class="relative flex flex-col bg-white shadow-lg rounded-xl pointer-events-auto dark:bg-neutral-800">
                                                <!-- Close Button -->
                                                <div class="absolute top-2 end-2">
                                                    <button type="button"
                                                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                                        aria-label="Close"
                                                        data-hs-overlay="#hs-{{ $attachment->id }}-modal">
                                                        <span class="sr-only">Close</span>
                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6 6 18" />
                                                            <path d="m6 6 12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <!-- End Close Button -->

                                                <!-- Image -->
                                                <img src="/images/{{ $attachment->image }}"
                                                    alt="{{ $attachment->name }}"
                                                    class="max-w-full max-h-[30rem] object-contain rounded-t-xl">
                                                <!-- End Image -->

                                                <!-- Body -->
                                                <div class="p-4 sm:p-7 overflow-y-auto">
                                                    <div>
                                                        <h4
                                                            class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                            Detail informasi</h4>

                                                        <ul class="mt-3 flex flex-col">
                                                            <li
                                                                class="inline-flex items-center gap-x-2 py-3 px-4 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                                                <div class="flex items-center justify-between w-full">
                                                                    <span class="text-sm">Attachment number</span>
                                                                    <span
                                                                        class="text-sm">#ATTCH-{{ $attachment->id }}</span>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="inline-flex items-center gap-x-2 py-3 px-4 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                                                <div class="flex items-center justify-between w-full">
                                                                    <span class="text-sm">Kategori Attachment</span>
                                                                    <span
                                                                        class="text-sm">{{ $attachment->category }}</span>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="inline-flex items-center gap-x-2 py-3 px-4 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                                                <div class="flex items-center justify-between w-full">
                                                                    <span class="text-sm">Quantity</span>
                                                                    <span
                                                                        class="text-sm">{{ $attachment->quantity ? $attachment->quantity : '-' }}</span>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="inline-flex items-center gap-x-2 py-3 px-4 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                                                <div class="flex items-center justify-between w-full">
                                                                    <span class="text-sm">Penerima</span>
                                                                    <span
                                                                        class="text-sm">{{ $attachment->recipient ? $attachment->recipient : '-' }}</span>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="inline-flex items-center gap-x-2 py-3 px-4 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                                                <div class="flex items-center justify-between w-full">
                                                                    <span class="text-sm">Deskripsi</span>
                                                                    <span
                                                                        class="text-sm">{{ $attachment->description ? $attachment->description : '-' }}</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="mt-4">
                                                        <p class="text-sm text-gray-500 dark:text-neutral-500">Yuo can just
                                                            see the attachment</p>
                                                    </div>
                                                </div>
                                                <!-- End Body -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                @endforeach
                            </tbody>
                        </table>

                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    <span
                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $attachments->count() }}</span>
                                    results from
                                    <span
                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $attachments->total() }}</span>
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    @if ($attachments->onFirstPage())
                                        <button type="button"
                                            class="py-2 px-3 cursor-not-allowed inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-400 shadow-sm focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                            <svg class="size-3" width="16" height="16" viewBox="0 0 16 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.506 1.64001L4.85953 7.28646C4.66427 7.48172 4.66427 7.79831 4.85953 7.99357L10.506 13.64"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            Prev
                                        </button>
                                    @else
                                        <a href="{{ $attachments->previousPageUrl() }}"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                            <svg class="size-3" width="16" height="16" viewBox="0 0 16 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.506 1.64001L4.85953 7.28646C4.66427 7.48172 4.66427 7.79831 4.85953 7.99357L10.506 13.64"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            Prev
                                        </a>
                                    @endif

                                    @if ($attachments->onLastPage())
                                        <button type="button"
                                            class="py-2 px-3 cursor-not-allowed inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-400 shadow-sm focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                            Next
                                            <svg class="size-3" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.50598 2L10.1524 7.64645C10.3477 7.84171 10.3477 8.15829 10.1524 8.35355L4.50598 14"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                    @else
                                        <a href="{{ $attachments->nextPageUrl() }}"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                            Next
                                            <svg class="size-3" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.50598 2L10.1524 7.64645C10.3477 7.84171 10.3477 8.15829 10.1524 8.35355L4.50598 14"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const radioCategory = document.querySelectorAll('.radio-category');
        radioCategory.forEach(radio => {
            radio.addEventListener('click', () => {
                const btnSubmit = document.getElementById('btnHandleAttachmentCategory');
                btnSubmit.click();
            });
        });
    </script>
@endsection
