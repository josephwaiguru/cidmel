<?php
$userTypes = array(
    'admin' => 'admin',
    'teacher' => 'teacher',
    'student' => 'student',
);
$languageList = array(
    'spanish' => 'Español',
    'english' => 'English',
    'german' => 'Deutsch',
    'japanese' => '日本語',
    'french' => 'Français',
);

$idusers = ($user ? $user->idusers : '');
$login = ($user ? $user->login : '');
$name = ($user ? $user->name : '');
$type = ($user ? $user->type : 'student');
$language = ($user ? $user->language : 'english');
?>
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
                    <h3>Add new user</h3>
                    <div><?=validation_errors() ?></div>
                    <form method="post" action="<?= site_url('admin/user/' . $action); ?>">
                        <input type="hidden" name="idusers" value="<?= $idusers ?>">
                            <ul>
                                <li>Login: <input type="text" name="login" value="<?= $login ?>"/></li>
                                <li>Password: <input type="password" name="password"/></li>
                                <li>Confirm password: <input type="password" name="confirm"/></li>
                                <li>Full name: <input type="text" name="name" value="<?= $name ?>"/></li>
                                <li>User type: <?= form_dropdown('type', $userTypes, $type) ?></li>
                                <li>Language: <?= form_dropdown('language', $languageList, $language) ?></li>
                                <input type="submit" value="Submit"/>
                            </ul>
                    </form>
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
