<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <title>CodePen - Product Page with TailwindCSS</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,600;0,700;1,400&amp;display=swap'>
    <link rel="stylesheet" href="./style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Nordic Shop: Tailwind Toolbox</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

 <style>
       
.titre-entreprise {
	font-family: 'Montserrat', sans-serif;
	color: #263843;        
    font-style: bold;
	text-align: center;	
    font-size: 20px;
}

.resume-entreprise {
	font-family: 'Roboto', sans-serif;
    color: #4C7087;
    text-align: center;
    padding-left: 20px;
    margin-left: 10%;
    margin-right: 10%;
   
}

.mentions-legales{
    font-family: 'Montserrat', sans-serif; 
	color: #263843;
	font-size: 17px;
}

.liens {
	font-family: 'Roboto', sans-serif;
	color: #4C7087;
	font-size: 15px;
}

.reseaux {
	font-family: 'Montserrat', sans-serif;
	color: #263843;
	font-size: 17px;
}

.reseaux-liens {
	font-family: 'Roboto', sans-serif;
	color: #4C7087;
	font-size: 15px;
}

.contact {
	font-family: 'Montserrat', sans-serif;
	color: #263843;
	font-size: 17px;
}

.contact-liens {
	font-family: 'Roboto', sans-serif;
	color: #4C7087;
	font-size: 15px;
}

.copyright {
	font-family: 'Montserrat', bold;
    color: #263843;
    text-align: center;
	font-size: 10px;
}

.image {
    text-align: center;
    margin-left: 750px;
}

.image2 {
    text-align: center;
    margin-left: 745px;
}

.imagebis1 {
    margin-left: 185px; 
}

.imagebis2 {
    margin-left: 180px; 
}

</style>
</head>


<body>
    <footer>
	
        <div class="container flex px-3 py-8 ">
            <div class="w-full mx-auto flex flex-wrap">
                
				
                    <div class="px-3 md:px-0">
                        <h3 class="titre-entreprise"> A propos de l'entreprise </h3>
						<br>
                        
						<p class="resume-entreprise">
                            L'entreprise de e-commerce a été racheté par Marylise, Raphael, Maxime et Fanny en 2021 mais elle a été crée en 1853 par Monsieur et Madame Splaaaaf. Grâce à notre savoir faire et à notre professionnalisme, nous vous présentons des produits de grandes qualités.
                        </p>
                    </div>
            </div>
        </div>
    </footer>

<hr>

<footer class="bg-white dark:bg-gray-800 pt-4 pb-8 xl:pt-8">
    <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8 text-gray-400 dark:text-gray-300">
        <ul class="text-lg font-light pb-8 flex flex-wrap justify-center">
            <li class="w-1/2 md:w-1/3 lg:w-1/3">
                <div class="text-center">
                    <h2 class="mentions-legales">
                        MENTIONS LEGALES
                    </h2>
                    <ul>
                        <li class="liens">
                                <p> <a href="file:///C:/Users/fanny/OneDrive/Bureau/RGPD/PDF%20des%203%20documents%20RGPD/CGU.pdf"> Conditions Générales de Ventes </a> <br>  
								<p> <a href="file:///C:/Users/fanny/OneDrive/Bureau/RGPD/PDF%20des%203%20documents%20RGPD/CGU.pdf"> Conditions Générales d'Utilisation </a> 
								<p> <a href="file:///C:/Users/fanny/OneDrive/Bureau/RGPD/PDF%20des%203%20documents%20RGPD/Cookies-Protection-Donn%C3%A9es-Personnelles.pdf"> Cookies et Protection des Données Personnelles </a> 
                        </li> 
                    </ul>
                </div>
            </li>

            <li class="w-1/2 md:w-1/3 lg:w-1/3">
                <div class="text-center">
                    <h2 class="reseaux">
                        RESEAUX SOCIAUX
                    </h2>

<br>

                    <ul>
                        <li class="reseaux-liens">
                             
             <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Facebook_logo_36x36.svg/1200px-Facebook_logo_36x36.svg.png" 
            alt="logo" height="30px" width="30px" class="imagebis1">
                        </li>

<br>
                        <li class="reseaux-liens">
                           
            <img src="https://i2.wp.com/www.key-digital.co.uk/wp-content/uploads/2017/04/Twitter-logo-1.png" 
            alt="logo" height="40px" width="40px" class="imagebis2">
                             
                        </li>
                    </ul>
                </div>
            </li>
			
			
            <li class="w-1/2 md:w-1/3 lg:w-1/3">
                <div class="text-center">
                    <h2 class="contact">
                        CONTACT
                    </h2>
                    <ul>
                        <li class="contact-liens">
                                625 Avenue de Toulouse
                        </li>
                        <li class="contact-liens">
                                34000 Montpellier
						</li>
                        <li class="contact-liens">
                           <a href="mailto:bwb.e-commerce@fondespierre.com?subject=Sujet du message">
                                bwb.e-commerce@fondespierre.com
                            </a>
                        </li>
                        <li class="contact-liens">
                            <a href="tel:01234567890">
								+33 05 14 78 84
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>


<hr>
    
					<div class="px-3 md:px-0">
                        <h3 class="copyright"> 2021 Copyright@e-commerce </h3>     
                    </div>             
    </footer>         



</body>
</html>