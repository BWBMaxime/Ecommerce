<?

$test = $db->query_default(
    "INSERT IGNORE INTO CheckoutProduct (checkout, product, quantity) VALUES (3000000, 3000000, 3000000)"
)

?>


<? \Wails\Core\Utils::pre(gettype($test)) ?>
<? \Wails\Core\Utils::pre($test, true) ?>
<? \Wails\Core\Utils::pre($test) ?>

<p>FINISH!!!!!!!!!!!</p>
