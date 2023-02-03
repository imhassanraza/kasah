<!DOCTYPE html>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset='utf-8'>
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
	<meta content='width=device-width, initial-scale=1' name='viewport'>
	<meta content='Kasah is an online way to make buying and selling real estate easier and transparent. Get home selling info today.' name='description'>
	<meta content='summary' name='twitter:card'>
	<meta content='@kasah' name='twitter:site'>
	<meta content='Kasah' name='twitter:title'>
	<meta content='Simplified home selling and buying. Providing expertise, information and tools to help you sell your home.' name='twitter:description'>
	<meta content='<?php echo base_url() ?>assets/images/logo.png' name='twitter:image'>
	<meta content='Kasah' name='twitter:image:alt'>
	<meta content='<?php echo base_url() ?>' property='og:url'>
	<meta content='website' property='og:type'>
	<meta content='Kasah' property='og:title'>
	<meta content='Simplified home selling and buying. Providing expertise, information and tools to help you sell your home.' property='og:description'>
	<meta content='<?php echo base_url() ?>assets/images/logo.png' property='og:image'>
	<title>Kasah - Real Estate Made Simple.</title>
	<link href="<?php echo base_url() ?>assets/faxon/css/app.55acef2.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/stylesheets/application-ea1525c8.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faxon/css/style.sell.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faxon/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faxon/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faxon/css/style.buy.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faxon/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/faxon/css/inputmask.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
	<link href="<?php echo base_url() ?>assets/css/jquery.imageview.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.css">
        
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url() ?>/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url() ?>/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/favicons/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
</head>
<body class='about about_index'>
	<header class='full'>
		<nav>
			<a href="<?php echo base_url() ?>" class="logo"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="Kasah" /></a>
			<ul>
				<?php 
				if (checkUserLogin()) {?>
				<li>
					<a href="<?php echo base_url() ?>user/dashboard" class="nav-link">Dashboard
					</a>
				</li>
				<?php }?>
				<li>
					<a href="<?php echo base_url() ?>howitworks" class="<?php echo ($this->uri->segment(1) == "howitworks")? "active-link":"" ?> nav-link">How it Works
					</a>
				</li>
				<li>
					<a href="<?php echo base_url() ?>pricing" class="<?php echo ($this->uri->segment(1) == "pricing")? "active-link":"" ?> nav-link">Pricing
					</a>
				</li>
				<?php 
				$user = $this->session->userdata('user');
				if ($user['roll'] == "seller"){ ?>
				<li>
					<a href="<?php echo base_url() ?>sell" class="<?php echo ($this->uri->segment(1) == "sell")? "active-link":"" ?> nav-link">Sell</a>
				</li>            
				<?php }?>
            <!-- <li>
              <a href="<?php echo base_url() ?>signup/buyer" class="<?php echo ($this->uri->segment(1) == "buy")? "active-link":"" ?> nav-link">Buy
              </a>
          </li> -->
          <?php if (!checkUserLogin()) { ?>
          <li>
          	<a href="<?php echo base_url() ?>sell" class="<?php echo ($this->uri->segment(1) == "sell")? "active-link":"" ?> nav-link">Sell</a>
          </li>
          <li>
          	<a href="<?php echo base_url() ?>signup/buyer" class="<?php echo ($this->uri->segment(1) == "buy")? "active-link":"" ?> nav-link">Buy
          	</a>
          </li>
          <?php } ?>
          <?php 
          if (checkUserLogin()) {?>
          <li>
          	<a href="<?php echo base_url() ?>logout" class="nav-link">Log Out
          	</a>
          </li>
          <?php }else{ ?>
          <li>
          	<a href="<?php echo base_url() ?>login" class="<?php echo ($this->uri->segment(1) == "login")? "active-link":"" ?> nav-link">Log In
          	</a>
          </li>
          <?php } ?>
      </ul>
  </nav>
</header>
<header class='mobile' style="z-index: 10000;">
	<a href="<?php echo base_url() ?>" class="logo"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="Kasah" /></a>
	<a href="#menu" class="btn menu-open" style="border-radius: 0px; width: 2.2em; height: 1.7em;">Menu</a>
	<nav>
		<div class='fixed-nav'>
			<a href="<?php echo base_url() ?>" class="menu-logo"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="Kasah" /></a>
			<a href="#close" class="menu-close"><img src="<?php echo base_url() ?>assets/images/icons/close-6824dbb3.svg" alt="Close" /></a>
		</div>
		<ul>
			<?php 
			if (checkUserLogin()) {?>
			<li>
				<a href="<?php echo base_url() ?>user/dashboard" class="nav-link">Dashboard
				</a>
			</li>
			<?php }?>
			<li>
				<a href="<?php echo base_url() ?>howitworks" class="<?php echo ($this->uri->segment(1) == "howitworks")? "active-link":"" ?> nav-link">How it Works
				</a>
			</li>
			<li>
				<a href="<?php echo base_url() ?>pricing" class="<?php echo ($this->uri->segment(1) == "pricing")? "active-link":"" ?> nav-link">Pricing
				</a>
			</li>
			<?php 
			$user = $this->session->userdata('user');
			if ($user['roll'] == "seller"){ ?>
			<li>
				<a href="<?php echo base_url() ?>sell" class="<?php echo ($this->uri->segment(1) == "sell")? "active-link":"" ?> nav-link">Sell</a>
			</li>            
			<?php }?>
            <!-- <li>
              <a href="<?php echo base_url() ?>signup/buyer" class="<?php echo ($this->uri->segment(1) == "buy")? "active-link":"" ?> nav-link">Buy
              </a>
          </li> -->
          <?php if (!checkUserLogin()) { ?>
          <li>
          	<a href="<?php echo base_url() ?>sell" class="<?php echo ($this->uri->segment(1) == "sell")? "active-link":"" ?> nav-link">Sell</a>
          </li>
          <li>
          	<a href="<?php echo base_url() ?>signup/buyer" class="<?php echo ($this->uri->segment(1) == "buy")? "active-link":"" ?> nav-link">Buy
          	</a>
          </li>
          <?php } ?>
            <!-- <li><a href="<?php echo base_url() ?>sell" class="<?php echo ($this->uri->segment(1) == "cell")? "active-link":"" ?> nav-link">Sell</a></li>
            <li><a href="<?php echo base_url() ?>buy" class="<?php echo ($this->uri->segment(1) == "buy")? "active-link":"" ?> nav-link">Buy</a></li>
            <li><a href="<?php echo base_url() ?>pricing" class="<?php echo ($this->uri->segment(1) == "pricing")? "active-link":"" ?> nav-link">Pricing</a></li>
            <li><a href="<?php echo base_url() ?>howitworks" class="<?php echo ($this->uri->segment(1) == "howitworks")? "active-link":"" ?> nav-link">How it Works</a></li> -->
            
            <?php 
            if (checkUserLogin()) {?>
            <li>
            	<a href="<?php echo base_url() ?>logout" class="nav-link">Log Out
            	</a>
            </li>
            <?php }else{ ?>
            <li class='break'><a href="<?php echo base_url() ?>signup" class="btn btn-inverse btn-round">Sign up</a></li>
            <li><a href="<?php echo base_url() ?>login" class="<?php echo ($this->uri->segment(1) == "login")? "active-link":"" ?> login-link">Log in</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>