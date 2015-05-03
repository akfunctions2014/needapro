<?php $this->load->view("includes/header", ["title" => "Profile"]); ?>
<h2>Profile</h2>

<div class="list-group">
   <div class="list-group-item media">
    <div class="media-left">
        <?php
            $imgSrc = $account->avatar ? site_url($account->avatar) : "assets/images/empty-avatar.jpg";
            echo img([
                "src"=> $imgSrc,
                "class"=>"media-object avatar-img"
            ]);
        ?>
      
    </div>
    <div class="media-body">
      <h4 class="media-heading"><?=$account->fullname?></h4>
      <?=$account->email?>
    </div>
  </div>    
  

    <?= anchor("account/editprofile", "Edit Profile", ["class"=> "list-group-item"]) ?>
    <?= anchor("account/categories", "My specialties", ["class"=> "list-group-item"]) ?>
    <?= anchor("account/changepassword", "Change my password", ["class"=> "list-group-item"]) ?>
    <?= anchor("account/avatar", "Change my profile picture", ["class"=> "list-group-item"]) ?>
    <?= anchor("account/logout", "Logout", ["onclick"=>"return confirm('Do you want to logout?')","class"=> "list-group-item"]) ?>
</div>

<?php $this->load->view("includes/footer"); ?>