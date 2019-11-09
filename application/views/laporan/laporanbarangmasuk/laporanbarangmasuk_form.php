<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Laporan Barang Masuk</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Laporan</li>
					<li class="breadcrumb-item"><?= ucfirst($page) ?></li>
				</ol>
			</div>
		</div>
	</div>
</div>

<?php $this->view('messages') ?>

<div class="card">
	<div class="card-header">
		<h3 class="box-title">
			<?= ucfirst($page) ?></h3>
		</h3>
		<div class="pull-right">
			<a href="#" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?= site_url('laporanbarangmasuk/process') ?>" method="post">
					<h6>Pilih bulan dan tahun</h6>
					<div class="form-group">
						<label>Bulan</label>
						<select name="month">
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<div class="input-group">
							<div class="input-group-prepend">
								
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>