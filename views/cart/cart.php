<? $_ASSET::style('style') ?>

<!-- Cart -->
<div class="w-full flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
        <div class="flex-1">
            <!-- Table of cart -->
            <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                    <!-- Titles table -->
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left font-medium text-base">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0 font-medium text-base">Quantity</th>
                        <th class="hidden text-right md:table-cell font-medium text-base">Unit price</th>
                        <th class="text-right font-medium text-base">Total price</th>
                        <th class="text-right font-medium text-base"></th>
                    </tr>
                </thead>
                <!-- Cart products -->
                <tbody>
                    <!-- One product -->
                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                            <a href="#">
                                <img src="https://limg.app/i/Calm-Cormorant-Catholic-Pinball-Blaster-yM4oub.jpeg"
                                    class="w-20 rounded" alt="Thumbnail">
                            </a>
                        </td>
                        <!-- Product name -->
                        <td>
                            <a href="#">
                                <p class="text-left font-bold text-xl hover:text-gray-400">Earphone</p>
                                <form action="" method="POST">
                                    <button type="submit">
                                        <small class="hover:text-gray-400 hover:underline text-xs color4C">(Remove item)</small>
                                    </button>
                                </form>
                            </a>
                        </td>
                        <!-- Quantity -->
                        <td class="justify-center md:justify-end md:flex mt-7">
                            <div class="w-20 h-10">
                                <div class="relative flex flex-row w-full h-9">
                                    <input type="number" value="2"
                                        class="w-full rounded-xl font-semibold text-center text-gray-700 bg-gray-100 outline-none focus:outline-none hover:text-black focus:text-black" />
                                </div>
                            </div>
                        </td>
                        <!-- Unit price -->
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm lg:text-base font-bold">
                                10.99€
                            </span>
                        </td>
                        <!-- Total price -->
                        <td class="text-right">
                            <span class="text-sm lg:text-base font-bold">
                                21,98€
                            </span>
                        </td>
                        <!-- Delete icon -->
                        <td class="text-right">
                            <button
                                class="inline-block p-3 text-center text-white transition rounded-full shadow ripple hover:shadow-lg focus:outline-none backUrgent">
                                <svg class="w-5 h-5 text-white backUrgent" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <hr class="pb-6 mt-10 border-gray-600">
            <!-- Cart information -->
            <div class="my-4 mt-6 -mx-2 lg:flex">
                <!-- Instruction for seller -->
                <div class="lg:px-14 lg:w-1/2">
                    <div class="p-2 mt-2 bg-gray-100 rounded-full">
                        <h1 class="ml-3 uppercase font-medium">Instruction for seller</h1>
                    </div>
                    <div class="p-4">
                        <p class="mb-4 italic text-xs">If you have some information for the seller you can leave them in the box below</p>
                        <textarea class="w-full h-32 p-2 bg-gray-100 rounded mt-4"></textarea>
                    </div>
                </div>
                <!-- Order Details -->
                <div class="lg:px-4 lg:w-1/2">
                    <div class="p-2 mt-2 bg-gray-100 rounded-full">
                        <h1 class="ml-3 uppercase font-medium">Order Details</h1>
                    </div>
                    <!-- Billing -->
                    <div class="p-4">
                        <p class="mb-6 italic text-xs">Shipping and additionnal costs are calculated based on values you have entered</p>
                        <div class="flex justify-between border-b">
                            <div class="lg:px-4 lg:py-2 text-base lg:text-lg text-center text-gray-800">
                                Subtotal
                            </div>
                            <div class="lg:px-4 lg:py-2 lg:text-base text-center text-gray-900">
                                21,98€
                            </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 text-base lg:text-lg text-center text-gray-800">
                                TVA
                            </div>
                            <div class="lg:px-4 lg:py-2 lg:text-base text-center text-gray-900">
                                20%
                            </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-1 text-lg lg:text-xl font-bold text-center text-gray-800">
                                Total
                            </div>
                            <div class="lg:px-4 lg:py-2 m-1 lg:text-lg font-bold text-center text-gray-900">
                                26,52€
                            </div>
                        </div>
                        <!-- Button checkout -->
                        <a href="#">
                            <button
                                class="flex justify-center w-full px-10 py-2 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-7"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                </svg>
                                <span class="ml-4 mt-5px text-white">Procceed to checkout</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<? $_ASSET::script_url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js') ?>