<!-- AUTHENTICATION -->

<?php function draw_auth() { ?>

<div id="auth">
    <form id="login-form" action="/../actions/login.php" method="post">
        <h1>Already have an account?</h1>
        <input name="usernameemail" type="text" placeholder="username / e-mail" autocomplete="off">
        <input name="password" type="password" placeholder="password" autocomplete="off">
        <input type="submit" name="login-form" value="Sign in">
    </form>
    <form id="signup-form" action="/../actions/signup.php" method="post">
        <h1>First time here?</h1>
        <input name="name" type="text" placeholder="name" autocomplete="off">
        <input name="username" type="text" placeholder="username" autocomplete="off">
        <input name="email" type="email" placeholder="e-mail" autocomplete="off">
        <input name="password" type="password" placeholder="password" autocomplete="off">
        <input type="submit" name="signup-form" value="Sign up">
    </form>
</div>
</body>
</html>
<?php } ?>
