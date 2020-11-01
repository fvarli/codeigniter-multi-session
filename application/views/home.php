<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css") ?>">
    <title>Home</title>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://ferzendervarli.com"><?= $user->full_name; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Process <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($user_list as $item) { ?>
                            <? if (md5($item->email) != md5($user->email)) { ?>
                                <li><a href="<?= base_url("home/" . md5($item->email)) ?>" target="_blank"><?= $item->full_name; ?></a></li>
                            <? } ?>
                        <?php } ?>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= base_url('login') ?>" target="_blank">Login with Different Account</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= base_url("logout/" . md5($user->email)) ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-6 well col-md-offset-3">
            <h3>Your Products</h3>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <th>ID</th>
                <th>Product Name</th>
                </thead>
                <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->product_name ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url("assets/js/jquery-3.5.1.min.js") ?>"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>