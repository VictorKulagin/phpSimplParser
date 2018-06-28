<?
include_once("lib/simple_html_dom.php");
include_once("lib/curl_get.php");


$html = curl_get("https://fightwear.ru/rashgardy/");
$dom = str_get_html($html);

$courses = $dom->find("h3.title");

foreach ($courses as $cours) {
	echo "<pre>";
	$a = $cours->find("a", 0);
	echo 'Ссылка'. $a->href;

	$one = curl_get("https://fightwear.ru" . $a->href);

	/*file_put_contents('1', $one);
	break;*/

	$one_dom = str_get_html($one);
	$name = $one_dom->find(".sdesc, .i_title", 0);
	$various_options = $one_dom->find(".check", 0);
	$brend = $one_dom->find(".val", 0);
	$prise = $one_dom->find(".bb-price, .bbw-title", 0);
	$desc = $one_dom->find(".desc", 0);
	//$picture = $one_dom->find(".one", 0);

	echo $a->plaintext . ' ' . $name->plaintext;//Имя

	$various_options_ = $various_options->onchange;
	//echo $variant;
	$various_options_split = explode(":", $various_options_);
	var_dump($various_options_split);
	//break;
	/*Размер*/
	$size_var_variable = preg_replace("/\[|\]|list/i", "", $various_options_split[5]);
	$size_var_variable_  = explode(",", $size_var_variable);
	array_pop($size_var_variable_);
    var_dump($size_var_variable_);//Размер
    /*Конец Размер*/
    /*Артикул*/
    $size_var_variable_sku = preg_replace("/\[|\]|name|,/i", "", $various_options_split[1]);
    $size_var_variable_sku_ = str_replace("'", "", $size_var_variable_sku);
    //var_dump($size_var_variable_sku);
    echo $size_var_variable_sku_;
    /*Конец Артикул*/
    echo "</br>";
    echo $a->plaintext . ' ' . $brand->plaintext;//Brend
	echo "</br>";

    /*Prise*/
    $span->plaintext . ' ' . $prise->plaintext;//Prise
    $prise_form = $span->plaintext . ' ' . $prise->plaintext;
    $prise_form_money = number_format( str_replace(' ','',$prise_form), 2, ',', '' );
    echo $prise_form_money;
    /*Конец Prise*/

    echo "</br>";
    echo $desc->plaintext;

/*Картинки*/
    foreach($one_dom->find('.thumbs div.one a') as $element){
    	$inc = 1;
    	$inc ++;
    	echo 'https://fightwear.ru' .$element->href . '<br>';
    	$url = 'https://fightwear.ru' .$element->href;




        set_time_limit(0); 
// Адрес файла, который необходимо скачать 
//$url = $link; 
 /*Рабочий код картинки. На время закоментил*/       
/*$pi = pathinfo($url); 
$ext = $pi['extension']; 
$name = $pi['filename']; 
 
$ch = curl_init(); 
 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HEADER, false); 
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); 
curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
$opt = curl_exec($ch); 
 
curl_close($ch); 
 
$saveFile = $name.'.'.$ext; 
if(preg_match("/[^0-9a-z\.\_\-]/i", $saveFile)) 
    $saveFile = md5(microtime(true)).'.'.$ext; 
 
$handle = fopen($saveFile, 'wb'); 
fwrite($handle, $opt); 
fclose($handle);*/
/*конец кода*/ 

}

       
}

?>