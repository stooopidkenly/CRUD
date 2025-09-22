<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to the Landing Page!</h1>

    <?php if (session()->getFlashdata('loginSuccess')): ?>
        <span class="flash error"><?php echo session()->getFlashdata('loginSuccess') ?></span>
    <?php endif ?>

    <!-- Display session data -->
    <?php if (session()->get('isLoggedIn')): ?>
        <p>Hello, <?php echo session()->get('firstname'); ?>!</p>
    <?php endif ?>
</body>

</html>