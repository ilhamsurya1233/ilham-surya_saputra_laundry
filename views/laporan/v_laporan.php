<?php 
    include_once '../template/header.php';
    include_once '../template/sidebar.php';
    // include_once '../template/topbar.php';
    ?>

    <div class="row" style="background-color: dark;">
        <div class="col">
        </div>
        <div class="col-5" style=" height:648px;">
            <h2 style="margin-top:80px; margin-bottom:30px; text-align: center;">Laporan Laundry</h2>
            <center>
            <form action="v_data.php" method="POST">
            <div class="custom-control custom-checkbox">
               <input type="checkbox" name="transaksi" class="custom-control-input" id="customCheck1" value="semua"/>
               <label class="custom-control-label" for="customCheck1">Semua Data Transaksi</label>
               <!-- <label for=""></label> -->
            </div>
            <div class="mb-3">
            </div>
            <div class="mb-3">
            <button style="" type="submit" class="btn btn-primary" name="generate">Generate Data</button>
            </div>
            </form>
            </center>
        </div>
        <div class="col" style="background-color: dark;">
        </div>
    </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"
    integrity="sha384-u10knCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTP00mMi466C8"
    crossorigin="anonymous"></script>
    <script src="../assets/js/bundle.js?ver=3.1.2"></script>
    <script src="../assets/js/scripts.js?ver=3.1.2"></script>
</body>
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</html>