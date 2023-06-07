<?php

?>

<head>
    <title>PremierLeague</title>
    <link rel="icon" href="img/icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .title-text {
            font-size: xx-large;
        }

        .nav-text {
            font-size: large;
            font-weight: 600;
        }

        .card-zaobljeno {
            border-radius: 20px;
        }

        .card-logo {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

        .team-logo {
            margin-left: 45%;
            max-width: 10%;
            height: auto;
        }

        .form {
            padding: 10px;
            margin-left: 25%;
            width: 50%;
            text-align: center;
            border-radius: 15px;
        }

    </style>
</head>

<body class="blue lighten-4">
    <nav class="blue darken-3">
        <div class="container">
            <a href="index.php" class="title-text">PremierLeague</a>
            <ul class="right hide-on-small-and-down navul">
                <li>
                    <a href="players.php" class="btn white blue-text nav-text z-depth-0">
                        All Players
                    </a>
                </li>
                <li>
                    <a href="add.php" class="btn white blue-text nav-text z-depth-0">
                        Add A Player
                    </a>
                </li>
            </ul>
        </div>
    </nav>