@extends('layout.navbar')
@section('content')
    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl border shadow- p-4 sm:p-7 dark:bg-neutral-900">
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent pb-8">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Submit your application
                        </h2>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-full-name"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Full name
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="af-submit-application-full-name" type="text" name="first_name"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                required>
                            <input type="text" name="last_name"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-email"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Email
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <input id="af-submit-application-email" type="email" name="email"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            required>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="af-submit-application-phone"
                                class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                Password
                            </label>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <!-- Strong Password -->
                        <div class="max-w-full">
                            <div class="flex">
                                <div class="relative flex-1">
                                    <input type="password" id="hs-strong-password-with-indicator-and-hint-in-popover"
                                        name="password"
                                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter password" required>
                                    <button type="button"
                                        data-hs-toggle-password='{
                                                "target": "#hs-strong-password-with-indicator-and-hint-in-popover"
                                            }'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                                r="3"></circle>
                                        </svg>
                                    </button>
                                    <div id="hs-strong-password-popover"
                                        class="hidden absolute z-10 w-full bg-white shadow-md rounded-lg p-4 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700">
                                        <div id="hs-strong-password-in-popover"
                                            data-hs-strong-password='{
                                                "target": "#hs-strong-password-with-indicator-and-hint-in-popover",
                                                "hints": "#hs-strong-password-popover",
                                                "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
                                                "mode": "popover"
                                            }'
                                            class="flex mt-2 -mx-1">
                                        </div>

                                        <h4 class="mt-3 text-sm font-semibold text-gray-800 dark:text-white">
                                            Password Anda disarankan mengandung:
                                        </h4>

                                        <ul class="space-y-1 text-sm text-gray-500 dark:text-neutral-500">
                                            <li data-hs-strong-password-hints-rule-text="min-length"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Minimal 6 karakter.
                                            </li>
                                            <li data-hs-strong-password-hints-rule-text="lowercase"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Berisikan huruf kecil.
                                            </li>
                                            <li data-hs-strong-password-hints-rule-text="uppercase"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Berisikan huruf besar.
                                            </li>
                                            <li data-hs-strong-password-hints-rule-text="numbers"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Mengandung angka.
                                            </li>
                                            <li data-hs-strong-password-hints-rule-text="special-characters"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Menggunakan karakter spesial (@#$%&).
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Strong Password -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Section -->

                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Profile
                        </h2>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-resume-cv"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Image
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                        <input type="file" name="image" id="af-submit-application-resume-cv"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                            file:bg-gray-50 file:border-0
                            file:bg-gray-100 file:me-4
                            file:py-2 file:px-4
                            dark:file:bg-neutral-700 dark:file:text-neutral-400"
                            accept="image/*">
                    </div>
                    <!-- End Col -->

                </div>
                <!-- End Section -->

                <!-- Section -->
                <div
                    class="py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Submit application
                    </h2>
                    <p class="mt-3 text-sm text-gray-600 dark:text-neutral-400">
                        Sebelum mengirim data, pastikan semua data yang Anda masukkan valid.
                    </p>

                    <div class="mt-5 flex">
                        <input type="checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            id="af-submit-application-privacy-check" required>
                        <label for="af-submit-application-privacy-check"
                            class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Data yang saya masukkan telah
                            valid.</label>
                    </div>
                </div>
                <!-- End Section -->

                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Submit application
                </button>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection
