<?php if (!isset($conn)) {
  include 'db_connect.php';
} ?>
<style>
  textarea {
    resize: none;
  }
</style>
<div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <form action="" id="manage-parcel">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <br>
              <label for="" class="control-label">Fresh Greens</label>
              <!-- <input type="text" name="sender_name" id="" class="form-control form-control-sm" value="Fresh Greens" disabled> -->
            </div>
            <div class="form-group">
              <label for="" class="control-label">192,tambaram,chennai</label>
              <!-- <input type="text" name="sender_address" id="" class="form-control form-control-sm"  value="192,tambaram,chennai"> -->
            </div>
            <div class="form-group">
              <label for="" class="control-label">8989748667</label>
              <!-- <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="09047827488"> -->
            </div>
          </div>
          <div class="col-md-6">
            <b>Recipient Information</b><br><br>
            <div class="form-group">
              <label for="" class="control-label">Name</label>
              <input type="text" name="recipient_name" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_name) ? $recipient_name : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Address</label>
              <input type="text" name="recipient_address" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_address) ? $recipient_address : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Contact #</label>
              <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
            </div>
          </div>
        </div>
        <hr>
         
         
        <b>Parcel Information</b>
        <table class="table table-bordered" id="parcel-items">
          <thead>
            <tr>
            <th>RFID </th>
              <th>Parcel Type </th>
              <th>Items</th>
              <th>Weight</th>
              <th>Quantity</th>
              <?php if (!isset($id)) : ?>
                <th></th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name='weight[]' value="<?php echo isset($weight) ? $weight : '' ?>" required></td>
              <td><input type="text" name='height[]' value="<?php echo isset($height) ? $height : '' ?>" required></td>
              <td><input type="text" name='length[]' value="<?php echo isset($length) ? $length : '' ?>" required></td>
              <td><input type="text" name='width[]' value="<?php echo isset($width) ? $width : '' ?>" required></td>
              <td><input type="text" class="text-right number" name='price[]' value="<?php echo isset($price) ? $price : '' ?>" required></td>
              <?php if (!isset($id)) : ?>
                <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              <?php endif; ?>
            </tr>
          </tbody>
          <?php if (!isset($id)) : ?>

            <tfoot>
              <th colspan="4" class="text-right">Total</th>
              <th class="text-right" id="tAmount"></th>
              <th></th>
            </tfoot>
          <?php endif; ?>

        </table>
        <?php if (!isset($id)) : ?>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
              <button class="btn btn-sm btn-primary bg-gradient-primary" type="button" id="new_parcel"><i class="fa fa-item"></i> Add Item</button>
            </div>
          </div>
        <?php endif; ?>
      </form>
    </div>
    <div class="card-footer border-top border-info">
      <div class="d-flex w-100 justify-content-center align-items-center">
        <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-parcel">Save</button>
        <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parcel_list">Cancel</a>
      </div>
    </div>
  </div>
</div>
<div id="ptr_clone" class="d-none">
  <table>
    <tr>
      <td><input type="text" name='weight[]' required></td>
      <td><input type="text" name='height[]' required></td>
      <td><input type="text" name='length[]' required></td>
      <td><input type="text" name='width[]' required></td>
      <td><input type="text" class="text-right number" name='price[]' required></td>
      <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
    </tr>
  </table>
</div>
<script>
  $('#dtype').change(function() {
    if ($(this).prop('checked') == true) {
      $('#tbi-field').hide()
    } else {
      $('#tbi-field').show()
    }
  })
  $('[name="price[]"]').keyup(function() {
    calc()
  })
  $('#new_parcel').click(function() {
    var tr = $('#ptr_clone tr').clone()
    $('#parcel-items tbody').append(tr)
    $('[name="price[]"]').keyup(function() {
      calc()
    })
    $('.number').on('input keyup keypress', function() {
      var val = $(this).val()
      val = val.replace(/[^0-9]/, '');
      val = val.replace(/,/g, '');
      val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
      $(this).val(val)
    })

  })
  $('#manage-parcel').submit(function(e) {
    e.preventDefault()
    start_load()
    if ($('#parcel-items tbody tr').length <= 0) {
      alert_toast("Please add atleast 1 parcel information.", "error")
      end_load()
      return false;
    }
    $.ajax({
      url: 'ajax.php?action=save_parcel',
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp) {
        // if(resp){
        //       resp = JSON.parse(resp)
        //       if(resp.status == 1){
        //         alert_toast('Data successfully saved',"success");
        //         end_load()
        //         var nw = window.open('print_pdets.php?ids='+resp.ids,"_blank","height=700,width=900")
        //       }
        // }
        if (resp == 1) {
          alert_toast('Data successfully saved', "success");
          setTimeout(function() {
            location.href = 'index.php?page=parcel_list';
          }, 2000)

        }
      }
    })
  })

  function displayImgCover(input, _this) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#cover').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  function calc() {

    var total = 0;
    $('#parcel-items [name="price[]"]').each(function() {
      var p = $(this).val();
      p = p.replace(/,/g, '')
      p = p > 0 ? p : 0;
      total = parseFloat(p) + parseFloat(total)
    })
    if ($('#tAmount').length > 0)
      $('#tAmount').text(parseFloat(total).toLocaleString('en-US', {
        style: 'decimal',
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
      }))
    if ($('#tAmounti').length > 0)
      $('#tAmount').text(parseFloat(total).toLocaleString('en-US', {
        style: 'decimal',
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
      }))
  }
</script>