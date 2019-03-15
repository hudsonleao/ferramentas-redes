<?php
$title = "Status servidores";
$servers = array(
    'Servidor 205.185.194.34' => array(
        'ip' => '205.185.194.34',
        'port' => '',
        'info' => 'Servidor Valve',
        'purpose' => 'teste'
    ),
    'Servidor Offline Teste' => array(
        'ip' => '10.0.0.1',
        'port' => '80',
        'info' => '10.0.0.1',
        'purpose' => 'teste'
    ),
    'Servidor 189.1.169.63' => array(
        'ip' => '189.1.169.63',
        'port' => '',
        'info' => 'Gamers Club',
        'purpose' => 'Teste 2'
    ),
    'Servidor Facebook' => array(
        'ip' => 'www.facebook.com',
        'port' => '80',
        'info' => 'facebook.com',
        'purpose' => 'Teste 2'
    ),
    'Servidor Google' => array(
        'ip' => 'www.google.com',
        'port' => '80',
        'info' => 'google.com',
        'purpose' => 'Teste 2'
    ),
    'Servidor 189.1.169.119' => array(
        'ip' => '189.1.169.119',
        'port' => '',
        'info' => 'Gamers Club',
        'purpose' => 'Teste 2'
    )
);
if (isset($_GET['host'])) {
    $host = $_GET['host'];
    if (isset($servers[$host])) {
        header('Content-Type: application/json');
        $return = array(
            'status' => test($servers[$host])
        );
        echo json_encode($return);
        exit;
    } else {
        header("HTTP/1.1 404 Not Found");
    }
}
$names = array();
foreach ($servers as $name => $info) {
    $names[$name] = md5($name);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="hudson, hudson liberio leao, hudson leao, viaceu, velocidade, ping, traceroute, dns, mx, whois, portas,
              port scanner, nmap, internet, redes, php">
        <meta name="author" content="Hudson Libério Leão">
        <meta name="theme-color" content="#343a40">
        <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
        <link rel="icon" href="assets/favicon.ico">

        <title>INÍCIO</title>
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php include 'navbar.php'; ?>
        <section class="main-content">
        <div class="container uk-text-center">
            <div class="uk-background-muted uk-padding uk-panel">         
                <h1>Status Servidores</h1>
		<?php
   		$ip = $_SERVER['REMOTE_ADDR'];
   		echo "Seu IP é: ".$ip;
		?>

                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($servers as $name => $server): ?>

                            <tr id="<?php echo md5($name); ?>">
                                <td><i class="icon-spinner icon-spin icon-large"></i></td>
                                <td class="name"><?php echo $name; ?></td>
                                <td><?php echo $server['info']; ?></td>
                                <td><?php
                                    if (test($server) == true):
                                        print'<span class="badge badge-pill badge-success">';
                                        echo "Online";
                                        print'</span>';
                                    else: print'<span class="badge badge-pill badge-danger">';
                                        echo "Offline";
                                        print'</span>';
                                    endif;
                                    ?></td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> 
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        function test(host, hash) {

            var request;

            request = $.ajax({
                url: "<?php echo basename(__FILE__); ?>",
                type: "get",
                data: {
                    host: host
                },
                beforeSend: function () {
                    $('#' + hash).children().children().css({'visibility': 'visible'});
                }
            });

            request.done(function (response, textStatus, jqXHR) {
                var status = response.status;
                var statusClass;
                if (status) {
                    statusClass = 'bg-success';
                } else {
                    statusClass = 'bg-danger';
                }
                $('#' + hash).removeClass('bg-success bg-danger').addClass(statusClass);
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {

                console.error(
                        "The following error occured: " +
                        textStatus, errorThrown
                        );
            });
            request.always(function () {
                $('#' + hash).children().children().css({'visibility': 'hidden'});
            })
        }
        $(document).ready(function () {
            var servers = <?php echo json_encode($names); ?>;
            var server, hash;
            for (var key in servers) {
                server = key;
                hash = servers[key];
                test(server, hash);
                (function loop(server, hash) {
                    setTimeout(function () {
                        test(server, hash);
                        loop(server, hash);
                    }, 6000);
                })(server, hash);
            }
        });
    </script>
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
<?php

function test($server) {
    $sock = @fsockopen($server['ip'], $server['port'], $errorNo, $errorStr, 3);
    if ($errorNo == 0) {
        return true;
    } else {
        return false;
    }
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
?>
