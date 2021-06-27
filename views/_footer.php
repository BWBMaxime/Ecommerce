<? $ASSET::style('footer') ?>

<hr>

<footer class="flex flex-col justify-center">

    <section class="bg-white dark:bg-gray-800 pt-4 pb-8 xl:pt-8">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8 text-gray-400 dark:text-gray-300">
            <ul class="text-lg font-light pb-8 flex flex-wrap justify-center">

                <li class="w-1/2">
                    <div class="text-center">
                        <h3 class="titre-entreprise uppercase"> ABOUT US </h3>
                        <br>
                        <p class="resume-entreprise text-sm">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat, saepe! Aperiam saepe, magnam reprehenderit eligendi dolorum expedita quasi! Voluptate voluptatum eligendi harum excepturi maxime impedit quis, sit dicta aliquid quaerat? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias ipsum soluta veritatis eveniet, at voluptatibus, sit obcaecati magni beatae, modi totam unde nulla necessitatibus hic impedit reiciendis libero repudiandae distinctio.
                        </p>
                    </div>
                </li>

                <li class="w-1/2">
                    <ul class="flex-col">
                        <li class="pb-12">
                            <div class="text-center">
                                <h2 class="mentions-legales">
                                    MENTIONS LEGALES
                                </h2>
                                <ul>
                                    <li class="liens">
                                        <? $ASSET::document('cgv', 'Conditions Générales de Ventes', true) ?>
                                        <br>
                                        <? $ASSET::document('cgu', 'Conditions Générales d\'Utilisation', true) ?>
                                        <br>
                                        <? $ASSET::document('cookies', 'Cookies et Protection des Données Personnelles', true) ?>
                                    </li> 
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="text-center">
                                <h2 class="contact">
                                    CONTACT
                                </h2>
                                <ul>
                                    <li class="contact-liens">
                                            625 Avenue de Toulouse, 34000 Montpellier
                                    </li>
                                    <li class="contact-liens">
                                    <a href="mailto:bwb.e-commerce@fondespierre.com?subject=Sujet du message">
                                            bwb.e-commerce@fondespierre.com
                                        </a>
                                    </li>
                                    <li class="contact-liens">
                                        <a href="tel:+3305147884">
                                            +33 05 14 78 84
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    <hr>

        <div class="px-3 md:px-0">
            <h3 class="copyright"> 2021 Copyright@e-commerce </h3>     
        </div>             
    </section>
</footer>