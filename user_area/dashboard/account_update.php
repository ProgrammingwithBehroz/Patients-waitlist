<?php

$user_id = $_SESSION['user_id'];
$select = "SELECT * from users_table where user_id = $user_id";
$result = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($result);

$usernameu = $row['username'];
$emailu = $row['email'];
$password = $row['password'];

if(isset($_POST['update'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $past_password = sha1($_POST['past_password']);


    $select_all = "SELECT * from users_table where (email = '$email' or username = '$username') and user_id != $user_id";
    $result_all = mysqli_query($conn,$select_all);
    $row = mysqli_num_rows($result_all);
    echo($row);
    if($row > 0) {
        echo "<script>alert('این کاربر موجود است')</script>";
    } else {
        if($past_password == $password){
            $update = "UPDATE users_table set username = '$username', email = '$email' where user_id = $user_id";
            $result_update = mysqli_query($conn,$update);
            if($result_update){
                echo "<script>alert('ویرایش با موفقیت انجام شد')</script>";
                echo "<script>window.open('patient_dashboard.php?edit_account','_self')</script>";
            }
        } else {
            echo "<script>alert('رمز عبور قبلی درست نمی باشد')</script>";
        }
    }

}


?>

<h2 class="text-center text-danger mt-2">ویرایش حساب کاربری</h2>

<div class="w-50 m-auto my-5" dir="rtl">
<form method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">نام</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="username"
   required="required" value=<?php echo($usernameu)?>>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">ایمل</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required="required" value=<?php echo($emailu)?>>
</div>
<div class="mb-3">
  <label for="password" class="form-label">رمز عبور قبلی</label>
  <input type="password" class="form-control" id="password" name="past_password" required="required" placeholder="رمز عبور قبلی خود را وارد کنید">
</div>
<button type="submit" class="btn btn-success mb-3" name="update">ویرایش</button>
</form>
</div>

<h2 class="text-center text-danger">تغییر رمز عبور</h2>

<div class="w-50 m-auto my-5" dir="rtl">
<form method="post">
<div class="mb-3">
  <label for="password" class="form-label">رمز عبور قبلی</label>
  <input type="password" class="form-control" id="password" name="past_password" required="required" placeholder="رمز عبور قبلی خود را وارد کنید">
</div>
<div class="mb-3">
  <label for="new_password" class="form-label">رمز عبور جدید</label>
  <input type="password" class="form-control" id="new_password" name="new_password" required="required" placeholder="رمز عبور جدید خود را وارد کنید">
</div>
<button type="submit" class="btn btn-success mb-3" name="update_password">ویرایش</button>
</form>
</div>

<?php
if(isset($_POST['update_password'])){
    $past_password = sha1($_POST['past_password']);
    $new_password = sha1($_POST['new_password']);

    if($password == $past_password){
        $update_password = "UPDATE users_table set password = '$new_password' where user_id = $user_id";
        $result_password = mysqli_query($conn,$update_password);

        if($result_password){
            echo "<script>alert('ویرایش با موفقیت انجام شد')</script>";
            echo "<script>window.open('../logout.php','_self')</script>";
        }        
    } else {
        echo "<script>alert('رمز عبور قبلی درست نمی باشد')</script>";
    }
}

?>