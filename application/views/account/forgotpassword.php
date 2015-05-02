<?php $this->load->view("includes/header", ["title" => "Login"]); ?>
    <?= validation_errors("<div class='alert alert-danger'>", "</div>") ?>
    <?php if(isset($infomessage)): ?>
    <div class='alert alert-success'><?=$infomessage?></div>
    <?php endif; ?>
    <h2>Forgot your password?</h2>
    <p style="text-align: center;">Enter your email address and we will send you an email with your new password</p>
    <?= form_open("account/forgotpassword") ?>
    <input type="hidden" name="session_id" value="<?= $this->session->userdata("session_id") ?>" />
    <div class="form-group">
        <label for="email">Email address</label>
        <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            maxlength="30" 
            placeholder="Enter email"
            required
            />
    </div>    
    <button type="submit" class="btn btn-primary btn-block">Send me my password</button>
    <?= form_close() ?>
    <br/>

    <div class="list-group">
        <?= anchor("account/login", "Login", ["class"=> "list-group-item"]) ?>
        <?= anchor("account/register", "Register an account", ["class"=> "list-group-item"]) ?>
    </div>

<?php $this->load->view("includes/footer"); ?>