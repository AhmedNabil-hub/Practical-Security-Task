<?php

$pageTitle = 'SQL Injection Lab';

include './backend/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $username = filter_var(
  //   $_POST['username'],
  //   FILTER_SANITIZE_STRING
  // );
  $username = $_POST['username'];

  // $password = sha1(
  //   filter_var(
  //     $_POST['password'],
  //     FILTER_SANITIZE_STRING
  //   )
  // );
  $password = $_POST['password'];

  $formErrors = array();

  if (empty($username) || strlen($username) < 3) {
    $formErrors[] = "please type a valid username";
  }

  if (empty($password)) {
    $formErrors[] = "please type a valid password";
  }

  if (empty($formErrors)) {
    $user = get_data_wrong(
      "users",
      "user_id,username,password",
      "username=$username",
      "WHERE username=$username"
    );

    // $user = get_data_correct(
    //   "users",
    //   "user_id,username,password",
    //   "username=$username",
    //   "WHERE username=:username"
    // );

    if (count($user) < 1) {
      $formErrors[] = "This username doesn't exist";
    } elseif ($user[0]["password"] !== $password) {
      $formErrors[] = "This password is incorrect";
    } else {
      print "<pre>";
      print_r($user);
      print "</pre>";
    }
  }

  if(!empty($formErrors)) {
    print "<pre>";
    print_r($user);
    print "</pre>";
  }
}
?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form class="mb-md-5 mt-md-4 pb-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your username and password!</p>

              <div class="form-outline form-white mb-4">
                <!-- <input type="text" id="username" class="form-control form-control-lg custom-input" placeholder="Username" name="username" pattern="^[a-zA-Z]{2,}[._]?[a-zA-Z0-9]+$" required /> -->
                <input type="text" id="username" class="form-control form-control-lg custom-input" placeholder="Username" name="username" required />
              </div>

              <div class="form-outline form-white mb-4">
                <!-- <input type="password" id="password" class="form-control form-control-lg custom-input" placeholder="Password" name="password" pattern=".{8,}" required /> -->
                <input type="password" id="password" class="form-control form-control-lg custom-input" placeholder="Password" name="password" required />
              </div>

              <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include $layouts . 'footer.php';
?>
