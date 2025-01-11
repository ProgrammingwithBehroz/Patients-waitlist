<?php
include "../../includes/auth_check_patient.php";
if(isset($_POST['add_patient'])) {
$full_name = $_POST['full_name'];
$number = $_POST['phone'];
$birth_date = $_POST['birth_date'];
$address = $_POST['address'];
$medical_history = $_POST['medical_history'];
$emergency_phone = $_POST['emergency_phone'];
$user_id = $_SESSION['user_id'];

$insert_query = "INSERT into patients_table (user_id,full_name,phone_num,date_of_birth,address,medical_history,emergency_contact)
values ($user_id,'$full_name','$number','$birth_date','$address','$medical_history','$emergency_phone')";
$result = mysqli_query($conn,$insert_query);

}

?>


<div class="card card-primary" dir="rtl">

              <!-- form start -->
              <form method="post" class="">
                <div class="card-body" dir="rtl">
                <div class="form-group" >
  <label for="name">نام کامل</label>
  <input type="text" class="form-control" id="name" name="full_name"
   placeholder="نام کامل خود را وارد کنید" required="required" autocomplete="off">
</div>
<div class="form-group">
  <label for="date" class="form-label">تاریخ تولد</label>
  <input type="text" class="form-control" id="date"
   name="birth_date" required="required" placeholder="تاریخ تولد خود را وارد کنید" autocomplete="off">
</div>
<div class="form-group">
  <label for="number" class="form-label">شماره تماس</label>
  <input type="text" class="form-control" id="number" name="phone"
   required="required" placeholder="شماره تماس خود را وارد کنید" autocomplete="off">
</div>
<div class="form-group">
  <label for="address" class="form-label">آدرس</label>
  <input type="text" class="form-control" id="address"
   name="address" required="required" placeholder="آدرس خود را وارد کنید" autocomplete="off">
</div>
<div class="form-group">
  <label for="history" class="form-label">تاریخچه بیماری</label>
  <textarea class="form-control" id="history"
   rows="3" required="required" placeholder="تاریخچه مریضی خود را بنویسید" autocomplete="off" name="medical_history"></textarea>
</div>
<div class="form-group">
  <label for="emergency" class="form-label">شماره تماس عاجل</label>
  <input type="text" class="form-control" id="emergency"
   name="emergency_phone" required="required" placeholder="شماره تماس یکی را وارد کنید" autocomplete="off">
</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-success" name="add_patient">ثبت نام بیمار</button>
                </div>
              </form>
            </div>
            






