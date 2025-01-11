<?php
include "../../includes/connection.php";
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $search_query = "SELECT * from patients_table where full_name like '%{$input}%' or phone_num like '%{$input}%'";
    $result_search = mysqli_query($conn,$search_query);

    if(mysqli_num_rows($result_search) > 0){
        ?>
        <div class="card-body table-responsive p-0 my-5">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>نام بیمار</th>
                      <th>شماره تماس بیمار</th>
                      <th>تاریخ تولد بیمار</th>
                      <th>آدرس بیمار</th>
                      <th>تاریخچه بیماری بیمار</th>
                      <th>شماره عاجل بیمار</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result_search)){
                        $name = $row['full_name'];
                        $phone = $row['phone_num'];
                        $date = $row['date_of_birth'];
                        $address = $row['address'];
                        $medical_history = $row['medical_history'];
                        $emergency_contact = $row['emergency_contact'];

                        ?>
                            <tr>
                            <td><?php echo($name)?></td>
                    <td><?php echo($phone)?></td>
                    <td><?php echo($date)?></td>
                    <td><?php echo($address)?></td>
                    <td><?php echo($medical_history)?></td>
                    <td><?php echo($emergency_contact)?></td>
                        </tr>
                        <?php
                    }
                    
                    ?>
                

                  </tbody>
                </table>
              </div>
        <?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}

?>