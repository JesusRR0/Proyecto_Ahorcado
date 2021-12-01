<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    //funcion para separar las letras de las palabras que se deberan adivinar
    function separarLetras($adivinar){
                    
        $letras = [];
        //un bucle que se ejecutara segun la longitud de la palabra
        for($i=1;$i<=strlen($adivinar);$i++){
            //se en una variable la distancia negativa +1 para poder quitar las letras sobrantes a la cadena
            $longitud = -strlen($adivinar)+$i;
            //si es 0 se perderia la ultima letra, así que se iguala a 1 cuando lo sea
            if($longitud == 0){
                $longitud =+ 1;
            }
            //un array que guarda en cada posicion cada una de las letras de la palabra introducida
            $letras[$i] = substr($adivinar,$contador,$longitud);
            //un contador que nos sirve para indicar a partir de que posicion cuenta la funcion substr() en el array anterior
            ++$contador;
            
            
        }
        return $letras;
    }
    
    
    ?>
</body>
</html>