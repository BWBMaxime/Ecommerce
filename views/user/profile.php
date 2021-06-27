<? $ASSET::style('form') ?>

<div class="flex items-end h-screen w-full justify-center">
    <div class="flex items-start mt-20 h-screen w-full justify-center">

        <!-- User Card -->
        <div class="grid max-w-xs mt-6">
            <div class="bg-white shadow-lg rounded-lg border border-gray-800">
                <div class="photo-wrapper pt-4">
                    <img class="w-32 h-32 rounded-full mx-auto shadow-lg" src="<?= $user->picture() ?>" alt="Picture user">
                </div>
                <div class="">
                    <div class="container">
                        <form method="POST">
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="fname" name="firstname" placeholder=<?= $user->firstname() ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="lname">Last Name</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="lname" name="lastname" placeholder=<?= $user->lastname() ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="email" name="email" placeholder=<?= $user->email() ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="birth">Birthday</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                <input type="date" id="birth" name="birth" value=<?= $user->birth() ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="phone">Phone number</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="phone" name="phone" placeholder=<?= $user->phone() ?>>
                                </div>
                            </div>
                            <div class="row text-sm text-gray-600 text-white">
                                <input id="btnSubmit" type="submit" value="Submit">
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
                                        Type : <?= $paymentUser->type() ?>
                                    </p>
                                    <p class="text-sm">
                                        Name : <?= $paymentUser->name() ?>
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
                                                    <?= $paymentUser->name() ?>
                                                </p>
                                            </div>
                                            <img class="w-12 h-12" src="https://i.imgur.com/bbPHJVe.png"/>
                                        </div>
                                        <div class="pt-0">
                                            <p class="font-light text-sm">
                                                Card Number
                                            </p>
                                            <p class="font-medium tracking-more-wider text-xs">
                                                <?= $paymentUser->number() ?>
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
                                                        <?= $paymentUser->expiration() ?>
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
                                    <a class="text-xs text-indigo-500 hover:underline hover:text-indigo-600 font-medium" href="/user/payment">View all</a>
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
                                        <?= $deliveryUser->type() ?>
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        <?= $user->firstname() ?>  <?= $user->lastname() ?>
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        <?= $deliveryUser->number() . " " . $deliveryUser->street() . " - " . $deliveryUser->additional() ?>
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        <?= $deliveryUser->zipcode() . " " . $deliveryUser->city() . ", " . $deliveryUser->country()?>
                                    </p>
                                </div>
                                <div class="w-64 h-40 rounded-xl relative text-white shadow-lg transition-transform transform hover:scale-105">
                                    <!-- Maps -->
                                    <img class="relative object-cover w-full h-full rounded-xl" 
                                    src="https://geeko.lesoir.be/wp-content/uploads/2019/03/capture-1068x557.png" 
                                    sizes="(max-width: 1068px) 100vw, 1068px" alt="" title="capture">
                                </div>
                                <div class="text-center">
                                    <a class="text-xs text-indigo-500 hover:underline hover:text-indigo-600 font-medium" href="/user/delivery">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


        <!-- Order Table -->
    <div class="flex absolute bottom-0">
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
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold"><?= $order->date() ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold"><?= $order->contact() ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span class="px-2 inline-flex text-xs leading-7 font-semibold rounded-full bg-gray-200 hover:text-gray-500">
                                <a href="" class="underline truncate w-60"><?= $order->tracking() ?></a>
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
                            <a href="<?= $order->bill() ?>" class="text-indigo-600 hover:text-indigo-900 hover:underline">Edit the invoice</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
