<?php
include "../../includes/connection.php";
include "../../includes/auth_check_doctor.php";
if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    $update = "UPDATE appointment_list set status = 'completed' where appointment_id = $appointment_id";
    $result_update = mysqli_query($conn,$update);

    echo "<script>window.open('doctor_dashboard.php?current_patient','_self')</script>";
}


?>
