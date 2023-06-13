<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Page</title>
    <link rel="stylesheet" href="package.css">
</head>
<body>

    <div class="container">
        <aside >
            <div class="top">
                <div class="logo" >
                    <img src="pic/royal logo.jpg"  >
                </div>
                <div class="close" id="closebtn">
                    <img src="pic/close.png" style="height: 20px; width: 20px;" >
                </div>
            </div>

            <div class="sidebar">
                <a href="admin.php" class="active">
                    <img src="pic/dashboard.png" style="height: 20px; width: 20px;" >
                        <h3>Dashborad</h3>
                </a>
                <a href="package.php" class="activeP">
                    <img src="pic/package.png" style="height: 20px; width: 20px;" >
                        <h3>Package</h3>
                </a>
                <a href="stuff.php" class="activeS">
                    <img src="pic/users.png" style="height: 20px; width: 20px;" >
                        <h3>Stuff</h3>
                </a>
                <a href="customer.php" class="activeC">
                    <img src="pic/users.png" style="height: 20px; width: 20px;" >
                        <h3>Customer</h3>
                </a>
                <a href="addPackage.php" class="activeA">
                    <img src="pic/plus.png" style="height: 20px; width: 20px;" >
                        <h3>Add Package</h3>
                </a>
                <a href="income.php" class="activeI" >
                    <img src="pic/report.png" style="height: 20px; width: 20px;" >
                        <h3>Income detail</h3>
                </a>
                <a href="#">
                    <img src="pic/logout.png" style="height: 20px; width: 20px;" >
                        <h3>Logout</h3>
                </a>
            </div>
       </aside>
       
        <main>
            <h1>Package Side</h1>
            <div class="admin-photo">
                <img src="pic/admin.png" style="height: 40px; width: 40px;">
                <h3>Hi, Admin</h3>
            </div>

            <div class="package">

                <div class="booking">
                    <h2>Package Detail</h2>
                    <div>
                        <input type="text" name="search" placeholder="Search....">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Package No</th>
                                <th>Package Name</th>
                                <th>Price</th>
                                <th>Package</th>
                                <th>Delete Package</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>number id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>package</td>
                                <td class="primary">
                                    <a href="" class="delete">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="addPackage.html">Add New Package</a>
                </div>
            </div>
        </main>

        
    </div>
    
</body>
</html>