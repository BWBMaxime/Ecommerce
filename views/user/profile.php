<? $ASSET::style('form') ?>

<div class="flex items-end h-screen w-full justify-center">
    <div class="flex items-start mt-20 h-screen w-full justify-center">

        <!-- User Card -->
        <div class="grid max-w-xs mt-6">
            <div class="bg-white shadow-lg rounded-lg border border-gray-800">
                <div class="photo-wrapper pt-3">
                    <img class="w-28 h-28 rounded-full mx-auto shadow-lg" src="<?= $user->picture() ?>" alt="Picture user">
                </div>
                <div class="">
                    <div class="container">
                        <form>
                            <div class="row">
                                <input class="data" type="hidden" name="id" value="<?= $user->id() ?>">
                                <div class="col-25 mt-2 text-sm">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-75 text-sm">
                                    <input class="data" type="text" name="firstname" placeholder="John" value="<?= $user->firstname() ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm ">
                                    <label for="lname">Last Name </label>
                                </div>
                                <div class="col-75 text-sm">
                                    <input class="data" type="text" name="lastname" placeholder="Doe" value="<?= $user->lastname() ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-75 text-sm">
                                    <input class="data" type="text" name="email" placeholder="john@mail.com" value="<?= $user->email() ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm">
                                    <label for="birth">Birthday</label>
                                </div>
                                <div class="col-75 text-sm text-gray-800">
                                <input class="data" type="date" name="birth" value="<?= $user->birth() ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm">
                                    <label for="phone">Phone number</label>
                                </div>
                                <div class="col-75 text-sm">
                                    <input class="data" type="text" name="phone" placeholder="065-078-258" value="<?= $user->phone() ?>">
                                </div>
                            </div>
                            <div class="row text-sm text-gray-600 text-white">
                                <input id="btnSubmit" class="mt-2" type="button" value="Submit">
                                <input id="btnDelete" class="mt-3" type="button" value="Delete my account">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- This is an example component -->
        <div class="py-5">
            <main class="h-full overflow-y-auto">
                <div class="container mx-auto grid">
                <!-- Cards -->
                    <div class="grid gap-6 z-0 mb-8 ml-8 md:grid-cols-1 xl:grid-cols-2">
                        <!-- Card Payment -->
                        <div class="flex items-center p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800 border border-gray-800">
                            <div class="space-y-6">
                                <div>
                                    <p class="text-m font-bold color4C"> 
                                        Default payment method
                                    </p>
                                    <p class="mt-4 text-sm">
                                        Bank card
                                    </p>
                                    <p class="text-sm">
                                        Type : <?= 'NONE' ?>
                                    </p>
                                    <p class="text-sm">
                                        Name : <?= 'NONE' ?>
                                    </p>
                                </div>
                                <div class="w-64 h-40 m-auto rounded-xl relative text-white shadow-xl transition-transform transform hover:scale-105">
                                    <!-- Credit card -->
                                    <img class="relative object-cover w-full h-full rounded-xl" src="https://i.imgur.com/kGkSg1v.png">
                                    <div class="w-full px-5 absolute top-4">
                                        <div class="flex justify-between">
                                            <div class="">
                                                <p class="font-light text-sm">
                                                    Name
                                                </p>
                                                <p class="font-medium tracking-widest text-xs">
                                                    <?= 'NONE' ?>
                                                </p>
                                            </div>
                                            <img class="w-12 h-12" src="https://i.imgur.com/bbPHJVe.png"/>
                                        </div>
                                        <div class="pt-0">
                                            <p class="font-light text-sm">
                                                Card Number
                                            </p>
                                            <p class="font-medium tracking-more-wider text-xs">
                                                <?= 'XXXX-XXXX-XXXX' ?>
                                            </p>
                                        </div>
                                        <div class="pt-2 pr-2">
                                            <div class="flex justify-between">
                                                <div class="">
                                                    <p class="font-light text-xs">
                                                        Valid
                                                    </h1>
                                                    <p class="font-medium tracking-wider text-xs">
                                                        **/21
                                                    </p>
                                                </div>
                                                <div class="">
                                                    <p class="font-light text-xs text-xs">
                                                        Expiry
                                                    </h1>
                                                    <p class="font-medium tracking-wider text-xs">
                                                        <?= 'YY/MM' ?>
                                                    </p>
                                                </div>
                                                <div class="">
                                                    <p class="font-light text-xs">
                                                        CVV
                                                    </h1>
                                                    <p class=" tracking-more-wider text-xs">
                                                        ***
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <!-- <a class="text-xs text-indigo-500 hover:underline hover:text-indigo-600 font-medium" href="/user/payment">View all</a> -->
                                </div>
                            </div>
                        </div>
                        <!-- Card Delivery -->
                        <div class="flex items-center p-8 bg-white rounded-lg shadow-xl border border-gray-800">
                            <div class="space-y-6">
                                <div>
                                    <p class="text-m font-bold color4C">
                                        Default delivery method
                                    </p>
                                    <p class="mt-4 text-sm font-light dark:text-gray-400 uppercase font-semibold">
                                        <?= 'NONE' ?>
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        John Doe
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        12, Boulevard de Strasbourg
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        34000, Montpellier, FR
                                    </p>
                                </div>
                                <div class="w-64 h-40 rounded-xl relative text-white shadow-lg transition-transform transform hover:scale-105">
                                    <!-- Maps -->
                                    <img class="relative object-cover w-full h-full rounded-xl" 
                                    src="https://geeko.lesoir.be/wp-content/uploads/2019/03/capture-1068x557.png" 
                                    sizes="(max-width: 1068px) 100vw, 1068px" alt="" title="capture">
                                </div>
                                <div class="text-center">
                                    <!-- <a class="text-xs text-indigo-500 hover:underline hover:text-indigo-600 font-medium" href="/user/delivery">View all</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Order Table -->
    <div class="flex absolute" style="bottom: -96;">
        <div class="grid overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-lg overflow-hidden border border-gray-800 sm:rounded-lg">
                    <p scope="col" class="text-m text-left font-bold color4C p-4">
                        Order history
                    </p>
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Contact
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Tracking number
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Products ordered
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Total order
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 flex-col">
                    <? foreach($orders as $order): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold"><?= $order->date() ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold"><?= $order->contact() ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span class="px-2 inline-flex text-xs leading-7 font-semibold rounded-full bg-gray-200 hover:text-gray-500">
                                <p class="underline truncate w-60"><?= $order->tracking() ?></p>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold">4</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold"><?= $order->amount() ?> $</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-7 font-semibold rounded-full bg-green-100 text-green-800">
                                Delivered
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-medium">
                            <!-- <span class="text-indigo-600 hover:text-indigo-900 hover:underline">
                                Invoice
                            </span> -->
                        </td>
                    </tr>
                    <? endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<? $ASSET::script('user') ?>
