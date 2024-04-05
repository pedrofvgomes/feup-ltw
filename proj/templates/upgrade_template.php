<?php function draw_upgrade(PDO $db) {
    require_once(__DIR__ . '/../db/connection.php');
    require_once(__DIR__ . '/../db/account_class.php');

    $stmt = $db->prepare('
        select id, name, username, email, role
        from Account
    ');
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <form action="#">

        </form>
        <label></label>
        <a href="../pages/profile.php" class="profile">
            <img src="../assets/user.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Upgrade User Roles</h1>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td>
									<a href="../pages/profile.php?id=<?php echo $user->id; ?>">
									<p>
										<?php echo $user->name . ' (' . $user->username . ')'; ?>
									</p>
									</a>                 
								</td>
                                <td><?php echo $user->email; ?></td>
                                <td><span><?php echo $user->role; ?></span></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="../js/script.js"></script>
</body>
</html>
<?php } ?>
