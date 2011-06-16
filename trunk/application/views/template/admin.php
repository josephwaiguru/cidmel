<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>CIDMEL</title>
        <link rel="stylesheet" type="text/css" href="/cidmel/application/views/template/welcome.css" />
    </head>

    <body>

        <!-- Begin Wrapper -->
        <div id="wrapper">

            <!-- Begin Header -->
            <div id="header">
                <h1>CIDMEL</h1>
                <h2>Code Igniter & DataMapper e-Learning CMS</h2>
            </div>
            <!-- End Header -->

            <!-- Begin Navigation -->
            <div id="navigation" style="min-height: 5px; text-align: right;">
                You are logged in as <b><?= $login ?></b> [<a href="/cidmel/index.php/logout">Logout</a>]
            </div>
            <!-- End Navigation -->

            <!-- Begin Faux Columns -->
            <div id="faux">

                <!-- Begin Left Column -->
                <div id="leftcolumn">
                    <h3>Admin Menu</h3>
                    <ul>
                        <li class="usersIcon"><a href="<?= site_url("admin/user") ?>">Manage Users</a></li>
                        <li class="courseIcon"><a href="<?= site_url("admin/course") ?>">Manage Courses</a></li>
                        <li class="assignIcon"><a href="<?= site_url("admin/assign") ?>">Assign Users</a></li>
                    </ul>
                </div>
                <!-- End Left Column -->

                <!-- Begin Content Column -->
                <div id="content">
                    <h3>User List</h3>
                    <table border="1" style="margin-top: 10px;" width="100%">
                        <tr><th>#id</th><th>User</th><th>Type</th><th>Edit</th><th>Delete</th></tr>
                        <?php
                        foreach ($usersList as $user) {
                            echo '<tr>';
                            echo '<td class="center">' . $user->idusers . '</td>';
                            echo '<td width="100%"><b>' . $user->name . '</b></td>';
                            echo '<td class="center">' . $user->type . '</td>';
                            echo '<td class="center"><a href="'.site_url('admin/user/edit/'.$user->idusers).'"><img src="/cidmel/application/views/template/accessories-text-editor.png"/></a></td>';
                            echo '<td class="center"><a href="'.site_url('admin/user/delete/'.$user->idusers).'"><img src="/cidmel/application/views/template/emblem-unreadable.png"/></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                    <img style="margin-top: 10px; margin-right: 5px;" src="/cidmel/application/views/template/list-add.png"/><a href="<?= site_url('admin/user/add')?>">Add user</a>
                </div>
                <!-- End Content Column -->

                <!-- Begin Right Column -->
                <div id="rightcolumn">
                    <img src="/cidmel/application/views/template/Banner.jpg"/>
                </div>
                <!-- End Right Column -->

            </div>	   
            <!-- End Faux Columns --> 

            <!-- Begin Footer -->
            <div id="footer">

                This is the Footer		

            </div>
            <!-- End Footer -->

        </div>
        <!-- End Wrapper -->
    </body>
</html>