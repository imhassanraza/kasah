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
        <h2 class="col-xs-12 col-sm-8 pull-left">My Documents</h2>
        <?php 
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
            <?php foreach ($app['documents'] as $document){ ?>
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
               <!-- <a data-appid="<?php echo $app['id'] ?>" href="javascript:void(0)" data-id="<?php echo $document['doc_id'] ?>" class="dltBtn">
                 <img src="<?php echo base_url() ?>assets/icons/delete.png">
               </a> -->
             </td>
           </tr>
           <?php }
           $w++;
           ?>
           <tbody>
           </tbody>
         </table>
       </div>
     </div>
     <?php } ?>
   </div>
 </section>
</div>
</main>

<?php $this->load->view('common/footer') ?>
</body>
<script type="text/javascript">
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
</html>
