<?php $this->load->view("includes/header", ["title" => "Profile picture"]); ?>
<h2>Profile picture</h2>
<?= validation_errors("<div class='alert alert-danger'>", "</div>") ?>
<?php if(isset($errormessage)): ?>
    <div class='alert alert-danger'><?=$errormessage?></div>
<?php endif; ?>
<?= form_open_multipart("account/avatar") ?>
<input type="hidden" name="session_id" value="<?=$this->session->userdata("session_id")?>" />
<div class="list-group">
    <div class="list-group-item media">
        <div class="media-left">
            <?php
            $imgSrc = $account->avatar ? site_url($account->avatar) : "assets/images/empty-avatar.jpg";
            echo img([
                "src" => $imgSrc,
                "class" => "media-object avatar-img"
            ]);
            ?>
        
        </div> 
        
    </div>    
    <div class="form-group list-group-item">            
        <input type="file" name="userfile" id="userfile" />
    </div>
    <div class="list-group-item">
        <button type="submit" class="btn btn-primary btn-block">Update avatar</button>
    </div>
    
    
    <?= anchor("account/profile", "Back to my profile", ["class" => "list-group-item"]) ?>        

</div>
<?= form_close() ?>

<?php $this->load->view("includes/footer"); ?>