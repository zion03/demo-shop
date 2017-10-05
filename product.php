<?php

echo '<a href="index.php">Назад</a>';

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
  if ($key == $_GET['id']) { 
	  echo '<a href="/product.php?id='.$key.'">'.$product[0].'</a> ('.$product[2].'$)<br>';
	  echo $product[1].'<br>';
	  echo '<hr>';
  }
}

echo '<div style="text-align:center">Сделать заказ</div>';

?>
<style type="text/css">
form {
  margin:5px auto;
  width:300px
}
input {
  margin-bottom:5px;
  padding:10px;
  width: 100%;
  border:1px solid #CCC
}
button {
  padding:10px
}
</style>

<div>
	<form method="post" action="process.php">
	<input type="text" name="fio" placeholder="Ф.И.О" /> 
	<input type="text" name="phone" placeholder="Телефон" />
	<input type="text" name="email" placeholder="E-Mail" />
	<input type="text" name="adres" placeholder="Адрес доставки" />
	<input type="submit" value="Заказать" />
	</form>
</div>
<?php


