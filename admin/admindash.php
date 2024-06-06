<?php
    include('part/manu.php');
?>

        <!---main contant start----->
        <div class="main_content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br><br>
                <button type="button"
                        onclick="document.getElementById('demo').innerHTML = Date()">
                        Click me to display Date and Time.</button>
                        <br><br>
                        <p id="demo"></p>
                
                <br><br>
                <div class="col-4 text-center">
                    <h1>5</h1><br>
                    Users
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1><br>
                    Orders
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1><br>
                    Admin
                </div>
            </div> 
            <div class="clearflex">

            </div>
        </div>
        
        <!---main contant close----->

<?php
    include('part/footer.php');
?>