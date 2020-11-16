<?php ?>

<h1> Ovo je home </h1>
<?php 

foreach($params as $item){
    echo "Dobrodosao, ". $item["username"] . "<br>"; 
}
?>