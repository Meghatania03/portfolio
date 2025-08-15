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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>
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
                            <li><span>UI/UX</span><br>Designing web/app interfaces</li>
                           </ul>
                             
                            </div>
                             <div class="tab-contents" id="experience">
                           <ul>
                            <li><span>2021-current</span><br>UI/UX designer at Datasoft</li>
                           </ul>
                             
                            </div>
                             <div class="tab-contents" id="education">
                           <ul>
                            <li><span>2022-current</span><br>studying CSE in KUET</li>
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
                    <div>
                        <i class="fa-solid fa-code"></i>
                        <h2>Web Design</h2>
                        <p>I create visually appealing and user-friendly web designs that enhance the user experience.</p>
                        <a href="#">Learn More</a>
                    </div>
                   
                    <div>
                        <i class="fa-solid fa-code"></i>
                        <h2>Web Design</h2>
                        <p>I create visually appealing and user-friendly web designs that enhance the user experience.</p>
                        <a href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>  
    <!---------portfolio section-------->
        <div id="portfolio">
            <div class="container">
                <h1 class="sub-tittle">My Work</h1>
                <div class="work-list">
                    <div class="work">
                        <img src="../images/portfolio1.jpeg" alt="portfolio image 1">
                        <div class="layer">
                            <h3>Project Title</h3>
                            <p>Short description of the project.</p>
                            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                    <div class="work">
                        <img src="../images/portfolio2.jpeg" alt="portfolio image 2">
                        <div class="layer">
                            <h3>Project Title</h3>
                            <p>Short description of the project.</p>
                            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
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
                    <textarea name="message"  rows="6" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>   
    <script src="../js/index.js"></script>   
</body>
</html>