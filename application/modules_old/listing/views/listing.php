<?php $this->load->view('common/header'); ?>
<!--content-->
<div class="container-fluid slbgdiv">
	<div class="row rowpad">
		<div class="col-sm-4 col-md-4">
			<p class="slptext">
				<span class="slspan-main">Address</span><br>
				<span class="slspan-samlll"><?php echo $detail['home_address'] ?></span>
			</p>
		</div>
		<div class="col-sm-4 col-md-4"></div>
		<div class="col-sm-4 col-md-4" style="border-left: 1px solid #a0a09c;">
			<p class="slptext">
				<span class="slspan-samlll">Open House:</span><br>
				<!-- <span class="slspn-date"><?php echo date('l',strtotime($detail['contact_date'])).", ". date('F',strtotime($detail['contact_date'])) ." ". date('jS',strtotime($detail['contact_date'])). " ". $detail['start_time'] ." To ". $detail['end_time']  ;?></span> -->
        <span class="slspn-date">By Appointment Only</span>
      </p>
    </div>
  </div>
</div>
<!--img container-->
<?php /* if (!empty($detail['feature_img'] )) {?>
<div class="">
	<img src="<?php echo base_url() ?>uploads/images/<?php echo $detail['feature_img']  ?>" class="img-responsive slimg">
</div>
<?php }*/ ?>

<?php if (!empty($detail['feature_img'] )) {?>
<div class="cover-img" style="background: url(<?php echo base_url() ?>home/image/images/property_view/<?php echo $detail['feature_img']  ?>); height:450px;">
</div>
<?php } ?>

<!--/img container-->
<div class="container slbgdiv view_block">
	<div class="row slptext1">
		<div class="col-sm-6 smeight hidden-xs">
			<div class="col-xs-3">
				<img src="<?php echo base_url() ?>assets/icons/beds.png"><br>
				<span><?php echo $detail['bedrooms'] ; ?> Beds</span>
			</div>
			<div class="col-xs-3">
				<img src="<?php echo base_url() ?>assets/icons/baths.png"><br>
				<span><?php echo $detail['bathrooms'] ; ?> Baths</span>
			</div>
			<div class="col-xs-3">
				<img src="<?php echo base_url() ?>assets/icons/lotsize.png"><br>
				<span><?php echo $detail['lotsize_sqft'] ; ?> sqft</span>
			</div>
			<div class="col-xs-2">
				<img src="<?php echo base_url() ?>assets/icons/squarefeet.png"><br>
				<span><?php echo $detail['square_feet'] ; ?> sqft</span>
			</div>
		</div>

		<div class="col-sm-4">
		</div>
	</div>
	<div class="row rowb slptext1">
		<div class="col-sm-7">
			<h2>Description</h2>
			<p class="lh1">
				<?php echo $detail['home_desc'] ; ?>
			</p> 
			<hr class="hr1"> 
			<div class="row">
				<div id="iv">
					<?php foreach ($detail['images'] as $image): ?>
						<a href="<?php echo base_url() ?>uploads/images/<?php echo $image['photo_name'] ?>" title="<?php echo $detail['home_address'] ?>">
							<img src="<?php echo base_url() ?>uploads/images/<?php echo $image['photo_name'] ?>" alt="<?php echo $detail['home_address'] ?>" />
						</a>
					<?php endforeach ?>
				</div>

			</div>
			<hr class="hr1">
			<!--home details-->
			<h2>Home Details</h2>
			<div class="row rw">
				<div class="rowb">
					<div class="col-xs-6">
						<span>Bed :</span><br>
						<span><b><?php echo $detail['bedrooms'] ; ?></b></span>
					</div>

					<div class="col-xs-6">
						<span>Occupancy: </span><br>
						<span><b><?php echo $detail['occupancy'] ?></b></span>
					</div>

				</div>  
			</div>

			<div class="row rw">
				<div class="rowb">
					<div class="col-xs-6">
						<span>Baths: </span><br>
						<span><b><?php echo $detail['bathrooms'] ; ?></b></span>
					</div>

					<div class="col-xs-6">
						<span>Elementary School District: </span><br>
						<span><b><?php echo $detail['esd'] ; ?></b></span>
					</div>

				</div>  
			</div>

			<div class="row rw">
				<div class="rowb">
					<div class="col-xs-6">
						<span>Sqft : </span><br>
						<span><b><?php echo $detail['square_feet'] ; ?></b></span>
					</div>

					<div class="col-xs-6">
						<span>High School District:</span><br>
						<span><b><?php echo $detail['hsd'] ; ?></b></span>
					</div>

				</div>  
			</div>

			<div class="row rw">
				<div class="rowb">
					<div class="col-xs-6">
						<span>Lot Size : </span><br>
						<span><b><?php echo $detail['lotsize_sqft'] ; ?></b></span>
					</div>

       <!--  <div class="col-xs-6">
          <span>Neighborhood:  </span><br>
          <span><b>Avila Beach </b></span>
        </div> -->
        <div class="col-xs-6">
         <span>Year Built: </span><br>
         <span><b><?php echo $detail['yearbuilt'] ; ?></b></span>
       </div>
     </div>  
   </div>

<!--     <div class="row rw ">
      <div class="rowb">
        <div class="col-xs-6">
          <span>Year Built: </span><br>
          <span><b><?php echo $detail['yearbuilt'] ; ?></b></span>
        </div>

        <div class="col-xs-6">
          <span>HOA Fees:</span><br>
          <span><b>$185</b></span>
        </div>

      </div>  
    </div> -->

    <div class="row rw">
     <div class="rowb">
      <div class="col-xs-6">
       <span>Parking Features:</span><br>
       <span><b><?php echo $detail['features']['parking'] ; ?></b></span>
     </div>

     <div class="col-xs-6">
       <span>Garage Spaces: </span><br>
       <span><b><?php echo $detail['garage_space'] ; ?></b></span>
     </div>

   </div>  
 </div>

 <div class="row">
   <div class="rowb">
    <div class="col-xs-6">
     <span class="spnparking">The Outside</span><br>

   </div>

   <div class="col-xs-6">
     <span class="spnparking">The Inside </span><br>

   </div>

 </div>  
</div>

<div class="row rw">
 <div class="rowb">
  <div class="col-xs-6">
   <span>Roof Type: </span><br>
   <span><b><?php echo $detail['features']['roof'] ; ?></b></span>
 </div>

 <div class="col-xs-6">
   <span>Dining Room Features: </span><br>
   <span><b><?php echo $detail['features']['dining'] ; ?></b></span>
 </div>

</div>  
</div>

<div class="row rw">
 <div class="rowb">
  <div class="col-xs-6">
   <span>Water:  </span><br>
   <span><b><?php echo $detail['features']['water'] ; ?></b></span>
 </div>

 <div class="col-xs-6">
   <span>Family Room Features:  </span><br>
   <span><b><?php echo $detail['features']['family'] ; ?></b></span>
 </div>

</div>  
</div>

<div class="row rw">
 <div class="rowb">
  <div class="col-xs-6">
   <span>Sewer:  </span><br>
   <span><b><?php echo $detail['features']['sewer'] ; ?></b></span>
 </div>

 <div class="col-xs-6">
   <span>Heat Source:   </span><br>
   <span><b><?php echo $detail['heating_type'] ; ?></b></span>
 </div>

</div>  
</div>

<div class="row rw">
 <div class="rowb">
  <div class="col-xs-6">
   <span>Foundation:  </span><br>
   <span><b><?php echo $detail['features']['foundation'] ; ?></b></span>
 </div>

 <div class="col-xs-6">
   <span>Cooling:  </span><br>
   <span><b><?php echo $detail['cooling_type'] ; ?></b></span>
 </div>

</div>  
</div>

<div class="row rw">
 <div class="rowb">
  <div class="col-xs-6">
   <span>Utilities:  </span><br>
   <span><b><?php echo $detail['features']['utilities'] ; ?></b></span>
 </div>

 <div class="col-xs-6">
   <span>Fireplace:  </span><br>
   <span><b><?php echo $detail['fireplace_type'] ; ?></b></span>
 </div>

</div>  
</div>

<div class="row rw">
 <div class="rowb">
  <div class="col-xs-6">
   <span>Pool:   </span><br>
   <span><b><?php echo ($detail['pool'] == "Y")? "Yes" : "No" ; ?></b></span>
 </div>
</div>  
</div>
<!--/home details-->

</div>
<div class="col-sm-1"></div>
<div class="col-sm-4 askingpricediv">
	<p class="ppad">
		<span class="spnpriceask">Asking Price</span><br>
		<?php if (empty($detail['admin_home_worth'])) {?>
		<span class="sldoller">$<?php echo number_format($detail['home_worth']) ?></span>
		<?php }else{ ?>
		<span class="sldoller">$<?php echo number_format($detail['admin_home_worth']) ?></span>
		<?php } ?>
	</p>
    <!-- <hr>
    <p class="ppad">
      <span class="spnpriceask1">Currently accepting offers</span><br>

    </p> -->
    <hr>
    <p class="ppad1">
     <a class="anchaoredit anchaor" href="<?php echo base_url() ?>contactus">Contact Us</a>
   </p>
    <!-- <p class="ppad1">
      <button type="submit" class="submit-btn1">Visit Home</button>
    </p> -->
  </div>


</div>


</div>


<!--/content-->


<?php $this->load->view('common/footer') ?>
<script>
	$('#iv').imageview();
</script>
<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-36251023-1']);
	_gaq.push(['_setDomainName', 'jqueryscript.net']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>


</body>

</html>
