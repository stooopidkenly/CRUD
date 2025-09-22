<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        .mainContainer {
            display: flex;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .links ul {
            display: flex;
            flex-direction: row;
            gap: 100px;
            justify-content: center;
            margin-top: 50px;
        }

        li {
            list-style: none;
            font-size: 40px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        .flash {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="mainContainer">
        <h1 class="welcome">Welcome to my Basic CRUD Application</h1>

        <!-- Flash Messages here, below the title -->
        <?php if (session()->getFlashdata('registered')): ?>
            <span class="flash success"><?php echo session()->getFlashdata('registered') ?></span>
        <?php endif ?>

        <?php if (session()->getFlashdata('incomplete')): ?>
            <span class="flash error"><?php echo session()->getFlashdata('incomplete') ?></span>
        <?php endif ?>

        <?php if (session()->getFlashdata('failed')): ?>
            <span class="flash error"><?php echo session()->getFlashdata('failed') ?></span>
        <?php endif ?>

        <?php if (session()->getFlashdata('notFound')): ?>
            <span class="flash error"><?php echo session()->getFlashdata('notFound') ?></span>
        <?php endif ?>
    </div>

    <nav class="links">
        <ul>
            <li><a href="/loginView">Login</a></li>
            <li><a href="/registerView">Register</a></li>
        </ul>
    </nav>
</body>

</html>