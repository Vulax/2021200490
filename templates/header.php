<!DOCTYPE html>
<html>
<head>
    <title>2021200490</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link.active {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Veb Aplikacija za Banku</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <a class="navbar-brand" href="/2021200490">Bankarska Aplikacija</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/2021200490/vlasnik/list.php') ? 'active' : ''; ?>" href="/2021200490/vlasnik/list.php">Lista Vlasnika</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/2021200490/vlasnik/add.php') ? 'active' : ''; ?>" href="/2021200490/vlasnik/add.php">Dodaj Vlasnika</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/2021200490/racun/list.php') ? 'active' : ''; ?>" href="/2021200490/racun/list.php">Lista Računa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/2021200490/racun/add.php') ? 'active' : ''; ?>" href="/2021200490/racun/add.php">Dodaj Račun</a>
                    </li>
                </ul>
            </div>
        </nav>
