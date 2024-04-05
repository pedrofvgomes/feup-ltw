<?php function draw_landing_page () {
    if (isset($_POST['get_started'])) {
        header("Location: profile.php");
        exit;
    }
?>
    <div class="hero-image"></div>
    <div class="main-wrapper">
      <header class="header">
        <img class="logo" src="../assets/logo-no-background.png" alt="logo" />
      </header>
      <main>
        <section class="intro">
          <div class="intro-text">
            <h1 class="intro-heading">Peaceful Troubleshooting.</h1>
            <p class="intro-paragraph">
              Efficiently resolve and track your tickets with our streamlined and user-friendly website. Experience hassle-free ticket submission, real-time updates, and insightful reporting functionalities, all in one place. Whether you're a client, agent, or admin, our system provides the tools you need to manage tickets promptly and effectively.
            </p>
            <form method="post">
                <button class="intro-btn" name="get_started">Get Started</button>
            </form>
          </div>
        </section>
      </main>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
<?php } ?>
