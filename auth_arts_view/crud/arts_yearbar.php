<?php
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
 $year = isset($_GET['Year']) ? $_GET['Year'] : '';
 $link = mysqli_connect("localhost", "root", "", "dbms_project");

$query = "SELECT Class,count(*) as num1 FROM student s inner join arts sp WHERE s.ID=sp.ID and Year='$year' group by Class";
 $result=mysqli_query($link,$query);

 ?>

 <html lang="en">
  <head>
    <title>Arts Activities</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Class', 'count'],
       <?php 
                while($row =mysqli_fetch_array($result))
                {
                  echo "['".$row["Class"]."',".$row["num1"]."],";
                }

             ?>


    ]);

    var options = {
      title: 'Class wise sports participation',
      hAxis: {title: 'Class', titleTextStyle: {color: 'red'}},
                width: 980,
                height: 200
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

     function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);  
              window.location.href="index.php?flag=3&ID=<?php echo urlencode($id)?>&Class="+topping;//link to class wise 
          }
        }

        google.visualization.events.addListener(chart, 'select', selectHandler);
    chart.draw(data, options);

  }
</script>

  </head>
  <body class="bg-info">
<div class="container">
<div id="fediv" >
        <h3  ><b>TE section</b></h3>

         <div class="row">

       <div class="col-lg-12">

        <div id="chart_div"  style="height:400px;width: 400px;padding-top: 40px;padding-left: 40px;"></div>

      </div>
      <!--  <div class="col-lg-1"></div>
       --></div>
     
</div>
</div>



  	<?php require 'footer.php'; ?>