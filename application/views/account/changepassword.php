<?php $this->load->view("includes/header", ["title" => "Login"]); ?>
    <?= validation_errors("<div class='alert alert-danger'>", "</div>") ?>
    <?php if(isset($infomessage)): ?>
    <div class='alert alert-success'><?=$infomessage?></div>
    <?php endif; ?>
    <h2>Change my password</h2>
    <?= form_open("account/changepassword") ?>
    <input type="hidden" name="session_id" value="<?= $this->session->userdata("session_id") ?>" />
    <div class="form-group">
        <label for="oldpassword">Current password</label>
        <input 
            type="password" 
            class="form-control" 
            id="oldpassword" 
            name="oldpassword" 
            maxlength="15" 
            placeholder="Enter your current password"
            required
            />
    </div>
    <div class="form-group">
        <label for="newpassword">New password</label>
        <input type="password" class="form-control" id="newpassword" maxlength="15" name="newpassword" placeholder="Enter your new password">
    </div>
    <div class="form-group">
        <label for="newpassword2">Repeat your new password</label>
        <input type="password" class="form-control" id="newpassword2" maxlength="15" name="newpassword2" placeholder="Enter your new password again">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Change my password</button>
    <?= form_close() ?>
    <br/>

    <div class="list-group">
        <?= anchor("account/profile", "Back to my profile", ["class"=> "list-group-item"]) ?>        
    </div>

<?php $this->load->view("includes/footer"); ?>