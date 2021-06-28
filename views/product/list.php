<? $ASSET::style_url('https://use.fontawesome.com/releases/v5.11.2/css/all.css') ?>
<? $ASSET::style('product') ?>

<? $VIEW::include('product/_carousel') ?>

<!--Section Filtre-->
<div class="flex flex-nowrap justify-center w-full">

    <? // $VIEW::include('product/_filters', array('categories' => $categories)) ?>

    <!-- Product section -->
    <section class="bg-white py-8 w-5/6">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-4">

            <? foreach ($products as $product): ?>
            <div class="w-full md:w-1/3 xl:w-1/5 p-6 flex flex-col">
                <a href="/product/<?= $product->id() ?>">
                    <img class="hover:grow hover:shadow-lg border border-1 border-blue-200 p-2 rounded-lg" src="<?= $product->picture1() ?>">
                    <div class="pt-3 flex items-center justify-between">
                        <p title="<?= $product->name() ?>" class="truncate"><?= $product->name() ?></p>
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

    <? $VIEW::include('product/_pagination', array('current_page' => $current_page, 'last_page' => $last_page)) ?>

</div>