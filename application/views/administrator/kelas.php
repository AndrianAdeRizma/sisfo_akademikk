<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Kelas
	</div> -->
	<?= $this->session->flashdata('pesan') ?>

	<!-- <div class="alert alert-info" role="alert">
		Tahun Ajaran: <?= isset($tahun_ajaran) ? $tahun_ajaran->tahun_ajaran : 'Belum ditentukan'; ?>
	</div> -->

	<div class="card shadow mb-2">
		<div class="card-body">
			<form action="<?= base_url('administrator/kelas') ?>" method="get">
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
						<button type="submit" class="btn btn-sm btn-primary mt-1"><i class="fas fa-search"></i> Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="card shadow">
		<div class="card-header">
			<a href="<?= base_url('administrator/kelas/tambah_kelas') ?>" class="btn btn-sm btn-primary mb-3 <?= isset($tahun_ajaran) ? '' : 'disabled'; ?> ">Tambah Kelas</a>
			<!-- <?= anchor('administrator/kelas/tambah_kelas', '<button class="btn btn-sm btn-primary mb-3 disabled">Tambah Kelas</button>') ?> -->
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
				<thead class="bg-primary text-white">
					<tr>
						<th>NO</th>
						<th>KODE KELAS</th>
						<th>NAMA KELAS</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (!empty($kelas)) : ?>
						<?php foreach ($kelas as $key => $kls) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $kls->kode_kelas ?></td>
								<td><?= $kls->nama_kelas ?></td>
								<td>
									<div class="btn-group" role="group" aria-label="Basic example">
										<?= anchor('administrator/kelas/update/' . $kls->id_kelas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</div>') ?>
										<?= anchor('administrator/kelas/delete/' . $kls->id_kelas, '<div class="btn btn-sm btn-danger mx-2"><i class="fa fa-trash"></i> Hapus</div>', ['onclick' => 'return confirm(\'Yakin ingin menghapus data ini?\')']); ?>
										<?= anchor('administrator/kelas/detail_kelas/' . $kls->id_kelas, '<div class="btn btn-sm btn-info"><i class="fa fa-info"></i> Lihat Siswa</div>') ?>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="4" align="center" class="text-danger">Belum ada data kelas</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<div class="pt-4"></div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
	var options = {
		valueNames: ['no', 'kode_kelas', 'nama_kelas']
	};
	var kelasList = new List('kelas_table', options);
</script> -->
