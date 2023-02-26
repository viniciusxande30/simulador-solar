@include('includes.header')
@include('includes.top')

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


      			<div role="main" class="main" id="cotacao">
      					<section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" id="section-concept" style="background-image: url(img/landing/header-1.jpg); background-size: cover; background-position: center; animation-duration: 750ms; animation-delay: 300ms; animation-fill-mode: forwards;">
      						<div class="section-angled-layer-bottom bg-light" style="padding: 8rem 0;"></div>
      						<div class="container pt-5 mt-5">
      							<div class="row custom-header-min-height-1 align-items-center pt-3">
      								<div class="col-lg-5 mb-5">
      									<h1 class="font-weight-bold text-12 line-height-2 mb-3">Simulador de <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-light default-font font-weight-bold highlighted-word-animation-1-end">Energia Solar </span></h1>
      									<p class="custom-font-size-1 pt-2">Descubra o quanto você pode Economizar na sua Conta de Luz!</p>
      								</div>

      								<div class="col-lg-6" style="background-color:white;box-shadow: 2px 2px 2px #ced4da;border-radius:20px;padding:50px">
      							<h2 class="font-weight-bold text-8 mt-2 mb-0" style="color:black">Faça sua Cotação Gratuita!</h2>
      							<p class="mb-4" style="color:{{$conteudo[$contagem-1]->Color;}}">Faça sua Cotação Cotação Totalmente Gratuita com a {{$conteudo[$contagem-1]->Name;}}</p>
      							<form class="contact-form" action="{{url('/')}}/enviar-simulacao" method="POST">
                      @csrf
      								<div class="row">
      									<div class="form-group col-lg-12">
      										<input type="text" value="" placeholder="Digite seu Nome" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required="">
      									</div>
      								</div>


									  <div class="row">
      									<div class="form-group col-lg-6">
												<input type="text" value="" placeholder="Telefone" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="phone" required="">
											</div>

											<div class="form-group col-lg-6">
      										<input type="email" value="" placeholder="Digite seu E-mail" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required="">
      									</div>
											
      								</div>
      								<div class="row">
									  <div class="form-group col-lg-6">
												<select class="form-select" name="network_type" aria-label="Default select example" required>
													<option value="" selected>Tipo da Rede</option>
													<option value="0">Padrão</option>
													<option value="1">Monofásico</option>
													<option value="2">Bifásico</option>
													<option value="3">Trifásico</option>
												</select>
										</div>
										<div class="form-group col">

<select class="form-select" name="local" aria-label="Default select example" required>
	<option value="" selected >Local</option>
	<option value="1">Residencial</option>
	<option value="2">Comercial</option>
	<option value="3">Industrial</option>
	<option value="4">Agro</option>
</select>

</div>
      									<div class="form-group col-lg-12">

										  <select class="form-select" name="state" aria-label="Default select example" required>
													<option value="" selected>Selecione o seu Estado</option>
													<option value="1">Acre</option>
													<option value="2">Alagoas</option>
													<option value="3">Amapá</option>
													<option value="4">Amazonas</option>
													<option value="5">Bahia</option>
													<option value="6">Ceará</option>
													<option value="7">Espírito Santo</option>
													<option value="8">Goiás</option>
													<option value="9">Maranhão</option>
													<option value="10">Mato Grosso</option>
													<option value="11">Mato Grosso do Sul</option>
													<option value="12">Minas Gerais</option>
													<option value="13">Pará</option>
													<option value="14">Paraíba</option>
													<option value="15">Paraná</option>
													<option value="16">Pernambuco</option>
													<option value="17">Piauí</option>
													<option value="18">Rio de Janeiro</option>
													<option value="19">Rio Grande do Norte</option>
													<option value="20">Rio Grande do Sul</option>
													<option value="21">Rondônia</option>
													<option value="22">Roraima</option>
													<option value="23">Santa Catarina</option>
													<option value="24">São Paulo</option>
													<option value="25">Sergipe</option>
													<option value="26">Tocantins</option>
													<option value="27">Distrito Federal</option>
												</select>

      									</div>
      								</div>
      								<div class="row">
      									<div class="form-group col-12">
										  	<select class="form-select" name="aquisition" required>
												<option value="" selected>Em quanto tempo pretende adquirir a Usina Solar?</option>
												<option value="Imediatamente" >Imediatamente</option>
												<option value="Em até 1 Mês" >Em até 1 mês</option>
												<option value="Entre 3 e 6 meses" >Entre 3 e 6 meses</option>
												<option value="Acima de 6 meses" >Acima de 6 meses</option>
												<option value="Ainda não decidi" >Ainda não decidi</option>
											</select>

      									</div>
										  <div class="form-group col-12">
										  <select class="form-select" name="price" required>
										  		<option value="" selected>Valor médio da conta de luz (em R$)</option>
										  		<option value="400" >R$ 300 a R$ 500</option>
												<option value="700" >R$ 600 a R$ 800</option>
												<option value="950" >R$ 900 a R$ 1.000</option>
												<option value="1000" >Acima de R$ 1.000</option>

											</select>
											
											</div>
											<div class="form-group col-12">
												<input  type ="checkbox" name="terms" value="Termo_Aceito" required>
												<label>Eu concordo em receber comunicações. Ao informar meus dados, eu concordo com a <a href="https://umtudoso.com.br/politica-de-privacidade/" target="_BLANK">Política de Privacidade.</a> </label>
											</div>
											<input  type ="hidden" name="email_origin" value="{{$conteudo[$contagem-1]->Email}}">


      								</div>
      								<div class="row">
      									<div class="form-group col">
      										<input type="submit" value="Fazer sua Simulação Gratuita" class="btn btn-primary btn-modern" style="color: white;background-color:{{$conteudo[$contagem-1]->Color}} !important"  data-loading-text="Loading...">
      									</div>
      								</div>
      							</form>

      						</div>



      							</div>
      						</div>
      					</section>


						



					<section class="section section-no-border pb-0 mt-3 mb-0">
						<div class="container pt-4">
							<div class="row align-items-center justify-content-between">
								<div class="col-lg-4">
									<h2 class="text-7 font-weight-semibold line-height-2 mb-2">Simulador Solar - Simule sua ECONOMIA </h2>
									<p>Descubra quanto você pode economizar em sua conta de luz. Preencha o formulário e receba uma simulação do investimento necessário para gerar sua própria energia elétrica.</p>
								</div>
								<div class="col-sm-4 col-lg-auto icon-box text-center mb-4">
									<i class="icon-bg icon-1" style="color: {{$conteudo[$contagem-1]->Color}}"></i>
									<h4 class="font-weight-bold custom-font-size-2 line-height-3 mb-0" style="color: {{$conteudo[$contagem-1]->Color}}">Otimize seu Custo<br> com Energia<br></h4>
								</div>
								<div class="col-sm-4 col-lg-auto icon-box text-center mb-4">
									<i class="icon-bg icon-2" style="color: {{$conteudo[$contagem-1]->Color}}"></i>
									<h4 class="font-weight-bold custom-font-size-2 line-height-3 mb-0" style="color: {{$conteudo[$contagem-1]->Color}}">Invista em<br> Energia Limpa</h4>
								</div>
								<div class="col-sm-4 col-lg-auto icon-box text-center mb-4">
									<i class="icon-bg icon-3" style="color: {{$conteudo[$contagem-1]->Color}}"></i>
									<h4 class="font-weight-bold custom-font-size-2 line-height-3 mb-0" style="color: {{$conteudo[$contagem-1]->Color}}">Controle seus<br> Gastos</h4>
								</div>

								<!-- <div class="col-lg-8 offset-lg-4 px-lg-0 text-left">
									<p class="text-4">Confira as Melhores Vantagens em Investir em Energia Solar. Faça sua Simulação Gratuita.</p>
								</div> -->
							</div>

						</div>
					</section>




					<section class="section section-no-border section-angled bg-color-light-scale-1 m-0">
					
						<div class="section-angled-layer-top section-angled-layer-increase-angle" style="padding: 5rem 0; background-color: {{$conteudo[$contagem-1]->Color}}"></div>
						<div class="container my-5" style="padding-top: 3rem!important;">
							<div class="row align-items-center text-center my-5">
								<div class="col-md-12">
									<h2 class="font-weight-bold text-9 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750" style="animation-delay: 200ms;">Simulador de Energia Solar</h2>
									<p class="font-weight-semibold text-primary text-4 fonts-weight-semibold positive-ls-2 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750" style="animation-delay: 600ms; color:{{$conteudo[$contagem-1]->Color}} !important" >Economize Energia! Descubra o Quanto Você Pode Economizar Investindo em Energia Solar </p>
									<p class="pb-2 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" data-appear-animation-duration="750" style="animation-delay: 800ms;">Nós disponibilizamos o simulador de energia solar para você saber como este investimento pode ser rentável em sua cidade, faça sua simulação ou faça sua cotação gratuita para conferir nossos melhores pacotes para o seu estado.</p>
									<a href="#cotacao" class="btn btn-modern btn-gradient btn-rounded btn-px-5 py-3 text-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750" style="animation-delay: 1000ms;">Quero Fazer Minha Simulação</a>
								</div>
							
							</div>
						</div>
					</section>


					<section class="section section-no-border section-angled bg-color-light-scale-1 m-0">
					<div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
											<div class="row mx-0">

											<?php
											//UPAR ESSE COMENTADO

											$pasta = $_SERVER['DOCUMENT_ROOT'].'/public/images_full/servicos/';

											//$pasta = $_SERVER['DOCUMENT_ROOT'].'/SIMULADOR_SOLAR/SIMULADOR_SOLAR/public/images_full/servicos/';


											$pasta_img = url('/').'/images_full/servicos/';

											//echo $pasta;
											$arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp,*.webp}", GLOB_BRACE);


											//echo $arquivos[0];
											//echo "Total de Imagens" . count($arquivos);
											
											foreach($arquivos as $img){

												$parte = explode("/", $img);
												//echo $parte[8];
												
												//echo $img;
											?>
											<!-- <img src="{{url('/')}}/images_full/servicos/{{$parte[8]}}">; -->
										

												<div class="col-6 col-md-4 p-0">
													<a href="{{url('/')}}/images_full/servicos/{{$parte[8]}}">
														<span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
															<span class="thumb-info-wrapper">
																<img src="{{url('/')}}/images_full/servicos/{{$parte[8]}} " class="img-fluid" alt="">
																<span class="thumb-info-action">
																	<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
																</span>
															</span>
														</span>
													</a>
												</div>
											<?php
											}
											?>
											</div>
										</div>
										</section>



					<section id="support" class="section section-angled bg-light border-0 m-0 position-relative pt-0">
						<div class="container pb-5 pt-5 mb-5"  id="por-que-investir">
							<div class="row align-items-center mb-5">
								<div class="col-lg-6 pe-xl-5 mb-5 mb-lg-0">
									<h2 class="font-weight-bold text-9 mb-1">Economize muito mais com Energia Solar</h2>
									<h5 class="font-weight-semibold positive-ls-2 text-4 text-primary mb-3" style="color:{{$conteudo[$contagem-1]->Color}} !important">Gere sua Própria Energia, Instale sua Energia Solar</h5>
									<p class="ls-0 text-default fw-400 mb-5">Adquira o Retorno sobre o seu Investimento em Poucos Anos</p>
									<div class="d-flex align-items-center border border-top-0 border-end-0 border-start-0 pb-4 mb-4">
										<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 me-3" style="color:{{$conteudo[$contagem-1]->Color}} !important"></i>
										<p class="mb-0"><b class="text-color-dark" style="color:{{$conteudo[$contagem-1]->Color}} !important">Energia Limpa - </b>Sua Própria Energia de um Jeito Mais Sustentável</p>
									</div>
									<div class="d-flex align-items-center border border-top-0 border-end-0 border-start-0 pb-4 mb-4">
										<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 me-3" style="color:{{$conteudo[$contagem-1]->Color}} !important"></i>
										<p class="mb-0 mb-0"><b class="text-color-dark" style="color:{{$conteudo[$contagem-1]->Color}} !important">Investimento Compatível com o Mercado -</b> Faça seu Investimento com os Melhores Preços</p>
									</div>
									<div class="d-flex align-items-center pb-4 mb-4">
										<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 me-3" style="color:{{$conteudo[$contagem-1]->Color}} !important"></i>
										<p class="mb-0"><b class="text-color-dark" style="color:{{$conteudo[$contagem-1]->Color}} !important">Qualidade e Suporte -</b> Suporte Personalizado para Você</p>
									</div>
								</div>
								<div class="col-lg-4 offset-lg-2 position-relative">
									<div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="500" style="animation-delay: 500ms;">
										<img class="img-fluid ls-is-cached lazyloaded" src="img/landing/porto_dots2.png" data-src="img/landing/porto_dots2.png" alt="" style="position: absolute; bottom: -2%; left: -43%; transform: rotate(90deg)">
									</div>
									<img alt="Porto Support" src="img/landing/support_login.jpg" data-src="img/landing/support_login.jpg" class="img-fluid border border-width-10 border-color-light rounded box-shadow-3 ms-5 appear-animation ls-is-cached lazyloaded animated fadeInUp appear-animation-visible" data-appear-animation="fadeInUp" data-appear-animation-delay="200" style="width: 590px; max-width: none; animation-delay: 200ms;">
									<img alt="Porto Documentation" src="img/landing/porto_docs.jpg" data-src="img/landing/porto_docs.jpg" class="img-fluid rounded box-shadow-3 position-absolute appear-animation ls-is-cached lazyloaded animated fadeInUp appear-animation-visible" data-appear-animation="fadeInUp" data-appear-animation-delay="700" style="left: -100px; bottom: 50px; animation-delay: 700ms;">
								</div>
							</div>
						</div>
						<div class="section-angled-layer-bottom section-angled-layer-increase-angle" style="padding: 4rem 0; background: #222529;"></div>
					</section>				
@include('includes.footer')
