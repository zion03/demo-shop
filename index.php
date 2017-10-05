<?php

$products = array();

$row = 1;
if (($handle = fopen("./data/demo-data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
        //$num = count($data);
        //echo "<p> $num полей в строке $row: <br /></p>\n";
        //$row++;
        //for ($c=0; $c < $num; $c++) {
           // echo $data[$c] . "<br />\n"; 
        //}
        $products[] = $data;
    }
    fclose($handle);
}

array_shift($products);

echo '<br><br>';
foreach($products as $key => $product){
  //echo 'product №'.$key.'<br>';
  echo '<a href="/product.php?id='.$key.'">'.$product[0].'</a> ';
  //echo $product[1].'<br>';
  echo '('.$product[2].'$)<br>';
  echo '<hr>';
}
