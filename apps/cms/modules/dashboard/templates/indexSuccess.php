<div class='two_columns'>
    
    <div class='left_col'>
        <div class='cms_block'>
            <h2><?=__('Показатели') ?></h2>
            <?php // include_component('dashboard', 'visit_today');?>
            <?php // include_component('dashboard', 'visit_total');?>       
            <?php include_component('dashboard', 'event_today');?>
            <?php include_component('dashboard', 'event_total');?>                     
        </div>
    </div>
    <div class='right_col'>
        <div class='cms_block'>
            
            <?php /*
            <div id='chart_div'></div>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
             * 
             */ ?>
            
        </div>                
    </div>
    
    <div class='clr'></div>
    
</div>