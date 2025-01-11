<?php
include "../../includes/auth_check_patient.php";

$select_doctors = "SELECT * from doctors_table";
$result = mysqli_query($conn,$select_doctors);
$num = 0;
while ($row = mysqli_fetch_array($result)){
  $img = $row['image'];
  $name = $row['full_name'];
  $specialty = $row['specialty'];
  $fee = $row['consultation_fee'];
  $time = $row['available_hours'];
  $num++;
?>

<table class="table table-bordered mt-4" dir="rtl">
    <thead>
        <tr class="text-center">
            <th>شماره</th>
            <th>نام داکتر</th>
            <th>تصویر داکتر</th>
            <th>تخصص</th>
            <th>تایم کاری</th>
            <th>فیس داکتر</th>
        </tr>
    </thead>
    <tbody class="text-center">
                  <tr>
                  <td class="bg-secondary text-light"><?php echo($num)?></td>
                  <td class="bg-secondary text-light"><?php echo($name)?></td>
                  <td class="bg-secondary text-light"><img src="<?php echo "../../doctor_area/doctor_images/$img"?>" alt="" class="doctor_img"></td>
                  <td class="bg-secondary text-light"><?php echo($specialty)?></td>
                  <td class="bg-secondary text-light"><?php echo($time)?></td>
                  <td class="bg-secondary text-light"><?php echo($fee)?></td>
      </tr>
    </tbody>
</table>

<?php }?>
<!-- /.users-list -->

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<style>
  .doctor_img{
    width: 50px;
    object-fit: contain;
  }
</style>
</head>
<body>
<form action="" method="post" dir="rtl">
                <div class="card-body">
                  <div class="form-group">

                  <div class="form-group">

                        <label>انتخاب مریض</label>
                        <select class="form-control" name="patient" required>
                        <?php
                    $user_id = $_SESSION['user_id'];
                    $select_patients = "SELECT * from patients_table where user_id = $user_id ";
                    $result_patients = mysqli_query($conn,$select_patients);
                    while ($row = mysqli_fetch_array($result_patients)){
                      $name = $row['full_name'];
                      $id = $row['patient_id'];
                    
                    ?>
                          <option value="<?php echo($id)?>"><?php echo($name)?></option>
                          <?php }?>
                        </select>
                        
                        
                      </div>
                  
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectRounded">انتخاب داکتر</label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded" name="doctor" required>
                      <?php
                      $select_doctors = "SELECT * from doctors_table";
                      $result_doctors = mysqli_query($conn,$select_doctors);
                      while ($row1 = mysqli_fetch_array($result_doctors)){

                        $doctor_name = $row1['full_name'];
                        $doctor_id = $row1['doctor_id'];
                      ?>
                    <option value="<?php echo($doctor_id)?>"><?php echo($doctor_name)?></option>
                    <?php }?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="date">تاریخ ملاقات</label>
                    <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer mb-2">
                  <button type="submit" class="btn btn-success" name="appointment">رزرو نوبت</button>
                </div>
              </form>

<?php

if(isset($_POST['appointment']))
{
  $patient_id = $_POST['patient'];
  $doctor_id = $_POST['doctor'];
  $input_date = $_POST['date'];
  $days_of_week = date('w', strtotime($input_date));

  $date = DateTime::createFromFormat('m-d-Y', $input_date);

// Output the date in different formats
// echo $date->format('Y-m-d')."\n";

  $select = "SELECT * from appointment_list where appointment_date = '$input_date' and doctor_id = '$doctor_id'";
  $result_select = mysqli_query($conn,$select);
  $queue_number = mysqli_num_rows($result_select);
  $queue_number++;
  if($queue_number == 0){
    $queue_number++;
  }


  $status = "accepted";

  $select_date = "SELECT * from appointment_list where patient_id = $patient_id and appointment_date = '$input_date' and doctor_id = $doctor_id";
  $result_date = mysqli_query($conn,$select_date); 
  
  $count = mysqli_num_rows($result_date);
  $select_absences = "SELECT * from doctor_absences";
  $result_absences = mysqli_query($conn,$select_absences);
  
  while($row = mysqli_fetch_array($result_absences)){
    $absence_date = $row['absence_date'];
    $doctor_ida = $row['doctor_id'];

    
  }
  if($count == 0){
    if($days_of_week != 5){
      if($absence_date != $date){
          $insert_appointment = "INSERT into appointment_list (patient_id,doctor_id,appointment_date,queue_number,status)
          values ('$patient_id','$doctor_id','$input_date','$queue_number','$status')";
          $result_insert = mysqli_query($conn,$insert_appointment);
          if($result_insert){
            echo "<script>alert('نوبت مریض با موفقیت رزرو شد ! شماره صف انتظار' + $queue_number)</script>";
          }
      } else {
        echo "<script>alert('این داکتر در این تاریخ غیر حاظر است')</script>";
      }
        }  else {
          echo "<script>alert('داکتر ها روز جمعه کار نمیکنند لطفن یک تاریخ دیگری را انتخاب کنید!')</script>";
        }
        } else {
          echo "<script>alert('این مریض در این تاریخ در لیست انتظار موجود است')</script>";
        }



}


?>

</body>
</html>


