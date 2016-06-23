<?php echo $header; ?>
<div class="breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <h2>Upload Art</h2>
      </div>
      <div class="col-md-8 col-sm-6 hidden-xs">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
          <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </div>
    </div>
  </div>
</div>


<div class="container register_page">
  <div class="row">
    <div id="content" class="col-xs-12">
    <form action="./upload/submit.php" method="get" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 col-sm-12 content">
          <h2>Enter your personal details</h2>
          <div class="table-responsive">
            <table class="form">
            <tr>
              <td>Artist Name<span class="required">*</span></td>
              <td><input type="text" name="artistname" />
                <!-- <?php if ($error_firstname) { ?>
                <span class="error"><?php echo $error_firstname; ?></span>
                <?php } ?> --> </td>
            </tr>
    
            <tr>
              <td>Phone Number <span class="required">*</span></td>
              <td><input type="text" name="phone" />
                <!-- <?php if ($error_email) { ?>
                <span class="error"><?php echo $error_email; ?></span>
                <?php } ?> --> </td>
            </tr>
            <tr>
              <td>Pick-Up Address<span class="required">*</span></td>
              <td><textarea name="address" ></textarea>
                <!-- <?php if ($error_telephone) { ?>
                <span class="error"><?php echo $error_telephone; ?></span>
                <?php } ?> --></td>
            </tr>
            <tr>
              <td>Pin Code<span class="required">*</span></td>
              <td><input type="text" name="pincode" </td>
            </tr>
          </table>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 content">
          <h2>Product Details</h2>
          <div class="table-responsive">
            <table class="form">
            <tr>
              <td>Heading with the name of the art<span class="required">*</span></td>
              <td><input type="text" placeholder="Please ensure  the name is same as the corresponding image name" name="artname" /></td>
            </tr>
            
            <tr>
              <td>Short description about product<span class="required">*</span></td>
              <td><textarea placeholder="Arts with descriptions sell more" name="description"></textarea>
                <!-- <?php if ($error_company_id) { ?>
                <span class="error"><?php echo $error_company_id; ?></span>
                <?php } ?> --></td>
            </tr>
            <tr>
              <td>Price in Rupees<span class="required">*</span></td>
              <td><input type="text" name="price" placeholder="Mention the price you want in hand, we will add our commission and taxes above it" />
               <!-- <?php if ($error_tax_id) { ?>
                <span class="error"><?php echo $error_tax_id; ?></span>
                <?php } ?> --> </td>
            </tr>
            <tr>
              <td>Painting Medium<span class="required">*</span></td>
              <td><input type="text" name="medium" placeholder="Oil, Water Colour, etc" />
                <!-- <?php if ($error_address_1) { ?>
                <span class="error"><?php echo $error_address_1; ?></span>
                <?php } ?> --> </td>
            </tr>
            <tr>
              <td>State of Painting<span class="required">*</span></td>
              <td><input type="text" name="painting_state" placeholder="Rolled, Framed, etc , If framed, can it be unframed and rolled?" /></td>
            </tr>
                
          </table>
          </div>
        </div>
      </div>
      <input  style="float: right;" type="text" value="Add another art peice" class="button" />
       
      </div>
      
        
      <input  id="submit" style="float: left;" type="submit"  value="Submit"  class="button"/>
      <br/>
        
    </form>
    <?php echo $content_bottom; ?></div>
  </div>
</div>
<!-- <script>
    $('#submit').click(function()
    {
    $.ajax({
        url: send_email.php,
        type:'POST',
        data:
        {
            email: email_address,
            message: message
        },
        success: function(msg)
        {
            alert('Email Sent');
        }               
    });
    });
</script> -->
<?php echo $footer; ?>