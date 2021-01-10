<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>


				<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
					</div>
							<?php endif; ?>
Admin  Dashboard


<?= $this->endSection() ?>
