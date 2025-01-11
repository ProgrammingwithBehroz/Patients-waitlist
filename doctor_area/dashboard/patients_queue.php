<?php
include "../../includes/auth_check_doctor.php";
?>
<div class="card" dir="rtl">
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                  <thead>
                  <tr>
                  </th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">شماره
                </th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">نام مریض
                </th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">شماره صف
                </th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">تاریخ ملاقات
              </th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">زمان انتظار تقریبی
                  </th>
                </tr>
                  </thead>
                  <tbody>
                <?php
                $num = 0;
                $status = 'accepted';
                $user_id = $_SESSION['user_id'];
                $select_doctors = "SELECT * from doctors_table where user_id = $user_id";
                $result_doctors = mysqli_query($conn,$select_doctors);
                $row = mysqli_fetch_array($result_doctors);
                $doctor_id = $row['doctor_id'];

                $select_current_appointment = "SELECT * from appointment_list where doctor_id = ? and status = ?
                ORDER BY queue_number ASC limit 1";
                 $result_current_appointment = $conn->prepare($select_current_appointment);
                 $result_current_appointment->execute([$doctor_id,$status]);
                 $result = $result_current_appointment->get_result();
                 
                   
                 if($result->num_rows > 0){
                   $row = mysqli_fetch_array($result);
                   $current_queue_number = $row['queue_number']; 
                   
                  
                 }
                 $page = isset($_GET['page'])  ? $_GET['page'] : 1;
                 $limit = 10;
                 $start = ($page - 1) * $limit;
                 
                $select_appointments = "SELECT * from appointment_list where doctor_id = $doctor_id and status = 'accepted' limit $start,$limit";
                $result_appointments = mysqli_query($conn,$select_appointments);

                $select_appointments_limit = "SELECT * from appointment_list where doctor_id = $doctor_id and status = 'accepted'";
                $result_appointments_limit = mysqli_query($conn,$select_appointments_limit);

                $num_of_rows = mysqli_num_rows($result_appointments_limit);
                $pages = ceil(($num_of_rows/$limit));
                $next = $page < $pages ? $page + 1 : $page;
                $previous = $page > 1 ? $page - 1 : $page;
                while ($row = mysqli_fetch_array($result_appointments)){
                    $num++;
                    $queue_number = $row['queue_number'];
                    $date = $row['appointment_date'];
                    $patient_id = $row['patient_id'];
                    

                    $remaining_patients = $queue_number - $current_queue_number;

                    if ($remaining_patients > 0){
                      $estimated_time = $remaining_patients * 15;
                    } else {
                      $time = "زمان ملاقات نزدیک است";
                    }

                    $select_patients = "SELECT * from patients_table where patient_id = $patient_id";
                    $result_patients = mysqli_query($conn,$select_patients);

                    while ($row = mysqli_fetch_array($result_patients)){

                    $patient_name = $row['full_name'];
                    
                
                ?>
                  <tr class="odd">
                    <td class="sorting_1 dtr-control" tabindex="0"><?php echo($num)?></td>
                    <td class="sorting_1 dtr-control" tabindex="0"><?php echo($patient_name)?></td>
                    <td class="sorting_1 dtr-control" tabindex="0"><?php echo($queue_number)?></td>
                    <td class="sorting_1 dtr-control" tabindex="0"><?php echo($date)?></td>
                    <td class="sorting_1 dtr-control" tabindex="0"><?php if($remaining_patients > 0 ){echo($estimated_time);}else{echo($time);}?></td>
                    <?php }}?>
                  </tr><tr class="even">
</tbody>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div></div>
                <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination">
                  <li class="paginate_button page-item previous" id="example2_previous"><a href="./doctor_dashboard.php?patients&page=<?php echo($previous)?>" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">قبل</a></li>
                  <?php for($i = 1;$i <= $pages;$i++) : ?>
                      <li class="paginate_button page-item "><a href="./doctor_dashboard.php?patients&page=<?php echo($i)?>" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link"><?php echo ($i)?></a></li>
                  <?php endfor?>

                  
                  <li class="paginate_button page-item next" id="example2_next"><a href="./doctor_dashboard.php?patients&page=<?php echo($next)?>" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">بعد</a></li></ul></div></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>
