
<?php 

/* 
       Data la tabella in basso, per ogni riga che contiene campi con valori mancanti (null) bisogna, se possibile, inferire tali valori dalla riga 
       più simile applicando una funzione di distanza. 

        La funzione di distanza fra due righe è definita come il numero di campi aventi valori differenti.

        Le righe più simili sono quelle a distanza inferiore; devono essere ignorate le righe a distanza superiore a 5.

        Ad esempio nella tabella in basso ( negli esempi abbiamo indicato con 1 l’evento in cui i campi abbiano valori differenti ):

        gli oggetti 1 e 2 hanno distanza 1+1+0+1+1+0+1+0+1 = 6
        gli oggetti 1 e 5 hanno distanza 0+0+0+0+0+0+1+0+1 = 2
*/
     
    $dataSet = [
        ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>null],
        ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>null,'painType'=>'2','defectType'=>null,'diagnosis'=>'present'],
        ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>null,'defectType'=>'normal','diagnosis'=>null],
        ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>null],
        ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>null,'painType'=>'2','defectType'=>null,'diagnosis'=>'absent'],
        ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>'340','painType'=>'2','defectType'=>'normal','diagnosis'=>'present'],
        ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'absent'],
    ];
    
    
    
    function distance($firstLine,$secondLine){
        $counter = null;
        foreach ($firstLine as $key => $value) {
            /* istruzione condizionale che verifica quanti elementi tra due righe sono diversi */ 
            if ($value != $secondLine[$key]) {
                $counter++;
            }
        }
        
        return $counter;
    }; 

    /* qui andra salvato il primo elemento del data set che vogliamo confrontare con gli elementi con distanza < 5 */
    $firstLine;
    
    /* mio risultato */
    $myResult=[];

    function Test($data,$line,$array){
        /* flag per uscire dal foreach esterno */
        $flag=true;
        $i=0;
        /* ciclo sull'intero dataset */
        foreach ($data as $value) {
             if ($flag) { 
                /* se si usa il $value non funziona */
                $line=$data[$i];
                $flag=false;
             } 
            /* questo if controlla la distanza tra la riga da riempire e le altre e se e inferiore a 5 le pusha nell'array */
                if (distance($line,$value) < 5) {
                    /* ciclo sui singoli valori dell'elemento di dataset */ 
                    foreach($value as $key => $element){
                        if($line[$key] == null){
                            $line[$key] = $element;
                            if(!in_array($value,$array)){
                                echo 'sono dentro';
                                $array[]=$value;
                            };
                        }
                    };    
                };
                $i++;
            }
        
        $array[]= $line;
        return $array;
    }
    
    
    
     

    $results = [
        ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
        ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>'340','painType'=>'2','defectType'=>'normal','diagnosis'=>'present'],
        ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
        ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'absent'],
        ['weight'=>'91','age'=>'29','sex'=>'M','state'=>'New Jersey','height'=>'180','cholesterol'=>'331','painType'=>'2','defectType'=>'normal','diagnosis'=>'absent'],
        ['weight'=>'83','age'=>'38','sex'=>'M','state'=>'Ohio','height'=>'174','cholesterol'=>'340','painType'=>'2','defectType'=>'normal','diagnosis'=>'present'],
        ['weight'=>'58','age'=>'25','sex'=>'F','state'=>'Washington','height'=>'160','cholesterol'=>null,'painType'=>null,'defectType'=>null,'diagnosis'=>'absent'],
    ];

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-test</title>
</head>
<body>
    <div>
        <?php 
            echo '<pre>';
                 var_dump(Test($dataSet,$firstLine,$myResult));
            echo '</pre>';
        ?>
    </div>
    <div>
        <?php
            echo '<pre>';
            /* var_dump(distance($dataSet[0],$dataSet[3])); */
            echo '</pre>';
        ?>
    </div>
</body>
</html>