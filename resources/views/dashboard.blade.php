
@include('includes.header')

<link rel="stylesheet" href="<?php echo url('/');?>/public/build/assets/app.32ff9cdf.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<section class="section section-no-border section-angled bg-color-light-scale-1 m-0">
						<div class="section-angled-layer-top section-angled-layer-increase-angle" style="padding: 5rem 0; background-color: #E7BE17;"></div>
						<div class="container py-5 my-5">
							<div class="row align-items-center text-center my-5">
								<div class="col-md-6">
									<h2 class="font-weight-bold text-9 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750" style="animation-delay: 200ms;">Dashboard</h2>
									<p class="font-weight-semibold text-primary text-4 fonts-weight-semibold positive-ls-2 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750" style="animation-delay: 600ms;">Insira as informações da empresa de energia solar </p>
									<a href="{{url('/')}}" class="btn btn-modern btn-gradient btn-rounded btn-px-5 py-3 text-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-appear-animation-duration="750" style="animation-delay: 1000ms;">Voltar para a Página Inicial</a>
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

											<div class="form-group col-lg-12">
                                            <label>Logotipo Tam. 250px X 60px - Somente PNG</label>
                                                <input type="file" class="form-control text-3 h-auto py-2" name="logo" accept="image/*">  
                                            </div>  
                                            <div class="form-group col-lg-12">
                                                <label>Portfólio Tam. 700px X 700px</label>
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
					<script src="{{url('/')}}/public/build/assets/app.2896b7a8.js"></script>

                    @include('includes.footer')



    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> -->
</x-app-layout>
