<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function print_footer()
{
    echo '<footer class="footer-padding">
                         <div class="container-fluid">
                             <div class="row">
                                <div class="col-md-4">
                                    <h1 class="about">Contact Us:</h1>
										<br/>
                                        <p><i class="fa fa-envelope"></i><span class="contact-email">admin@comsas.cf</span></p>
                                        <p><i class="fa fa-mobile"></i><span class="contact-email">+237 693 138 363</span></p>
                                        <p><i class="fa fa-location-arrow"></i><span class="contact-email">Université de Yaoundé I</span></p>
                                </div>
								<div class="col-md-4">
                                    <h1 class="about">Follow us on:</h1>
                                        <br/>
                                            <div class="row">       
                                                <div class="">
                                                    <p><a href="https://www.facebook.com/groups/159019330791993"><img src="img/facebook-icon.png" alt="social image" class="imge"></a>
                                                        <div
                                                            class="fb-like"
                                                            data-share="true"
                                                            data-width="450"
                                                            data-show-faces="true">
                                                        </div>
                                                    </p>
                                                </div>                                                    
                                            </div>
                                            
												<br/>    
                                </div>
                                <div class="col-md-4">
                                    <h1 class="about">Calender</h1>
                                        <div id = "body1">
												<div class="month">      
													  <ul>
														<li style="cursor:pointer" onclick="prev()" class="prev"><</li>
														<li style="cursor:pointer" onclick="next()" class="next">></li>
														<li style="text-align:center">
														  <span id="month">August</span><br>
														  <span id="year" style="font-size:18px">2016</span>
														</li>
													  </ul>
													</div>

													<ul class="weekdays">
													  <li>Lu</li>
													  <li>Ma</li>
													  <li>Me</li>
													  <li>Je</li>
													  <li>Ve</li>
													  <li>Sa</li>
													  <li>Di</li>
													</ul>

													<ul class="days">  
													  <li onclick="getInfo(1)" id="1"></li>
													  <li onclick="getInfo(2)" id="2"></li>
													  <li onclick="getInfo(3)" id="3"></li>
													  <li onclick="getInfo(4)" id="4"></li>
													  <li onclick="getInfo(5)" id="5"></li>
													  <li onclick="getInfo(6)" id="6"></li>
													  <li onclick="getInfo(7)" id="7"></li>
													  <li onclick="getInfo(8)" id="8"></li>
													  <li onclick="getInfo(9)" id="9"></li>
													  <li onclick="getInfo(10)" id="10"></li>
													  <li onclick="getInfo(11)" id="11"></li>
													  <li onclick="getInfo(12)" id="12"></li>
													  <li onclick="getInfo(13)" id="13"></li>
													  <li onclick="getInfo(14)" id="14"></li>
													  <li onclick="getInfo(15)" id="15"></li>
													  <li onclick="getInfo(16)" id="16"></li>
													  <li onclick="getInfo(17)" id="17"></li>
													  <li onclick="getInfo(18)" id="18"></li>
													  <li onclick="getInfo(19)" id="19"></li>
													  <li onclick="getInfo(20)" id="20"></li>
													  <li onclick="getInfo(21)" id="21"></li>
													  <li onclick="getInfo(22)" id="22"></li>
													  <li onclick="getInfo(23)" id="23"></li>
													  <li onclick="getInfo(24)" id="24"></li>
													  <li onclick="getInfo(25)" id="25"></li>
													  <li onclick="getInfo(26)" id="26"></li>
													  <li onclick="getInfo(27)" id="27"></li>
													  <li onclick="getInfo(28)" id="28"></li>
													  <li onclick="getInfo(29)" id="29"></li>
													  <li onclick="getInfo(30)" id="30"></li>
													  <li onclick="getInfo(31)" id="31"></li>
													  <li onclick="getInfo(32)" id="32"></li>
													  <li onclick="getInfo(33)" id="33"></li>
													  <li onclick="getInfo(34)" id="34"></li>
													  <li onclick="getInfo(35)" id="35"></li>
													  <li onclick="getInfo(36)" id="36"></li>
													  <li onclick="getInfo(37)" id="37"></li>
													</ul>
																							</div>
                                </div>
                            </div>
                        </div>
                        <br/><br><p class="cprt">© 2017 COMSAS, Tous droits reservés</p>
                </footer>';
}

function print_header()
{
    echo '<header>
                <div class="header">
                    <div class="container">

                        <div class="nav">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Comsas</a>
                                </li>
                                <li>
                                    <a href="#">Articles </a>
                                </li>
                                <li>
                                    <a href="#">Project</a>
                                </li>
                                <li>
                                    <a href="#">Team</a>
                                </li>
                                <li>
                                    <a id="log">Login</a>                          
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </header>';
}

function print_menu($connected=FALSE)
{
    echo '<header>
            <div class="row">
                    <img src="" alt="" class="logo">
                    <ul class="main-nav js--main-nav">

                        <li>
                            <a href="/">Accueil</a>
                        </li>
                        <li>
                            <a href="#">Comsas</a>
                        </li>
                        <li>
                            <a href="/article.php">Articles </a>
                        </li>
                        <li>
                            <a href="#">Project</a>
                        </li>
                        <li>
                            <a href="#">Sign-up</a>
                        </li>
                        <li>
                            <a href="#">Login</a>
                        </li>
                        <li>
                            <a href="#">Team</a>
                        </li>

                    </ul>
                    <a href="#" class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
            </div>
        </header>';
}

function print_form_signup($index=TRUE, $error=FALSE, $raison=array())
{
    if ($index==TRUE){
                    echo      '<p class="form-title">Sign-up
                                       <span ><i class="fa fa-times ferme "> </i></span></p>';
    }
    
    if($index==TRUE)
        echo '<form class="connect" method="post" action="/signup.php">';
    else
        echo '<form class="connect-page" method="post" action="/signup.php">';
    if($error==TRUE){
        echo '<p>';
        foreach($raison as $rs){
            echo "* ".$rs."<br/>";
        }
        echo '</p>';
    }
    echo '<select name="type">
                                        <option value="">Choisissez votre categorie</option>
                                        <option value="etudiant">Etudiant</option>
                                        <option value="particulier">Particulier</option>
                                    </select>
                                    <select name="level">
                                        <option value="">Choisissez votre niveau (Etudiant)</option>
                                        <option value="1">L1</option>
                                        <option value="2">L2</option>
                                        <option value="3">L3</option>
                                        <option value="4">M1</option>
                                        <option value="5">M2</option>
                                    </select>
									<input type="text" name="username" placeholder="Username" />
									<input type="email" name="email" placeholder="E-mail" />
                                                                        <input type="text" name="nom" placeholder="Nom" />
									<input type="text" name="prenom" placeholder="Prenom" />
									<input type="password" name="password" placeholder="Password" />
									<input type="password" name="password2" placeholder="Confirmation" />
									<input type="submit" value="Sign up" class="" />
                                </form>';
}

function print_fb_script()
{
    echo '<div id="fb-root"></div>
				<script>
				  window.fbAsyncInit = function() {
				    FB.init({
				      appId      : "1261575497245534",
				      xfbml      : true,
				      version    : "v2.9"
				    });
				    FB.AppEvents.logPageView();
				  };

				  (function(d, s, id){
				     var js, fjs = d.getElementsByTagName(s)[0];
				     if (d.getElementById(id)) {return;}
				     js = d.createElement(s); js.id = id;
				     js.src = "//connect.facebook.net/en_US/sdk.js";
				     fjs.parentNode.insertBefore(js, fjs);
				   }(document, "script", "facebook-jssdk"));
				</script>';
}

function print_fb_comments($page)
{
    echo "<div class=\"fb-comments\" data-href=\"$page\" data-width=\"800\" data-numposts=\"10\"></div>";
}

function print_fb_sharing($size=450)
{
    echo "<div class=\"fb-like\" data-share=\"true\" data-width=\"$size\" data-show-faces=\"true\"> </div>";
}