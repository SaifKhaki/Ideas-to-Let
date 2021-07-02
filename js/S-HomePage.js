body{
  overflow-x: hidden;
}
*{
  font-family: Arial, Helvetica, sans-serif;
}
@font-face{
  /* this is not being implemented now */
  font-family: ideasFont;
  src: url('../Fonts/British.otf');
  font-weight: bolder;
}
.bg-scheme{
  background-color: #57E5FF;
  color: #4A4A4A;
}
button.btn-outline-secondary:hover{
  background-color: #57E5FF;
  border: 1px solid #57E5FF;
}
/* navbar */
.navbar-brand{
  font-family: ideasFont;
  font-weight: 600;
  color: white;
}

.navbar img{
  width: 25px;
  height: 40px;
}
.navbar-nav a, .navbar-nav button{
  color: #EEEEEE;
}
.nav-item button, .badge{
  border-radius: 15px;
}
/* Css for first section-------------------------------------*/
#firstSection div:nth-child(1) .btn-outline-secondary{
  color: white;
}
#firstSection{
  /* url, href has / src has \ */
  background: url('../To be use/Untitled-2.webp');
  background-size: contain;
  height: 737px;
  color: white;
}

#content div:nth-child(1) h1{
  font-weight: 600;
}
#content div:nth-child(1) p{
  width: 80%;
}
#content div:nth-child(1) button{
  border-radius: 20px;
}
#diag img{
  width: 60%;
  height: 85%;
}
#content div:nth-child(1) div{
  border-radius: 20px;
}
/* Css for second section-------------------------------------*/
.card{
  background-color: transparent;
  border: none;
}
/* Css for third section-------------------------------------*/

#thirdSection{
  background: url('../To be use/HomeSection2Patreon.png') no-repeat;
  background-size: 100%;
  height: 1010px;
  padding: 400px 100px 0px 600px;
}
#thirdSection button{
  border-radius: 20px;
}

/* css for carousel section */
#carouselSection{
  height: 450px;
}
/* css for last section */
#lastSection{
  background: url('../To be use/HomeSection3.png') no-repeat;
  background-size: 100%;
  height: 1010px;
  padding: 350px 100px 0px 100px;
}
#lastSection div:nth-child(1){
  height: 60%;
}
#lastSection>div:nth-child(2){
  margin-top: 150px;
}
.line{
  background-color: rgb(197, 195, 195);
  height: 1px;
}
#lastSection a{
  text-decoration: none;
  color: #4A4A4A;
}