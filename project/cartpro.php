<?php 
session_start();
require_once("./functions/cart.php");
require_once("./functions/datetime.php");
$items = getCartItems();
$grand_total = 0;

// Xử lý khi tăng/giảm số lượng sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Tăng số lượng sản phẩm
    if (isset($_POST['increase'])) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += 1; // Tăng số lượng
        } else {
            $_SESSION['cart'][$product_id] = 1; // Nếu chưa có, thêm vào giỏ hàng với số lượng 1
        }
    }

    // Giảm số lượng sản phẩm
    if (isset($_POST['decrease'])) {
        if ($_SESSION['cart'][$product_id] > 1) {
            $_SESSION['cart'][$product_id] -= 1; // Giảm số lượng
        } else {
            unset($_SESSION['cart'][$product_id]); // Nếu số lượng = 1, xóa sản phẩm khỏi giỏ hàng
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    if (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$product_id]); // Xóa sản phẩm khỏi giỏ hàng
    }

    // Cập nhật lại giỏ hàng sau khi thay đổi
    $items = getCartItems();
}
?>
<!DOCTYPE html>
<html lang="en">
<header>
    <?php include("html/head.php"); ?>
    <?php include("html/nav1.php"); ?>
</header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<body>
    <main>
        <div class="container">
            <section class="h-100 gradient-custom py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Shopping Cart</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total </th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($items as $index=>$item): ?>
                                            <?php $grand_total += $item["price"] * $item["buy_qty"]; ?>
                                            <tr>
                                                <th scope="row"><?php echo $index + 1; ?></th>
                                                <td><img src="<?php echo $item["thumbnail"];?>" width="80"/></td>
                                                <td><?php echo $item["NAME"];?></td>
                                                <td>
                                                    <form method="post" class="d-flex align-items-center">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                                        <button type="submit" name="decrease" class="btn btn-danger btn-sm">-</button>
                                                        <input type="text" name="qty" value="<?php echo $item['buy_qty']; ?>" class="form-control mx-2" style="width: 50px; text-align: center;" readonly>
                                                        <button type="submit" name="increase" class="btn btn-success btn-sm">+</button>
                                                    </form>
                                                </td>
                                                <td><?php echo $item["price"];?></td>
                                                <td><?php echo $item["price"] * $item["buy_qty"];?></td>
                                                <td>
                                                    <form method="post" style="display: inline;">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                                        <button type="submit" name="remove" class="btn btn-link text-danger p-0" style="font-size: 1.5rem;">&times;</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-4">
                          <div class="card-body">
                              <p><strong>Expected shipping delivery</strong></p>
                              <p class="mb-0">
                              <?php echo $shipping_start->format('F j, Y'); ?> - 
                              <?php echo $shipping_end->format('F j, Y'); ?>
          </p>
    </div>
</div>


                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body">
                                <p><strong>We accept :</strong></p>
                                <img class="me-2" width="45px" src="https://www.shutterstock.com/image-vector/cash-on-delivery-logo-cod-260nw-2192949005.jpg" alt="COD" />
                                <img class="me-2" width="45px" src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png" alt="PayPal acceptance mark" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Products $
                                        <span><?php echo $grand_total;?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Shipping
                                        <span>COD</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount $</strong>
                                            <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong>
                                        </div>
                                        <span><strong><?php echo $grand_total;?></strong></span>
                                    </li>
                                </ul>

                                <div class="d-flex justify-content-center">
                                  <a href="/payment.php" class="btn btn-primary btn-lg">
                                     Go to checkout
                                  </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
<?php include_once("html/footer.php");?>
