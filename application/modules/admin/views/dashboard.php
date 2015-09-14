<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-3">
        <h2>Welcome Admin</h2>
        <small>User Feedback</small>
        <ul class="list-group clear-list m-t">
            <?php echo $contact; ?>
        </ul>
    </div>
    <div class="col-sm-6">
        <div class="flot-chart dashboard-chart">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="statistic-box">
            <h4>Analytics</h4>
            <p>Quick Analytics View</p>
            <div class="row text-center">
                <div class="col-lg-6">
                    <canvas id="doughnutChart" width="80" height="80"></canvas>
                    <h5 >Kolter</h5>
                </div>
                <div class="col-lg-6">
                    <canvas id="doughnutChart" width="78" height="78"></canvas>
                    <h5 >Maxtor</h5>
                </div>
            </div>
            <div class="m-t">
                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
        </div>
    </div>

</div>

<!-- <div class="row">
    <div class="col-lg-12">
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>
    </div>
</div> -->
<script type="text/javascript">
$(document).ready(function() {
      //Creating the chart for persons per day
      var data = {
            labels: <?php echo json_encode($line["labels"]);?>,
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: <?php echo json_encode($line["data"]);?>
                }
            ]
        };


      var ctx = $("#myChart").get(0).getContext("2d");
      var myPieChart = new Chart(ctx).Line(data);
      // document.getElementById('js-legend').innerHTML = myPieChart.generateLegend();
    });
</script>