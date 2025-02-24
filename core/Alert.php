<?php
namespace kibalanga\core;

class Alert
{
    public static function success($location, $message) 
    {
        if ($location == "" || $location == null) {
            $mueleko = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        } else {
            $muelekeo = htmlspecialchars($location);
        }
        $ujumbe = htmlspecialchars($message);

        ?>
        <div class="muelakeo">
            <!-- <?php header("location: $muelekeo"); ?> -->
        </div> 
        <?php

        return '<style>
    .alert-container {
        width: 100%;
        height: 90dvh;
        height: 90vh;
        display: flex;
        justify-content: center;
        place-items: center;
        position: relative;
    }

    .content {
        width: 30%;
        height: 20%;
        color: blue;
        border-radius: 0.9rem;
        background-color: white;
        display: flex;
        place-items: center;
        justify-content: center;
        border: 1px solid orangered;
        box-shadow: 0.7rem 0.7rem 1rem #000;
    }

    .content:hover {
        background-color: yellow;
    }
</style>
<div>
    <input type="text" id="location" value="'. $mueleko .'">
    <div class="alert-container" id="alert">
        <div class="content" title="Click to hide" onclick="style.display="none";">
            <div class="message">
                '. $message .'
            </div>
        </div>
    </div>
</div>
<div class="message">
                <?= htmlspecialchars($message); ?>
            </div>
<script>
    const alert =document.getElementById("alert");
    const njia =document.getElementById("location");

    setTimeout(() => {
        window.location.href = njia

        
    }, 4000);
</script>';

    }

    public static function warning($location, $message)
    {
        if ($location == "" || $location == null) {
            // $s = trim
            $mueleko = "";
        } else {
            $muelekeo = htmlspecialchars($location);
        }
        $ujumbe = htmlspecialchars($message);

        ?>
        <div class="muelakeo">
            <?php header("location: $muelekeo"); ?>
        </div> 
        <?php

        return '<style>
    .alert-container {
        width: 100%;
        height: 90dvh;
        height: 90vh;
        display: flex;
        justify-content: center;
        place-items: center;
        position: relative;
    }

    .content {
        width: 30%;
        height: 20%;
        color: blue;
        border-radius: 0.9rem;
        background-color: white;
        display: flex;
        place-items: center;
        justify-content: center;
        border: 1px solid orangered;
        box-shadow: 0.7rem 0.7rem 1rem #000;
    }

    .content:hover {
        background-color: yellow;
    }
</style>
<div>
    <input type="text" id="location" value="'. $mueleko .'">
    <div class="alert-container" id="alert">
        <div class="content" title="Click to hide" onclick="style.display="none";">
            <div class="message">
                '. $ujumbe .'
            </div>
        </div>
    </div>
</div>
<div class="message">
                <?= htmlspecialchars($message); ?>
            </div>
<script>
    const alert =document.getElementById("alert");
    const njia =document.getElementById("location");

    setTimeout(() => {
        alert.remove();
        if (njia !== null || njia !== "") {
            window.location.href = njia
        }
        
    }, 4000);
</script>';

    }

    public static function error($location, $message)
    {
        if ($location == "" || $location == null) {
            $mueleko = "";
        } else {
            $muelekeo = htmlspecialchars($location);
        }
        $ujumbe = htmlspecialchars($message);

        ?>
        <div class="muelakeo">
            <?php header("location: $muelekeo"); ?>
        </div> 
        <?php

        return '<style>
    .alert-container {
        width: 100%;
        height: 90dvh;
        height: 90vh;
        display: flex;
        justify-content: center;
        place-items: center;
        position: relative;
    }

    .content {
        width: 30%;
        height: 20%;
        color: blue;
        border-radius: 0.9rem;
        background-color: white;
        display: flex;
        place-items: center;
        justify-content: center;
        border: 1px solid orangered;
        box-shadow: 0.7rem 0.7rem 1rem #000;
    }

    .content:hover {
        background-color: yellow;
    }
</style>
<div>
    <input type="text" id="location" value="'. $mueleko .'">
    <div class="alert-container" id="alert">
        <div class="content" title="Click to hide" onclick="style.display="none";">
            <div class="message">
                <?= htmlspecialchars($message); ?>
            </div>
        </div>
    </div>
</div>
<div class="message">
              '. $message .'
            </div>
<script>
    const alert =document.getElementById("alert");
    const njia =document.getElementById("location");

    setTimeout(() => {
        alert.remove();
        if (njia !== null || njia !== "") {
            window.location.href = njia
        }
        
    }, 4000);
</script>';
    }
}