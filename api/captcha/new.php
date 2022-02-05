<?php
    //require_once dirname(__FILE__, 2) . "/database/mysql.php";
    //require_once dirname(__FILE__, 2) . "/utilitario.php";

    session_start(); // inicial a sessao
    header("Content-type: image/jpeg"); // define o tipo do arquivo
    function captcha($largura,$altura,$tamanho_fonte,$quantidade_letras){
        $imagem = imagecreate($largura,$altura); // define a largura e a altura da imagem
        $fonte = "./arial.ttf"; //voce deve ter essa ou outra fonte de sua preferencia em sua pasta
        $preto  = imagecolorallocate($imagem,0,0,0); // define a cor preta
        $branco = imagecolorallocate($imagem,255,255,255); // define a cor branca

        // define a palavra conforme a quantidade de letras definidas no parametro
        $quantidade_letras = 5;
        $palavra = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz23456789"),0,($quantidade_letras));
        
        // faz a inserção no banco de dados
        //$objDateTime = new DateTime('NOW');
        //$sql = "INSERT INTO fky_captcha(key_input, key_text, date_insert) values( ?, ?, ?) ";
        //$values = [guid(), $palavra, $objDateTime->format('c')];
        //$my = new Mysql();
        //$my->executeNoQuery($sql, $values);
        $_SESSION["captcha"] = $palavra;

        for($i = 1; $i <= $quantidade_letras; $i++){
            imagettftext($imagem,$tamanho_fonte,rand(-25,25),($tamanho_fonte*$i),
            ($tamanho_fonte + 20),$branco,$fonte,substr($palavra,($i-1),1));
            // atribui as letras a imagem
        }
        imagejpeg($imagem); // gera a imagem
        imagedestroy($imagem); // limpa a imagem da memoria
    }

    $largura = 300; // recebe a largura
    $altura = 60; // recebe a altura
    $tamanho_fonte = 25; // recebe o tamanho da fonte
    $quantidade_letras = 5; // recebe a quantidade de letras que o captcha terá
    captcha($largura,$altura,$tamanho_fonte,$quantidade_letras);
?>