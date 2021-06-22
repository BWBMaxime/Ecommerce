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
    
.dropbtn {
    background-color: #F2F2F2;
    color: #263843;
    padding: 16px;
    font-size: 18px;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    font-family: Montserrat thin; 
    margin-left: 85px;
    padding-left: 20px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #4C7087;
    min-width: 160px;
    box-shadow: #263843;
}

.dropdown-content a {
    color: F2F2F2;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #4C7087;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #4C7087;    
}

.styled {
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #263843;
     border-radius: 5px;
    background-color: #F2F2F2;
    font-family: Montserrat thin;   
    padding-right: 20px;
    margin-right: 40px;
}

.styled2 {
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #263843;
    border-radius: 5px;
    background-color: #F2F2F2;
    font-family: Montserrat thin;   
    padding-right: 20px;
    margin-right: 10px ;
}


    </style>
</head>


<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--NavBar-->
    <nav id="header" class="w-full z-30 top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"viewBox="0 0 20 20">

                    <title> barre de nav </title>

                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>

            <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
               
            <nav>
                    <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0" id="cartsize">   <!-- logo du site -->
                        <p> <img src="http://4.bp.blogspot.com/-WjnObzM_WNc/UEcrf7xznAI/AAAAAAAABAQ/OSb-Rc1czpU/s1600/E-commerce.jpg" alt="logo" height="200px" width="200px" class="image"> </p>     
                      

        <div class="dropdown">  <!-- Menu deroulant -->
                 <button class="dropbtn"> Category </button>
                                <div class="dropdown-content">
                                            <a href="#"> Phone </a>      
                                            <a href="#"> PC </a>
                                            <a href="#"> Tablette </a>
                                </div>
                    </ul>
                </nav>

            </div>

            <div class="order-6 md:order-2 w-1/2 px--6">  <!-- barre de recherche -->
                <input type="text" class="col-8 border-2 p-2 w-full " placeholder="Search a product..."
                    id="search-filter">
            </div>


            <div class="order-2 md:order-3 flex items-center" id="nav-content">

               

                <div>
                    <input class="favorite styled" type="button" value="Login"> </input>  <!-- Bouton Login -->
                </div>


                <div>
                    <input class="favorite styled2" type="button" value="Sign In"> </input>   <!-- Bouton Sign In-->
                </div>
                
                <a class="pl-3 inline-block no-underline hover:text-black" href="#">     <!-- icone du panier --> 
                    <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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


</body>
</html>