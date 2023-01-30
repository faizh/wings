<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="<?= base_url() ?>">Wings</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link <?= ($page == 'home') ? 'active' : '' ?>" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
	      <a class="nav-item nav-link <?= ($page == 'cart') ? 'active' : '' ?>" href="<?= base_url() ?>index.php/cart">Cart</a>
	    </div>
	  </div>
	</nav> -->

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="<?= base_url() ?>">Wings</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav">
	      <li class="nav-item <?= ($page == 'home') ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>">Home</a>
	      </li>
	      <li class="nav-item <?= ($page == 'cart') ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>index.php/cart">Cart</a>
	      </li>
	      <li class="nav-item <?= ($page == 'report') ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>index.php/report">Report</a>
	      </li>

	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <?= $this->session->userdata('username') ?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= base_url() ?>index.php/auth/logout">Logout</a>
	        </div>
	      </li>
	    </ul>
	  </div>
	</nav>