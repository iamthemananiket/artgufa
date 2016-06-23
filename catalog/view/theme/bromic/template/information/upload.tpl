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
    <form id="upload-form" method="post" enctype="multipart/form-data">
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
      <!-- <input  style="float: right;" type="button" value="Add another art peice" class="button" /> -->
      <input id="submit" style="float: right;" type="button" value="Submit" class="button" /> 
      </div>
      
        
    </form>
    <?php echo $content_bottom; ?></div>
  </div>
</div>
<div id="dialog" style="display: none" align = "center">
    <p>Your request has been succefully submitted. Our team will contact you on approval.</p>
    <div><a href="./index.php?route=common/home">Home</a></div>
    <hr>
    <div><a href="./index.php?route=information/upload">Add another product</a></div> 
</div>
<script>
    $("#dialog").dialog({
            modal: true,
            autoOpen: false,
            title: "Successfully submitted!",
            width: 400,
            height: 400
        });
    $('#submit').click(function(e)
    {
    e.preventDefault();
    $.ajax({
        url: './upload/submit.php',
        type:'POST',
        data: $("#upload-form").serialize(),
        success: function(msg)
        {
            $('#dialog').dialog('open');
        }               
    });
    });
</script>
<?php echo $footer; ?>