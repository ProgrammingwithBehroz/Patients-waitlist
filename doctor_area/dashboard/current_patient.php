<?php
include "../../includes/auth_check_doctor.php";

$num = 1;
$user_id = $_SESSION['user_id'];
$status = 'accepted';
$dt = DateTime::createFromFormat('y', '24');
$current_date = date_format($dt,'y/m/d');

$select_doctors = "SELECT * from doctors_table where user_id = $user_id";
$result_doctors = mysqli_query($conn,$select_doctors);
$row = mysqli_fetch_array($result_doctors);
$doctor_id = $row['doctor_id'];



  $select_appointments = "SELECT * from appointment_list where doctor_id = ? and status = ?
and appointment_date = ? ORDER BY queue_number ASC LIMIT 1";
$result_appointments = $conn->prepare($select_appointments);
$result_appointments->execute([$doctor_id,$status,$current_date]);
$result = $result_appointments->get_result();

  
if($result->num_rows > 0){
  $row = mysqli_fetch_array($result);
  $date = $row['appointment_date'];   
$queue_number = $row['queue_number']; 
echo ($queue_number);               
$patient_id = $row['patient_id'];
$appointment_id = $row['appointment_id'];

$select_patients = "SELECT * from patients_table where patient_id = $patient_id";
$result_patients = mysqli_query($conn,$select_patients);

$row = mysqli_fetch_array($result_patients);

$patient_name = $row['full_name'];

echo "<div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body table-responsive p-0'>
                <table class='table table-hover text-nowrap'>
                  <thead>
                    <tr>
                      <th>شماره</th>
                      <th>نام بیمار</th>
                      <th>شماره صف</th>
                      <th>تکمیل ویزیت</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>$num</td>
                      <td>$patient_name</td>
                      <td>$queue_number</td>
                      <td><a href='./complete_queue.php?appointment_id=$appointment_id'><i class='bi bi-check-lg'></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>";

} else {
  echo "<h1 class='text-center text-danger mt-5'>بیمار ی در حال ویزیت وجود ندارد</h1>";
}


?>


