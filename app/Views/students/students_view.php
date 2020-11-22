<?= $this->extend('templates/main') ?>
<?= $this->Section('content') ?>

<div role="main" class="col-md ml-sm-auto col-lg-10 pt-3 px-4">

	<div class="d-flex justify-cotnet-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

<table class="table" >

   <thead class="thead-light">

  <tr>
      <th> ID# </th>
      <th> First Name </th>
      <th> Last Name </th>

      <th> Gender</th>

      <th> NIC </th>
      <th> Telphone </th>
      <th> Mobile </th>
      <th> </th>

  </tr>
</thead>
<tbody>

<?php foreach($students as $ss){ ?>
<tr>
  <td> <?= $ss{'userid'}?></td>
  <td> <?= $ss['firstname']?> </td>
  <td> <?= $ss['lastname']?>  </td>
  <td> <?= $ss['gender']?>  </td>

  <td> <?= $ss['nic']?>  </td>
  <td> <?= $ss['hometel']?>  </td>
  <td> <?= $ss['mobile']?>  </td>
  <td> <a class=" btn btn-primary" href="/accept"> Accept</a></td>
	<td> <a class=" btn btn-primary " href="/slug_view/<?=esc($ss['slug'],'url');?>"> View</a> </td>
</tr>



<?php } ?>
  </tbody>
</table>
</div>
</div>
<?= $this->endSection() ?>