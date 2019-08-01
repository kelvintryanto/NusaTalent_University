<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Student - Denah </title>
	{!! $data['css'] !!}
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom.css') }}">
</head>
<body>
	<?php echo $data['navbar'];?>
	<div class="page-container no-padding page-margin-top-xs">
		<!-- Page Content -->
		<div class="page-content">
			
			<?php echo $data['sidebar']; ?>
	
			<div class="content-wrapper">

				<div class="content denah-content-lg">
	
					<span class="text-danger"> <b> <i> *Note: Klik nomor booth untuk melihat perusahaan </i> </b> </span>

					<div class="panel-body denah-page-body-lg denah-page-body-xs">

						<div class="denah-container-14 denah-container-border-left">
						
							<div class="denah-grid-span-3 denah-container-border-top"></div>
						
							<div class="denah-grid-span-5 denah-container-border-top">
								<div class="denah-main-content">
									<label style="text-align: center;margin-top: 3%;margin-left: 37%;">
										<b> PANGGUNG </b> 
									</label>
								</div>
							</div>

							<div class="denah-grid-span-3 denah-container-border-top denah-container-border-right-2"> </div>

							<div class="denah-container-border-right-1 denah-container-border-top">
								<label class="denah-label-rotate-90 denah-label-14" style="margin-top: 34.7%;">
									<b> terasi </b>
								</label>
							</div>
						</div>
						
						<div class="denah-container-14 denah-container-border-left">
						
							<div class="denah-grid-span-3"></div>
						
							<div class="denah-grid-span-3" style="border: 1px solid black;background-color: #1E90FF;border-bottom: 0px;margin-top: 5%;">
								<label style="text-align: center;margin-top: 5%;margin-left: 30%;">
									<b> BANGKU </b> 
								</label>
							</div>
							<div class="denah-grid-span-5 denah-container-border-right-2"> </div>
							<div style="border-right: 1px solid black;border-bottom: 1px solid black;">
								<label class="denah-label-rotate-90 denah-label-14">
									<b> Regis </b>
								</label>
							</div>
						</div>

						<div class="denah-container-14 denah-container-border-left">
						
							<div class="denah-grid-span-3"></div>
						
							<div style="grid-column: span 3; border: 1px solid black;background-color: #1E90FF;height: 39px;">
								<label style="text-align: center;margin-top: 5%;margin-left: 30%;">
									<b> BANGKU </b> 
								</label>
							</div>
							<div style="grid-column: span 4;"> </div>
							<div style="background-color: #1E90FF;height: 50px;">
								<label style="text-align: center;margin-left: 8%;margin-top: 10%;">
									<b> Pintu <br>Masuk </b>
								</label>
							</div>
						</div>
						<?php $companyName = ""; ?>
						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(1, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(1, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;margin-top: 30%;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="1"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											1 
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											1 
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(14, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(14, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;margin-top: 30%;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="14"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											14
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											14
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(15, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(15, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;margin-top: 30%;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="15"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											15
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											15
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(28, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(28, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;margin-top: 30%;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="28"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											28
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											28
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(29, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(29, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;margin-top: 30%;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="29"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											29
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											29
										</b> 
									</label>
								@endif
							</div>
						</div>
						@if(!empty($data['boothNumber']))
							@if(in_array(2, $data['boothNumber']))
								<?php 
									$bgColor = "#7FFF00";
									$index = array_search(2, $data['boothNumber']);

									$companyName = $data['lstCompanyBooth'][$index]->companyName;
									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
								?>
							@else
								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
							@endif
						@endif
						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="2"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											2
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											2
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(13, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(13, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="13"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											13
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											13
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(16, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(16, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="16"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											16
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											16
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(27, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(27, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="27"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											27
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											27
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(30, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(30, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="30"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											30
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											30
										</b> 
									</label>
								@endif
							</div>
							<div style="grid-column: span 2;"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(36, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(36, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-top: 1.5px solid black;border-right: 2px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="36"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											36
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											36
										</b> 
									</label>
								@endif
							</div>
						</div>
						
						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(3, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(3, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="3"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											3
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											3
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(12, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(12, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="12"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											12
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											12
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(17, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(17, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="17"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											17
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											17
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(26, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(26, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="26"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											26
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											26
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(31, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(31, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="31"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											31
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											31
										</b> 
									</label>
								@endif
							</div>
							<div style="grid-column: span 2;"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(37, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(37, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-top: 1.5px solid black;border-right: 2px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="37"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											37
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											37
										</b> 
									</label>
								@endif
							</div>
							<div class="denah-grid-span-1"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(49, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(49, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="49"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											49
										</b>
									</label>
								</button>
								@else
									<label style="margin-left: 30%;padding-top: 10%;">
										<b> 
											49
										</b> 
									</label>
								@endif
							</div>
						</div>
						
						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(4, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(4, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="4"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											4
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											4
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(11, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(11, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="11"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											11
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											11
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(18, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(18, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="18"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											18
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											18
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(25, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(25, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="25"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											25
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											25
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(32, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(32, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="32"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											32
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											32
										</b> 
									</label>
								@endif
							</div>
							<div style="grid-column: span 2;"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(38, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(38, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-top: 1.5px solid black;border-right: 2px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="38"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											38
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											38
										</b> 
									</label>
								@endif
							</div>
							<div class="denah-grid-span-1"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(50, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(50, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="50"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											50
										</b>
									</label>
								</button>
								@else
									<label style="margin-left: 30%;padding-top: 10%;">
										<b> 
											50
										</b> 
									</label>
								@endif
							</div>
						</div>
						
						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(5, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(5, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="5"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											5
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											5
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(10, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(10, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="10"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											10
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											10
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(19, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(19, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="19"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											19
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											19
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(24, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(24, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="24"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											24
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											24
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(33, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(33, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="33"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											33
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											33
										</b> 
									</label>
								@endif
							</div>
							<div style="grid-column: span 2;"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(39, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(39, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-top: 1.5px solid black;border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="39"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											39
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											39
										</b> 
									</label>
								@endif
							</div>
							<div class="denah-grid-span-1"></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(51, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(51, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="51"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											51
										</b>
									</label>
								</button>
								@else
									<label style="margin-left: 30%;padding-top: 10%;">
										<b> 
											51
										</b> 
									</label>
								@endif
							</div>
						</div>
						
						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(6, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(6, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="6"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											6
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											6
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(9, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(9, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="9"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											9
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											9
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(20, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(20, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="20"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											20
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											20
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(23, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(23, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="23"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											23
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											23
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(34, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(34, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="34"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											34
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											34
										</b> 
									</label>
								@endif
							</div>
							<div style="grid-column: span 2;"></div>
							<div style="background-color: #1E90FF">
								<label style="text-align: center;margin-top: 9%;margin-left: 20%;">
									<b> Pintu </b> 
								</label>
							</div>
							<div>
								<label class="denah-label-rotate-90 denah-label-14" style="margin-left: 19%;margin-bottom: 0;margin-top: 25%;">
									<b> sar </b> 
								</label>
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(52, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(52, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="52"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											52
										</b>
									</label>
								</button>
								@else
									<label style="margin-left: 30%;padding-top: 10%;">
										<b> 
											52
										</b> 
									</label>
								@endif
							</div>
						</div>

						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(7, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(7, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-left: 1.5px solid black;border-top: 1.5px solid black;border-bottom: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="7"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											7
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											7
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(8, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(8, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="8"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											8
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											8
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(21, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(21, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div>
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="21"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											21
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											21
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							@if(!empty($data['boothNumber']))
								@if(in_array(22, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(22, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border-right: 1.5px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="22"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											22
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											22
										</b> 
									</label>
								@endif
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(35, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(35, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div>
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="35"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											35
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											35
										</b> 
									</label>
								@endif
							</div>
							<div style="grid-column: span 1;"></div>
							<div></div>
							<div style="background-color: #1E90FF">
								<label style="text-align: center;margin-top: 9%;margin-left: 10%;">
									<b> Keluar </b> 
								</label>
							</div>
							<div>
								<label class="denah-label-rotate-90 denah-label-14">
									<b> sela </b> 
								</label>
							</div>
							@if(!empty($data['boothNumber']))
								@if(in_array(53, $data['boothNumber']))
									<?php 
										$bgColor = "#7FFF00";
										$index = array_search(53, $data['boothNumber']);

										$companyName = $data['lstCompanyBooth'][$index]->companyName;
										$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
									?>
								@else
									<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
								@endif
							@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="53"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											53
										</b>
									</label>
								</button>
								@else
									<label style="margin-left: 30%;padding-top: 10%;">
										<b> 
											53
										</b> 
									</label>
								@endif
							</div>
						</div>
						@if(!empty($data['boothNumber']))
							@if(in_array(40, $data['boothNumber']))
								<?php 
									$bgColor = "#7FFF00";
									$index = array_search(40, $data['boothNumber']);

									$companyName = $data['lstCompanyBooth'][$index]->companyName;
									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
								?>
							@else
								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
							@endif
						@endif
						<div class="denah-container-14 denah-container-border-left">
							<div style="grid-column: span 10;"></div>
							<div style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 2px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="40"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											40
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											40
										</b> 
									</label>
								@endif
							</div>
						</div>

						<div class="denah-container-14 denah-container-border-left">
							<div></div>
							@if(!empty($data['boothNumber']))
    							@if(in_array(48, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(48, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="48"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											48
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											48
										</b> 
									</label>
								@endif
							</div>
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(47, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(47, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="47"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											47
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											47
										</b> 
									</label>
								@endif
							</div>
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(46, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(46, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="46"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											46
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											46
										</b> 
									</label>
								@endif
							</div>
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(45, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(45, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="45"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											45
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											45
										</b> 
									</label>
								@endif
							</div>
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(44, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(44, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="44"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											44
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											44
										</b> 
									</label>
								@endif
							</div>
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(43, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(43, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="43"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											43
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											43
										</b> 
									</label>
								@endif
							</div>
							
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(42, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(42, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="42"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											42
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											42
										</b> 
									</label>
								@endif
							</div>
							
							
							@if(!empty($data['boothNumber']))
    							@if(in_array(41, $data['boothNumber']))
    								<?php 
    									$bgColor = "#7FFF00";
    									$index = array_search(41, $data['boothNumber']);
    
    									$companyName = $data['lstCompanyBooth'][$index]->companyName;
    									$imagePath = $data['lstCompanyBooth'][$index]->imagePath;
    								?>
    							@else
    								<?php $bgColor = "white"; $companyName = ""; $imagePath = ""; ?>
    							@endif
    						@endif
							<div style="border: 1px solid black;">
								@if($companyName != "")
								<button type="button" style="border: 0px;width: 100%;background-color: {{$bgColor}}" class="toggle" data-img="{!! Storage::disk('s3')->url('companies/photo/'.$imagePath); !!}" data-name="{{$companyName}}" data-id="41"> 	
									<label style="text-align: center;margin-top: 5%;">
										<b> 
											41
										</b> 
									</label>
								</button>
								@else
									<label style="text-align: center;margin-top: 5%;margin-left: 40%;">
										<b> 
											41
										</b> 
									</label>
								@endif
							</div>
							<div></div>
							<div style="border-right: 2px solid black;"></div>
						</div>

						<div class="denah-container-14" style="padding-bottom: 2%;">
						    <div style="border-left: 2px solid black;border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
						    <div style="border-bottom: 2px solid black;"></div>
							<div style="border-bottom: 2px solid black;border-right: 2px solid black;padding-left: 92%;">
								<span> &nbsp;</span>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
		<!-- /Page Content -->
	</div>
	<?php echo $data['js']; ?>
	<script type="text/javascript">
		$(function()
		{
			$(".toggle").popover(
			{
				html:true,
				trigger: 'hover',
				content: function(){
					return '<img src="' + $(this).data('img') + '" style="width: 70px;height: 70px;margin-bottom: 15px;" /><br><label> <b> #' + $(this).data('id') + ' </b> - ' + $(this).data('name') + ' </label>';
				}
			});
		});
	</script>
</body>
</html>