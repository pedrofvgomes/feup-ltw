<?php
function draw_profile(Session $session, PDO $db, int $id)
{
?>
    <!-- CONTENT -->
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

            <div class="card">
                <div class="card-image">
                    <img src="../assets/user.png" alt="Profile image">
                </div>
                <p class="name">
                    <?php echo Account::getUserWithId($db, $id)->name; ?>
                </p>
                <p>
                    <?php echo Account::getUserWithId($db, $id)->username; ?>
                </p>
                <p>
                    <?php echo Account::getUserWithId($db, $id)->email; ?>
                </p>
                <p class="role">
                    <?php echo Account::getUserWithId($db, $id)->role; ?>
                </p>
                <?php if ($session->getId() == $id) { ?>
                    <a href="../pages/edit_profile.php" class="edit-profile">
                        <i class='bx bx-pencil'></i> Edit Profile
                    </a>
                <?php } ?>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../js/script.js"></script>
</body>
</html>
<?php
}
?>
