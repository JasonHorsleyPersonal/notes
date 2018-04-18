<?php
echo '
<html>
    <head>
        <title>View Notes</title>
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/skeleton.css" />

        <link rel="icon" type="image/png" href="favicon.png">
        <style> * {text-align:center;} </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="column">
                    <h2>All the notes!!</h2>

';
$notes = json_decode(file_get_contents("notes.json"));
foreach ($notes as $cat => $arr) {
    echo "<h4>$cat</h4>";
    for ($i = 0; $i < count($arr); $i++) {
        $noteName = $arr[$i];
        $noteLoc = "$cat/$noteName.md";
        if (file_exists($noteLoc)) {
            $notePassLoc = urlencode($noteLoc);
            $lastModified = date("H:i F d", filemtime($noteLoc));
            $lineCount = shell_exec("wc -l $noteLoc | awk '{print $1}'");
            echo "<div class='row'>
                <div class='four columns'><a href='view.php?loc=$notePassLoc'>$noteLoc</a></div>
                <div class='four columns'>$lastModified</div>
                <div class='four columns'>$lineCount lines</div>
                </div>";
        }
        echo "<hr>";
    }
}
echo '
                </div>
            </div>
        </div>
    </body>
</html>
';
?>
