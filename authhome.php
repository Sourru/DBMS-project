<?php
 
 $link = mysqli_connect("localhost", "root", "", "dbms_project");
 $query="SELECT Sports_Name,count(*) as number from sports group by Sports_Name";
 $result=mysqli_query($link,$query);
 $id = isset($_GET['ID']) ? $_GET['ID'] : '';

$grab = "SELECT Year,count(*) as num1 FROM student s inner join sports sp WHERE s.ID=sp.ID  group by Year";
 $result1=mysqli_query($link,$grab);

$grab2 = "SELECT Department,count(*) as num2 FROM student s inner join sports sp WHERE s.ID=sp.ID  group by Department";
 $result2=mysqli_query($link,$grab2);

 $queryart="SELECT Art_Type,count(*) as numberart from arts group by Art_Type";
 $resultart=mysqli_query($link,$queryart);


$art2 = "SELECT Year,count(*) as numa1 FROM student s inner join arts ar WHERE s.ID=ar.ID  group by Year";
 $resultart1=mysqli_query($link,$art2);

$art3 = "SELECT Department,count(*) as numa2 FROM student s inner join arts ar WHERE s.ID=ar.ID  group by Department";
 $resultart2=mysqli_query($link,$art3);




$querysocial="SELECT Nature_of_work,count(*) as numbersocial from social_work group by Nature_of_work";
 $resultsocial=mysqli_query($link,$querysocial);


$social2 = "SELECT Year,count(*) as nums1 FROM student s inner join social_work sw WHERE s.ID=sw.ID  group by Year";
 $resultsocial1=mysqli_query($link,$social2);

$social3 = "SELECT Department,count(*) as nums2 FROM student s inner join social_work sw WHERE s.ID=sw.ID  group by Department";
 $resultsocial2=mysqli_query($link,$social3);




$querycomp="SELECT Event,count(*) as numbercomp from competitive group by Event";
 $resultcomp=mysqli_query($link,$querycomp);


$comp2 = "SELECT Year,count(*) as numc1 FROM student s inner join competitive c WHERE s.ID=c.ID  group by Year";
 $resultcomp1=mysqli_query($link,$comp2);

$comp3 = "SELECT Department,count(*) as numc2 FROM student s inner join competitive c WHERE s.ID=c.ID  group by Department";
 $resultcomp2=mysqli_query($link,$comp3);


?>


<!DOCTYPE html>
<html>
<head>
  <title>Authority Page1</title>
  <link rel="stylesheet" type="text/css" href="styleauth.css" >
<!--   <link rel="stylesheet" type="text/css" href="navbar.css"> 
 -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
      var data=google.visualization.arrayToDataTable([
            ['Sport','Number'],
            <?php 
                while($row =mysqli_fetch_array($result))
                {
                  echo "['".$row["Sports_Name"]."',".$row["number"]."],";
                }

             ?>

            

        ]);

      var options ={
        title:'Percentage of sports'
      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);
              window.location.href="auth_sports_view/crud/index.php?flag=2&ID=<?php echo urlencode($id)?>&act="+topping;
          }
        }

        google.visualization.events.addListener(chart, 'select', selectHandler);
      chart.draw(data,options);
    }
  </script>
<script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart3()
    {
      var data2=google.visualization.arrayToDataTable([
            ['Department','Count'],
            <?php 
                while($row =mysqli_fetch_array($result2))
                {
                  echo "['".$row["Department"]."',".$row["num2"]."],";
                }

             ?>
        ]);

      var options2 ={
        title:'Percentage of Department participation in sports'
      };
      var chart2 = new google.visualization.PieChart(document.getElementById('piechart1'));
      function selectHandler() {
          var selectedItem = chart2.getSelection()[0];
          if (selectedItem) {
            var topping = data2.getValue(selectedItem.row, 0);
              window.location.href="auth_sports_view/crud/index.php?flag=1&ID=<?php echo urlencode($id)?>&Dept="+topping;
          }
        }

        google.visualization.events.addListener(chart2, 'select', selectHandler);    
      chart2.draw(data2,options2);
    }

    
  </script>

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart1);
    function drawChart1() {
    var data1 = google.visualization.arrayToDataTable([
      ['Year', 'count'],
       <?php 
                while($row =mysqli_fetch_array($result1))
                {
                  echo "['".$row["Year"]."',".$row["num1"]."],";
                }

             ?>


    ]);

    var options1 = {
      title: 'Year wise sports participation',
      hAxis: {title: 'Year', titleTextStyle: {color: 'red'}},
                width: 980,
                height: 200
    };

    var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_div'));
     function selectHandler() {
          var selectedItem = chart1.getSelection()[0];
          if (selectedItem) {
            var topping = data1.getValue(selectedItem.row, 0);     
              window.location.href="auth_sports_view/crud/sports_yearbar.php?ID=<?php echo urlencode($id)?>&Year="+topping;
              //name of link and repeat this for fe se te
          }
        }

        google.visualization.events.addListener(chart1, 'select', selectHandler);
    chart1.draw(data1, options1);

  }
</script>




</head>
<body>

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" id="logo" href="/projects/Auth_page1.php?ID=<?php echo $id?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <li class="nav-link"><a class="nav-item nav-link" href="/projects/auth_stu_view/crud/index.php?ID=<?php echo $id?>">Students</a></li>
        <li class="nav-link"><a class="nav-item nav-link" href="/projects/auth_arts_view/crud/index.php?ID=<?php echo $id?>">Arts</a></li>
        <li class="nav-link"><a class="nav-item nav-link" href="/projects/auth_sports_view/crud/index.php?ID=<?php echo $id?>">Sports</a></li>
        <li class="nav-link"><a class="nav-item nav-link " href="/projects/auth_social_view/crud/index.php?ID=<?php echo $id?>">Social Work</a></li>
        <li class="nav-link"><a class="nav-item nav-link" href="/projects/auth_comp_view/crud/index.php?ID=<?php echo $id?>">Competitve Coding</a></li>
     </li>   
    </ul>
  </div>
</nav>

<div id="slide">


<div id="sportsdiv" class="mySlides">
        <h3  ><b>Sports section</b></h3>
      <div class="row">
      <!--   <div class="col-lg-1"></div>
       --><div class="col-lg-6">
        
        <div id="piechart" onClick="redirect()" style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <div class="col-lg-6">
        
        <div id="piechart1"  style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      </div>
      <!--  <div class="col-lg-2"></div>
       -->
       <div class="row">

       <div class="col-lg-12">

        <div id="chart_div" style="height:400px;width: 400px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <!--  <div class="col-lg-1"></div>
       --></div>

</div>

<div id="artsdiv" class="mySlides">
        <h3  ><b>Arts section</b></h3>
      <div class="row">
      <!--   <div class="col-lg-1"></div>
       --><div class="col-lg-6">
        
        <div id="piecharta" onClick="redirectart()" style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <div class="col-lg-6">
        
        <div id="piecharta1"  style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      </div>
      <!--  <div class="col-lg-2"></div>
       -->
       <div class="row">

       <div class="col-lg-12">

        <div id="chart_diva"  style="height:400px;width: 400px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <!--  <div class="col-lg-1"></div>
       --></div>

</div>

<div id="socialdiv" class="mySlides">
        <h3 ><b>Social section</b></h3>
      <div class="row">
      <!--   <div class="col-lg-1"></div>
       --><div class="col-lg-6">
        
        <div id="piecharts" onClick="redirectsoc()" style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <div class="col-lg-6">
        
        <div id="piecharts1"  style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      </div>
      <!--  <div class="col-lg-2"></div>
       -->
       <div class="row">

       <div class="col-lg-12">

        <div id="chart_divs"  style="height:400px;width: 400px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <!--  <div class="col-lg-1"></div>
       --></div>

</div>


<div id="codingdiv" class="mySlides">
        <h3 ><b>Comepitive Coding section</b></h3>
      <div class="row">
      <!--   <div class="col-lg-1"></div>
       --><div class="col-lg-6">
        
        <div id="piechartc" onClick="redirectcom()" style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <div class="col-lg-6">
        
        <div id="piechartc1" style="height:500px;width: 500px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      </div>
      <!--  <div class="col-lg-2"></div>
       -->
       <div class="row">

       <div class="col-lg-12">

        <div id="chart_divc" style="height:400px;width: 400px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <!--  <div class="col-lg-1"></div>
       --></div>

</div>
</div>






</div>
<!-- <script type="text/javascript">
  var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script> -->
<script type="text/javascript">
  function redirect(){
    window.location.href="auth_sports_view/crud/index.php?ID=<?php echo urlencode($id)?>";

  }
  
   function redirectart(){
    window.location.href="auth_arts_view/crud/index.php?ID=<?php echo urlencode($id)?>";

  }
 
   function redirectsoc(){
    window.location.href="auth_social_view/crud/index.php?ID=<?php echo urlencode($id)?>";

  }
 
   function redirectcom(){
    window.location.href="auth_comp_view/crud/index.php?ID=<?php echo urlencode($id)?>";

  }
   

</script>


<!-- // for arts
 --> <script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartart);
    function drawChartart()
    {
      var dataa=google.visualization.arrayToDataTable([
            ['Art_Type','Number'],
            <?php 
                while($row =mysqli_fetch_array($resultart))
                {
                  echo "['".$row["Art_Type"]."',".$row["numberart"]."],";
                }

             ?>

            

        ]);

      var optionsa ={
        title:'Percentage of Art types'
      };
      var charta = new google.visualization.PieChart(document.getElementById('piecharta'));
      function selectHandler() {
      var selectedItem = charta.getSelection()[0];
          if (selectedItem) {
            var topping = dataa.getValue(selectedItem.row, 0);
              window.location.href="auth_arts_view/crud/index.php?flag=2&ID=<?php echo urlencode($id)?>&act="+topping;
          }
        }

        google.visualization.events.addListener(charta, 'select', selectHandler);
      charta.draw(dataa,optionsa);
    }
  </script>
<script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharta2);
    function drawCharta2()
    {
      var dataa2=google.visualization.arrayToDataTable([
            ['Department','Count'],
            <?php 
                while($row =mysqli_fetch_array($resultart2))
                {
                  echo "['".$row["Department"]."',".$row["numa2"]."],";
                }

             ?>
        ]);

      var optionsa2 ={
        title:'Percentage of Department participation in Arts'
      };
      var charta2 = new google.visualization.PieChart(document.getElementById('piecharta1'));
       function selectHandler() {
          var selectedItem = charta2.getSelection()[0];
          if (selectedItem) {
            var topping = dataa2.getValue(selectedItem.row, 0);
             window.location.href="auth_arts_view/crud/index.php?flag=1&ID=<?php echo urlencode($id)?>&Dept="+topping;
          }
        }

        google.visualization.events.addListener(charta2, 'select', selectHandler);  
      charta2.draw(dataa2,optionsa2);
    }
  </script>

 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawCharta1);
    function drawCharta1() {
    var dataa1 = google.visualization.arrayToDataTable([
      ['Year', 'count'],
       <?php 
                while($row =mysqli_fetch_array($resultart1))
                {
                  echo "['".$row["Year"]."',".$row["numa1"]."],";
                }

             ?>


    ]);

    var optionsa1 = {
      title: 'Year wise arts participation',
      hAxis: {title: 'Year', titleTextStyle: {color: 'red'}},
                width: 980,
                height: 200
    };

    var charta1 = new google.visualization.ColumnChart(document.getElementById('chart_diva'));
     function selectHandler() {
          var selectedItem = charta1.getSelection()[0];
          if (selectedItem) {
            var topping = dataa1.getValue(selectedItem.row, 0);
             window.location.href="auth_arts_view/crud/arts_yearbar.php?ID=<?php echo urlencode($id)?>&Year="+topping;
          }
        }

        google.visualization.events.addListener(charta1, 'select', selectHandler);
    charta1.draw(dataa1, optionsa1);

  }
</script>


<!-- for Social
 -->
 <script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartsocial);
    function drawChartsocial()
    {
      var datas=google.visualization.arrayToDataTable([
            ['Social Work','Number'],
            <?php 
                while($row =mysqli_fetch_array($resultsocial))
                {
                  echo "['".$row["Nature_of_work"]."',".$row["numbersocial"]."],";
                }

             ?>

            

        ]);

      var optionss ={
        title:'Percentage of Social work types'
      };
      var charts = new google.visualization.PieChart(document.getElementById('piecharts'));
      function selectHandler() {
      var selectedItem = charts.getSelection()[0];
          if (selectedItem) {
            var topping = datas.getValue(selectedItem.row, 0);
              window.location.href="auth_social_view/crud/index.php?flag=2&ID=<?php echo urlencode($id)?>&act="+topping;
          }
        }

        google.visualization.events.addListener(charts, 'select', selectHandler);
      charts.draw(datas,optionss);
    }
  </script>
<script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts2);
    function drawCharts2()
    {
      var datas2=google.visualization.arrayToDataTable([
            ['Department','Count'],
            <?php 
                while($row =mysqli_fetch_array($resultsocial2))
                {
                  echo "['".$row["Department"]."',".$row["nums2"]."],";
                }

             ?>
        ]);

      var optionss2 ={
        title:'Percentage of Department participation in Social work'
      };
      var charts2 = new google.visualization.PieChart(document.getElementById('piecharts1'));
       function selectHandler() {
          var selectedItem = charts2.getSelection()[0];
          if (selectedItem) {
            var topping = datas2.getValue(selectedItem.row, 0);
             window.location.href="auth_social_view/crud/index.php?flag=1&ID=<?php echo urlencode($id)?>&Dept="+topping;
          }
        }

        google.visualization.events.addListener(charts2, 'select', selectHandler);  
      charts2.draw(datas2,optionss2);
    }
  </script>

 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawCharts1);
    function drawCharts1() {
    var datas1 = google.visualization.arrayToDataTable([
      ['Year', 'count'],
       <?php 
                while($row =mysqli_fetch_array($resultsocial1))
                {
                  echo "['".$row["Year"]."',".$row["nums1"]."],";
                }

             ?>


    ]);

    var optionss1 = {
      title: 'Year wise Social work participation',
      hAxis: {title: 'Year', titleTextStyle: {color: 'red'}},
                width: 980,
                height: 200
    };

    var charts1 = new google.visualization.ColumnChart(document.getElementById('chart_divs'));
     function selectHandler() {
          var selectedItem = charts1.getSelection()[0];
          if (selectedItem) {
            var topping = datas1.getValue(selectedItem.row, 0);
             window.location.href="auth_social_view/crud/social_yearbar.php?ID=<?php echo urlencode($id)?>&Year="+topping;
          }
        }

        google.visualization.events.addListener(charts1, 'select', selectHandler);
    charts1.draw(datas1, optionss1);

  }
</script>
<!-- forcoding -->

   <script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartcomp);
    function drawChartcomp()
    {
      var datac=google.visualization.arrayToDataTable([
            ['Coding','Number'],
            <?php 
                while($row =mysqli_fetch_array($resultcomp))
                {
                  echo "['".$row["Event"]."',".$row["numbercomp"]."],";
                }

             ?>

            

        ]);

      var optionsc ={
        title:'Percentage of competion work types'
      };
      var chartc = new google.visualization.PieChart(document.getElementById('piechartc'));
      function selectHandler() {
      var selectedItem = chartc.getSelection()[0];
          if (selectedItem) {
            var topping = datac.getValue(selectedItem.row, 0);
              window.location.href="auth_comp_view/crud/index.php?flag=2&ID=<?php echo urlencode($id)?>&act="+topping;
          }
        }

        google.visualization.events.addListener(chartc, 'select', selectHandler);
      chartc.draw(datac,optionsc);
    }
  </script>
<script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartc2);
    function drawChartc2()
    {
      var datac2=google.visualization.arrayToDataTable([
            ['Department','Count'],
            <?php 
                while($row =mysqli_fetch_array($resultcomp2))
                {
                  echo "['".$row["Department"]."',".$row["numc2"]."],";
                }

             ?>
        ]);

      var optionsc2 ={
        title:'Percentage of Department participation in Comepitive work'
      };
      var chartc2 = new google.visualization.PieChart(document.getElementById('piechartc1'));
       function selectHandler() {
          var selectedItem = chartc2.getSelection()[0];
          if (selectedItem) {
            var topping = datac2.getValue(selectedItem.row, 0);
             window.location.href="auth_comp_view/crud/index.php?flag=1&ID=<?php echo urlencode($id)?>&Dept="+topping;
          }
        }

        google.visualization.events.addListener(chartc2, 'select', selectHandler);  
      chartc2.draw(datac2,optionsc2);
    }
  </script>

 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChartc1);
    function drawChartc1() {
    var datac1 = google.visualization.arrayToDataTable([
      ['Year', 'count'],
       <?php 
                while($row =mysqli_fetch_array($resultcomp1))
                {
                  echo "['".$row["Year"]."',".$row["numc1"]."],";
                }

             ?>


    ]);

    var optionsc1 = {
      title: 'Year wise competitive work participation',
      hAxis: {title: 'Year', titleTextStyle: {color: 'red'}},
                width: 980,
                height: 200
    };

    var chartc1 = new google.visualization.ColumnChart(document.getElementById('chart_divc'));
     function selectHandler() {
          var selectedItem = chartc1.getSelection()[0];
          if (selectedItem) {
            var topping = datac1.getValue(selectedItem.row, 0);
              window.location.href="auth_comp_view/crud/comp_yearbar.php?ID=<?php echo urlencode($id)?>&Year="+topping;
          }
        }

        google.visualization.events.addListener(chartc1, 'select', selectHandler);
    chartc1.draw(datac1, optionsc1);

  }
</script>

</body>
</html>