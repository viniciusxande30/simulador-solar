<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

@php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
$json = file_get_contents(url('/').'/json_archives.json', false, stream_context_create($arrContextOptions));
$conteudo = json_decode($json);
$contagem = count($conteudo);
//$conteudo[$contagem-1]->Name;
@endphp

	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Simulador de Energia Solar | {{$conteudo[$contagem-1]->Name}}</title>

		<meta name="keywords" content="WebSite Template" />
		<meta name="description" content="Simulador de Energia Solar | Um Tudo Só Comunicação">
		<meta name="author" content="rsweb">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/icon-uts-150x150.webp" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo url('/');?>/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo url('/');?>/css/theme.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo url('/');?>/css/theme-shop.css">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="<?php echo url('/');?>/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo url('/');?>/css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	</head>





  <body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 0, 'effect': 'pulse'}">
    <div class="loading-overlay">
      <div class="bounce-loader">
        <div class="wrapper-pulse">
          <div class="cssload-pulse-loader"></div>
        </div>
      </div>
    </div>