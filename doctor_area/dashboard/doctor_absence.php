<?php



if(isset($_POST['absence'])){

    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $select = "SELECT * from doctors_table where user_id = $user_id";
    $result_select = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($result_select);
    $doctor_id = $row['doctor_id'];

    $select_date = "SELECT * from doctor_absences where absence_date = '$date' and doctor_id = $doctor_id";
    $result_date = mysqli_query($conn,$select_date);
    $num = mysqli_num_rows($result_date);
    if($num > 0){
        echo "<script>alert('تاریخ غیر حاظری موجود است')</script>";
    } else {
        $insert = "INSERT into doctor_absences (doctor_id,absence_date,reason) values ($doctor_id,'$date','$reason')";
        $result_insert = mysqli_query($conn,$insert);
    
        if($result_insert){
            $update = "UPDATE appointment_list set status = 'canceled' where appointment_date = '$date' and doctor_id = $doctor_id";
            $result_update = mysqli_query($conn,$update);

            
            echo "<script>alert('تاریخ غیر حاظری با موفقیت ثبت شد')</script>";
        }
    }

}



?>

<form dir="rtl" class="mx-3" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="date">تاریخ غیر حاظری</label>
                    <input type="date" class="form-control" id="date" autocomplete="ob_clean" name="date" required min="<?php echo date('Y-m-d'); ?>">
                  </div>
                  <div class="form-group">
                        <label for="reason">دلیل غیر حاظری(اختیاری)</label>
                        <textarea class="form-control" rows="3" placeholder="بنویس ..." name="reason" id="reason"></textarea>
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="absence" id="absence">ثبت غیبت</button>
                </div>
              </form>

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
              <script type="text/javascript">
$("#absence").click(function(){
    if(confirm("آیا مطمئن هستی؟")){
        $("#absence").attr("href", "doctor_dashboard?absence");
    }
    else{
        return false;
    }
});
</script>