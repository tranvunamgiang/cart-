<?php include("html/head.php"); ?>
<?php include("html/nav1.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }
    .thank-you-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .thank-you-container h1 {
      color: #2a75bb;
      font-weight: bold;
    }
    .thank-you-container h2 {
      color: #3498db;
      font-family: 'Brush Script MT', cursive;
      font-size: 3rem;
    }
    .thank-you-container p {
      color: #a569bd;
      font-size: 1.1rem;
    }
    .thank-you-container hr {
      border: none;
      height: 2px;
      background-color: #2ecc71;
      width: 50px;
      margin: 20px auto;
    }
  </style>
</head>
<body>
  <div class="thank-you-container">
    <h2>Thank you<br>For your order!</h2>
    <hr>
    <p>Your support of our small business is <strong>(very much!)</strong> appreciated.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include_once("html/footer.php");?>
