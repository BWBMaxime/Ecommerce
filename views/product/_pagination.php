<? if ($current_page > 2): ?>
<a href="/products/1"  title="Go to first page">
    <button title="Go to first page" class="text-indigo-500 bg-transparent border-l border-t border-b border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded-l outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
        <i class="fas fa-angle-double-left"></i>
    </button>
</a>
<? endif ?>

<? if ($current_page > 1): ?>
<a href="/products/<?= $current_page - 1 ?>" title="Go to previous page">
    <button title="Go to previous page" class="text-indigo-500 bg-transparent border-l border-t border-b border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
        <i class="fas fa-angle-left"></i>
    </button>
</a>
<? endif ?>

<button title="Current page" class="bg-indigo-500 text-white hover:bg-indigo-700 hover:text-white active:bg-indigo-700 font-bold uppercase text-xs px-5 py-3 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
    type="button">
    <?= ($current_page < 1) ? 1 : $current_page ?>
</button>

<? if ($current_page < $last_page): ?>
<a href="/products/<?= $current_page + 1 ?>" title="Go to next page">
    <button title="Go to next page" class="text-indigo-500 bg-transparent border border-solid border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
        <i class="fas fa-angle-right"></i>
    </button>
</a>
<? endif ?>

<? if ($current_page < ($last_page - 1)): ?>
<a href="/products/<?= $last_page ?>" title="Go to last page">
    <button title="Go to last page" class="text-indigo-500 bg-transparent border border-solid border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 outline-none focus:outline-none mb-1 ease-linear transition-all duration-150">
        <i class="fas fa-angle-double-right"></i>
    </button>
</a>
<? endif ?>
