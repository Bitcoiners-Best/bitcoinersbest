<template>
<div>
  <nav id="w1" class="navbar navbar-expand-lg fixed-top navbar-light bg-black d-flex">
    <div class="container-fluid full">
      <router-link to="/index/vue" class="navbar-brand">
        <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 27.3171V10.0813L17.2358 0L34.4715 10.0813V29.5935L17.2358 40L2.27642 31.2195L12.6829 25.3659V30.2439L17.2358 32.8455V20.1626L5.52846 13.3333V18.8618L10.4065 21.4634L0 27.3171Z" fill="white"/>
        </svg><span class="ml-15">Bitcoiners Best</span>
      </router-link>
      <button class="icon-wrap js-controller--nav js-btn -btn mobile-show" @click="isMobileMenuActive">
         <span class="icon icon-svg icon-list">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 24 18" xml:space="preserve">
               <rect width="24" height="2"></rect>
               <rect y="8" width="24" height="2"></rect>
               <rect y="16" width="24" height="2"></rect>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 24 18" xml:space="preserve">
               <rect width="20" height="2"></rect>
               <rect y="8" width="20" height="2"></rect>
            </svg>
         </span>
      </button>
      <div id="w1-collapse" class="collapse navbar-collapse">
        <ul id="w2" class="navbar-nav navbar-right flex-grow-1 justify-content-end nav">
          <li class="nav-item align-self-center"><router-link to="/login" class="nav-link">Login</router-link></li>
          <li class="nav-item align-self-center"><router-link to="/signup" class="nav-link">Signup</router-link></li>
          <li class="nav-item align-self-center"><a @click="logout" lass="nav-link">Logout</a></li>
          <li class="nav-item align-self-center"><router-link to="/faq" class="nav-link">FAQ</router-link></li>
          <li class="nav-item align-self-center"><router-link to="/submit" class="nav-link">Submit</router-link></li>
          <li class="nav-item align-self-center"><a href="/profile/"><img class="profile-picture br-circle transition" src="https://avatars.io/twitter//small"/></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <nav id="mobile--menu--nav" class="menu-nav js-menu-nav screen wrapper is-hoverable is-cover is-cover--moment is-menu-open is-clipped" v-bind:class="{ isActiveEvents : isActive }">
    <nav id="w1" class="navbar navbar-expand-lg fixed-top navbar-light d-flex">
      <div class="container-fluid full">
          <router-link to="/index/vue" class="navbar-brand" @click.native="isMobileMenuActive">
            <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 27.3171V10.0813L17.2358 0L34.4715 10.0813V29.5935L17.2358 40L2.27642 31.2195L12.6829 25.3659V30.2439L17.2358 32.8455V20.1626L5.52846 13.3333V18.8618L10.4065 21.4634L0 27.3171Z" fill="white"/>
            </svg><span class="ml-15">Bitcoiners Best</span>
          </router-link>
          <button id="close-btn--nav" class="icon-wrap js-controller--nav js-btn -btn mobile-show" @click="isMobileMenuActive">
            <span class="icon icon-svg a a-link close-btn rounded"></span>
          </button>
      </div>
   </nav>
   <div class="screen__wrap" v-bind:class="{ isActive : isActive }">
     <div class="container-fluid full">
        <div class="menu-nav__col">
           <ul class="menu-nav__ul menu-nav__ul--">
              <li class="menu-nav__li"><router-link to="/login" class="a-h -ss-01" @click.native="isMobileMenuActive"><h2>Login</h2></router-link></li>
              <li class="menu-nav__li"><router-link to="/signup" class="a-h -ss-01" @click.native="isMobileMenuActive"><h2>Signup</h2></router-link></li>

              <li class="menu-nav__li"><router-link to="/profile" class="a-h -ss-01" @click.native="isMobileMenuActive"><h2>Profile</h2></router-link></li>
              <li class="menu-nav__li"><router-link to="/logout" class="a-h -ss-01" @click.native="isMobileMenuActive"><h2>Logout</h2></router-link></li>
           </ul>
           <ul class="menu-nav__ul menu-nav__ul--">
             <li class="menu-nav__li"><router-link to="/faq" class="a-h -ss-01" @click.native="isMobileMenuActive"><h2>FAQ</h2></router-link></li>
             <li class="menu-nav__li"><router-link to="/submit" class="a-h -ss-01" @click.native="isMobileMenuActive"><h2>Submit</h2></router-link></li>
          </ul>
        </div>
     </div>
   </div>
 </nav>
</div>
</template>

<script>
export default {
  name: 'Navbar',
  props: ['app'],
  data() {
    return {
      title: 'Header',
      isActive: false
    }
  },
  methods: {
    isMobileMenuActive() {
      this.isActive = !this.isActive;
    },
    logout() {
      this.app.req.post('/site/logout').then(() => {
        this.app.user = null;
        this.$router.push("/index/vue");
      })
    }
  }
}
</script>

<style>
/*
todo:
clean up the CSS & move it into the parent or break the parent into the children
*/
.-btn {
	background: 0;
	border: none;
	cursor: pointer;
	-webkit-appearance: none;
}
.-btn:hover {
	transition: all 400ms ease;
}

.-btn.is-btn-hover:focus {
	outline: 0;
}
.-btn--full {
	width: 100%;
}
.a-h {
	border-bottom: 1px solid transparent;
	color: #FFF;
	transition: color 200ms ease;
	display: inline-block;
}
.a-h:hover {
	color: #FFCF53;
}
.a-h.isActiveElement {
	color: #807e7e;
}
.menu-nav {
	font-size: 0;
	pointer-events: none
}

.menu-nav.isActiveEvents {
	pointer-events: auto;
  opacity: 1;
  visibility: visible;
}

.menu-nav__li {
	display: block;
}

.menu-nav__li .a-h {
	padding-bottom: 25px;
}

a.menu-nav__a.p:hover,
a.menu-nav__a.p.isActiveElement {
    color: #FFCF53;
}

.menu-nav__col {
	vertical-align: top;
}

.menu-nav__a,
.menu-nav__col {
	display: inline-block;
}

.menu__nav .isActiveElement {
	color: #FFC23F;
}

.menu-nav__col:last-child {
	margin-top: 120px;
}

button:not(:disabled),
[type="button"]:not(:disabled),
[type="reset"]:not(:disabled),
[type="submit"]:not(:disabled) {
    cursor: pointer;
    border: 0;
    outline: 0 !important;
}
.icon-wrap {
	cursor: pointer;
	display: inline-block;
	margin: -20px;
	padding: 20px;
}

.icon {
  display: inline-block;
	cursor: pointer;
	line-height: 1;
	position: relative;
	text-align: center;
}
.icon-svg svg {
  fill: #fff;
  transition: fill 400ms ease;
}
.icon-list {
	height: 18px;
	width: 24px;
}
.icon-arrow-left {
	height: 20px;
	width: 12px;
}
.close-btn {
  position: relative;
  display: block;
  width: 24px;
  height: 24px;
  overflow: hidden;
  top: 0;
  right: 0;
  text-align: right;
  float: right;
}
.close-btn:hover::before, .close-btn:hover::after {
  opacity: 0.8;
}
.close-btn::before, .close-btn::after {
  content: "";
  position: absolute;
  height: 2px;
  width: 100%;
  top: 50%;
  left: 0;
  margin-top: -1px;
  background: #fff;
}
.close-btn::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}
.close-btn::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.close-btn.big {
  -webkit-transform: scale(3);
  -moz-transform: scale(3);
  -ms-transform: scale(3);
  -o-transform: scale(3);
  transform: scale(3);
}
.close-btn.hairline::before, .close-btn.hairline::after {
  height: 1px;
}
.close-btn.thick::before, .close-btn.thick::after {
  height: 4px;
  margin-top: -2px;
}
.close-btn.black::before, .close-btn.black::after {
  height: 8px;
  margin-top: -4px;
}
.screen {
	background-color: #121212;
	bottom: 0;
	left: 0;
	opacity: 0;
	overflow-x: hidden;
	overflow-y: scroll;
	position: fixed;
	right: 0;
	top: 0;
	transition: opacity 200ms cubic-bezier(.55, .055, .675, .19), visibility 200ms cubic-bezier(.55, .055, .675, .19);
	visibility: hidden;
	z-index: 9999;
}
.screen.isActiveElement {
	visibility: visible;
	opacity: 1;
	-webkit-overflow-scrolling: touch;
}
.screen__wrap {
	opacity: 0;
	transform: translate3d(0, 40px, 0);
	transition: opacity 200ms cubic-bezier(.55, .055, .675, .19) 100ms, transform 200ms ease 100ms;
}
.screen__wrap.isActive {
	opacity: 1;
	transform: translate3d(0, 0, 0);
  /* cursor: pointer; */
  height: 100%;
}
.animate {
	opacity: 0;
	transform: translate3d(0, 40px, 0);
	transition: opacity 600ms ease-out, transform 400ms ease-out;
}
.animate.isActiveElement {
	opacity: 1;
	transform: translate3d(0, 0, 0);
}
.is-hidden {
	display: none;
}
.is-clipped {
  height: 100%;
	max-height: 100%;
	overflow: hidden;
}
.mobile-show {
	display: none !important;
}
@media only screen and (max-width:1024px) {
	.mobile-hide {
		display: none !important;
	}
	.mobile-show {
		display: inline-block !important;
	}
}
</style>
