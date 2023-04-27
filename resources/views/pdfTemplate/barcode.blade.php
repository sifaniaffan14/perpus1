<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<svg id="barcode"></svg>
	<table class="w-100">
		<tbody>
			<?php foreach ($operation as $key => $val) :
				if (count($operation) == 1): ?>
					<tr>
						<td class="w-50 pt-3">
							<table class="table table-bordered mx-auto" style="width:65%">
								<tr>
									<td class="border-dark text-center p-0" style="font-size:13px">
										<p class="m-0 mt-1 mb-2">Perpustakaan SMP AL-FALAH</p>
										<p class="m-0 mb-1">KETINTANG, SURABAYA</p>
									</td>
								</tr>
								<tr>
									<td class="border-dark p-0">
										<div class="text-center mx-auto">
											@php
											$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
											@endphp
											<div class="mt-4 mx-auto" style="width:125px; height:55px">
												<img class="w-100 h-100" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($val['eksemplar_id'], $generatorPNG::TYPE_CODE_128)) }}">
											</div>
											<p class="mb-0" style="font-size:11px">{{$val['no_panggil']}}</p>
											<p class="mt-2" style="font-weight:bold; font-size:13px">{{$val['nama_kategori']}}</p>
										</div>
									</td>
								</tr>
							</table>
						</td>
						<td></td>
					</tr>
				<?php else:
					if ($key % 2 == 0):?>	
						<tr>
							<td class="w-50 pt-3">
								<table class="table table-bordered mx-auto" style="width:65%">
									<tr>
										<td class="border-dark text-center p-0" style="font-size:13px">
											<p class="m-0 mt-1 mb-2">Perpustakaan SMP AL-FALAH</p>
											<p class="m-0 mb-1">KETINTANG, SURABAYA</p>
										</td>
									</tr>
									<tr>
										<td class="border-dark p-0">
											<div class="text-center mx-auto">
												@php
												$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
												@endphp
												<div class="mt-4 mx-auto" style="width:125px; height:55px">
													<img class="w-100 h-100" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($val['eksemplar_id'], $generatorPNG::TYPE_CODE_128)) }}">
												</div>
												<p class="mb-0" style="font-size:11px">{{$val['no_panggil']}}</p>
												<p class="mt-2" style="font-weight:bold; font-size:13px">{{$val['nama_kategori']}}</p>
											</div>
										</td>
									</tr>
								</table>
							</td>
					<?php else: ?>
							<td class="w-50 pt-3">
							<table class="table table-bordered mx-auto" style="width:65%">
									<tr>
										<td class="border-dark text-center p-0" style="font-size:13px">
											<p class="m-0 mt-1 mb-2">Perpustakaan SMP AL-FALAH</p>
											<p class="m-0 mb-1">KETINTANG, SURABAYA</p>
										</td>
									</tr>
									<tr>
										<td class="border-dark p-0">
											<div class="text-center mx-auto">
												@php
												$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
												@endphp
												<div class="mt-4 mx-auto" style="width:125px; height:55px">
													<img class="w-100 h-100" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($val['eksemplar_id'], $generatorPNG::TYPE_CODE_128)) }}">
												</div>
												<p class="mb-0" style="font-size:11px">{{$val['no_panggil']}}</p>
												<p class="mt-2" style="font-weight:bold; font-size:13px">{{$val['nama_kategori']}}</p>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>