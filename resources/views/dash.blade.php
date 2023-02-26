
@include('includes.header')

@include('includes.top')

<section class="section section-no-border section-angled bg-color-light-scale-1 m-0">
						<div class="section-angled-layer-top section-angled-layer-increase-angle" style="padding: 5rem 0; background-color: #E7BE17;"></div>
						<div class="container py-5 my-5">
							<div class="row align-items-center text-center my-5">
								<div class="col-md-6">
									<h2 class="font-weight-bold text-9 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750" style="animation-delay: 200ms;">Simulador de Energia Solar</h2>
									<p class="font-weight-semibold text-primary text-4 fonts-weight-semibold positive-ls-2 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750" style="animation-delay: 600ms;">Economize Energia! Descubra o Quanto Você Pode Economizar Investindo em Energia Solar </p>
									<p class="pb-2 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" data-appear-animation-duration="750" style="animation-delay: 800ms;">Nós disponibilizamos o simulador de energia solar para você saber como este investimento pode ser rentável em sua cidade, faça sua simulação ou faça sua cotação gratuita para conferir nossos melhores pacotes para o seu estado.</p>
									<a href="#cotacao" class="btn btn-modern btn-gradient btn-rounded btn-px-5 py-3 text-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750" style="animation-delay: 1000ms;">Quero Fazer Minha Cotação</a>
								</div>
								<div class="col-md-6 position-relative py-5" id="simulador">

									<form class="contact-form" action="{{url('/')}}/dash/dash-envio" method="POST" style="background-color:white;box-shadow: 2px 2px 2px #ced4da;border-radius:20px;padding:50px" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="form-group col-lg-12">
												<input type="text" value="" placeholder="Nome da Empresa" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required="">
											</div>
										</div>
										<div class="row">
											<div class="form-group col-lg-6">
												<input type="text" value="" placeholder="Telefone" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="phone" required="">
											</div>
											<div class="form-group col-lg-6">
												<input type="email" value="" placeholder="E-mail" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required="">
											</div>
										</div>
                                        <div class="row">
											<div class="form-group col-lg-12">
												<input type="text" value="" placeholder="Cor padrão / Hexadecimal" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="color" required="">
											</div>
                                        <div class="row">

											<div class="form-group col-lg-6">
                                                <input type="file" class="form-control text-3 h-auto py-2" name="logo" accept="image/*">  
                                            </div>  
                                            <div class="form-group col-lg-6">
                                                <input type="file" class="form-control text-3 h-auto py-2" name="arquivo[]" multiple="multiple" accept="image/*">  
                                            </div>  
										</div>
										<div class="col-12">
									<ul>
                                
                                    </ul>


										
									</div>
										<div class="row">
											<div class="form-group col">
												<input type="submit" value="Enviar" class="btn btn-primary btn-modern" data-loading-text="Loading...">
											</div>
										</div>
									</form>




								</div>
							</div>
						</div>
					</section>
                 
                    @include('includes.footer')

                    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> -->
</x-app-layout>