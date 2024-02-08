<div class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur confirm-dialog hidden">
    <div class="relative px-4 min-h-screen sm:flex sm:items-center sm:justify-center">
        <div class=" opacity-25 w-full h-full absolute z-10 inset-0"></div>
        <div class="bg-white rounded-lg sm:my-[auto] sm:max-w-sm sm:mx-auto p-4 fixed inset-x-0 top-0 z-50 mt-8 mx-4 sm:relative shadow-lg">
            <div class="sm:flex items-center">
                <div class="rounded-full border border-gray-300 flex items-center justify-center w-16 h-16 flex-shrink-0 mx-auto">
                <i class="bx bx-error text-3xl">
                &#9888;
                </i>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-6 text-center sm:text-left">
                <p class="font-bold">Warning!</p>
                <p class="text-sm text-gray-700 mt-1">You will lose all of your reservations about this activity by deleting this. This action cannot be undone.
                </p>
                </div>
            </div>
            <div class="text-center sm:text-right mt-4 sm:flex sm:justify-end">
                <button id="confirm-delete-btn" class="block w-full sm:inline-block sm:w-auto px-4 py-3 sm:py-2 bg-red-200 text-red-700 rounded-lg font-semibold text-sm sm:ml-2 sm:order-2">
                    Delete
                </button>
                <button id="confirm-cancel-btn" class="block w-full sm:inline-block sm:w-auto px-4 py-3 sm:py-2 bg-gray-200 rounded-lg font-semibold text-sm mt-4 sm:mt-0 sm:order-1">
                Cancel
                </button>
            </div>
        </div>
    </div>
</div>
