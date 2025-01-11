<?php
include "../../includes/connection.php";

if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    $select_appointments = "SELECT * from appointment_list where appointment_id = $appointment_id";
    $result_appointments = mysqli_query($conn,$select_appointments);
    $row = mysqli_fetch_array($result_appointments);
    $queue_number = $row['queue_number'];
    $doctor_id = $row['doctor_id'];
    $appointment_date = $row['appointment_date'];

    $delete_query = "DELETE from appointment_list where appointment_id = $appointment_id";
    $result_delete = mysqli_query($conn,$delete_query);

    if($result_delete){

        $update_query = "UPDATE appointment_list set queue_number = queue_number - 1 where queue_number > ? and doctor_id 
         = ? and appointment_date = ?";
        $result_update = $conn->prepare($update_query);
        $result_update->execute([$queue_number,$doctor_id,$appointment_date]);

        
        echo "<script>alert('رزرو مریض با موفقیت حذف شد')</script>";
        echo "<script>window.open('patient_dashboard.php?see_appointments','_self')</script>";
    }
}



?>