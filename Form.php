<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Comprobacion</title>
    <link rel='stylesheet' href='./CSS/estilo.css'>
</head>
<body>
    <?php 
    
    $adivinar =$_POST['adivinar'];
    $palabraInt = $_POST['palabraInt'];
    $array = $_POST['guion'];
    $arrayError = $_POST['errores'];
    $intento = $_POST['intento'];
    $letras = [];
    $contador =0;

        
        //comprobacion de si intento no esta seteado, setearlo a 1 y mostrar la primera vez la imagen del primer muñeco
            if(!isset($intento)){
            $intento =1;
            
            ?> 
                <img src='./img/ahorcado<?php echo $intento;?>.png'>
            <?php
<<<<<<< HEAD
            }
            
            //en caso de que no este vacio el arrayError se introduciran sus valores unserializados a la variable errores 
            if(!empty($arrayError)){
                $errores = unserialize($arrayError);
            }
            
            //en caso de que no este vacio el array se introduciran sus valores unserializados a la variable guion, sino se llega el array de '_' 
            if(!empty($array)){
                $guion = unserialize($array);
                    
            }else{

                for($i=1;$i<=strlen($adivinar);$i++){
                    $guion[$i] = '_';
                    echo $guion[$i].' ';
                }
                            
            }
            echo $intento;
            if($intento<7){
                print_r($letras);

                //se accede al condicional sino esta vacia el input de entrada de datos
                if(!empty($palabraInt)){
                    
                    //se asignan los valores returnados de la funcion separarLetras y se le asignan a la variable $letras
                    echo "asdfasdf";
                    
                    $letras =separarLetras($adivinar);
                    print_r($letras);
                    
                    //se accede a la condicion en caso de que las letras introducidas se encuentren en el array $letras   
                    if(in_array($palabraInt,$letras)){ 
                            echo "SI LA LETRA EXISTE ";
                        //se guarda la posicion en la que se encuentra dentro de la palabra y en la mismo posicion del array $guion se sustituyen los guiones por cada letra 
                            $posicion = array_keys($letras,$palabraInt);
                            $guion[$posicion[0]] = $letras[$posicion[0]];
                        
                            if($intento >1){ 

                                ?>
                                    <p>
                                        <fieldset>
                                            <legend>Errores</legend>
                                                <?php 
                                                    foreach($errores as $claveError => $valorError){
                                                        echo $valorError.', ';
                                                    }
                                                ?>
                        
                                        </fieldset>
                                    </p>
                                <?php
                            }

                                        ?> 
                                <!--se muestra la imagen de nuevo pero para actualizarla en caso de que fuese necesario -->
                                    <img src='./img/ahorcado<?php echo $intento;?>.png'>
                                <?php 
                                //se muestra el array $guion entero separado por espacios
                                        foreach($guion as $valor){
                                            echo $valor.' ';
                                        }

                                
                    //en caso de que no se encuentren las letras introducidas
                    }else{
                        //se almacenan las letras en un array aparte llamado $errores
                        if($intento <2){
                            $errores[] = $palabraInt;

                        }else{
                            
                            if(in_array($palabraInt,$errores)){
                                echo "No cometas los mismos errores!!!";
                                --$intento;
                                echo(array_key_last($errores)+1);
                            }else{
                                $errores[] = $palabraInt;
                            }
                        
                        }
                        
                        ?>
                            <p>
                                <fieldset>
                                    <legend>Errores</legend>
                                        <?php 
                                            foreach($errores as $claveError => $valorError){
                                                echo $valorError.',';
                                            }
                                        ?>
                
                                </fieldset>
                            </p>
                        <?php
                        
                        //se incrementan los intentos haciendo que la imagen del muñeco cambie                
                            ++$intento;
                            
                            ?> 
                                <img src='./img/ahorcado<?php echo $intento;?>.png'>
                            <?php 

                        //se vuelven a mostrar el array $guion     
                            foreach($guion as $valor){
                                echo $valor.' ';
                            }
                            
                        
                    }   

        }
        //en caso de que no este vacio el arrayError se introduciran sus valores unserializados a la variable errores 
        if(!empty($arrayError)){
            $errores = unserialize($arrayError);
        }
        
        
        //en caso de que no este vacio el array se introduciran sus valores unserializados a la variable guion, sino se llega el array de '_' 
        if(!empty($array)){
            $guion = unserialize($array);
                
        }else{

            for($i=1;$i<=strlen($adivinar);$i++){
                $guion[$i] = '_';
                echo $guion[$i].' ';
            }
                        
        }

            

        //se accede al condicional sino esta vacia el input de entrada de datos
        
        if(!empty($palabraInt)){
            //se asignan los valores returnados de la variable separarLetras y se le asignan a la variable $letras
            $letras = separarLetras($adivinar);
            
            //se accede a la condicion en caso de que las letras introducidas se encuentren en el array $letras   
            if(in_array($palabraInt,$letras)){ 

                //se guarda la posicion en la que se encuentra dentro de la palabra y en la mismo posicion del array $guion se sustituyen los guiones por cada letra 
                    $posicion = array_keys($letras,$palabraInt);
                    $guion[$posicion[0]] = $letras[$posicion[0]];
                
                    if($intento >1){ 

                        ?>
                            <p>
                                <fieldset>
                                    <legend>Errores</legend>
                                        <?php 
                                            foreach($errores as $claveError => $valorError){
                                                echo $valorError.', ';
                                            }
                                        ?>
                
                                </fieldset>
                            </p>
                        <?php
                    }

                                ?> 
                        <!--se muestra la imagen de nuevo pero para actualizarla en caso de que fuese necesario -->
                            <img src='./img/ahorcado<?php echo $intento;?>.png'>
                        <?php 
                        //se muestra el array $guion entero separado por espacios
                                foreach($guion as $valor){
                                    echo $valor.' ';
                                }

                        
                //en caso de que no se encuentren las letras introducidas
            }else{

                if($intento >1){
                            
                    if(in_array($palabraInt,$errores)){
                        echo "No cometas los mismos errores!!!";
                        --$intento;
                        echo(array_key_last($errores)+1);
                    }
                
            }
                
                $errores[] = $palabraInt;
                
                
                ?>
                    <p>
                        <fieldset>
                            <legend>Errores</legend>
                                <?php 
                                    foreach($errores as $claveError => $valorError){
                                        echo $valorError.', ';
                                    }
                                ?>
        
                        </fieldset>
                    </p>
                <?php
                    

                    
                //se almacenan las letras en un array aparte llamado $errores
                    
                    
                //se incrementan los intentos haciendo que la imagen del muñeco cambie                
                    ++$intento;
                    
                    ?> 
                        <img src='./img/ahorcado<?php echo $intento;?>.png'>
                    <?php 

                //se vuelven a mostrar el array $guion     
                    foreach($guion as $valor){
                        echo $valor.' ';
                    }
                    
                
            }   
        }

        
        //funcion para separar las letras de las palabras que se deberan adivinar
        function separarLetras($adivinar){
            //un bucle que se ejecutara segun la longitud de la palabra
            for($i=1;$i<=strlen($adivinar);$i++){
                //se en una variable la distancia negativa +1 para poder quitar las letras sobrantes a la cadena
                $longitud = -strlen($adivinar)+$i;
                //si es 0 se perderia la ultima letra, así que se iguala a 1 cuando lo sea
                if($longitud == 0){
                    $longitud =+ 1;
>>>>>>> 91ec25c6d9cab73c0232a36aa1077ed931757769
                }

                
                //funcion para separar las letras de las palabras que se deberan adivinar
                function separarLetras($adivinar){
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
                    <p>
                        <form action='#' method='post'>
                            <input type='text' name='palabraInt' id='palabraInt' required autofocus>
                            <input type='hidden' name='adivinar' value='<?php echo $adivinar;?>'>
                            <input type='hidden' name='guion' value='<?php echo serialize($guion);?>' >
                            <input type='hidden' name='intento' value='<?php echo $intento;?>'>
                            <input type='hidden' name='errores' value='<?php echo serialize($errores);?>'>
                            <input type='submit' value='Comprobar'>
                        </form>
            
                    </p>
                <?php
        }else{
            echo "HAS PERDIDO";
        }
        ?>

        
<<<<<<< HEAD
            
        
        
        
=======
            ?>
        <p>
            <form action='#' method='post'>
                <input type='text' name='palabraInt' id='palabraInt' required autofocus>
                <input type='hidden' name='adivinar' value='<?php echo $adivinar;?>'>
                <input type='hidden' name='guion' value='<?php echo serialize($guion);?>' >
                <input type='hidden' name='intento' value='<?php echo $intento;?>'>
                <input type='hidden' name='errores' value='<?php echo serialize($errores);?>'>
                <input type='submit' value='Comprobar'>
            </form>

        </p>
>>>>>>> 91ec25c6d9cab73c0232a36aa1077ed931757769
         
        

       

        
        
        

</body>
</html>