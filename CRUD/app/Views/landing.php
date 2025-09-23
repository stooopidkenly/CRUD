<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Welcome to the Landing Page!</h1>

    <?php if (session()->getFlashdata('loginSuccess')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('loginSuccess') ?>
        </div>
    <?php endif ?>

    <?php if (session()->get('isLoggedIn')): ?>
        <p>Hello, <?= session()->get('firstname'); ?>!</p>
    <?php endif ?>

    <form action="/users" method="GET">
        <button type=" submit">Show All Users</button>
    </form>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <form action="<?= base_url('delete/' . $user['id']) ?>" method="post" style="display:inline;">
                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </button>
                            </form>
                            <!-- <form action="<?= base_url('edit/' . $user['id']) ?>" method="post" style="display:inline;">
                                <button type="submit"
                                    class="btn btn-green btn-sm"
                                    onclick="return confirm('Edit User?');">
                                    Edit
                                </button>
                            </form> -->
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        function showModalEdit() {

        }
    </script>
</body>

</html>