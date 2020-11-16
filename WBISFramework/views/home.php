<?php ?>

<h1 class="h1-view"> Home Layout </h1>
<?php 

foreach($params as $item){
    echo "Dobrodosao, ". $item["username"] . "<br>"; 
}
?>