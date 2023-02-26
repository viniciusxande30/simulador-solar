<?php
		$pasta = $_SERVER['DOCUMENT_ROOT'].'/SIMULADOR_SOLAR/SIMULADOR_SOLAR/public/images_full/logotipo/';

		//echo $pasta;
		$arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp,*.webp}", GLOB_BRACE);
    $parte = explode("/", $arquivos[0]);
    //echo $parte[8];
    
?>
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
    
    <div class="body">
      <header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}" >
        <div class="header-body border-top-0 bg-dark box-shadow-none" >
          <div class="header-container container-fluid">
            <div class="header-row p-relative px-0">
              <div class="header-column px-lg-3">
                <div class="header-row">
                  <div class="header-logo">
                    <a href="{{url('/')}}"><img src="{{url('/')}}/images_full/logotipo/{{$parte[8]}}" ></a>
                  </div>
                </div>
              </div>
              <div class="header-column w-100 ms-2 ms-xl-5 ps-2 pe-lg-3">
                <div class="header-row justify-content-end justify-content-lg-start">
                  <div class="header-nav header-nav-links header-nav-light-text justify-content-lg-start">
                    <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-mobile-dark header-nav-main-dropdown-border-radius header-nav-main-text-capitalize header-nav-main-text-size-5 header-nav-main-arrows header-nav-main-effect-1 header-nav-main-sub-effect-1">
                      <nav class="collapse">
                        <ul class="nav nav-pills" id="mainNav">
                          <li class="dropdown">
                            <a class="dropdown-item" href="{{url('/')}}">
                              Home
                            </a>

                          </li>
                                                    <li class="dropdown">
                            <a class="dropdown-item " href="{{url('/')}}/#por-que-investir">
                              Por que Investir?
                            </a>

                          </li>
                                                    <li class="dropdown">
                            <a class="dropdown-item " href="{{url('/')}}/#simulador">
                             Faça sua Simulação
                            </a>

                          </li>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
