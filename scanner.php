<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="hudson, hudson leao, viaceu, velocidade, ping, traceroute, dns, mx, whois, portas,
              port scanner, nmap, internet, redes, php">
        <meta name="author" content="Hudson Leão">
        <meta name="theme-color" content="#343a40">
        <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
        <link rel="icon" href="assets/favicon.ico">

        <title>PORT SCANNER</title>
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/uikit-rtl.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/uikit.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require 'navbar.php'; ?>
        <section class="main-content">
                <div class="uk-card uk-card-large uk-text-center uk-background-muted uk-card-body">
                    <h1>PORT SCANNER</h1><br>
                    <form action="" method="post" name="formulario">
                        <input class="uk-input uk-form-width-large" name=campo1 type="text" placeholder="Digite o host">
                        <input class="uk-button uk-button-primary"  type="submit" name="formulario" value="OK">

                    </form>
                    <br><?php
                    if (isset($_POST['formulario'])) {
                        $host = $_POST['campo1'];
                        exec(" nmap -P0 " . $host, $output, $result);
                        $quant = count($output);
                        echo 'Port Scanner para o host:<p style="font-size:30px; color:blue;">' . $host . "</p>";
                        echo '<div class="container uk-text-center">'
                        . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                        for ($i = 6; $i <= $quant - 3; $i++) {
                            echo $output[$i];
                            print '<br>';
                        }
                        ?>
                    <?php } ?>
                </div>
        </section>      
        <script src="assets/js/uikit-icons.js" type="text/javascript"></script>
        <script src="assets/js/uikit.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.bundle.js" type="text/javascript"></script>
        <script src="assets/js/jquery-3.1.1.slim.min.js" type="text/javascript"></script>
        <script src="assets/js/style.js" type="text/javascript"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-3.1.1.min.js"><\/script>')</script>
        <script src="assets/js/tether.min.js" type="text/javascript"></script>
        <script src="assets/dist/js/bootstrap.min.js"></script>
    </body>
    <?php include 'footer.php'; ?> 
</html>
