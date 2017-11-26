<?= $error ?>
<?php echo form_open_multipart('upload/do_upload'); ?>
    <div class="form-group">
        <label for="userfile">File</label>
        <input type="file" class="form-control" id="userfile" name="userfile" size="20">
    </div>   
    <input type="submit" value="upload" class="btn btn-success">
<form>
