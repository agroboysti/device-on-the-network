<?php


$ramal = $_POST["ramal"];
$contString = strlen($ramal);
$dispositivo = $_POST["dispositivo"];
$voz = [1,2,3];
$imagem = [11,12,13,14];
$alarme = [21,22,23];
$controladora = [31,32,33,34,35,36];

if ($ramal == ""){
    header("Location: index.html");
}

if ($contString > 3) {
    //ramal com 4 
   $ramal = "10.0.".substr($ramal,2,3).".";
} else {
    //ramal com 3 numeros
    $ramal = "10.0.1".substr($ramal,1,2).".";
}



function VerificarIpOnline($ip){

    exec("ping -n 3 $ip", $output, $status);
    $verificacao = "Resposta de ".$ip.": bytes=32";
        if (substr($verificacao, 0,31) == substr($output[2],0,31)){
           $verificacao = "online";
        }else {
            $verificacao =  "Offiline"; 
                }
        

return $verificacao;
};
function VerificarDispostivoOn($Dispositivo,$ramal){
    foreach ($Dispositivo as $key => $value) {
        $ip = $ramal.$value;
    if (VerificarIpOnline($ip) == "online"){
        echo "Ip {$ip} Esta <b>Online</b> <br>";
    } 
}
}

if ($dispositivo == 'voz'){
    VerificarDispostivoOn($voz,$ramal);
    echo "Existe 3 Tipos de Dispositovos Vandal, Linkys e Utech<<br>";
    echo "Para acessar o Vadal e o Uteh Somente coloque o ip Pois os dois estão com a porta padrão de web que e :80<br>";
    echo "Para acessar o Linkys Use a porta :2000";
} elseif ($dispositivo == 'imagem') {
    VerificarDispostivoOn($imagem,$ramal);
    echo "Lembrete Porta do servidor do primeiro dvr com ip final 11 e 2500 e web 2501<br>";
    echo "Lembrete Porta do servidor do primeiro dvr com ip final 12 e 2600 e web 2601<br>";
    echo "Assim para os proximo Dvr 3 e 4 se tiver<br>";
} elseif ($dispositivo == 'alarme'){
    VerificarDispostivoOn($alarme,$ramal);
    echo "Centrais de alarmes são acessadas por Softwere";
} elseif ($dispositivo == 'controladora'){
    VerificarDispostivoOn($controladora,$ramal);
    echo "Existe varios modelo de controladora sendo ControlId e ZkInbios integrada com o horus";

}