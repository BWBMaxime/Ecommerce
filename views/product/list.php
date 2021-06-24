<? $ASSET::style_url('https://use.fontawesome.com/releases/v5.11.2/css/all.css') ?>
<? $ASSET::style('style') ?>
<? $ASSET::style('product') ?>

<? $VIEW::include('partial/_carousel') ?>

<!--Section Filtre-->
<div class="flex">
    <section class="w-1/6 ml-2">
        <h2 class="mt-16 mb-4 text-lg font-regular">FILTERS</h2>
        <div id="filters" class="">
            <hr class="solid col-9 mx-auto">

            <div class="d-md-flex d-lg-flex d-xl-flex justify-content-around col-9 mx-auto">
                <!-- Categories -->
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <article class="filter-group">
                        <header class="card-header">
                            <h6 class="title mt-6 mb-2 ml-3 font-extra-light">Categories</h6>
                        </header>
                        <div class="filter-content ml-0.5" id="collapse_aside1">
                            <div class="card-body"> 
                                <label class="custom-control">
                                    <div class="custom-control-label">
                                        <input type="checkbox" checked="" class="custom-control-input"> Electronics
                                    </div>
                                </label>
                                <label class="custom-control">
                                    <div class="custom-control-label">
                                        <input type="checkbox" checked="" class="custom-control-input"> Computers
                                    </div>
                                </label>
                                <label class="custom-control">
                                    <div class="custom-control-label">
                                        <input type="checkbox" checked="" class="custom-control-input"> Portable
                                    </div>
                                </label>
                                <label class="custom-control">
                                    <div class="custom-control-label">
                                        <input type="checkbox" checked="" class="custom-control-input"> Audio
                                    </div>
                                </label>
                            </div>
                        </div>
                    </article>
                    <!-- Price -->
                    <article class="filter-group">
                        <header class="card-header">
                            <h6 class="title mt-6 mb-2 ml-3 font-extra-light">Price</h6>
                        </header>
                        <div class="filter-content ml-0.5" id="collapse_aside3">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <div class="btn btn-light">
                                        <input type="checkbox" name="price" onclick="onlyOne(this)"> 1€ - 10€
                                    </div>
                                </label>
                                <label class="checkbox-btn">
                                    <div class="btn btn-light">
                                        <input type="checkbox" name="price" onclick="onlyOne(this)"> 10€ - 25€
                                    </div>
                                </label>
                                <label class="checkbox-btn">
                                    <div class="btn btn-light">
                                        <input type="checkbox" name="price" onclick="onlyOne(this)"> 25€ - 50€
                                    </div>
                                </label>
                                <label class="checkbox-btn">
                                    <div class="btn btn-light">
                                        <input type="checkbox" name="price" onclick="onlyOne(this)"> 50€ - 100€
                                    </div>
                                </label>
                                <label class="checkbox-btn">
                                    <div class="btn btn-light">
                                        <input type="checkbox" name="price" onclick="onlyOne(this)"> greater than 100€
                                    </div>
                                </label>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- Button -->
                <div class="col-lg-4 col-xl-3 col-md-6 mt-3">
                    <button class="p-2 my-2 bg-gray-500 text-white rounded-md focus:outline-none focus:ring-2 ring-gray-300 ring-offset-2">
                        <a href="#">Apply Now</a>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Product section -->
    <section class="bg-white py-8 w-5/6">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-4">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-xl "
                        href="#">
                        Store
                    </a>
                    <div class="flex items-center" id="store-nav-content">
                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>
                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>

            <? foreach ($products as $product): ?>
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                <a href="/product/<?= $product->id() ?>">
                    <img class="hover:grow hover:shadow-lg" src="<?= $product->picture1() ?>">
                    <div class="pt-3 flex items-center justify-between">
                        <p title="<?= $product->name() ?>" class="truncate w-60"><?= $product->name() ?></p>
                        <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z">
                        </svg>
                    </div>
                    <p class="pt-1 text-gray-900"><?= $product->price(true) ?> $</p>
                </a>
            </div>
            <? endforeach ?>

        </div>
    </section>
</div>

<!-- Pagination -->
<div class="flex items-center justify-center mb-20">

    <? if ($current_page > 2): ?>
    <a href="/products/1"  title="Go to first page">
        <button title="Go to first page" class="text-purple-500 bg-transparent border-l border-t border-b border-purple-500 hover:bg-purple-500 hover:text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded-l outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
            <i class="fas fa-angle-double-left"></i>
        </button>
    </a>
    <? endif ?>

    <? if ($current_page > 1): ?>
    <a href="/products/<?= $current_page - 1 ?>" title="Go to previous page">
        <button title="Go to previous page" class="text-purple-500 bg-transparent border-l border-t border-b border-purple-500 hover:bg-purple-500 hover:text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
            <i class="fas fa-angle-left"></i>
        </button>
    </a>
    <? endif ?>

    <button title="Current page" class="bg-purple-500 text-white hover:bg-purple-700 hover:text-white active:bg-purple-700 font-bold uppercase text-xs px-5 py-3 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
        type="button">
        <?= ($current_page < 1) ? 1 : $current_page ?>
    </button>

    <? if ($current_page < $last_page): ?>
    <a href="/products/<?= $current_page + 1 ?>" title="Go to next page">
        <button title="Go to next page" class="text-purple-500 bg-transparent border border-solid border-purple-500 hover:bg-purple-500 hover:text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
            <i class="fas fa-angle-right"></i>
        </button>
    </a>
    <? endif ?>

    <? if ($current_page < ($last_page - 1)): ?>
    <a href="/products/<?= $last_page ?>" title="Go to last page">
        <button title="Go to last page" class="text-purple-500 bg-transparent border border-solid border-purple-500 hover:bg-purple-500 hover:text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
            <i class="fas fa-angle-double-right"></i>
        </button>
    </a>
    <? endif ?>

</div>