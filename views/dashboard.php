<?php
  session_start();

  if (!isset($_SESSION['id'])) {
    header("location: index.php");
  }

  require "../classes/User.php";

  $user_obj = new User;
  $all_users = $user_obj->getAllUsers();

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

  <title>Dashboard</title>
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
    <div class="col-6">
      <h2 class="text-center">USER LIST</h2>
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th><!-- for the photo --></th>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th><!-- for the buttons --></th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($user = $all_users->fetch_assoc()) {
          ?>
            <tr>
              <td>
                <?php
                  if ($user['photo']) {
                ?>
                  <img src="../assets/images/<?=$user['photo']?>" 
                    alt="<?=$user['photo']?>" 
                    class="d-block mx-auto rounded-circle dashboard-photo">
                <?php
                  } else {
                ?>
                  <i class="fa-solid fa-user text-secondary 
                    d-block text-center dashboard-icon"></i>
                <?php
                  }
                ?>
              </td>
              <td><?=$user['id']?></td>
              <td><?=$user['first_name']?></td>
              <td><?=$user['last_name']?></td>
              <td><?=$user['username']?></td>
              <td>
                <?php
                  if ($_SESSION['id'] == $user['id']) {
                ?>
                    <a href="edit-user.php" title="Edit"
                      class="btn btn-outline-warning border-0">
                      <i class="fa-reqular fa-pen-to-square"></i>
                    </a>
                    <a href="delete-user.php" title="Delete"
                      class="btn btn-outline-danger border-0">
                      <i class="fa-regular fa-trash-can"></i>
                    </a>
                <?php
                  }
                ?>
              </td>
            </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>
