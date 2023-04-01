@include('includes.header')
@include('includes.top')

@php
$json = file_get_contents(url('/').'/json_kw.json');
$conteudo = json_decode($json);
$contagem = count($conteudo);
//echo $conteudo[0]->kw;
$cities = 
	[	0 =>0,
		1 =>'Acre',
		2 =>'Alagoas',
		3 =>'Amapá',
		4 =>'Amazonas',
		5 =>'Bahia',
		6 =>'Ceará',
		7 =>'Espírito Santo',
		8 =>'Goiás',
		9 =>'Maranhão',
		10 =>'Mato Grosso',
		11 =>'Mato Grosso do Sul',
		12 =>'Minas Gerais',
		13 =>'Pará',
		14 =>'Paraíba',
		15 =>'Paraná',
		16 =>'Pernambuco',
		17 =>'Piauí',
		18 =>'Rio de Janeiro',
		19 =>'Rio Grande do Norte',
		20 =>'Rio Grande do Sul',
		21 =>'Rondônia',
		22 =>'Roraima',
		23 =>'Santa Catarina',
		24 =>'São Paulo',
		25 =>'Sergipe',
		26 =>'Tocantins',
		27 =>'Distrito Federal',
	];
@endphp

<div role="main" class="main" id="cotacao">
      					<section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" id="section-concept" style="background-image: url(img/landing/header-1.jpg); background-size: cover; background-position: center; animation-duration: 750ms; animation-delay: 300ms; animation-fill-mode: forwards;">
      						<div class="section-angled-layer-bottom bg-light" style="padding: 8rem 0;"></div>
      						<div class="container pt-5 mt-5">
      							<div class="row custom-header-min-height-1 align-items-center pt-3">
      								<div class="col-lg-5 mb-5">
      									<h1 class="font-weight-bold text-12 line-height-2 mb-3">Atualizar <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-light default-font font-weight-bold highlighted-word-animation-1-end">KW </span></h1>
      								</div>

      								<div class="col-lg-6" style="background-color:white;box-shadow: 2px 2px 2px #ced4da;border-radius:20px;padding:50px">
      							<h2 class="font-weight-bold text-8 mt-2 mb-0" style="color:black">Atualize as Taxas de KW Médio dos Estados</h2>
      							<form class="contact-form" action="{{url('/')}}/dash/kw-edit" method="POST">
                      @csrf
      								
									  <div class="row">
      									<div class="form-group col-lg-6">
												<input type="text" value="" placeholder="Valor de Kw" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="kw" required="">
											</div>
											
      							
									
      									<div class="form-group col-lg-6">

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
      									<div class="form-group col">
      										<input type="submit" value="Atualizar KW" class="btn btn-primary btn-modern" style="color: white;background-color:black"  data-loading-text="Loading...">
      									</div>
      								</div>
</div>
      								
										 

      								</div>
      								
      							</form>

      						</div>



      							</div>
      						</div>
      					</section>

                          <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Estado</th>
      <th scope="col">KW Atual</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i=1;$i< count($conteudo);$i++){ ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$cities[$i]}}</td>
      <td>{{$conteudo[$i]->kw}}</td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>

@include('includes.footer')
