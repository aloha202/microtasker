<?php echo page_header($page); ?>

<?php echo page_well($page); ?>


<?php include_partial('contactus/form', array('form' => $form)); ?>


<?php /*
  <div id="contact_content">
  <div id='left_block3'>

  <?php include_component('contactus', 'form'); ?>



  </div>

  <div id='right_block3'>
  <div class='title'>
  FIND US ON THE MAP
  </div>

  <div class='map' id="gmap" style="width: 500px; height: 350px;">

  </div>

  <script type="text/javascript">
  var gmap_initialized = {};
  function gmap_initialize(id) {
  if(gmap_initialized[id]){
  return;
  }
  var myLatlng = new google.maps.LatLng(<?php include_config('map_coords'); ?>);
  var myOptions = {
  zoom: parseInt(<?php include_config('map_zoom'); ?>),
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  var map = new google.maps.Map(document.getElementById(id),
  myOptions);

  var marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  title:"Hello World!"
  });
  gmap_initialized[id] = true;
  }

  $(function(){
  gmap_initialize('gmap');
  });
  </script>


  </div>

  </div>
 */ ?>