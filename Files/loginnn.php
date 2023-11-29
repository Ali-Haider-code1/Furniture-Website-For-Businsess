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
                        <h2 class="fw-bold mb-3">Login</h2>
                        <form class="login">
                            <!-- Email input for login -->
                            <div class="form-outline mb-4">
                                <label class="form-label email" for="form3Example3">Email address</label>
                                <input type="email" id="form3Example3" class="form-control" />
                            </div>

                            <!-- Password input for login -->
                            <div class="form-outline mb-4">
                                <label class="form-label pass" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control" />
                            </div>
                            <!-- Submit button for login -->
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>

</html>
