<div class="container-fluid">
	<!-- <h2>Daftar Ekstrakurikuler</h2>
	<div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Ekstrakurikuler
	</div> -->
	<!-- <div class="alert alert-info" role="alert">
		Tahun Ajaran: <?php echo isset($tahun_ajaran) ? $tahun_ajaran->tahun_ajaran : 'Belum ditentukan'; ?>
	</div> -->
	<?php if ($this->session->flashdata('pesan') && !strpos($this->session->flashdata('pesan'), 'field harus diisi')) : ?>
		<?php echo $this->session->flashdata('pesan'); ?>
	<?php endif; ?>

	<div class="card shadow">
		<div class="card-header">
			<a href="<?php echo base_url('administrator/ekstra/tambah'); ?>" class="btn btn-primary mb-3">Tambah Ekstrakurikuler</a>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-responsive table-bordered table-striped table-hover">
				<thead class="bg-primary text-white text-uppercase">
					<tr>
						<th>No</th>
						<th>Nama Ekstrakurikuler</th>
						<th>Deskripsi</th>
						<th>Guru Pembimbing</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($ekstra as $key => $ek) : ?>
						<tr>
							<td><?= $key + 1; ?></td>
							<td><?= $ek->nama_ekstra; ?></td=>
							<td><?= $ek->deskripsi; ?></td>
							<td><?= $ek->nama_guru; ?></td>
							<td>
								<a href="<?= base_url('administrator/ekstra/update/' . $ek->id_ekstra); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
								<a href="<?= base_url('administrator/ekstra/delete/' . $ek->id_ekstra); ?>" class="btn btn-sm btn-danger mx-1" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
								<a href="<?= base_url('administrator/ekstra/detail/' . $ek->id_ekstra); ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pt-4"></div>
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
	var options = {
		valueNames: ['no', 'nama_ekstra', 'deskripsi', 'guru_pembimbing']
	};
	var ekstraList = new List('ekstra_table', options);
</script> -->
