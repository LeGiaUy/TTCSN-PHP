<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #343a40;
            color: #fff;
            padding: 20px 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ddd;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .content {
            margin-left: 270px; /* Đẩy nội dung sang phải bằng chiều rộng của sidebar */
            padding: 20px;
        }

        .content h1 {
            font-size: 28px;
            color: #333;
        }

        .content p {
            font-size: 16px;
            color: #666;
        }

        .container.text-center {
            margin-left: 270px; /* Đẩy nút đăng xuất sang phải */
            margin-top: 20px;
            text-align: left;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        hr {
            margin: 20px 0;
            border: 0;
            height: 1px;
            background: #eee;
        }

        .container p {
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
