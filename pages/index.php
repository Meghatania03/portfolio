<?php
$conn = mysqli_connect("localhost:3307", "root", "", "portfolio_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data
$skills = mysqli_query($conn, "SELECT * FROM skills");
$experiences = mysqli_query($conn, "SELECT * FROM experiences");
$education = mysqli_query($conn, "SELECT * FROM education");
$services = mysqli_query($conn, "SELECT * FROM services");
$projects = mysqli_query($conn, "SELECT * FROM projects");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio website</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/838bdf900e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        <div class="container">
            <nav><span class="portfolio-title">megha's portfolio</span>
                <ul>
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">services</a></li>
                    <li><a href="#portfolio">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
            <div id="about">
                <div class="container">
                    <div class="row">
                        <div class="about-col-1">
                            <img src="../images/megha.jpg" alt="megha's image">
                        </div>
                        <div class="about-col-2">
                            <h1 class="about_me">About Me</h1>
                            <p>Hi, I'm Megha, a passionate web developer with a love for creating beautiful and functional websites. I specialize in front-end development, crafting user-friendly interfaces that enhance the user experience.</p>
                            <div class=tab-titles>
                                <p class="tab-links active-link" onclick="opentab('skills',event)">Skills</p>
                                <p class="tab-links" onclick="opentab('experience',event)">Experience</p>
                                <p class="tab-links" onclick="opentab('education',event)">Education</p>
                            </div>
                            <div class="tab-contents active-tab" id="skills">
                                <ul>
                                    <?php while ($row = mysqli_fetch_assoc($skills)) { ?>
                                        <li>
                                            <span><?php echo $row['skill_name']; ?></span><br>
                                            <?php echo $row['description']; ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="tab-contents" id="experience">
                                <ul>
                                    <?php while ($row = mysqli_fetch_assoc($experiences)) { ?>
                                        <li>
                                            <span><?php echo $row['job_title']; ?></span><br>
                                            <?php echo $row['company'] . ' (' . $row['duration'] . ')'; ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="tab-contents" id="education">
                                <ul>
                                    <?php while ($row = mysqli_fetch_assoc($education)) { ?>
                                        <li>
                                            <span><?php echo $row['degree']; ?></span><br>
                                            <?php echo $row['institution'] . ' (' . $row['year'] . ')'; ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!---------services section-------->
                <div id="services">
                    <div class="container">
                        <h1 class="sub-tittle">My Services</h1>
                        <div class="services-list">
                            <?php while ($row = mysqli_fetch_assoc($services)) { ?>
                                <div>
                                    <i class="<?php echo $row['icon']; ?>"></i>
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                    <a href="#">Learn More</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!---------portfolio section-------->
                <div id="portfolio">
                    <div class="container">
                        <h1 class="sub-tittle">My Work</h1>
                        <div class="work-list">
                            <?php while ($row = mysqli_fetch_assoc($projects)) { ?>
                                <div class="work">
                                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                    <div class="layer">
                                        <h3><?php echo $row['title']; ?></h3>
                                        <p><?php echo $row['description']; ?></p>
                                        <a href="<?php echo $row['link']; ?>"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!---contact section--->
                <div id="contact">
                    <div class="container">
                        <div class="row">
                            <div class="contact-left">
                                <h1 class="sub-tittle">Contact Me</h1>
                                <p><i class="fa-solid fa-paper-plane"></i>contact@meghatania03@gmail.com</p>
                                <p><i class="fa-solid fa-phone"></i>+880 1234567890</p>
                            </div>
                            <div class="contact-right">
                                <form>
                                    <input type="text" name="name" placeholder="Your Name" required>
                                    <input type="email" name="email" placeholder="Your Email" required>
                                    <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
                                    <button type="submit" class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../js/index.js"></script>
</body>

</html>