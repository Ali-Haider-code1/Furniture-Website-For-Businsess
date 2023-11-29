<?php
require_once("db.php");

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST["fname"]);
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
    $lname = trim($_POST["lname"]);
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $errors[] = "Email address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$hashedPassword')";
        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Signup successful!");</script>';
        } else {
            echo '<script>alert("Error: ' . $sql . '\n' . mysqli_error($con) . '");</script>';
        }
    } else {
        foreach ($errors as $error) {
            echo '<script>alert("' . $error . '");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../css/tiny-slider.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<style>
    .name {
        text-align: left;
        position: relative;
        left: -38%;
    }

    .email {
        position: relative;
        left: -43%;
    }

    .pass {

        position: relative;
        left: -45%;
    }

    @media (max-width: 440px) {

        .email,
        .pass {
            position: relative;
            left: -36%;
        }
    }

    body {
        background-color: #3b5d50;
    }

    .signup a {
        text-decoration: none;
        color: #3b5d50;

    }
    .signup a:hover {
        cursor: pointer;

    }
</style>

<body>
    <!-- Section: Design Block -->
    <section class="text-center mt-3">
        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3">Sign up now</h2>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label name" for="form3Example1">First name</label>
                                        <input type="text" id="form3Example1" class="form-control" name="fname" required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label name" for="form3Example2">Last name</label>
                                        <input type="text" id="form3Example2" class="form-control" name="lname" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label email" for="form3Example3">Email address</label>
                                <input type="email" id="form3Example3" class="form-control" name="email" required />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label pass" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control" name="password" required />
                            </div>

                            <!-- Submit button -->
                            <div class="d-flex justify-content-between align-items-center signup">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Sign up
                                </button>
                                <a class="mt-2 fw-bold" href="login.php">Already Have An Account?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</body>

</html>