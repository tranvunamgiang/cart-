<?php 
require_once("./functions/dbp.php");
$id = $_GET["id"];
$sql = "select * from products where id = $id";
$product = findById($sql);
if($product == null){
    header("Location: 404notfound.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("html/head.php");?>
<body>
<?php include_once("html/navpro.php");?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo $product["thumbnail"];?>"/>
                </div>
                <div class="col-8">
                    <h1><?php echo $product["NAME"];?></h1>
                    <p>$<?php echo $product["price"];?></p>
                    <div class="row">
                        <div class="col-3">
                            <form method="post" action="/add_to_cart.php">
                            
                                <div class="input-group">
                                    <input type="hidden" name="id" value="<?php echo $product["id"];?>"/>
                                    <input name="buy_qty" type="number" value="1" min="1" class="form-control">
                                    <button class="btn btn-outline-danger" type="submit">Add to cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>