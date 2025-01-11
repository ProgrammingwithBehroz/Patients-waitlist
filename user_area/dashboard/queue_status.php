<?php
include "../../includes/auth_check_patient.php";

$select_absences = "SELECT * from doctor_absences where absence_date >= CURDATE()";
$result_absences = mysqli_query($conn,$select_absences);
$now = date('y-m-d');

while($row = mysqli_fetch_array($result_absences)){
  $doctor_ida = $row['doctor_id'];
  $absence_date = $row['absence_date'];

  $select_doctor = "SELECT * from doctors_table where doctor_id = $doctor_ida";
  $result_doctor = mysqli_query($conn,$select_doctor);

  if(mysqli_num_rows($result_absences) > 0){
    echo "<h3 dir='rtl' class='text-danger'>اعلان های مهم</h3>";
  }
    
    while($row = mysqli_fetch_array($result_doctor)){
      $doctor_name = $row['full_name'];
      echo "<div class='alert' dir='rtl'>";
        echo "دکتر <strong>" . $doctor_name . "</strong> در تاریخ <strong>" . $absence_date . "</strong> حظور ندارد.";
        echo "</div>";
    }
}

?>


<div class="card" dir="rtl">

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>شماره</th>
                      <th>نام مریض</th>
                      <th>شماره انتظار</th>
                      <th>تاریخ ملاقات</th>
                      <th>نام داکتر</th>
                      <th>زمان تقریبی</th>
                      <th>بیرون شدن ار صف</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <?php
                        $user_id = $_SESSION['user_id'];
                        $num = 0;
                        $status = 'accepted';



                        $select_patients = "SELECT * from patients_table where user_id = $user_id";
                        $result_patients = mysqli_query($conn,$select_patients);
                        while ($row = mysqli_fetch_array($result_patients)){
                            
                            $name = $row['full_name'];
                            $patient_id = $row['patient_id'];
                            

                        
                            $select_appointments = "SELECT * from appointment_list where patient_id = $patient_id";
                            $result_appointments = mysqli_query($conn,$select_appointments);


                            while ($row = mysqli_fetch_array($result_appointments)){
                                $num++;
                                $queue_number = $row['queue_number'];
                                $date = $row['appointment_date'];
                                $doctor_id = $row['doctor_id'];
                                $appointment_id = $row['appointment_id']; 
                               

                                $select_current_appointment = "SELECT * from appointment_list where status = ?
                                ORDER BY queue_number ASC limit 1";
                                 $result_current_appointment = $conn->prepare($select_current_appointment);
                                 $result_current_appointment->execute([$status]);
                                 $result = $result_current_appointment->get_result();
                                 
                                   
                                 if($result->num_rows > 0){
                                   $row = mysqli_fetch_array($result);
                                   $current_queue_number = $row['queue_number']; 
                                 
                                  
                                 }

                                $remaining_patients = $queue_number - $current_queue_number;
                               

                                if ($remaining_patients > 0){
                                  $estimated_time = $remaining_patients * 15;
                                } else {
                                  $time = "زمان ملاقات نزدیک است";
                                }

                                $select_doctors = "SELECT * from doctors_table where doctor_id = $doctor_id";
                                $result_doctors = mysqli_query($conn,$select_doctors);
        
                                $row1 = mysqli_fetch_array($result_doctors);
                                $doctor_name = $row1['full_name'];
                        ?>
                        <td><?php echo($num)?></td>
                      <td><?php echo($name)?></td>
                      <td><?php echo($queue_number)?></td>
                      <td><?php echo($date)?></td>
                      <td><?php echo($doctor_name)?></td>
                      <td><?php if($remaining_patients > 0 ){echo($estimated_time);}else{echo($time);}?></td>
                      <td><a href=<?php echo "./exit_from_queue.php?appointment_id=$appointment_id"?> onclick="return confirmation();">بلی</a></td>
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">

function confirmation()
{
    var del=confirm("آیا مطمعن هستین؟");
    if (del==true){
}
    return del;
}

</script>



