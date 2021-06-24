<link href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css" rel="stylesheet">
<? $ASSET::style("style") ?>


    <div class="py-20">
        <main class="h-full overflow-y-auto">
            <div class="container  mx-auto grid">

                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <p class="text-m font-bold color4C">
                        Delivery method
                    </p>
                    
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-gray-800 shadow-lg">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                            </svg>
                        </div>
                            <div>
                                <p class="text-lg uppercase pb-2 font-semibold text-gray-700 dark:text-gray-200">
                                    <?= $delivery->type() ?>
                                </p>
                                <p class="mb-2 ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    <?= $delivery->number() ?>
                                </p>
                                <p class="mb-2 ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    <?= $delivery->street() ?>
                                </p>
                                <p class="mb-2 ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    <?= $delivery->zipcode() ?>
                                </p>
                                <p class="mb-2 ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    <?= $delivery->city() ?>
                                </p>
                                <p class="mb-2 ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    <?= $delivery->country() ?>
                                </p>
                            <div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </main>
    </div>
