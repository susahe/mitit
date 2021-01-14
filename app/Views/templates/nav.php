

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
<a class="navbar-brand" href="#">MIT Computer Training Center</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
  </li>

    </ul>
    <?php if ((session()->get('isLogedIn'))) : ?>
    <ul class="navbar-nav ml-auto">


  <li class="nav-item dropdown  ml-auto">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?= session()->get('firstname')?>
    <img src="<?php echo base_url('img/profile.png');?>" alt="Avatar" class="avatar" >

    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

      <a class="dropdown-item" href="/user_chagne_password"><span class="glyphicon glyphicon-user"></span>Change Password</a>


     <a class="dropdown-item" href="/logout">Logout</a>
    </div>
  </li>

</ul>
<?php else :?>

  <ul class="navbar-nav ml-auto">
   <li class="nav-item ">
     <a class="nav-link" href="/login">Login</a>
     <li class="nav-item ">
       <a class="nav-link" href="/create_user">Register</a>
     </li>
   </li>
  </ul>
<?php endif;?>
</div>
</nav>
