<? $ASSET::script_url("https://polyfill.io/v3/polyfill.min.js?features=default") ?>
<? $ASSET::style('delivery') ?>

<div class="form-meth">
    <p class="text-black text-4xl my-4 ">Methode de livraison</p>
    <br>
    <div class="mt-1">
        <label class="inline-flex items-center">
            <input type="radio" name="drone" class="form-checkbox h-8 w-8">
            <span class="ml-4 text-xl">A domicile</span>
        </label>
        </div>
        <br>
        
        <div class="mt-1">
        <label class="inline-flex items-center">
            <input type="radio" name="drone" class="form-checkbox h-8 w-8">
            <span class="ml-4 text-xl">En point relais</span>
        </label>
        </div>
</div>

<div class="w-full  bg-white dark:bg-gray-800 pt-6 pb-8 xl:pt-8">
    <input type="text" class=" border-2 text-3xl p-8 w-full controls  " placeholder="Search a location..."
        id="searchInput">
</div>
<div class="geo-infos">
    <!-- Display geolocation data -->
    <ul class="carousel-indicators geo-data">
        <li class="text-black text-2xl my-4 "> Full Address: <span id="location"></span></li>
        <li class="text-black text-2xl my-4 "> Postal Code: <span id="postal_code"></span></li>
        <li class="text-black text-2xl my-4 "> Country: <span id="country"></span></li>
    </ul>
    <br>
    <div class="w-5/6  px-3 mb-4 ">
        <p class="text-black text-3xl my-4 ">Destinataire :</p>
        <div class="grid grid-cols-4 gap-4" >
            <div class="col-span-1">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                    ></label>
                <input placeholder="Nom..."
                    class="appearance-none block w-4/6 bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    >
            </div> 
            <div class="col-span-1">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    ></label>
                <input placeholder="Prénom..."
                    class="appearance-none block w-4/6 bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                    >
            </div>
            
        </div>
        <div class="inline-block mr-2 mt-2 text-3x1 btn-place">
                <button type="button" class="  focus:outline-none text-white text-xl py-7 px-40 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg flex items-center">
                    
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                   
                    Validate
                </button>
            </div>
    </div>
</div>

<!-- Google map -->
<div id="map"></div>

<? $ASSET::script('delivery') ?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCpvvuzkpusOIBZHnZeKSDeWFP-KBO5UOg&callback=initMap" async defer></script>
