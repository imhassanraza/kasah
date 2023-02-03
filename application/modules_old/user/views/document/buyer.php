<?php $this->load->view('common/header') ?>
<main>
  <div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
    <?php $this->load->view('user/navigation') ?>
  </div>
  <div class="container form-container">
    <section class='faq-group form-section col-xs-12 mobile-padding-z'>
      <div class="col-xs-12 mobile-padding-z">
        <h2 class="col-xs-12 col-sm-8 pull-left">My Documents</h2>
        <div class="col-xs-12">
         <form id="my-awesome-dropzone" action="<?php echo base_url() ?>user/document/uploadDocuments" class="dropzone">  
          <div class="preview-files fileupload dropzone-preview"></div>
          <div class="dz-message" data-dz-message><span>Click here to upload files</span></div>
          <div class="fallback"> <!-- this is the fallback if JS isn't working -->
            <input name="file" type="file" multiple />
          </div>
        </form>
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
              <input type="text" name="doc_name[]" class="form-control requiredFields" style="margin-top: 5px" placeholder="Document Name">
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
        <button type="submit" id="submit-all" class="btn btn-primary nextBtn marg20">Upload the file</button>
      </div>
      <?php if (!empty($shared_document)){ ?>
      <div class="col-xs-12 marg20">
        <div class="table-responsive">
         <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Document Name</th>
              <th>Document Type</th>
              <th>Document Size</th>
              <th>Uploaded Date</th>
              <th>Uploaded By</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php foreach ($shared_document as $doc){ ?>
          <tr id="row_<?php echo $doc['id'] ?>">
            <td><?php echo $doc['id'] ?></td>
            <td><?php echo $doc['custom_name'] ?></td>
            <td><?php echo $doc['file_type'] ?></td>
            <td><?php echo $doc['file_size'] ?> kb</td>
            <td><?php echo $doc['uploaded_date'] ?></td>
            <td style="text-align: center;">
              <?php if ($doc['uploaded_by'] == "admin") {?>
              <label class="label label-danger">Admin</label>
              <?php }else{?>
              <label class="label label-info">You</label>
              <?php } ?>
            </td>
            <td>
              <?php 
              if(!empty($doc['custom_name'])){
                $file_name = $doc['custom_name'].$doc['file_type'] ;
              }else{
                $file_name = "document".$doc['file_type'] ;
              } ?>
              <a download="<?php echo $file_name ?>" href="<?php echo base_url() ?>uploads/shared_document/<?php echo $doc['file_name'] ?>">
               <img src="<?php echo base_url() ?>assets/icons/download.png">
             </a>
           </td>
         </tr>
         <?php }
         ?>
         <tbody>
         </tbody>
       </table>
     </div>
   </div>
   <?php }else{ ?>
   <div class="col-md-12">
    <h4>No Document Found.</h4>
  </div>
  <?php } ?>
</div>

<div class="col-xs-12 mobile-padding-z">
  <h2 class="col-xs-12 col-sm-8 pull-left">Application Documents</h2>
  <?php 
  if (!empty($applications)) {
    $w = 1;
    foreach ($applications as $app) {?>
    <div class="col-xs-12">
      <h4>Application #<?php echo $w; ?> </h4>
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
        <?php 
        if (!empty($app['documents'])) {
          foreach ($app['documents'] as $document){ ?>
          <tr id="row_<?php echo $document['doc_id'] ?>">
            <td><?php echo $document['doc_id'] ?></td>
            <td><?php echo $document['file_name'] ?></td>
            <td><?php echo $document['form_name'] ?></td>
            <td><?php echo "$".$document['price'] ?></td>
            <td><?php echo $document['file_size'] ?> kb</td>
            <td>
             <a download href="<?php echo base_url() ?>uploads/document/<?php echo $document['file_name'] ?>">
               <img src="<?php echo base_url() ?>assets/icons/download.png">
             </a>
           </td>
         </tr>
         <?php }
       }else{?>
       <tr>
         <td colspan="6" style="text-align: center;">No Document found!</td>
       </tr>
      <?php }
      $w++;
      ?>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
<?php }
}else{ ?>
<div class="col-md-12">
  <h4>You have not submitted any Application yet!</h4>
</div>
<?php } ?>
</div>
</section>
</div>
</main>

<?php $this->load->view('common/footer') ?>
</body>

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
            var doc_name = document.getElementsByName("doc_name[]")[count].value;
            formData.append(name, doc_name);
            count++;
          });

          myDropzone.on("complete", function(file, xhr, formData) {
            myDropzone.processQueue();
          });
          myDropzone.on("queuecomplete", function (file) {
            $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>user/document/mailFunction",
              data: 'id=1',
              success: function(response){
                if (response == "done") {
                  location.reload();
                }
              }
            });
          });
         // Here's the change from enyo's tutorial...

         $("#submit-all").click(function (e) {
          e.preventDefault();
          e.stopPropagation();
          var $emptyFields = $('.requiredFields').filter(function() {
            return $.trim(this.value) === "";
          });

          if($emptyFields.length<2)
          {
            myDropzone.processQueue();
          }else{
            swal('Error','Please enter name for all the documents.','error');
          }
        });

       }

     }
   </script>
   </html>
