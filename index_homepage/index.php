<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio website</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
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
    <script src="../js/index.js"></script>   
</body>
</html>