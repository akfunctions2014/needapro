<?php $this->load->view("includes/header", ["title" => "Login"]); ?>
    <?= validation_errors("<div class='alert alert-danger'>", "</div>") ?>
    <?php if(isset($loginerror)): ?>
    <div class='alert alert-danger'><?=$loginerror?></div>
    <?php endif; ?>
    <h2>Login</h2>
    <?= form_open("account/login") ?>
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
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" maxlength="15" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <?= form_close() ?>
    <br/>

    <div class="list-group">
        <?= anchor("account/forgotpassword", "Forgot your password?", ["class"=> "list-group-item"]) ?>
        <?= anchor("account/register", "Register an account", ["class"=> "list-group-item"]) ?>
    </div>

<?php $this->load->view("includes/footer"); ?>