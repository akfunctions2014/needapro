<?php $this->load->view("includes/header", ["title" => "Register"]); ?>
    <?= validation_errors("<div class='alert alert-danger'>", "</div>") ?>
   <?php if(isset($infomessage)): ?>
    <div class='alert alert-success'><?=$infomessage?></div>
    <?php endif; ?>
    <h2>Register</h2>
    <?= form_open("account/register") ?>
    <input type="hidden" name="session_id" value="<?= $this->session->userdata("session_id") ?>" />
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="fullname">Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your name" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Register</button>
    <?= form_close() ?>

    <br />
    <div class="list-group">            
        <?= anchor("account/login", "Login", ["class"=> "list-group-item"]) ?>
    </div>



<?php $this->load->view("includes/footer"); ?>