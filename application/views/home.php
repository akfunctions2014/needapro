<?php $this->load->view("includes/header", ["title" => "needapro"]); ?>

<img src="http://placehold.it/150x150" class="img-responsive" style="margin: 0 auto;"/>

<br />



<ul class="list-group">
    <?= anchor("category/index", "Categories", ["class"=> "list-group-item"]) ?>
    <?= anchor("account/index", "My account", ["class"=> "list-group-item"]) ?>
    <?= anchor("page/about", "About", ["class"=> "list-group-item"]) ?>
    <?= anchor("page/terms", "Terms of use", ["class"=> "list-group-item"]) ?>   
</ul>

<?php $this->load->view("includes/footer"); ?>