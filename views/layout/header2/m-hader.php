<div class="m-header">
  <a class="mobile-menu on" id="mobile-collapse" href="#!"><span></span></a>
  <a href="./views/index.php" class="b-brand">
    <img src="./views/assets/images/it1.svg" alt="" class="logo" />
    <img src="./views/assets/images/logo-icon.png" alt="" class="logo-thumb" />
  </a>
  <a href="#!" class="mob-toggler">
    <i class="feather icon-more-vertical"></i>
  </a>
</div>
<ul class="navbar-nav ml-auto">
  <li>
    <label><?php echo $_SESSION['first_name'] ?></label>
    <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#USER_EXIT">
      <i class="bi bi-power"></i>
    </a>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#USER_PASSWORD_CHANGE">
      <i class="bi bi-key-fill"></i>
    </a>
  </li>

</ul>