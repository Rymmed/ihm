<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name')); ?></title>
        <link rel="icon" href="<?php echo e(asset('img/logo1.png')); ?>" type="image/x-icon" />


        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo e(asset('css/welcome.css')); ?>">
        
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        
        <!-- Styles -->
        <style>
            /* ! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.csshtml{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}} */
        </style>
    </head>
    <body>
        <!-- Header -->
            <section class="header" id="head">
                <nav>
                    <div class="logo"><a href="<?php echo e(url('/')); ?>">
                    <img src="img/pfe.png" alt="" height="20%" width="20%">
                    </a></div>
                    <div class="nav-links" id="navLinks">
                        <a><i class="fas fa-times" onclick="hideMenu()"></i></a>
                        <ul>
                            <li><a href="#head">ACCUEIL</a></li>
                            
                            <li><a href="#about">À PROPOS</a></li>
                            <li><a href="#contact">CONTACT</a></li>
                            <?php if(Route::has('login')): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <li><a href="<?php echo e(url('/home')); ?>">TABLEAU DE BORD</a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(route('login')); ?>">SE CONNECTER</a></li>

                                        <?php if(Route::has('register')): ?>
                                            <li><a href="<?php echo e(route('register')); ?>">S'INSCRIRE</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <a><i class="fas fa-bars"  onclick="showMenu()"></i></a>
                </nav>
                <div class="text-box">
                    <h1>Fit Academy Plus</h1>
                    <h2>la salle de votre rêve</h2>
                    <p>Le sport va chercher<br>la peur pour la dominer,<br>la fatigue pour en triompher,<br>la difficulté pour la vaincre.</p>
                    <p class="auteur">-Pierre De Coubertin-</p>
                    
                </div>
                <div>
                    <a href="#packages" class="arrow"><i class="fas fa-arrow-circle-down"></i></a>
                </div>

            </section>
        <!-- HeaderEnd -->

        <!-- Packages -->
            <section class="packages" id="packages">
                <h1>Packages Disponibles</h1>
                <h2>Nous avons des offres spéciales pour tous les genres et tous les âges. <br>Veuillez choisir ce qui vous convient le mieux</h2>

                <div class="row">
                    <div class="packages-col">
                        <h3>Kids Pack</h3>
                        <p>Dance</p>
                        <p><b>+</b></p>
                        <p>Psychomotricité</p>
                        <p><b>+</b></p>
                        <p>Taekwondo</p>
                        <h4>70Dt / 3 mois</h4>
                        <a href="" class="btn">S'abonner</a>
                    </div>

                    <div class="packages-col">
                        <h3>Spécial femme</h3>
                        <p>Fitness</p>
                        <p><b>+</b></p>
                        <p>Cardio</p>
                        <p><b>+</b></p>
                        <p>Boxe</p>
                        <h4>90DT / 3 mois</h4>
                        <a href="" class="btn">S'abonner</a>
                    </div>

                    <div class="packages-col">
                        <h3>Ado</h3>
                        <p>Cardio</p>
                        <p><b>+</b></p>
                        <p>Boxe Anglaise</p>
                        <p><b>+</b></p>
                        <p>Gymnastique</p>
                        <h4>100Dt / 3 mois</h4>
                        <a href="" class="btn">S'abonner</a>
                    </div>
                </div>

            </section>
        <!-- PackagesEnd -->

        

        <!-- About -->
            <section class="about" id="about">
                <div class="about-wrap">
                    <div class="about-container">
                        <div class="content-section">
                            <div class="title">
                                <h1>À propos</h1>
                            </div>
                            <div class="content">
                                
                                <p>
                                    Fit Academy Plus Ce n'est pas seulement une salle de sport, c'est un monde sportif en termes de précision et de qualité, et tout ce que les entraîneurs professionnels font en termes de certification ou de durée d'expérience, c'est fit Academy Plus.
                                </p>
                                
                            </div>
                            <div class="social">
                                <a href="https://facebook.com/FitAcademyPlus"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/fitacademyplus/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="image-section">
                            <img src="<?php echo e(asset('img/salle.jpg')); ?>" alt="">
                        </div>
                    </div>
                </div>
            </section>
        <!-- AboutEnd -->

        <!-- Contact -->
            <section class="contact" id="contact">
                <div class="contact-container">
                    <div class="contact-row">
                    <div class="column">
                            <h1>Contact</h1>
                            <p><i class="fas fa-phone-alt"></i>+216 29 518 809</p>
                            <br>
                            <p><i class="fas fa-envelope"></i>fit.academyplus@gmail.com</p>
                            <br>
                            <p><i class="fas fa-map-marker-alt"></i>Avenue des oranges Khezama EST 4051 Sousse, Tunisie</p>
                            <br>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12934.946034484765!2d10.610301!3d35.855464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcfc4763fb00258c6!2sFit%20Acedemy%20Plus!5e0!3m2!1sfr!2stn!4v1621644712226!5m2!1sfr!2stn"
                            width="w-full" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="column message">
                        <form action="/action_page.php">
                            <h1>Envoyer un message</h1>
                            <form action="">
                                <input type="text" placeholder="Nom" class="column-input">
                                <input type="text" placeholder="Prénom" class="column-input">
                                <input type="email" placeholder="Email" class="column-input">
                                <input type="text" placeholder="Sujet" class="column-input">
                                <textarea placeholder="Message" class="column-textarea"></textarea>
                                <input type="submit" value="ENVOYER" class="column-btn">
                            </form>
                        </form>
                    </div>
                    </div>
                </div>
            </section>
        <!-- ContactEnd -->

        <!-- Footer -->
            <section class="footer">
                
                <div class="footer-bottom">
                    <p>Log Systemes Consulting &copy;<?php echo e(date('Y')); ?>. <br>designed by <span>Rym Mohamed</span></p>
                </div>
            </section>
        <!-- FooterEnd -->
    </body>
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }

    </script>
</html><?php /**PATH C:\laragon\www\FA-Manager\resources\views//welcome.blade.php ENDPATH**/ ?>