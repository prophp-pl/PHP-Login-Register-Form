<?php
use Aura\Html\HelperLocatorFactory;

$factory = new HelperLocatorFactory;
$helper = $factory->newInstance();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wwwgo.pl">

    <title>Formularz rejestracji</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  </head>

  <body>

    <div class="container">
        <div class="row">
            <form class="form-register form-horizontal" method="POST">
                <h2 class="form-signin-heading">Formularz logowania</h2>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Podaj adres e-mail</label>
                    <div class="col-sm-5">
                        <?= $helper->input($form->get('email')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Podaj hasło</label>
                    <div class="col-sm-5">
                        <?= $helper->input($form->get('password')); ?>
                    </div>
                </div>

                <?= $helper->input($form->get('submit')); ?>
            </form>
        </div>
        <?php if (count($form->getMessages()) > 0): ?>
            <div class="row" style="margin-top: 2em;">
                <p class="text-danger">Wystąpiły błędy w formularzu:</p>
                <?php foreach ($form->getMessages() as $message) {
                    echo '<li>', $message[0], '</li>';
                } ?>
            </div>
        <?php endif; ?>
    </div>

  </body>
</html>