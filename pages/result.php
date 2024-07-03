<?php
    require_once("LexicalAnalyzer.php");
    require_once("Capicua.php");
    $type = $_POST["type"];
    $title = $type == 1? "Analizador Lexico": "Capicúa";
    $value = $_POST['value'];
?>
<div >
    <h2 class="col-md-12 text-center text-white">
        <?php echo $title ?>
    </h2>
    <span class=" col-md-12 text-white">
        <?php
            if($type == 1)
                echo getAnalyzerResult($value);
            else
                echo getCapicuaResult($value);
        ?>
    </span>
</div>