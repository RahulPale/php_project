<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $item = $_POST['item'];
    $price = $_POST['price'];

    // If the cart doesn't exist, create it
    if (!isset($_SESSION['cart'])) {
         $_SESSION['cart'] = [];
    }

    // Add the item to the cart
    $_SESSION['cart'][] = ['item' => $item, 'price' => $price];

    // Redirect back to menu to prevent form resubmission
    header("Location: menu.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>

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
            justify-content: flex-start;
            align-items: center;
            gap: 20px;
        }

        header .logo {
            max-width: 80px;
        }

        header .user-name {
            font-size: 1.2em;
            color: #333;
            margin-left: 10px;
            display: inline-block;
            align-self: center;
        }

        header ul {
            display: flex;
            align-items: center;
            margin-left: auto;
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction:column;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .menu-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            padding: 20px;
            text-align: left;
            transition: transform 0.3s;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .menu-item img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .menu-item h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        .menu-item p {
            font-size: 14px;
            color: #555;
        }

        .price {
            font-size: 18px;
            margin: 10px 0;
        }

        .add-item-btn {
            background-color: #ddd;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-item-btn:hover {
            background-color: #bbb;
        }

        .icon-veg,
        .icon-nonveg {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .icon-veg {
            background-color: green;
        }

        .icon-nonveg {
            background-color: red;
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
    <section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="img\burrito.jpg" class="logo" alt=""></a> 
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
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<li><a href="login.php" class="login-btn">Login</a></li>';
                } else {
                    echo '<li><a href="logout.php" class="login-btn">Logout</a></li>';
                }
                ?>
            </ul>
        </header>
        <h1>Menu</h1>

        <div class="menu-container">
            <!-- Example Menu Item: Java Chip Frappuccino -->
            <div class="menu-item">
                <img src="img\java.jpg" alt="Java Chip Frappuccino">
                <h3><span class="icon-veg"></span>Java Chip Frappuccino</h3>
                <p>TALL (354 ml) - 392 kcal</p>
                <p>Mocha sauce and Frappuccino® chips blended with Frappuccino...</p>
                <div class="price">₹ 388.50</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Java Chip Frappuccino">
                    <input type="hidden" name="price" value="388.50">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <!-- Example Menu Item: Caffe Americano -->
            <div class="menu-item">
                <img src="img/americano.jpg" alt="Caffe Americano">
                <h3><span class="icon-veg"></span>Caffe Americano</h3>
                <p>SHORT (237 ml) - 0 kcal</p>
                <p>Rich in flavor, full-bodied espresso with hot water in true...</p>
                <div class="price">₹ 278.25</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Caffe Americano">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
                <img src="img/cold.jpg" alt="Cold Coffee">
            <h3><span class="icon-veg"></span>Cold Coffee</h3>
            <p>TALL (354 ml) - 354 kcal</p>
            <p>Our signature rich in flavor espresso blended with delicate...</p>
            <div class="price">₹ 372.75</div>
            
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="cold cofee">
                    <input type="hidden" name="price" value="372.75">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/vanila.jpg" alt="Vanilla Cake">
            <h3><span class="icon-veg"></span>Vanilla Cake</h3>
            <p>PER SERVE (90 gm) - 450 kcal</p>
            <p>A moist and fluffy vanilla cake topped with cream...</p>
            <div class="price">₹ 320.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Vanilla Cake">
                    <input type="hidden" name="price" value="320.00">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/cap.jpg" alt="Cappuccino">
            <h3><span class="icon-veg"></span>Cappuccino</h3>
            <p>SHORT (237 ml) - 104 kcal</p>
            <p>Dark, rich in flavor espresso lies in wait under a smoothed...</p>
            <div class="price">₹ 299.25</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Cappuccino">
                    <input type="hidden" name="price" value="299.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/paneer.png" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Paneer Tikka Sandwich</h3>
            <p>PER SERVE (185 gm) - 537 kcal</p>
            <p>Marinated tandoori paneer filling, sliced cheese, and whole...</p>
            <div class="price">₹ 278.25</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>
            <!-- Repeat this block for each additional menu item -->
              <!-- ============  -->
              <div class="menu-item">
            <img src="img/vadapav.avif" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Wada Pav</h3>
            <p>PER SERVE (185 gm) - 537 kcal</p>
            <p>Marinated tandoori paneer filling, sliced cheese, and whole...</p>
            <div class="price">₹ 27548.25</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Wada Pav">
                    <input type="hidden" name="price" value="27548.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/juice.webp" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Watermelon Juice</h3>
            <p>PER SERVE (185 gm) - 537 kcal</p>
            <p>Fresh Juice of Watermelon</p>
            <div class="price">₹ 433.25</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>
            <!-- ===================== -->
            <div class="menu-item">
            <img src="img/tea.webp" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Tea</h3>
            <p>PER SERVE (185 gm) - 537 kcal</p>
            <p>Tea with infinte refreshement</p>
            <div class="price">₹ 50</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>
            
            <div class="menu-item">
            <img src="img/Mutton.jpg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Mutton</h3>
            <p>PER SERVE (2457 gm) - 657 kcal</p>
            <p>Delicious NonVeg food</p>
            <div class="price">₹ 644.25</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/pizza.jpg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Pizza</h3>
            <p>PER SERVE (545 gm) 657 kcal</p>
            <p>Tasty Pizza available</p>
            <div class="price">₹ 699.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/paneer.avif" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Panner</h3>
            <p>PER SERVE (467 gm) - 837 kcal</p>
            <p>Paneer Available</p>
            <div class="price">₹ 158.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/Oreo-Milkshake.jpg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Oreo-Milk Shake</h3>
            <p>PER SERVE (467 gm) - 837 kcal</p>
            <p>Delicious Shake available</p>
            <div class="price">₹ 350.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/noodles.jpeg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Noodles</h3>
            <p>PER SERVE (487 gm) - 57 kcal</p>
            <p>Noodles with all variety available</p>
            <div class="price">₹ 364.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/laddo.jpg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Sweets</h3>
            <p>PER SERVE (367 gm) - 454 kcal</p>
            <p>Sweets of all flavours </p>
            <div class="price">₹ 289.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/samosa.jpeg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Samosa</h3>
            <p>PER SERVE (375 gm) - 353 kcal</p>
            <p>Samosa available</p>
            <div class="price">₹ 158.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/gj.webp" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Gulab Jamun</h3>
            <p>PER SERVE (357 gm) -44 kcal</p>
            <p>Gulab Jamun ready</p>
            <div class="price">₹ 234.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>

            <div class="menu-item">
            <img src="img/dhokla.jpg" alt="Paneer Tikka Sandwich">
            <h3><span class="icon-veg"></span>Dhokla</h3>
            <p>PER SERVE (454 gm) - 57 kcal</p>
            <p>Khamni Dhokla </p>
            <div class="price">₹ 353.00</div>
                <!-- Form for Adding to Cart -->
                <form method="POST" action="menu.php">
                    <input type="hidden" name="item" value="Paneer Tikka Sandwich">
                    <input type="hidden" name="price" value="278.25">
                    <button type="submit" name="add_to_cart" class="add-item-btn">Add Item</button>
                </form>
            </div>




        </div>

        <a href="checkout.php" class="login-btn">Go to Checkout</a>
    </section>

    <script>
        function toggleMenu() {
            const toggle = document.querySelector('.toggle');
            const navigation = document.querySelector('.navigation');
            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>
</body>

</html>
