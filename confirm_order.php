<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbucks Website Landing Page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        section {
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 100px;
            display: flex;
            flex-direction:column;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
        }

        header {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    display: flex;
    justify-content: flex-start; /* Align elements horizontally */
    align-items: center; /* Align elements vertically */
    gap: 20px; /* Adds spacing between logo, username, and navigation */
}

header .logo {
    max-width: 80px;
}

header .user-name {
    font-size: 1.2em;
    color: #333;
    margin-left: 10px;
    display: inline-block;
    align-self: center; /* Vertically aligns the username */
}

header ul {
    display: flex;
    align-items: center; /* Vertically aligns the navigation links */
    margin-left: auto; /* Pushes the navigation links to the right */
}

header ul li {
    list-style: none;
}

header ul li a {
    color: #333;
    font-weight: 400;
    margin-left: 40px;
    text-decoration: none;
}

        /* User name styling */
        .user-name {
            font-size: 1.2em;
            color: #333;
            margin-left: 10px; /* Reduced margin for closer positioning */
            display: inline-block; /* Ensures it aligns properly next to the logo */
        }

        .content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content .textBox {
            position: relative;
            max-width: 600px;
        }

        .content .textBox h2 {
            color: #333;
            font-size: 4em;
            line-height: 1.4em;
            font-weight: 500;
        }

        .content .textBox h2 span {
            color: #017143;
            font-size: 1.2em;
            font-weight: 900;
        }

        .content .textBox p {
            color: #333;
        }

        .content .textBox a {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 20px;
            background-color: #017143;
            color: #fff;
            text-decoration: none;
            border-radius: 40px;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .content .imgBox {
            width: 600px;
            display: flex;
            justify-content: flex-end;
            padding-right: 50px;
            margin-top: 50px;
        }

        .content .imgBox img {
            max-width: 340px;
        }

        .thumb {
            position: absolute;
            left: 50%;
            bottom: 20px;
            transform: translateX(-50%);
            display: flex;
        }

        .thumb li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            cursor: pointer;
            transition: 0.5s;
        }

        .thumb li:hover {
            transform: translateY(-15px);
        }

        .thumb li img {
            max-width: 60px;
        }

        .social {
            position: absolute;
            top: 50%;
            right: 30px;
            transform: translateY(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .social li {
            list-style: none;
        }

        .social li a {
            display: inline-block;
            margin: 5px 0;
            transform: scale(0.6);
            filter: invert(1);
        }

        .circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #017143;
            clip-path: circle(600px at right 800px);
        }

        .login-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #017143;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #014f2f;
        }
        h1 {
            text-align: center;
            color: #333;
        }

        .cart-container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #017143;
            color: white;
        }

        td {
            background-color: #fafafa;
        }

        .cart-item-name {
            font-weight: 500;
            color: #333;
        }

        .cart-item-price {
            color: #017143;
            font-weight: bold;
        }

        .confirm-btn {
            display: block;
            width: 100%;
            padding: 12px 0;
            background-color: #017143;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .confirm-btn:hover {
            background-color: #014f2f;
        }

        .empty-cart-message {
            text-align: center;
            color: #777;
        }
        main{
            margin-top:20rem;
        }
        .confirmation-message {
            text-align: center;
            font-size: 24px;
            color: #017143;
            margin-top: 50px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #017143;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px;
        }

        .back-btn:hover {
            background-color: #014f2f;
        }
        /* responsive */
        @media (max-width: 991px) {
            header {
                padding: 20px;
            }

            header .logo {
                max-width: 60px;
            }

            header ul {
                display: none;
            }

            .toggle {
                position: relative;
                width: 30px;
                height: 30px;
                cursor: pointer;
                background: url(./img/menu.png);
                background-size: 30px;
                background-position: center;
                background-repeat: no-repeat;
                filter: invert(1);
                z-index: 11;
            }

            .toggle.active {
                position: fixed;
                right: 20px;
                background: url(./img/close.png);
                background-size: 25px;
                background-position: center;
                background-repeat: no-repeat;
            }

            header ul.navigation.active {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                background: #fff;
                z-index: 10;
            }

            header ul li a {
                font-size: 1.5em;
                margin: 5px 0;
            }

            section {
                padding: 20px 20px 120px;
            }

            .content {
                flex-direction: column;
                margin-top: 100px;
            }

            .content .textBox h2 {
                font-size: 2.5em;
            }

            .content .textBox {
                max-width: 100%;
            }

            .content .imgBox {
                max-width: 100%;
                justify-content: center;
            }

            .content .imgBox img {
                max-width: 300px;
            }

            .thumb li img {
                max-width: 40px;
            }

            .circle {
                clip-path: circle(400px at center bottom);
            }

            .social {
                background: #017143;
                right: 0;
                width: 50px;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
            }
        }
    </style>
</head>

<body>
    <>
        
        <header>
      
<<<<<<< HEAD
            <a href="#"><img src="img\burrito.jpg" class="logo" alt=""></a>
=======
            <a href="#"><img src="./img/logo.png" class="logo" alt=""></a>
>>>>>>> 5e43a1b271ae71da4749a9743e122999d2d04ca2
            <!-- Display username near the logo if logged in -->
            <span class="user-name">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "Hello, " . $_SESSION['username'];
                }
                ?>
            </span>
            <div class="toggle" onclick="toggleMenu()"></div>
            <ul class="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <!-- Replace login link with a button -->
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<li><a href="login.php" class="login-btn">Login</a></li>';
                } else {
                    echo '<li><a href="logout.php" class="login-btn">Logout</a></li>';
                }
                ?>
            </ul>
        </header>
        <main>
      <div class="confirmation-message">
        <?php
        // Display confirmation message
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo "Your order has been placed successfully!";
            // Optionally, clear the cart after confirming the order
            unset($_SESSION['cart']);
        } else {
            echo "No items in the cart to confirm.";
        }
        ?>
    </div>
    <div style="text-align: center;">
        <a href="menu.php" class="back-btn">Explore More Items</a>
    </div>
</main>  
</body>

</html>
