
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="gradient-custom">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section class="gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">
        
                    <div class="mb-md-5 mt-md-4 pb-5">
        
                      <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                      <p class="text-white-50 mb-5">Please enter your login and password!</p>
                      <form action="src/includes/registration.inc.php" method="POST">
                      <div class="form-outline form-white mb-4">
                        <input type="email" id="typeEmailX" name="username" class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX">Email</label>
                      </div>
        
                      <div class="form-outline form-white mb-4">
                        <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="typePasswordX">Password</label>
                      </div>
                    
        
        
                      <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Sign Up</button>
                    </form>
                      <div class="d-flex justify-content-center text-center mt-4 pt-1">
                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                      </div>
        
                    </div>
        
                    <div>
                      <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a></p>
                    </div>
        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
    </body>
</html>