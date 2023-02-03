<?php $this->load->view('common/header') ?>
<main>
	<div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
		<?php $this->load->view('user/navigation') ?>
	</div>
	<div class="container form-container">
		<section class='faq-group form-section col-xs-12 mobile-padding-z'>
			<div class="col-xs-12 mobile-padding-z">
				<?php 
				if ($this->session->flashdata('success_msg')) {
					?>
					<div class="form-group">
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success_msg') ?>
						</div>
					</div>
					<?php 
				}?>
				<?php 
				if ($this->session->flashdata('error_msg')) {
					?>
					<div class="form-group">
						<div class="alert alert-danger" role="alert">
							<?php echo $this->session->flashdata('error_msg') ?>
						</div>
					</div>
					<?php 
				}?>
				<div class="col-xs-12">
					<h2 class="col-xs-12 col-sm-8 no-padding pull-left">Documents</h2>
          <!-- <div class="col-md-4 pull-right buy-block">
            <a href="<?php echo base_url() ?>user/application/" class="anchaoredit">Back</a>
        </div> -->
        <div class="col-xs-12 no-padding">
        	<p>Once your application is completed,you can upload your supporting income and asset documents here.Please see more information on the documents required below.</p>
        </div>
    </div> 
    <div class="col-xs-12">
    	<h3 class="col-xs-12 col-sm-12 no-padding pull-left">Primary Income</h3>
    	<p>
    		<b>We require that all rent responsible adults living in the household submit verification of income. </b><br>
    		Acceptable forms of verification include the two most recent paystubs, a copy of the most recent tax return with accompanying w2 or 1099 documents. For small business owners we require the most recent tax return with profit and loss statements for the last two quarters. 
    	</p>
    </div>
    <div class="col-xs-12">
    	<h3 class="col-xs-12 col-sm-12 no-padding pull-left">Assets</h3>
    	<p>
    		<b>We require bank statements showing a current balance that exceeds two months of your requested rent held in either a checking, savings, or other account that is equally liquid.</b> 
    		So for example, if your requested rent was $2,000/ month, we need bank statements showing an amount that exceeds $4,000. We do not accept retirement accounts as asset verification for the purpose of this application. If you do your banking online, we can also accept a screenshot of the account summary page. 
    	</p>
    </div>
    <div class="col-xs-12">
    	<h3 class="col-xs-12 col-sm-12 no-padding pull-left">Auxiliary Income</h3>
    	<p>
    		Income that comes from sources outside of your primary employment can be verified as well. Examples of these include but are not limited to: child support, alimony, disability, and retirement income. These can be verified through court documents or award letters.
    	</p>
    </div>
    <div class="col-xs-12">
    	<div class="form-group">
    		<div class="alert alert-warning" role="alert">
    			<h4 class="col-xs-12 col-sm-12 no-padding pull-left">Document Upload Instructions:</h4>
    			<ul>
    				<li>1 – Either click the box and browse to the files you want to upload or drag and drop your files from another window on your computer into the box below in your browser.</li>
    				<li>2 – Once your files appear in the box, select the document type from the dropdown list and fill in amount, as applicable.</li>
    				<li>3 – Once documents types and amounts are set, click the “Upload Now” and files will appear in the “List of documents uploaded” table below.</li>
    				<li>4 – Repeat steps 1-3 until all document files are uploaded. Once complete, click the “Done" button.</li>
    				<!-- <li>5 – Need help getting your tax return online? Click <a href="javascirpt:void(0)">here</a> for instructions. </li> -->
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="col-xs-12">
          <!-- <form action="<?php echo base_url() ?>user/dropzone/upload" class="dropzone" id="my-awesome-dropzone">
            <div class="dz-default dz-message"></div>
        </form> -->
        <form id="my-awesome-dropzone" action="<?php echo base_url() ?>user/application/uploadDocuments" class="dropzone fileupload">
        	<div class="preview-files dropzone-preview"></div>
        </form>
        <button type="submit" id="submit-all" class="btn btn-primary nextBtn marg20">Upload Now</button>
    </div>
    <div id='preview-template' style='display: none;'>
    	<div class='dz-preview dz-file-preview'>
    		<div class='dz-image center-block'>
    			<img data-dz-thumbnail=''>
    		</div>
    		<div class='dz-details'>
    			<div class='dz-size margin-bottom-5' data-dz-size=''></div>
    			<div class='dz-filename'>
    				<span data-dz-name=''></span>
    			</div>
    		</div>
    		<div class='dz-progress'>
    			<span class='dz-upload' data-dz-uploadprogress=''></span>
    		</div>
    		<div class='dz-custom'>
    			<select name="form_type[]" class="form-control" style="margin-top: 5px">
    				<?php foreach ($forms as $form) {?>
    				<option value="<?php echo $form['id'] ?>"><?php echo $form['form_name'] ?></option>
    				<?php } ?>
    			</select>
    			<input type="text" name="amount[]" class="form-control" style="margin-top: 5px" placeholder="$ Amount">
    		</div>
    		<div class='dz-error-message'>
    			<span data-dz-errormessage=''></span>
    		</div>
    		<div class='dz-success-mark'>
    			<span></span>
    		</div>
    		<div class='dz-error-mark' style='margin-top:-10px'>
    			<span></span>
    		</div>
    		<a class='btn btn-default dz-remove' data-dz-remove=''>
    			<i class='glyphicon glyphicon-trash'></i>
    			Remove
    		</a>
    	</div>
    </div>
    <div class="col-xs-12 marg20">
    	<h2>List of documents uploaded: </h2>
    	<div class="table-responsive">
    		<table class="table table-bordered table-striped">
    			<thead>
    				<tr>
    					<th>ID</th>
    					<th>Name</th>
    					<th>Document Type</th>
    					<th>Annual Amount</th>
    					<th>Size</th>
    					<th>Action</th>
    				</tr>
    			</thead>

    			<tbody>
    				<?php 
    				if (!empty($documents)) {
    					foreach ($documents as $document){ ?>
    					<tr id="row_<?php echo $document['doc_id'] ?>">
    						<td><?php echo $document['doc_id'] ?></td>
    						<td><?php echo $document['file_name'] ?></td>
    						<td><?php echo $document['form_name'] ?></td>
    						<td><?php echo "$".$document['price'] ?></td>
    						<td><?php echo $document['file_size'] ?> kb</td>
    						<td>
    							<a download href="<?php echo base_url() ?>uploads/document/<?php echo $document['file_name'] ?>"><img src="<?php echo base_url() ?>assets/icons/download.png"></a>
    							<a data-appid="<?php echo $appid ?>" href="javascript:void(0)" data-id="<?php echo $document['doc_id'] ?>" class="dltBtn"><img src="<?php echo base_url() ?>assets/icons/delete.png"></a>
    						</td>
    					</tr>
    					<?php }}else{ ?>
    					<tr>
    						<td colspan="6" style="text-align: center;">No Document found!</td>
    					</tr>
    					<?php } ?>
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="col-xs-12">
    		<div class="col-md-4 pull-right buy-block">
    			<a href="<?php echo base_url() ?>user/application/" class="anchaoredit">Done</a>
    		</div>
    	</div>
    </div>
</div>
</div>
</section>
</div>
</main>

<?php $this->load->view('common/footer') ?>

<script type="text/javascript">
	var count = 0;
 Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        previewTemplate: document.getElementById('preview-template').innerHTML,
        previewsContainer: ".dropzone-preview",

        // The setting up of the dropzone
        init: function() {
        	var myDropzone = this;
        	myDropzone.on("sending", function(file, xhr, formData) {
        		var name = "post_data";
        		var form_type = document.getElementsByName("form_type[]")[count].value;
        		var amount = document.getElementsByName("amount[]")[count].value;
        		var appid = "<?php echo $appid; ?>"
        		formData.append(name, appid + "," + form_type + "," + amount);
        		count++;
        	});
        	myDropzone.on("complete", function(file, xhr, formData) {
        		myDropzone.processQueue();
        	});
        	myDropzone.on("queuecomplete", function (file) {
        		location.reload();
        	});
         // Here's the change from enyo's tutorial...

         $("#submit-all").click(function (e) {
         	e.preventDefault();
         	e.stopPropagation();
         	myDropzone.processQueue();
         });

     }

 }


 $(document).on('click','.dltBtn',function(){
 	var id = $(this).attr('data-id');
 	var app_id = $(this).attr('data-appid');
 	swal({
 		title: 'Are you sure?',
 		text: "You won't be able to revert this!",
 		type: 'warning',
 		showCancelButton: true,
 		confirmButtonColor: '#DD6B55',
 		confirmButtonText: 'Yes, Delete it!'
 	}).then(function () {
 		$.ajax({
 			type: "POST",
 			data: 'id='+id + "&app_id=" + app_id,
 			url: '<?php echo base_url() ?>user/application/deleteDocument',
 			success: function(output){
 				$('#row_'+ id).remove();
 				swal(
 					'Deleted!',
 					'Your file has been deleted.',
 					'success'
 					)
 			}
 		});
 	});
 });
</script>
</body>

</html>
