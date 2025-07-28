<div class="min-h-[70vh] flex flex-col gap-10 items-center py-10 px-4">
    <!-- Add Todo Box -->
    <div class="container bg-white max-w-md mx-auto rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Add your todos here
        </h1>

        <div class="flex items-center gap-2">
            <input
                type="text"
                placeholder="Type your todo..."
                class="flex-1 px-4 py-3 rounded-lg border border-gray-300 outline-none" />
            <button
                class="bg-[#d54390] hover:bg-[#92215c] text-white px-4 py-3 rounded-lg font-medium transition outline-none">
                Add
            </button>
        </div>
    </div>

    <!-- Todo List -->
    <div class="container w-full w-full flex flex-col gap-4">
        <!-- Todo Item (Not Completed) -->
        <div class="rounded-xl bg-white p-4 flex justify-between items-start gap-4 shadow-sm">
            <div class="flex gap-2 items-center">
                <input type="checkbox" class="h-4 w-4" />

                <p class="text-gray-800">
                    This is a pending task
                </p>
            </div>
            <div class="flex flex-col gap-1 items-end">
                <button class="text-red-500 hover:text-red-700 text-sm font-medium transition">
                    Delete
                </button>
            </div>
        </div>


    </div>
</div>