<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Menü</a>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Főoldal</a>
      </li>
    <?php if(!IsUserLoggedIn()) :?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?G=user&P=login">Bejelentkezés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?G=user&P=register">Regisztráció</a>
      </li>
    <?php else :?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?G=user&P=logout">Kijelentkezés</a>
      </li>
    <?php endif ;?>   
    </ul>
  </div>  
</nav>



