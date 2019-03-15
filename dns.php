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

        <title>DNS</title>
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
                    <h1>DNS</h1>
                    <form action="" class="uk-grid-small" method="post" name="formulario" uk-grid> 
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label" for="form-stacked-text">Servidor DNS</label>
                            <select name="servidor" class="uk-select uk-form-width-large" id="servidor">   
                                <option value="127.0.0.1">Localhost</option>
                                <option value="8.8.8.8">Google</option>
                                <option value="208.67.222.222">OpenDNS</option>
                                <option value="1.1.1.1">CloudFlare</option>
                            </select></div>
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label" for="form-stacked-text">Parâmetro</label>
                            <select name="sintaxe" class="uk-select uk-form-width-large" id="sintaxe">
                                <option value="padrao">Sem parâmetro</option>
                                <option value="a">A</option>
                                <option value="ns">NS</option>
                                <option value="soa">SOA</option>
                                <option value="mx">MX</option>
                                <option value="ptr">PTR</option>
                                <option value="cname">CNAME</option>
                                <option value="txt">TXT</option>
                            </select></div>
                        <div class="uk-width-1-3@s">
                            <label class="uk-form-label" for="form-stacked-text">Host de destino</label>
                            <input class="uk-input uk-form-width-large" name=campo1 type="text" placeholder="Digite o host"></div>
                        <div class="uk-width-1-1@s">
                            <input class="uk-button uk-button-primary"  type="submit" name="formulario" value="OK"></div>
                    </form>
                    <br><?php
                    if (isset($_POST['formulario'])) {
                        $host = $_POST['campo1'];
                        $servidor = $_POST['servidor'];
                        $sintaxe = $_POST['sintaxe'];
                        switch ($sintaxe) {
                            case "padrao":
                                exec(" dig @" . $servidor . " " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i];
                                    print '<br>';
                                }
                                break;
                            case "a":
                                exec(" dig @" . $servidor . " a " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro A para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                            case "ns":
                                exec(" dig @" . $servidor . " ns " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro NS para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                            case "soa":
                                exec(" dig @" . $servidor . " soa " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro SOA para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                            case "mx":
                                exec(" dig @" . $servidor . " mx " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro MX para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                            case "ptr":
                                exec(" dig @" . $servidor . " ptr " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro PTR para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                            case "cname":
                                exec(" dig @" . $servidor . " cname " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro PTR para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                            case "txt":
                                exec(" dig @" . $servidor . " txt " . $host, $output, $result);
                                $quant = count($output);
                                echo 'Dig com parâmetro TXT para o host:<p style="font-size:30px; color:blue;">' . $host . '</p>';
                                echo '<div class="container uk-text-justify">'
                                . '<div class="uk-card uk-card-large uk-background-default uk-card-default uk-card-body">';
                                for ($i = 2; $i <= $quant; $i++) {
                                    echo $output[$i] . '<br>';
                                }
                                break;
                        }
                        ?>
                    <?php } ?>
                </div>
        </section>
        <?php include 'footer.php'; ?> 

        <script src="assets/js/uikit-icons.js" type="text/javascript"></script>
        <script src="assets/js/uikit.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.bundle.js" type="text/javascript"></script>
        <script src="assets/js/jquery-3.1.1.slim.min.js" type="text/javascript"></script>
        <script src="assets/js/style.js" type="text/javascript"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-3.1.1.min.js"><\/script>')</script>
        <script src="assets/js/tether.min.js" type="text/javascript"></script>
        <script src="assets/dist/js/bootstrap.min.js"></script>
    </body>
</html>
