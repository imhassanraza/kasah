<select class="form-control my-select required" name="city_id">
	<option value="">City of Interest</option>
	<?php foreach ($cities as $city) {?>
	<?php if ($city['city_name'] == "San Diego" && $city['state_code'] == "CA"): ?>
		<option value="<?php echo $city['id'] ?>"><?php echo $city['city_name']; ?></option>
	<?php endif ?>
	<?php } ?>
</select>