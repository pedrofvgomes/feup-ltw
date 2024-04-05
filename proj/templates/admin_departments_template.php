<?php
function draw_admin_departments(PDO $db)
{
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
                    <h1>Departments</h1>
                </div>
            </div>

            <?php
            // Fetch department names from the database
            $query = $db->query("SELECT name FROM Department");
            $departmentNames = $query->fetchAll(PDO::FETCH_COLUMN);

            foreach ($departmentNames as $departmentName) {
                ?>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3><?php echo $departmentName; ?></h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch agents for the current department
                                $query = $db->prepare("SELECT Account.name, Account.username, Account.email FROM Account
                                    JOIN AgentDepartment ON Account.id = AgentDepartment.agentid
                                    JOIN Department ON AgentDepartment.departmentid = Department.id
                                    WHERE Department.name = :department");
                                $query->bindValue(':department', $departmentName);
                                $query->execute();
                                $agents = $query->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($agents as $agent) {
                                    echo "<tr>
                                            <td>
                                                <p>{$agent['name']} ({$agent['username']})</p>
                                            </td>
                                            <td>{$agent['email']}</td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
            ?>
        </main>
        <!-- MAIN -->
    </section>
    <script src="../js/script.js"></script>
    </body>
    </html>
<?php } ?>
