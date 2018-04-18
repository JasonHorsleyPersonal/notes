<?php

include('Parsedown.php');

$loc = isset($_GET['loc']) ? urldecode($_GET['loc']) : false;
if (!$loc || !file_exists($loc)) {
    header('Location: index.php');
}   else    {
    $text = file_get_contents($loc);
    $Parsedown = new Parsedown();
    $noteHTML = $Parsedown->text($text);
    echo '
<html>
    <head>
        <title>View Notes</title>
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/skeleton.css" />

        <link rel="icon" type="image/png" href="favicon.png">
    </head>
    <body>
        <div class="container">
            <hr>
            <div class="row">
                <div class="column">
                    <h1 style="text-align:center">/' . $loc . '</h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="column">
                    ' . $noteHTML . '
                </div>
            </div>
        </div>
    </body>
</html>
';
}
?>
