<div class="w-full text-center rounded-lg py-16" style="background-image: linear-gradient(to right bottom, #81fbb8, #6deea6, #59e194, #43d481, #28c76f);">
    <div class="flex flex-col text-center justify-center items-center">
        <? $ASSET::image('checked') ?>
        <div class="my-8">
            <p class="font-semibold text-sm color26 leading-tight uppercase">Order</p>
            <p class="font-bold text-2xl color26 leading-tight uppercase">#<?= $checkout ?></p>
            <p class="font-bold text-3xl text-gray-100 leading-tight uppercase py-8 pb-5">Checkout complete !</p>
        </div>
        <a href="/">
            <button class="font-thin rounded-lg text-gray-100 font-medium tracking-widest backColor26 py-4 px-8 uppercase">
                Continue shopping
            </button>
        </a>
    </div>
</div>