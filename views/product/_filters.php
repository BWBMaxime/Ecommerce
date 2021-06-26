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
                            <? foreach ($categories as $category): ?>
                                <label class="custom-control">
                                    <div class="custom-control-label">
                                        <input type="checkbox" checked="" class="custom-control-input truncate"><?= " " . $category->name() ?>
                                    </div>
                                </label>
                            <? endforeach ?>
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