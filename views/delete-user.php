<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Delete User</title>
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark"
    style="margin-bottom: 80px">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">
        <i class="fa-solid fa-house"></i>
      </a>
      <div class="navbar-nav">
        <span class="navbar-text"><?=$_SESSION['full_name']?></span>
        <form action="../actions/logout.php" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">
            Logout
          </button>
        </form>
      </div>
    </div>
  </nav>

  <main class="row justify-content-center gx-0">
    <div class="col-4 text-center">
      <i class="fa-solid fa-triangle-exclamation text-warning display-4 d-block mb-2"></i>
      <h2 class="text-danger mb-5">DELETE ACCOUNT</h2>

      <p class="fw-bold">Are you sure you want to delete your account?</p>

      <div class="row">
        <div class="col">
          <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
        </div>
        <div class="col">
          <form action="../actions/delete-user.php" method="post">
            <button type="submit" class="btn btn-outline-danger w-100">
              Delete
            </button>
          </form>
        </div>
      </div>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>