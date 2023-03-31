<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            top: 55px;
            left: 0;
            background-color: #343a40;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 160px; /* Same as the width of the sidenav */
            font-size: 28px; /* Increased text to enable scrolling */
            padding: 10px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .sidenav a {
            font-size: 18px;
        }


    </style>
</head>
<body>

<div class="sidenav">
    <aside>
        <ul>
            <li class="active"><a href= /home ><span>Home</span></a></li>
            <li><a href= /clients ><span>Сlients</span></a></li>
            <li><a href= /orders ><span>Orders</span></a></li>
            <li><a href= /products ><span>Product</span></a></li>
            <li><a href= /colors ><span>Colors</span></a></li>
            <li><a href= /statistic><span>Statistic</span></a></li>
            <li><a href= /users ><span>Managers</span></a></li>
            <li><a href= /admin ><span>For Admin</span></a></li>
        </ul>
    </aside>
</div>
<div class="content-wrapper">
    @yield('leftside')
</div>
</body>
</html>
