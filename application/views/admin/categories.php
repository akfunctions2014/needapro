<?php $this->load->view("includes/header", ["title" => "Categories {$totalcount}"]); ?>
<h1>Categories (<?= $totalcount ?>)</h1>
<ul class="list-group">
    <li class="list-group-item">
        <?= form_open("admin/addcategory") ?>
        <div class="form-group">
            <input type="hidden" name="session_id" value="<?= $this->session->userdata("session_id") ?>" />
            <input type="text" class="form-control" name="description"  placeholder="Add a new Category" autocomplete="off">
        </div>            
        <button type="submit" class="btn btn-primary">Add New</button>
        <?= form_close() ?>                
    </li>
    <?php foreach ($categories as $category): ?>
        <li class="list-group-item">
            <?= form_open("admin/editcategory/{$category->id}") ?>
            <div class="form-group">
                <input type="hidden" name="session_id" value="<?= $this->session->userdata("session_id") ?>" />
                <input type="text" class="form-control" value="<?= $category->description ?>" name="description" autocomplete="off" />
            </div>            
            <button type="submit" class="btn btn-primary">Update</button>
            <?= anchor("admin/deletecategory/{$category->id}", "Delete", ["class" => "btn btn-danger", "onclick" => "return confirm('Delete Category?')"]) ?>
            <?= form_close() ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php $this->load->view("includes/footer"); ?>