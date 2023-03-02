<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style5.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

  <title></title>
  <style type="text/css">
#menu {
  z-index: 2;
}

#menu-bar {
  width: 45px;
  height: 40px;
  margin: 30px 0 20px 20px;
  cursor: pointer;
}

.bar {
  height: 5px;
  width: 100%;
  background-color: #DC052D;
  display: block;
  border-radius: 5px;
  transition: 0.3s ease;
}

#bar1 {
  transform: translateY(-4px);
}

#bar3 {
  transform: translateY(4px);
}

.nav {
  transition: 0.3s ease;
  display: none;
}

.nav ul {
  padding: 0 22px;
}

.nav li {
  list-style: none;
  padding: 12px 0;
}

.nav li a {
  color: white;
  font-size: 20px;
  text-decoration: none;
}

.nav li a:hover {
  font-weight: bold;
}

.menu-bg, #menu {
  top: 0;
  left: 0;
  position: absolute;
}

.menu-bg {
  z-index: 1;
  width: 0;
  height: 0;
  margin: 30px 0 20px 20px;
  background: radial-gradient(circle, #DC052D, #DC052D);
  border-radius: 50%;
  transition: 0.3s ease;
}

.change {
  display: block;
}

.change .bar {
  background-color: white;
}

.change #bar1 {
  transform: translateY(4px) rotateZ(-45deg);
}

.change #bar2 {
  opacity: 0;
}

.change #bar3 {
  transform: translateY(-6px) rotateZ(45deg);
}

.change-bg {
  width: 520px;
  height: 460px;
  transform: translate(-60%,-30%);
}
hr.rounded{
    border-top:  5px solid #bbb;
    border-radius: 5px;

  }
  </style>
</head>
<body>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet"><script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script><script>AOS.init()</script>
  <script type="text/javascript">
                function menuOnClick() { document.getElementById("menu-bar").classList.toggle("change"); document.getElementById("nav").classList.toggle("change"); 
                     document.getElementById("menu-bg")
                     .classList.toggle("change-bg"); }
            </script>
          
  <header align-items: center><nav>
    <div  ><a href="index.php"><img class="mak" id="mak" src="mak1.png"></a> </div><div id="menu">
  <div id="menu-bar" onclick="menuOnClick()">
    <div id="bar1" class="bar"></div>
    <div id="bar2" class="bar"></div>
    <div id="bar3" class="bar"></div> 
    
  </div>
  <nav class="nav" id="nav">
    <ul>
      <li ><a href="index.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li ><a href="login.php">Sign in</a></li>
      <li ><a href="adminlogin.php">Admin</a></li>
    </ul>
       
</nav></div>
<div class="menu-bg" id="menu-bg"></div>
  <div class="topnav">
   <div>
 <form action="searchpage.php" method="POST" name="frmSearch">
               <input id="inputSearch" name="search" type="text" value="" placeholder="Search..">
              <input type="Submit" hidden />
        </form>
      </div>
      <div>
 <a href="cart.php"> <img id="cartimg" src="item.png"></a></nav>
</div>
</div>
</nav>
</header>
<div id="carouselExample" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators"  >
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
            <li data-target="#carouselExample" data-slide-to="3"></li>
            <li data-target="#carouselExample" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="object-fit: cover;" src="slides.jpg"class="d-block w-100" alt="second">
                    <button type="button" class="myButton">SHOP NOW</button>
                </div>
                <div class="carousel-item">
                    <img src="slides.jpg" class="d-block w-100" alt="second">
                    <button type="button" class="myButton">SHOP NOW</button>
                </div>
                <div class="carousel-item">
                    <img src="slides.jpg" class="d-block w-100" alt="third">
                    <button type="button" class="myButton">SHOP NOW</button>
                </div>
                <div class="carousel-item">
                    <img src="slides.jpg" class="d-block w-100" alt="fourth">
                    <button type="button" class="myButton">SHOP NOW</button>
                </div>
                <div class="carousel-item">
                    <img src="slides.jpg" class="d-block w-100" alt="fifth">
                    <button type="button" class="myButton">SHOP NOW</button>
                </div>
        </div>
        <div >
            <a href="#carouselExample" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#carouselExample" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>

    
    </div>
<br><br><br>
    <hr class=rounded>
    <h1 style="color:white; text-align: center; letter-spacing: 10px;">CATEGORIES</h1>
     <hr class=rounded>

    <?php  include("categories.php"); ?>
<div>
     <?php  include("footer.php"); ?>    
</div>
    
</body>
</html>