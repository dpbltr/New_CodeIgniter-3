<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-top: 0;
        }

        .login-container input[type="text"],
        .login-container input[type="email"],
        .login-container input[type="tel"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Student Registration!</h2>
        <form method="POST" action="<?php echo base_url() . 'validation/registration/' ?>">

            <input type="hidden" name="id" placeholder="Your id" id="id" value="<?= isset($userData['id']) ? $userData['id'] : ''  ?>">
            <input type="text" name="name" placeholder="Your Name" id="name" value="<?= isset($userData['name']) ? $userData['name'] : ''  ?>">
            <input type="email" name="email" placeholder="Your Email" id="email" value="<?= isset($userData['email']) ? $userData['email'] : ''  ?>">
            <input type="tel" name="mobile_no" placeholder="Your Mobile_no" id="mobile_no" value="<?= isset($userData['mobile_no']) ? $userData['mobile_no'] : ''  ?>">
            <input type="text" name="address" placeholder="Your Address" id="address" value="<?= isset($userData['address']) ? $userData['address'] : ''  ?>">
            <input type="password" name="password" placeholder="Password" id="password" value="<?= isset($userData['password']) ? $userData['password'] : ''  ?>">
            <input type="password" name="confirmation_password" placeholder="confirmation_password" id="confirmation_password" value="<?= isset($userData['confirmation_password']) ? $userData['confirmation_password'] : ''  ?>">
            <button type="submit">Save</button>
        </form>
    </div>
</body>

</html>