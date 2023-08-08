<?php
  session_start();

  if (!isset($_SESSION['id'])) {
    header('location: index.php');
  }

  require "../classes/User.php";

  $user_obj = new User;
  $user = $user_obj->getUser($_SESSION['id']);

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

  <link rel="stylesheet" href="../assets/css/style.css">

  <title>Edit User</title>
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

  <main class="row justify-content-center gx-o">
    <div class="col-4">
      <h2 class="text-center mb-4">EDIT USER</h2>

      <form action="../actions/edit-user.php" method="post"
        enctype="multipart/form-data">
        <div class="row justify-content-center mb-3">
          <div class="col-6">
            <?php
              if ($user['photo']) {
            ?>
              <img src="../assets/images/<?=$user['photo']?>" 
                alt="<?=$user['photo']?>" 
                class="d-block mx-auto rounded-circle edit-photo">
            <?php
              } else {
            ?>
              <i class="fa-solid fa-user-circle text-secondary 
                d-block text-center edit-icon"></i>
            <?php
              }
            ?>

            <input type="file" name="photo" id="photo" class="form-control mt-2" accept="images/">
          </div>
        </div>

        <div class="mb-3">
          <label for="first-name" class="form-label">First Name</label>
          <input type="text" name="first_name" id="first-name" 
            class="form-contol" value="<?=$user['first_name']?>"
            required autofocus>
        </div>

        <div class="mb-3">
          <label for="last-name" class="form-label">Last Name</label>
          <input type="text" name="last_name" id="last-name" 
            class="form-contol" value="<?=$user['last_name']?>"
            required autofocus>
        </div>

        <div username="mb-3">
          <label for="username" class="form-label">UserName</label>
          <input type="text" name="username" id="username" 
            class="form-contol" value="<?=$user['username']?>"
            required autofocus>
        </div>

        <div class="text-end">
          <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
          <button type="submit"
            class="btn btn-warning btn-sm">Save
          </button>
        </div>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>