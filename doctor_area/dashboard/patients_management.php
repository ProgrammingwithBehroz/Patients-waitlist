<?php
include "../../includes/auth_check_doctor.php";
?>
<div class="card" dir="rtl">
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-lg-12 col-md-6">
                                    <div class="dataTables_filter" dir="rtl"><input type="text" id="live_search" class="form-control form-control-sm" placeholder="جستجو...">
                                    <div id = "searchresult"></div>
                                  </div>
                                </div></div>
                                    
                                    <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">شماره</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">نام بیمار</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">شماره تماس بیمار</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">تاریخ تولد بیمار</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">آدرس بیمار</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">تاریخچه بیماری بیمار</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">شماره عاجل بیمار</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php
                  $num = 0;
                  $user_id = $_SESSION['user_id'];
                  $select_doctor_id = "SELECT * from doctors_table where user_id = $user_id";
                  $result_doctor_id = mysqli_query($conn,$select_doctor_id);
                  $limit = 10;
                  $page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $previous = $page == 1 ? $page : $page - 1;
                  
                
                  $start = ($page - 1) * $limit;
                  
                  while ($row = mysqli_fetch_array($result_doctor_id)){
                    $doctor_id = $row['doctor_id'];
                    
                    $select_patient_id = "SELECT * from appointment_list where doctor_id = $doctor_id limit $start,$limit";
                    $result_patient_id = mysqli_query($conn,$select_patient_id);

                   

                    $select_patient_id_limit = "SELECT * from appointment_list where doctor_id = $doctor_id";
                    $result_patient_id_limit = mysqli_query($conn,$select_patient_id_limit);
                    
                    $num_of_rows = mysqli_num_rows($result_patient_id_limit);
                    $pages = ceil(($num_of_rows/$limit));
                    $next = $page < $pages ? $page + 1 : $page;

                    $num_of_rows_limit = mysqli_num_rows($result_patient_id_limit);

                    while($row = mysqli_fetch_array($result_patient_id)){
                        $num++;
                        $patient_id = $row['patient_id'];
                        
                      
                        $select_patients = "SELECT * from patients_table where patient_id = $patient_id";
                        $result_patients = mysqli_query($conn,$select_patients);
              
                  
                       
                        $row = mysqli_fetch_array($result_patients);
                        $name = $row['full_name'];
                        $phone = $row['phone_num'];
                        $date = $row['date_of_birth'];
                        $address = $row['address'];
                        $medical_history = $row['medical_history'];
                        $emergency_contact = $row['emergency_contact'];
                  ?>
                  <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0"><?php echo($num)?></td>
                    <td><?php echo($name)?></td>
                    <td><?php echo($phone)?></td>
                    <td><?php echo($date)?></td>
                    <td><?php echo($address)?></td>
                    <td><?php echo($medical_history)?></td>
                    <td><?php echo($emergency_contact)?></td>
                    <?php }}?>
                  </tr>
                </tbody>
                  <tfoot>
                  <tr><th rowspan="1" colspan="1">شماره</th><th rowspan="1" colspan="1">نام بیمار</th><th rowspan="1" colspan="1">شماره تماس بیمار</th><th rowspan="1" colspan="1">تاریخ تولد بیمار</th><th rowspan="1" colspan="1">آدرس بیمار</th><th rowspan="1" colspan="1">تاریخچه بیماری بیمار</th><th rowspan="1" colspan="1">شماره عاجل بیمار</th></tr>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite" >از 1 تا 10 نمایش داده میشود</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination">
                          <li class="paginate_button page-item previous" id="example2_previous"><a href="doctor_dashboard.php?management&page=<?= $previous;?>" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">قبل</a></li>
                          <?php for($i = 1; $i <= $pages; $i++) : ?>
                          <li class="paginate_button page-item "><a href="doctor_dashboard.php?management&page=<?= $i;?>" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link"><?= $i;?></a></li>
                          <?php endfor; ?>
                          <li class="paginate_button page-item next" id="example2_next"><a href="doctor_dashboard.php?management&page=<?= $next;?>" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">بعد</a></li></ul></div></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script type="text/javascript">
                                      $(document).ready(function(){
       
       $("#live_search").keyup(function(){
                             
            var input = $(this).val();
          
            
            if(input != ""){
                
                $.ajax({
                    
                    url:"patients_search.php",
                    method:"POST",
                    data:{input:input},
                    
                    success:function(data){
                        $("#searchresult").html(data); 
                    } 
                });  
            } else {
               
              $("#searchresult").css("display","none");
            }                    
       });  
   }); 
                                    </script>
