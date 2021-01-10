<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<a class="btn btn-secondary float-right" href="/create_batch"> Create Batch </a>
<div>
<h3> View All Available profesional courses </h3>
</div>

<?php if ($batches) :?>
<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
      <th> Course Name </th>
      <th>  Teacher Name</th>

      <th> Year of Batch</th>
      <th> Maximum Students </th>
      <th> Start Date </th>
      <th> End Date </th>
      <th> Batch Status </th>
      <th> Action </th>


  </tr>
</thead>
<tbody>

<?php foreach($batches as $batch){ ?>

<tr>

  <td> <?= $batch['batch_id_pk'] ?> </td>
  <td> <?= $batch['csname']?>  </td>
  <td> <?= $batch['firstname']." ".$batch['lastname']?>  </td>

  <td> <?= $batch['batch_year']?>  </td>
  <td> <?= $batch['max_students']?>  </td>
  <td> <?= $batch['start_date']?>  </td>
  <td> <?= $batch['end_date']?>  </td>

<td> <a href="#"></a>

</tr>
<?php } ?>

  </tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
<?= $this->endSection() ?>
