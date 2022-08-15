<?php
//# Previsao do tempo em audio - Osni (radio DuBalacoBaco);
//# tras todas as tags <a href> do site de audios. 

//pegar a data de hoje
$data = date('y-m');

$curl = curl_init('https://agenciabrasil.ebc.com.br/radioagencia-nacional/geral/audio/$data/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$page = curl_exec($curl);
if(curl_errno($curl)):
	echo 'Erro: ' . curl_error($curl);
	exit;
endif;
curl_close($curl);

$DOM = new DOMDocument;
libxml_use_internal_errors(true);

if(!$DOM->loadHTML($page)):
	$erros = null;
	foreach (libxml_get_errors() as $error):
		$errors.= $error->message."\r\n"; 
	endforeach;

	libxml_clear_errors();
	print "LibXML Erros: \r\n$erros";
	return;
endif;

$Xpath = new DOMXPath($DOM);

$images = $DOM->getElementsByTagName('a');
$output = array();

//trago todas as URL´s 
foreach ($images as $image) {
         $output[] = $image->getAttribute('href');
}

echo "<pre>";
print_r($output);
echo "</pre>";

?>
