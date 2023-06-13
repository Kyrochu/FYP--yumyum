<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Page</title>
    <link rel="stylesheet" href="customer.css">
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
        <h1></h1>
        <div class="admin-photo">
            <img src="pic/admin.png" style="height: 40px; width: 40px;">
            <h3>Hi, Admin</h3>
        </div>
        <div class="package">

            <div class="booking">
                <h2>Customer Detail</h2>
                <div>
                    <input type="text" name="customer_name" placeholder="Customer Name">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Customer No</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Package</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>number id</td>
                            <td>name</td>
                            <td>0123456789</td>
                            <td>package</td>
                            <td class="primary">
                                <a href="" class="delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>number id</td>
                            <td>name</td>
                            <td>0123456789</td>
                            <td>package</td>
                            <td class="primary">
                                <a href="" class="delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>number id</td>
                            <td>name</td>
                            <td>0123456789</td>
                            <td>package</td>
                            <td class="primary">
                                <a href="" class="delete">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="add">
                <table>
                    <thead>
                        <tr>
                            <th>Customer No</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Package</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>number id</td>
                            <td>
                                <input type="text" name="package_name" class="name" placeholder="Customer Name">
                            </td>
                            <td>
                                <input type="text" name="package_price" class="name" placeholder="Customer Phone">
                            </td>
                            <td>
                                <input type="text" name="package_type" class="name" placeholder="Package Type">
                            </td>
                            <td>
                                <a href="" class="delete">Save</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>

    </body>
</body>
</html>