<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/karmaBall.css">
    <script src="http://d3js.org/d3.v3.min.js" language="JavaScript"></script>
    <script src="../js/karmaBall.js" language="JavaScript"></script>


    
</head>

<body>
    <div class="showKarma"> 
        <p>業障干擾值</p>
        <img src="../img/showKarma/karma_frame.png" alt="" class="frame">
        <div class="balls">
            <img src="../img/showKarma/ball.png" alt="" class="outBall">
            <svg id="fillgauge2" width="494" height="494"></svg>
        </div>
        <p class="number">200</p>
    </div>

    

    <script language="JavaScript">
        var karCount = 300;
        var config1 = liquidFillGaugeDefaultSettings();
        config1.circleColor = "#850000";
        config1.textColor = "#eb0202";        
        config1.waveTextColor = "rgb(66, 0, 0";
        config1.waveColor = "#eb0202";
        config1.circleThickness = 0.05;
        config1.textVertPosition = 0.3;
        config1.waveAnimateTime = 3000;
        var gauge2= loadLiquidFillGauge("fillgauge2", karCount, config1);   


    </script>
</body>

</html>