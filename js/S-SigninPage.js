body{
    overflow-x: hidden;
    background-color: white;
    color: #4A4A4A;
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
.ideaFont{
    font-family: ideasFont;
    
}
.bg-scheme{
    background-color: #57E5FF;
    color: #4A4A4A;
}
.btn-outline-secondary:hover{
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
    width: 20%;
}
.navbar-nav a, .navbar-nav button{
    color: #EEEEEE;
}
.nav-item button, .badge{
    border-radius: 15px;
}
.fixed-top>.row{
    height: 60px;
}
.line{
    background-color: rgb(197, 195, 195);
    height: 1px;
}
/* firstSection */
#firstSection div:nth-child(1) .btn-outline-secondary{
    color: white;
}
#firstSection{
    /* url, href has / src has \ */
    background: url('../To be use/header.png') repeat-x;
    background-size: contain;
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
/* last section */
#lastSection{
    background: url('../To be use/HomeSection3Patreon.png') no-repeat;
    background-size: 100%;
    height: 900px;
    padding: 300px 100px 0px 100px;
}
#lastSection div:nth-child(1){
    height: 60%;
}
#lastSection>div:nth-child(2){
    margin-top: 150px;
}

#lastSection a{
    text-decoration: none;
    color: #4A4A4A;
}

/* form's css */
.btn-primary {
    color: #212529;
    background-color:rgb(102, 255, 51);
}
.btn-primary:focus,
.btn-primary.focus {
    box-shadow: 0 0 0 .2rem rgba(91, 194, 194, 0.5);
}
.input1{
    border-style: hidden;
    border-bottom-style: groove;
    background-color:black;
    outline: none;
    box-shadow:none;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    color:white;
}
.radius1{
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}
.radius2{
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}