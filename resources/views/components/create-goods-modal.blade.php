<div id="hs-create-new-data-goods-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-create-new-data-goods-modal-label">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 h-[calc(100%-3.5rem)] sm:mx-auto">
        <div
            class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-900 dark:border-neutral-800 dark:shadow-neutral-700/70">

            <div class="overflow-y-auto hide-scrollbar ">
                <div class="sm:divide-y divide-gray-200 dark:divide-neutral-700">
                    <!-- Card Section -->
                    <div class="max-w-full mx-auto">
                        <!-- Card -->
                        <div class="bg-white p-4 sm:p-7 dark:bg-neutral-900">
                            <div class="text-center mb-2">
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                                    Barang
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Make sure you fill the form correctly.
                                </p>
                            </div>

                            <form action="{{ route('goods.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                {{ $slot }}

                                <div class="mt-5 flex justify-end gap-x-2">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        aria-label="Close" data-hs-overlay="#hs-create-new-data-goods-modal">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Card Section -->
                </div>
            </div>

        </div>
    </div>
</div>
