<?php namespace App\Models\Batch;

use CodeIgniter\Model;


class BatchModel extends Model {
  protected $table ='tbl_batch';
  protected $primaryKey = 'batch_id_pk';
  protected $allowedFields = ['course_id_fk','batch_code','teacher_batch_id_fk','batch_year','current_students','max_batch_students','batch_status','start_date','end_date'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];




    public function get_all_batches()
    {



      $this->select('*');
      $this->join('tbl_users','tbl_users.user_id_pk=tbl_batch.teacher_batch_id_fk');
      $this->select('tbl_users.user_id_pk,tbl_users.firstname,tbl_users.lastname');
      $this->join('tbl_courses','tbl_courses.cs_id_pk=tbl_batch.course_id_fk');
     $this->select('tbl_courses.csname');
      $batches = $this->get()->getResultArray();
      return $batches;
    }

    public function get_all_batches_by_courseId($id)
    {

        $this->select('*');
      $this->join('tbl_courses', ' tbl_courses.cs_id_pk=tbl_batch.course_id_fk');
      $this->where('tbl_courses.cs_id_pk',$id);
     $batches = $this->get()->getResultArray();
     return $batches;
    }

    public function selectbatch($id)
    {
        $this->select('*');
        $this->join('tbl_users','tbl_users.user_id_pk=tbl_batch.teacher_batch_id_fk');
          $this->select('tbl_users.user_id_pk,tbl_users.firstname,tbl_users.lastname');
      $this->where('batch_id_pk',$id);
       $batches = $this->first();
   return $batches;
    }

    public function course_slug($id)
    {
        $this->select('csslug');
        $this->join('tbl_courses','tbl_courses.cs_id_pk=tbl_batch.course_id_fk');
        $this->where('batch_id_pk',$id);
         $batches = $this->first();
     return $batches;

    }

}
