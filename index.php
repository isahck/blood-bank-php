<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" id="savedTheme" href ="css/theme/default-theme.css">
  <link rel="stylesheet" href ="css/.css">
  <script src="icons/js/all.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style type="text/css">
    .bs-example {
      margin: 0px;

    }

    .navbar-brand {
      font-size: 20px;
      font-family: sans-serif;

    }

    .xyz{
    margin-bottom: 0px;
    background-image: url("imgs/homepage.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
  .footer {

left: 0;
bottom: 0;
width: 100%;
background-color: var(--blue);
color: var(--white);
text-align: center;
height:50px;
}
  </style>
</head>

<body>
<select hidden id="theme-selector">
        <option value="select theme">select theme</option>
        <option value="default-theme">Default Theme</option>
        <option value="ngit-theme">Ngit Theme</option>
        <option value="isahck-theme">Isahck theme</option>
        <option value="dark-theme">Dark Theme</option>
    </select>

  <div class="bs-example">
    <nav style="background-color: var(--blue);" class="navbar navbar-expand-md navbar-dark fixed-top">
      <a href="/" class="navbar-brand"><i class="fas fa-heartbeat"></i>&nbsp; Blood Bank Management</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href=""><i class="fas fa-home"></i>&nbsp; Home</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="login.php"><i class="fas fa-procedures"></i>&nbsp; Patient</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="donor-login.php"><i class="fas fa-user"></i>&nbsp; Donor</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="admin-login.php"><i class="fas fa-user-shield"></i>&nbsp; Admin</i></a>
                </li>
                
            </ul>
        </div>




      </div>
    </nav>
  </div>
{% include "blood/navbar.html" %}
<br>
<section id="section-jumbotron" style="margin-bottom: 0px;" class="jumbotron jumbotron-fluid d-flex justify-content-center align-items-center xyz">
<div class="container text-center">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<br><br><br><br>

</div>  
</section>


<div class="jumbotron" style="margin-top: 0px;margin-bottom: 0px;">

<p class="lead text-center">“Opportunities knock the door sometimes, so don’t let it go and donate blood.”
</p>

<p class="text-center">Blood Bank Management System &copy; 2021</p>

</div>

<!-- footer -->
<div class="footer">
<p>
  <br>
  desing by isahck@ ngit software
</p>

</div>


</body>

</html>