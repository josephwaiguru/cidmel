<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>CIDMEL</title>
        <link rel="stylesheet" type="text/css" href="/cidmel/application/views/template/welcome.css" />
        <link href='/cidmel/application/views/template/DidactGothic.ttf' rel='stylesheet' type='text/css'>
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
            <div id="navigation" style="min-height: 25px;">
                <div id="validationErrors">
                    <?= validation_errors() ?>
                </div>
                <div id="loginBox">
                    <form method="post" action="/cidmel/index.php/login">
                        Login: <input type="text" size="8" name="login"/>
                        Password: <input type="password" size="8" name="password"/>
                        <input type="submit" value="Enviar"/>
                    </form>
                </div>
            </div>
            <!-- End Navigation -->

            <!-- Begin Faux Columns -->
            <div id="faux">

                <!-- Begin Left Column -->
                <div id="leftcolumn">
                    <h3>Available Courses</h3>
                    <ul>
                        <?php
                        foreach ($leftColumn as $course) {
                            echo '<li class="courseIcon"><a href="#">' . $course->name . "</a></li>";
                        }
                        ?>
                    </ul>
                </div>
                <!-- End Left Column -->

                <!-- Begin Content Column -->
                <div id="content">
                    <?php echo $content; ?>
                </div>
                <!-- End Content Column -->

                <!-- Begin Right Column -->
                <div id="rightcolumn">
                    <?php echo $rightColumn; ?>
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