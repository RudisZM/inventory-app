<div id="hs-image-modal-{{ $loop }}"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-image-modal-{{ $loop }}-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-6xl sm:w-6xl sw:min-w-6xl m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="w-5xl mx-auto flex flex-col pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 dark:border-neutral-700 z-10">
                <div></div>
                <button type="button"
                    class="size-10 -mr-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-image-modal-{{ $loop }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <img src="{{ $image }}" alt="{{ $alt }}"
                class="min-w-full max-h-[calc(100vh-10rem)] -mt-8 rounded">
            <form action="{{ $href }}" method="post" enctype="multipart/form-data" class="mt-2">
                @csrf
                <div class="flex justify-center">
                    <input type="text" value="goods" name="type" class="hidden">
                    <label for="update_image" class="sr-only">Choose file</label>
                    <input type="file" name="update_image" id="update_image"
                        class="block w-full bg-white shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                            file:bg-gray-50 file:border-0
                            file:me-4
                            file:py-2 file:px-4
                            dark:file:bg-neutral-700 dark:file:text-neutral-400"
                        accept="image/*">
                    <button type="submit"
                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-e-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
