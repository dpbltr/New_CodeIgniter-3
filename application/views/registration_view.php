<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></script>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body class="p-5">
    <h2>Student Registration!</h2>
    <div class="mx-auto p-2 d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="<?= base_url('validation/edit_data'); ?>"><button type="button" class="rounded-2 btn btn-outline-primary">Registration</button></a>
        <a href="<?= base_url('validation/login'); ?>"><button type="button" class="rounded-2 btn btn-outline-primary">Student Login</button></a>

    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile_No</th>
            <th>Address</th>
            <th>Password</th>
            <th>Confirmation_Password</th>
            <th>Action</th>
        </tr>
        <?php
        if (is_array($result) || is_object($result)) {
            foreach ($result['return'] as $value) { ?>

                <tr>
                    <td><?= isset($value['name']) ? $value['name'] : '' ?></td>
                    <td><?= isset($value['email']) ? $value['email'] : '' ?></td>
                    <td><?= isset($value['mobile_no']) ? $value['mobile_no'] : '' ?></td>
                    <td><?= isset($value['address']) ? $value['address'] : '' ?></td>
                    <td><?= isset($value['password']) ? $value['password'] : '' ?></td>
                    <td><?= isset($value['confirmation_password']) ? $value['confirmation_password'] : '' ?></td>
                    <td>
                        <a href="<?= base_url() . "validation/edit_data/?id=" . $value['id'] ?>"><button type="button" class="rounded-2">Edit</button></a>
                        <a href="<?= base_url() . "validation/delete/?id=" . $value['id'] ?>"><button type="button" class="rounded-2">Delete</button></a>
                    </td>

                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>