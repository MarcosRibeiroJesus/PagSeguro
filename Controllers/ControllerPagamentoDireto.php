<?php
$Data["email"]="marcoz.iu@gmail.com"; // SEU EMAIL CADASTRADO NO PAGSEGURO
$Data["token"]="2EC7301A95204821A3E2E66D4FEC6747"; // SEU TOKEN DO SANDBOX DO PAGSEGURO
$Data["currency"]="BRL";
$Data["itemId1"]="1";
$Data["itemDescription1"]="Website desenvolvido por Marcos Ribeiro.";
$Data["itemAmount1"]="1000.00";
$Data["itemQuantity1"]="1";
$Data["itemWeight1"]="1000";
$Data["reference"]="83783783737";
$Data["senderName"]="João da Silva";
$Data["senderAreaCode"]="37";
$Data["senderPhone"]="99999999";
$Data["senderEmail"]="c41888325033406655241@sandbox.pagseguro.com.br"; // SEU COMPRADOR DE TESTES
$Data["shippingType"]="1";
$Data["shippingAddressStreet"]="RUA SEM NOME";
$Data["shippingAddressNumber"]="10";
$Data["shippingAddressComplement"]="Casa";
$Data["shippingAddressDistrict"]="JK";
$Data["shippingAddressPostalCode"]="71570000";
$Data["shippingAddressCity"]="Brasília";
$Data["shippingAddressState"]="DF";
$Data["shippingAddressCountry"]="BRA";

$BuildQuery=http_build_query($Data);
$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($Curl,CURLOPT_POST,true);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false); // Produção deve ser TRUE
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
$Retorno=curl_exec($Curl);
curl_close($Curl);

$Xml=simplexml_load_string($Retorno);
echo $Xml->code;
