@extends('layouts.load')
@section('content')

						<div class="content-area">
							<div class="add-product-content">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area" id="modalEdit">
                        					@include('includes.admin.form-error') 
											<form id="geniusformdata" action="{{ route('admin-vendor-edit',$data->id) }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Email") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="email" class="input-field" name="email" placeholder="{{ __("Email Address") }}" value="{{ $data->email }}" disabled="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="shop_name" placeholder="{{ __("Shop Name") }}" required="" value="{{ $data->shop_name }}">
													</div>
												</div>




												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Details") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
													<textarea class="nic-edit" name="shop_details" placeholder="{{ __("Details") }}">{{ $data->shop_details }}</textarea> 
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Owner Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="owner_name" placeholder="{{ __("Owner Name") }}" required="" value="{{ $data->owner_name }}">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Number") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="shop_number" placeholder="{{ __("Shop Number") }}" required="" value="{{ $data->shop_number }}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Address") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="shop_address" placeholder="{{ __("Shop Address") }}" required="" value="{{ $data->shop_address }}">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Registration Number") }} </h4>
																<p class="sub-heading">{{ __("(This Field is Optional)") }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="reg_number" placeholder="Registration Number" value="{{ $data->reg_number }}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Message") }} </h4>
																<p class="sub-heading">{{ __("(This Field is Optional)") }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="shop_message" placeholder="{{ __("Message") }}" value="{{ $data->shop_message }}">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">{{ __("Submit") }}</button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection