<?php
require_once("db.php");
session_start();


$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $errors[] = "Email address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }

    // Validate Password
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If there are no validation errors, proceed with database check
    if (empty($errors)) {
        // Query to check if the user with the provided email and password exists
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row && password_verify($password, $row['password'])) {
                $_SESSION['email'] = $row['email'];

                echo '<script>alert("Login successful!");</script>';
                echo '<script>window.location.href = "index.php";</script>';
            } else {
                $errors[] = "Invalid email or password";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<script>alert("' . $error . '");</script>';
        }
    }
}
?>
<?php
$hardcodedAdminUsername = "admin@gmail.com";
$hardcodedAdminPassword = "admin";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["email"];
    $enteredPassword = $_POST["password"];

    if ($enteredUsername == $hardcodedAdminUsername && $enteredPassword == $hardcodedAdminPassword) {
        $_SESSION["admin"] = true;

        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
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
    <title>Login</title>
</head>

<style>
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

    .login a {
        text-decoration: none;
        color: #3b5d50;
    }

    .login a:hover {
        cursor: pointer;
    }

    .admin button {
        border: 1px solid grey;
        padding:7px 20px;
        border-radius: 10px;
    }
    
</style>

<body>
    <!-- Section: Design Block -->
    <section class="text-center mt-5">
        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3">Login</h2>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="login">
                            <div class="form-outline mb-4">
                                <label class="form-label email" for="form3Example3">Email address</label>
                                <input type="email" id="form3Example3" class="form-control" name="email" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label pass" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control" name="password" required />
                            </div>

                            <div class="d-flex justify-content-between align-items-center login">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                                <a class="mt-2 fw-bold" href="signup.php">Don't Have An Account? Create One</a>
                            </div>

                            <div class="d-block m-auto admin mt-3">
                            <button class="mt-2 text-center fw-bold" type="submit">Login as Admin</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/tiny-slider.js"></script>
<script src="../js/custom.js"></script>

</html>