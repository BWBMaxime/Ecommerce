<? $ASSET::style('navbar') ?>


<nav id="navbar" class="w-full fixed bg-white z-40 top-0 py-1 shadow-xl">
    <div class="w-full container mx-auto flex items-center justify-between mt-0 px-6 py-3">
        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle">
        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">   
            <nav>
                <!-- Logo -->
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0" id="cartsize">
                    <a class="flex items-center" href="/">
                        <? $ASSET::image('logo', 'ECOMMERCE Website Logo') ?>
                        <h1 title="HOME" class="font-bold pl-5">ECOMMERCE</h1>
                    </a>
                </ul>
            </nav>
        </div>

        <form method="GET" class="order-6 md:order-2 w-1/2" >  <!-- barre de recherche -->
            <input type="text" name="s" class="col-8 border-2 p-2 w-full " placeholder="Search a product..."
                id="search-filter">
                <input class="pl-3 inline-block no-underline hover:text-black"  type='submit' value='Search'>
                          
                        
                        
        </form>
    
        <div class="order-2 md:order-3 flex items-center" id="nav-content">
        <? if ($SESSION::isLogged()): ?>
            <a href="/user" title="PROFILE"><? $ASSET::image('avatar') ?></a>
            <img title="DISCONNECT" class="disconnect mx-5 cursor-pointer" src="<?= $ASSET::image_path('logout') ?>">
        <? else: ?>
            <a href="/session" title="CONNECT" class="mr-5"><? $ASSET::image('avatar') ?></a>
        <? endif ?>
            <a class="pl-3 inline-block no-underline color4C hover:text-gray" href="/cart" title="CART">
                <svg class="cart fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 24 24">
                    <path
                        d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />   
                </svg>
            </a>   
        </div>
    </div>
</nav>

<hr class="h-20">

<? $ASSET::script('navbar') ?>