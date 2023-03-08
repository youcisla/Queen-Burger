<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet" />
</head>
<div id="paper-back">
    <nav>
        <div class="close"></div>
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Our Work</a>
        <a href="#">Contact</a>
    </nav>
</div>
<div id="paper-window">
    <div id="paper-front">
        <div class="hamburger"><span></span></div>
        <div id="container">
            <section>
                <h1>Page Tilt Menu Effect</h1>
                <p>Cliquez sur l'icône hamburger pour le voir en action</p>
            </section>
            <section></section>
            <section></section>
            <section></section>
        </div>
    </div>
</div>
<!-- CSS -->
<style>
body {
  font-family: "Architects Daughter", sans-serif;
}

#paper-back {
  width: 100%;
  height: 100vh;
  background-color: #243040;
  position: fixed;
  top: 0;
  left: 0;
  font-size: 33px;
}
#paper-back nav {
  padding: 120px 34px;
}
#paper-back nav a {
  display: block;
  margin-bottom: 25px;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.7);
}

#paper-window {
  height: 100vh;
  width: 100vw;
  position: relative;
  overflow-x: hidden;
  overflow-y: scroll;
  z-index: 2;
}
#paper-window.tilt {
  overflow: hidden;
  pointer-events: none;
}
#paper-window.tilt #paper-front {
  transform: rotate(10deg) translateZ(0);
}

#paper-front {
  pointer-events: auto;
  position: relative;
  z-index: 3;
  background-color: white;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
  transform-origin: center 70%;
  transition: all 0.3s ease;
}

#container section {
  height: 600px;
  text-align: center;
}
#container section:first-of-type {
  padding-top: 10vh;
}
#container section:first-of-type h1 {
  font-size: 45px;
}
#container section:first-of-type p {
  font-size: 25px;
}
@media (max-width: 600px) {
  #container section:first-of-type {
    padding-top: 15vh;
  }
  #container section:first-of-type h1 {
    font-size: 30px;
  }
  #container section:first-of-type p {
    font-size: 18px;
  }
}
#container section:nth-of-type(2n) {
  background-color: #edf1f5;
}

.hamburger {
  position: fixed;
  z-index: 4;
  top: 30px;
  left: 30px;
  width: 45px;
  height: 34px;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.hamburger span {
  position: relative;
}
.hamburger span, .hamburger span:before, .hamburger span:after {
  display: block;
  width: 45px;
  height: 6px;
  background-color: #243040;
  border-radius: 2px;
}
.hamburger span:before, .hamburger span:after {
  content: "";
  position: absolute;
}
.hamburger span:before {
  bottom: -14px;
}
.hamburger span:after {
  bottom: -28px;
}

.close {
  position: fixed;
  top: 30px;
  left: 30px;
  width: 45px;
  height: 34px;
  cursor: pointer;
}
.close:before, .close:after {
  content: "";
  position: absolute;
  display: block;
  width: 45px;
  height: 6px;
  top: 50%;
  background-color: white;
  border-radius: 2px;
}
.close:before {
  transform: translateY(-50%) rotate(45deg);
}
.close:after {
  transform: translateY(-50%) rotate(-45deg);
}
</style>
<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" defer>
var paperMenu = {
  $window: $('#paper-window'),
  $paperFront: $('#paper-front'),
  $hamburger: $('.hamburger'),
  offset: 1800,
  pageHeight: $('#paper-front').outerHeight(),
  
  open: function() {
    this.$window.addClass('tilt');
    this.$hamburger.off('click');
    $('#container, .hamburger').on('click', this.close.bind(this));
    this.hamburgerFix(true);
    console.log('opening...');
  },
  close: function() {
    this.$window.removeClass('tilt'); 
    $('#container, .hamburger').off('click');
    this.$hamburger.on('click', this.open.bind(this));
    this.hamburgerFix(false);
    console.log('closing...');
  },
  updateTransformOrigin: function() {
    scrollTop = this.$window.scrollTop();
    equation = (scrollTop + this.offset) / this.pageHeight * 100;
    this.$paperFront.css('transform-origin', 'center ' + equation + '%');
  },
  //hamburger icon fix to keep its position
  hamburgerFix: function(opening) {
      if(opening) {
        $('.hamburger').css({
          position: 'absolute',
          top: this.$window.scrollTop() + 30 + 'px'
        });
      } else {
        setTimeout(function() {
          $('.hamburger').css({
            position: 'fixed',
            top: '30px'
          });
        }, 300);
      }
    },
  bindEvents: function() {
    this.$hamburger.on('click', this.open.bind(this));
    $('.close').on('click', this.close.bind(this));
    this.$window.on('scroll', this.updateTransformOrigin.bind(this));
  },
  init: function() {
    this.bindEvents();
    this.updateTransformOrigin();
  },
};

paperMenu.init();
</script>