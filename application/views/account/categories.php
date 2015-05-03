<?php $this->load->view("includes/header", ["title" => "My specialties"]); ?>
<h2>My Categories</h2>
<?= form_open("account/updatecategories") ?>
<input type="hidden" name="session_id" value="<?=$this->session->userdata("session_id")?>" />
<ul class="list-group">
    <?php foreach($categories as $category): ?>
    <li class="list-group-item switch-checkbox">
        <h3><?=$category->description?></h3>
        <input type="checkbox" <?=$category->checked == 1 ? "checked": ""?> value="<?=$category->id?>" name="categories[]" data-toggle="toggle">        
    </li> 
    <?php endforeach; ?>
    <li class="list-group-item">
        <button type="submit" class="btn btn-primary">Save</button>
    </li>
    <li class="list-group-item"><?= anchor("account/profile", "Back to my profile", ["class" => "btn btn-default"]) ?></li>
</ul>
<?= form_close() ?>


<?php $this->load->view("includes/footer"); ?>