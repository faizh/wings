<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/main.css">
</head>
<body>
    <div class="container">
        <section class="vh-100">
          <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= base_url() ?>assets/images/login.svg" class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="<?= base_url()?>index.php/auth/act_register" method="post">

                  <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">Register</p>
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control" placeholder="Enter username" name="username" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <input type="password" id="form3Example4" class="form-control form-control" name="password" placeholder="Enter password" />
                  </div>

                  <div class="text-center text-lg-start mt-4 pt-2">
                    <input type="submit" value="Register" class="btn btn-primary btn"style="padding-left: 2.5rem; padding-right: 2.5rem;">
                    </button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already Have Account? <a href="<?= base_url() ?>index.php/auth/login"
                        class="link-danger">Login here</a></p>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
              Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
              <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
              </a>
              <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <!-- Right -->
          </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>