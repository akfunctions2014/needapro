<?php $this->load->view("includes/header", ["title" => "Accounts {$totalcount}"]); ?>
<h1>Accounts (<?= $totalcount ?>)</h1>

<ul class="list-group">
    <li class="list-group-item">
        <div class="btn-group-justified" role="group">
            <?= anchor("admin/accounts", "All", ["class" => "btn btn-default"]) ?>
            <?= anchor("admin/accounts/active/1", "Active", ["class" => "btn btn-default"]) ?>
            <?= anchor("admin/accounts/active/0", "Inactive", ["class" => "btn btn-default"]) ?>
        </div>
    </li>
    <li class="list-group-item">
        <?=form_open("admin/accounts/{$field}/{$value}", ["role"=>"search", "method"=> "GET"])?>
        <div class="form-group">
          <input type="search" class="form-control" name="search" value="<?=$this->input->get("search")?>" placeholder="Search">
        </div>            
     <?=form_close()?>        
    </li>
    <?php foreach ($accounts as $account): ?>
        <li class="list-group-item">
            <div class="media">
                <div class="media-left">
                    <?php
                    $imgSrc = $account->avatar ? site_url($account->avatar) : "assets/images/empty-avatar.jpg";
                    echo img([
                        "src" => $imgSrc,
                        "class" => "media-object avatar-img"
                    ]);
                    ?>

                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $account->fullname ?></h4>      
                    <p><?= $account->email ?></p>
                    <?php if ($account->active == 1): ?>
                        <span class="label label-success">Active</span>
                    <?php else: ?>
                        <span class="label label-danger">Inactive</span>
                    <?php endif; ?>
                    <span class="label label-info"><?= $account->type ?></span>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<?php $this->load->view("includes/footer"); ?>