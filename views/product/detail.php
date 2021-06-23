<? $_ASSET::style('style') ?>

<!-- Images -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
  <div class="flex flex-col md:flex-row -mx-4">
    <div class="md:flex-1 px-4">
      <div x-data="{ image: 1 }" x-cloak>
        <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
          <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
            <span class="text-5xl">1</span>
          </div>

          <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
            <span class="text-5xl">2</span>
          </div>

          <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
            <span class="text-5xl">3</span>
          </div>

          <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
            <span class="text-5xl">4</span>
          </div>
        </div>
        <!-- Border image -->
        <div class="flex -mx-2 mb-4">
          <template x-for="i in 4">
            <div class="flex-1 px-2">
              <button x-on:click="image = i" :class="{ 'ring-1 ring-gray-600 ring-inset': image === i }"
                class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                <span x-text="i" class="text-2xl"></span>
              </button>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- Name of product -->
    <div class="md:flex-1 px-4">
      <h2 class="mb-3 leading-tight tracking-tight font-light text-3xl md:text-4xl color26">Lorem ipsum dolor
        <!-- Favorite -->
        <button class="inline-block ml-6 p-3 text-center text-white transition border border-gray-900 rounded-full ripple hover:bg-gray-50 focus:outline-none">
          <svg class="w-4 h-4 color26" xmlns="http://www.w3.org/2000/svg" viewBox="2 2 16 16"
            fill="currentColor">
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        </button>
      </h2>

      <!-- Price -->
      <div class="flex items-center space-x-4 my-4">
        <div>
          <div class="rounded-lg bg-gray-100 flex py-2 px-3">
            <span class="color4C mr-1 mt-1">€</span>
            <span class="color4C text-2xl">24.99</span>
          </div>
        </div>
        <div class="flex-1">
        </div>
      </div>

      <!-- Summary -->
      <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae exercitationem porro
        saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita cupiditate a est.</p>

      <!-- Quantity -->
      <div class="flex py-4 space-x-4">
        <div class="relative">
          <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-300 tracking-wide font-semibold">
            Qty</div>
          <select
            class="cursor-pointer appearance-none rounded-xl border border-gray-600 pl-4 pr-8 h-14 flex items-end pb-1 text-gray-700">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <svg class="w-5 h-5 text-gray-300 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
          </svg>
        </div>

        <!-- Button Cart-->
        <button type="button"
          class="h-10 mt-2 px-16 py-2 backColor26 text-white rounded-md focus:outline-none focus:ring-2 ring-gray-300 ring-offset-2 flex items-center hover:text-gray-300">
          Add to Cart
          <svg class="fill-current ml-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
            <circle cx="10.5" cy="18.5" r="1.5" />
            <circle cx="17.5" cy="18.5" r="1.5" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Description -->
<section class="bg-white py-8">
  <div class="container py-6 px-6 mx-auto border-t border-gray-600">
    <a class="uppercase tracking-wide no-underline hover:no-underline font-medium color4c text-xl mb-8" href="#">
      Description
    </a>
    <p class="mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
      eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan
      lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis
      mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam
      vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed
      faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum
      quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas
      dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu
      consequat ac.</p>
  </div>
</section>

<!-- Script carousel images -->
<? $_ASSET::script_url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js') ?>