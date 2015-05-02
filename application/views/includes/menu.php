<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
      <?=anchor("home", "needapro", ["class"=> "navbar-brand"])?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><?=anchor("category/index", "Categories")?></li>
            <li><?=anchor("account/index", "My account")?></li>
            <li><?=anchor("page/about", "About")?></li>
            <li><?=anchor("page/terms", "Terms of use")?></li>
            <?php if($this->session->userdata("type") == "ADMIN"): ?>
            <li class="dropdown">
                <?=anchor("admin/index", "Administration<span class='caret'></span>", [
                    "class"=> "dropdown-toggle",
                    "data-toggle"=>"dropdown",
                    "role"=> "button"
                ])?>
                <ul class="dropdown-menu" role="menu">
                    <li><?=anchor("admin/accounts", "Accounts")?></li>                    
                    <li><?=anchor("admin/categories", "Categories")?></li>                    
                </ul>
            </li>
            <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

