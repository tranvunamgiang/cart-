<?php 
require_once("./functions/dbp.php");
$sql = "select * from orders";
$orders = select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>Danh Sach Don Hang</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">SHIPPING ADDRESS</th>
      <th scope="col">Telephone</th>
      <th scope="col">email</th>
      <th scope="col">Grand Total$</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($orders as $item): ?>
    <tr>
      <th scope="row"><?php echo $item['id']; ?></th>
      <td><?php echo $item['id'] ;?></td>
      <td><?php echo $item['customer_name'] ;?></td>
      <td><?php echo $item['shipping_address'] ;?></td>
      <td><?php echo $item['telephone'] ;?></td>
      <td><?php echo $item['email'] ;?></td>
      <td><?php echo $item['grand_total'] ;?>$</td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>
    
</body>
</html>