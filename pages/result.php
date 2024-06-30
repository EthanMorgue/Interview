<?php
    require_once("LexicalAnalyzer.php");
    require_once("Capicua.php");
    $type = $_POST["type"];
    $title = $type == 1? "Analizador Lexico": "Capicua";
?>
<div class="">
    <h2 class="col-md-12 text-center text-white">
        <?php echo $title ?>
    </h2>
    <span class="text-white col-md-12">
        <?php
            if($type == 1)
                echo getAnalyzerResult();
            else
                echo getCapicuaResult();
        ?>
    </span>
</div>