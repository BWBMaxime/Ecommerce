<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title><?= ($_TITLE) ? "${_TITLE} | ECOMMERCE" : "ECOMMERCE" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="free & open source PHP ecommerce framework">
    <meta name="keywords" content="ecommerce, commerce, shop, platform, product, checkout">

    <? $_ASSET::style_url('https://unpkg.com/tailwindcss/dist/tailwind.min.css') ?>
    <? $_ASSET::style_url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700&family=Roboto:wght@300&display=swap') ?>

</head>

<body class="w-full bg-white text-gray-600 leading-normal text-base tracking-normal">

<? $_VIEW::include('_navbar') ?>

    <? $_VIEW::yield() ?>

<? $_VIEW::include('_footer') ?>

</body>

</html>