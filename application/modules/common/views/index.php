<!DOCTYPE html>
<html>
<head>
    <title>Kasah</title>
</head>
<style>

    body, html {
        height: 100%;
        margin: 0;
    }

    .bgimg {
        background-image: url('<?php echo base_url() ?>assets/img/background.jpg');
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        color: white;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
    }

    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }

    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
        font-family: Trebuchet MS;
        font-size: 20px;
    }

    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    hr {
        margin: auto;
        width: 40%;
    }
</style>
<body>

    <div class="bgimg">
      <div class="topleft">
        <p><img src="<?php echo base_url(); ?>assets/img/logo.png" width="250"></p>
    </div>
    <div class="middle">
        <h1>COMING SOON</h1>
        <hr>
        <p>30 days left</p>
   </div>
   <div class="bottomleft">
    <p>Kasah - Where You Find Your Dream House!</p>
</div>
</div>

</body>
</html>
