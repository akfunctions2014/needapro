<?php $this->load->view("includes/header", ["title" => "Edit my profile"]); ?>
<h2>Edit my profile</h2>
<?= validation_errors("<div class='alert alert-danger'>", "</div>") ?>
<?= form_open("account/editprofile") ?>
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
        <div class="form-group">
            <label for="fullname">My name</label>
            <input 
                type="text" 
                class="form-control" 
                id="fullname" 
                name="fullname" 
                maxlength="30" 
                value="<?= $account->fullname ?>"
                required
                />
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                maxlength="30" 
                value="<?= $account->email ?>"
                required
                />
        </div>
        <div class="form-group">
            <label for="cellphone">Cell phone</label>
            <input 
                type="text" 
                class="form-control" 
                id="cellphone" 
                name="cellphone" 
                maxlength="10" 
                value="<?= $account->cellphone ?>"
                required
                />
        </div>
        <div class="form-group">
            <label for="homephone">Home phone</label>
            <input 
                type="text" 
                class="form-control" 
                id="homephone" 
                name="homephone" 
                maxlength="10" 
                value="<?= $account->homephone ?>"
                required
                />
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" id="notes" name="notes" value=""><?=$account->notes?></textarea>        
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save Profile</button>
    </div>
    <?= anchor("account/profile", "Back to my profile", ["class" => "list-group-item"]) ?>        

</div>
<?= form_close() ?>

<?php $this->load->view("includes/footer"); ?>