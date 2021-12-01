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
    include_once 'Funciones.php';
    error_reporting(E_ALL);
    
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
            echo gettype($guion)." ";

            if(!empty($arrayError)){
                $errores = unserialize($arrayError);
            }

            echo gettype($errores)." ";

            echo "INTENTOS:".$intento;
            if($intento<6){
                

                //se accede al condicional sino esta vacia el input de entrada de datos
                if(!empty($palabraInt)){
                    
                    //se asignan los valores returnados de la funcion separarLetras y se le asignan a la variable $letras
                    $letras =separarLetras($adivinar);
                    
                    //se accede a la condicion en caso de que las letras introducidas se encuentren en el array $letras   
                    if(in_array($palabraInt,$letras)){ 
                        
                        //se guarda la posicion en la que se encuentra dentro de la palabra y en la mismo posicion del array $guion se sustituyen los guiones por cada letra 
                            $posicion = array_keys($letras,$palabraInt);
                            $guion[$posicion[0]] = $letras[$posicion[0]];
                        
                            if($intento >1){

                                ?>
                                    <p>
                                        <fieldset>
                                            <legend>errores</legend>
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
                            $errores = $palabraInt;
                            
                            

                        }else{
                            echo "FALLO";
                            
                            if(in_array($palabraInt,$errores)){
                                echo "No cometas los mismos errores!!!";
                                --$intento;
                                echo(array_key_last($errores)+1);
                                
                            }else{
                               
                                $errores = $palabraInt;
                            }
                        
                        }
                        
                        ?>
                            <p>
                                <fieldset>
                                    <legend>errores</legend>
                                        <?php 
                                            foreach($errores as $claveError => $valorError){
                                                echo $valorError.',';
                                            }
                                        ?>
                
                                </fieldset>
                            </p>
                        <?php
                        
                        //se incrementan los intentos haciendo que la imagen del muñeco cambie                
                        echo ++$intento;
                            
                            ?> 
                                <img src='./img/ahorcado<?php echo $intento;?>.png'>
                            <?php 

                        //se vuelven a mostrar el array $guion     
                            foreach($guion as $valor){
                                echo $valor.' ';
                            }
                            
                        
                    }   
                }
            }else{
                echo "HAS PERDIDO";
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
        
        ?>

        
            
        
        
        
         
        

       

        
        
        

</body>
</html>