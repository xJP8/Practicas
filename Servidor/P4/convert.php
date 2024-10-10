<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = 166,386;

        $opcion = htmlspecialchars($_POST['opcion']);
        $cantidad = htmlspecialchars($_POST['cantidad']);
        $conversion;

        if($opcion==ps){
            $conversion = $cantidad * $valor;
        } else{
            $conversion = $cantidad/ $valor;
        }

        echo "El resultado es: $conversion";
    }
?>