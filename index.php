
<?php 

    $titolo = 'Biglietto e supplemento';
    $recap = '';
    $supp = array(
        "a" => array("nome" => "Seconda Classe", "prezzo" => 0.07), 
        "b" => array("nome" => "Prima Classe", "prezzo" => 0.12),
        "c" => array("nome" => "Classe Premium", "prezzo" => 0.18),
        "d" => array("nome" => "Classe figa", "prezzo" => 1.20)
    );
    if(isset($_POST['invia']) && ($_POST["prezzo"] > 0) && isset($_POST["treno"]) ) {
        $prezzo=$_POST["prezzo"];
        $spl = ($prezzo*$supp[$_POST["treno"]]["prezzo"]);
        $recap = "<h3>Il prezzo totale del biglietto corrisponde a $spl &euro; <br /> ". $supp[$_POST["treno"]]["nome"] ." <h3>";
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titolo; ?></title>
    <style>
        *{
            margin: 10px 0;
            padding: 0;
            text-decoration: none;
        }

        body{
            max-width: 600px;
            margin: 20px auto;
            border-radius: 5px;
            box-sizing: border-box;
            box-shadow: 5px 5px 5px;
        }

        h3{
            color: white;
            background: green;
            text-align: center;
        }

        form:hover{
            cursor: pointer;
            box-shadow: 15px 15px 15px;
        }

        form>h3{
            background: red;
        }

        div{
            text-align: center;
        }

        h4{
            text-align: center;
        }

        label{
            display: inline-block;
            width: 180px;
            margin-left: 5px;
        }
        select, input{
            padding: 3px 5px;
            margin: 10px auto;
        }

        select{
            display: block;
        }



    </style>
</head>
<body>
    <form action="" method="post">
        <h3>Inserisci il prezzo del biglietto</h3>
        <label for="prezzo">Prezzo del biglietto</label><input type="number" name="prezzo" id="prezzo" />
        <h4>Scegli il tipo di treno utilizzato</h4>
        <select name="treno">
            <option>Scegli un treno</option>
            <?php

                foreach($supp as $k=>$i) {
                    echo "<option value=\"$k\">".$i["nome"]."</option>";
                }

            ?>
        </select>
        <div>
            <input type="submit" value="Invia" name="invia" />
            <input type="reset" value="Annulla" />
        </div>
        <div><?php echo $recap; ?></div>
    </form>
</body>
</html>