@include('includes.header')
@include('includes.top')
<?php
$taxas = [
	0=>45,
	1=>55,
	2=>65,
	3=>45
];

// $taxas['monofasico'];
$irradiacao_solar_media = 4.48;
$placa_padrao = 405;
$media_kw =[
  0 => 0,
  1 => 0.73,
  2 => 0.75,
  3 => 0.83,
  4 => 0.72,
  5 => 0.74,
  6 => 0.70,
  7 => 0.76,
  8 => 0.71,
  9 => 0.67,
  10 => 0.65,
  11 => 0.69,
  12 => 0.80,
  13 => 0.81,
  14 => 0.87,
  15 => 0.56,
  16 => 0.70,
  17 => 0.74,
  18 => 0.57,
  19 => 1.03,
  20 => 0.66,
  21=> 0.65,
  22=> 0.73,
  23 => 0.64,
  24 => 0.62,
  25 => 0.73,
  26 => 0.70,
  27 => 0.69
];
$tipo_da_rede =[
  0 => 0,
  1 => 'Monofásico',
  2 => 'Bifásico',
  3 => 'Trifásico'
];

$local_instalacao = [
  0 => 0,
  1 => 'Residencial',
  2 => 'Comercial',
  3 => 'Industrial',
  4 => 'Agro'
];
// Taxa Listada pelo Usuário
for($i=0;$i<=count($taxas);$i++){
	if($i == $network_type){
	  $taxa_listada = $taxas[$i];
	}
  }

//Média KW do Estado Selecionado pelo Usuário
for($i=0;$i<=count($media_kw);$i++){
  if($i == $state){
    $media_kw_state = $media_kw[$i];
  }
}

// Tipo da Rede Selecionado pelo Usuário
for($j=0; $j<=count($tipo_da_rede);$j++){
  if($j == $network_type){
    $tipo_da_rede_listado = $tipo_da_rede[$j];
  }
}

// Local da Instalação da Rede Selecionado pelo Usuário
for($k=0; $k<=count($local_instalacao);$k++){
  if($k == $local){
    $local_instalacao_listado = $local_instalacao[$k];
  }
}

// Calculos de Consumo
$consumo_em_reais = floatval($price)-floatval($taxas);
$consumo_kwh = $consumo_em_reais/$media_kw_state;
$consumo_diario = $consumo_kwh/30.41;
$potencia = ($consumo_diario/$irradiacao_solar_media)/0.8;
$numero_de_placas = ($potencia * 1000)/$placa_padrao;
$potencia_nominal = $numero_de_placas*$placa_padrao;
$potencia_produzida = ((($numero_de_placas*$placa_padrao/1000)*$irradiacao_solar_media)*0.8)*30.41;
$arvores_plantadas = ($potencia_produzida*12*5.05)/1000;
$carvao_reduzido = ($potencia_produzida * 12 * 0.7097)/1000;
$co2 = ($potencia_produzida*12*0.1258)/1000;


$pot = ($potencia_nominal/1000);

        if($pot >= 0 && $pot < 2){
            $custo_instalacao  = $pot * 6000;
        }else if($pot >=2  && $pot <4){
            $custo_instalacao  = $pot * 5000;
        }else if($pot >= 4 && $pot <= 8 || $pot > 8){
            $custo_instalacao = $pot * 4000;
        }else{
            $custo_instalacao = 0;
        }

        $economia = (($consumo_em_reais * 12) - ($taxa_listada * 12));
        $payback = $custo_instalacao / $economia;
        $taxa_de_retorno = ($economia / $custo_instalacao)*100;
        $custo_por_kwh_instalacao = $custo_instalacao / ($potencia_produzida * 12 * 25);


		// let economia = ((resultadoSimulacao["consumoReais"] * 12) - (VAL_PADRAO["taxas"][valoresSelecionados.tipo_instalacao] * 12));
        // resultadoSimulacao["payback"] = resultadoSimulacao["custoInstalacao"] / economia;
        // resultadoSimulacao["taxaDeRetorno"] = (economia / resultadoSimulacao["custoInstalacao"])*100;
        // resultadoSimulacao["custoPorKwhInstalacao"] = resultadoSimulacao["custoInstalacao"] / (resultadoSimulacao["potenciaProduzida"] * 12 * 25);


?>

<!-- resultadoSimulacao["numeroDePlacas"] = Math.round((resultadoSimulacao["potencia"] * 1000) / VAL_PADRAO["placaPadrao"]);
        resultadoSimulacao["potenciaNominal"] = resultadoSimulacao["numeroDePlacas"] * VAL_PADRAO["placaPadrao"];
        resultadoSimulacao["potenciaProduzida"] = ((((resultadoSimulacao["numeroDePlacas"] * VAL_PADRAO["placaPadrao"]) / 1000) * VAL_PADRAO["irradiaçaoSolarMedia"]) * 0.8) * 30.41;
        resultadoSimulacao["arvoresPlantadas"] = (resultadoSimulacao["potenciaProduzida"] * 12 * 5.05) / 10000;
        resultadoSimulacao["carvaoReduzido"] = (resultadoSimulacao["potenciaProduzida"] * 12 * 0.7097) / 1000;
        resultadoSimulacao["co2"] = (resultadoSimulacao["potenciaProduzida"] * 12 * 0.1258) / 1000; -->


<!-- 

Irradiação Solar Média: 4,48
MédiaKW: (Fazer por Estado)
Placa Padrão: 405

Consumo em Reais = consumo - taxa
Consumo KWH = Consumo em Reais / MédiaKW
Consumo Diário = Consumo KWH/30.41
Potência = (Consumo Diário / Irradiação Solar Média)/0.8
Numero de Placas = (Potência * 1000) / Placa Padrão 

Potencia Nominal = Número de Placas * Placa Padrão
Potencia Produzida = ((((Número de Placas * Placa Padrão)/1000)* Irradiação Padrão Média)*0,8)*30,41
Arvores Plantadas = (Potencia Produzida * 12 * 5,05)/1000
Carvão Reduzido = (Potencia Produzida * 12 * 0,7097)/1000
CO2 = (Potencia Produzida * 12 * 0,1258)/1000




-->


      			<div role="main" class="main">
      					<section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" id="section-concept" style="background-image: url(img/landing/header-1.jpg); background-size: cover; background-position: center; animation-duration: 750ms; animation-delay: 300ms; animation-fill-mode: forwards;">
      						<div class="section-angled-layer-bottom bg-light" style="padding: 8rem 0;"></div>
      						<div class="container pt-5 mt-5">
      							<div class="row custom-header-min-height-1 align-items-center pt-3">
      								<div class="col-lg-5 mb-5">
      									<h1 class="font-weight-bold text-12 line-height-2 mb-3">Resultado da sua <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-light default-font font-weight-bold highlighted-word-animation-1-end">Simulação </span></h1>
      									<p class="custom-font-size-1 pt-2">Saiba quanto você pode economizar com Energia Solar</p>
      								</div>




      							<div class="col-lg-6" style="background-color:white;box-shadow: 2px 2px 2px #ced4da;border-radius:20px;padding:50px">
      							<h2 class="font-weight-bold text-8 mt-2 mb-0" style="color:black">Bem vindo, {{$name}}.</h2>
      							<p class="mb-4">Veja o resultado da sua simulação</p>
								  <div class="row align-items-center text-center">
<div class="card col-md-6">
  <div class="card-body">
  <i class="fa-solid fa-plug-circle-bolt"  style="font-size: 60px;color:#E7BE17"></i>
	<p class="card-text" style="color:black">{{number_format($potencia_nominal);}} KWp</p>
	<h5 class="card-title" style="color:black">Potência Nominal</h5>

  </div>
</div>

<div class="card col-md-6">
  <div class="card-body">
  <i class="fa-solid fa-solar-panel" style="font-size: 60px;color:#E7BE17"></i>
	<p class="card-text" style="color:black">{{intval($numero_de_placas)}} Módulos</p>
	<h5 class="card-title" style="color:black">Número de Placas</h5>

  </div>
</div>

      						</div>



      							</div>
      						</div>
      					</section>


                

<section class="section section-no-border section-angled bg-color-light-scale-1 m-0" id="simulador">
  <div class="container py-5 my-5">
  <h2 class="font-weight-bold text-9 mb-1 text-center"style="padding-top:-50px;padding-bottom:50px">Viabilidade Econômica</h2>

    <div class="row align-items-center text-center">


        <div class="card col-md-4">
          <div class="card-body">
          <i class="fa fa-bolt"  style="font-size: 60px;color:#E7BE17"></i>
            <h5 class="card-title">Custo em Kw com a Instalação R${{number_format($custo_por_kwh_instalacao,2)}}/kWh</h5>
            <p class="card-text">Sem a Instalação o Custo em kWh fica em {{number_format($media_kw_state,2)}}/KWH</p>

          </div>
        </div>

        <div class="card col-md-4">
          <div class="card-body">
          <i class="fa fa-line-chart"  style="font-size: 60px;color:#E7BE17"></i>
            <h5 class="card-title">Taxa de Retorno Em {{number_format($taxa_de_retorno,2)}}% ao Ano</h5>
            <p class="card-text">A taxa SELIC Atualmente está em 13,75% ao Ano<br>Já a Poupança está em 6,17% ao Ano</p><br>


          </div>
        </div>


        <div class="card col-md-4">
          <div class="card-body">
          <i class="fa fa-rocket"  style="font-size: 60px;color:#E7BE17"></i>
            <h5 class="card-title">Payback em {{number_format($payback,2)}} Anos</h5>
            <p class="card-text">Tempo Aproximado de Retorno Sobre o Investimento</p>

          </div>
        </div>



    </div>
  </div>
</div>
</section>


<section class="section section-no-border section-angled bg-color-light-scale-1 m-0" id="simulador">
<div class="section-angled-layer-top section-angled-layer-increase-angle" style="padding: 5rem 0; background-color: #E7BE17;"></div>
  <div class="container py-5 my-5">
  <h2 class="font-weight-bold text-9 mb-1 text-center"style="padding-top:-50px;padding-bottom:50px">Sua Conta de Energia para os Próximos Meses</h2>


  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sem Energia Solar</th>
      <th scope="col">Com Energia Solar</th>
      <th scope="col">Economia</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Mensal</th>
      <td>R${{number_format($price,2)}}</td>
      <td>R${{number_format(($price-$economia/12),2)}}</td>
      <td>R${{number_format(($economia/12),2)}}</td>
    </tr>
    <tr>
      <th scope="row">Anual</th>
      <td>R${{number_format($price*12,2)}}</td>
      <td>R${{number_format(($price*12)-$economia,2)}}</td>
      <td>R${{number_format(($economia),2)}}</td>
    </tr>
    <tr>
      <th scope="row">25 Anos</th>
      <td>R${{number_format($price*300,2)}}</td>
      <td>R${{number_format(($price*300)-$economia*25,2)}}</td>
      <td>R${{number_format(($economia*25),2)}}</td>
    </tr>
  </tbody>
</table>


  </div>
</div>
</section>


<section id="support" class="section section-angled bg-light border-0 m-0 position-relative pt-0">
						<div class="container pb-5 pt-5 mb-5">
							<div class="row align-items-center mb-5">
								<div class="col-lg-6 pe-xl-5 mb-5 mb-lg-0">
									<h2 class="font-weight-bold text-9 mb-1">Sustentabilidade com Energia Limpa</h2>
									<h5 class="font-weight-semibold positive-ls-2 text-4 text-primary mb-3" style="color:#F7941D !important">Adquirindo energia solar você também ajuda o meio ambiente!</h5>
									<p class="ls-0 text-default fw-400 mb-5">* Os dados são apenas para fins demonstrativos</p>
									<div class="d-flex align-items-center border border-top-0 border-end-0 border-start-0 pb-4 mb-4">
										<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 me-3"style="color:#F7941D !important"></i>
										<p class="mb-0"><b class="text-color-dark">Menos {{number_format($co2,2)}} ton CO2 </b>Na Atmosfera, Graças a Energia Limpa</p>
									</div>
									<div class="d-flex align-items-center border border-top-0 border-end-0 border-start-0 pb-4 mb-4">
										<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 me-3" style="color:#F7941D !important"></i>
										<p class="mb-0 mb-0"><b class="text-color-dark">Teremos mais {{number_format($arvores_plantadas,2)}} </b> Árvores Plantadas Equivalentes no Meio Ambiente</p>
									</div>
									<div class="d-flex align-items-center pb-4 mb-4">
										<i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 me-3" style="color:#F7941D !important"></i>
										<p class="mb-0"><b class="text-color-dark">Menos {{number_format($carvao_reduzido)}} Toneladas de Carvão-</b> em Termoelétricas</p>
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
