<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css")?>">
    <title>Login</title>
</head>
<body>

<h3 class="text-center">
    Login
</h3>

<hr>

<div class="container">
    <div class="row">
        <div class="col-md-6 well col-md-offset-3">
            <form action="<?=base_url("users/user_login");?>" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <?php if(isset($form_error)) {?>
                        <small class="pull-right"><?php echo form_error("email");?></small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if(isset($form_error)) {?>
                        <small class="pull-right"><?php echo form_error("password");?></small>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>