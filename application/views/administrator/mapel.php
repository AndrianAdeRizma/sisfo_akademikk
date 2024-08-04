<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Daftar Mata Pelajaran
	</div> -->
	<?php echo $this->session->flashdata('pesan') ?>

	<div class="card shadow mb-2">
		<div class="card-body">
			<form action="<?= base_url('administrator/mapel') ?>" method="get">
				<div class="row">
					<div class="col-4">
						<select class="form-control js-example-basic-single" name="tahun_ajaran" data-placeholder="Pilih Tahun AJaran">
							<option value=""></option>
							<?php foreach ($get_tahun_ajaran as $thn) : ?>
								<option value="<?= $thn->id_tahun ?>"><?= $thn->tahun_ajaran ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-2">
						<button type="submit" class="btn btn-primary">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="card shadow">
		<div class="card-header">
			<a href="<?= base_url('administrator/mapel/tambah_mapel') ?>" class="btn btn-sm btn-primary mb-3">Tambah Mata Pelajaran</a>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
				<thead class="bg-primary text-white text-uppercase">
					<tr>
						<th>NO</th>
						<th>Nama Mapel</th>
						<th>Kode Mapel</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (!empty($mapel)) : ?>
						<?php
						foreach ($mapel as $key => $mp) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $mp->nama_mapel ?></td>
								<td><?= $mp->kode_mapel ?></td>
								<td><?= $mp->deskripsi ?></td>
								<td>
									<a href="<?= base_url('administrator/mapel/update/' . $mp->id_mapel); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
									<a href="<?= base_url('administrator/mapel/delete/' . $mp->id_mapel); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash"></i> Hapus</a>
									<a href="<?= base_url('administrator/mapel/detail/' . $mp->id_mapel); ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="8">Belum ada data mata pelajaran</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pt-4"></div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
	var options = {
		valueNames: ['no', 'nama_mapel', 'kode_mapel', 'deskripsi', 'nama_guru']
	};
	var mapelList = new List('mapel_table', options);
</script> -->
