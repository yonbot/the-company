<?php
include "../classes/User.php";

// create an object of the User class
$user = new User;

// we call store() using the $user object
$user->store($_POST);
