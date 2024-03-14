
(function() {

    /* ====================
    Preloader
    ======================= */
	window.onload = function () {
		window.setTimeout(fadeout, 300);
	}

	function fadeout() {
		document.querySelector('.preloader').style.opacity = '0';
		document.querySelector('.preloader').style.display = 'none';
	}


    /* =========================
    =========================
    //===== header-1 toggler-icon
    let navbarToggler = document.querySelector(".header-1 .navbar-toggler");
    var navbarCollapse = document.querySelector(".header-1 .navbar-collapse");

    document.querySelectorAll(".header-1 .page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler.classList.remove("active");
            navbarCollapse.classList.remove('show')
        })
    );
    navbarToggler.addEventListener('click', function() {
        navbarToggler.classList.toggle("active");
    })
    =========================
    ========================= */

    /* =========================
    =========================
    // header-2  toggler-icon
    let navbarToggler2 = document.querySelector(".header-2 .navbar-toggler");
    var navbarCollapse2 = document.querySelector(".header-2 .navbar-collapse");

    document.querySelectorAll(".header-2 .page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler2.classList.remove("active");
            navbarCollapse2.classList.remove('show')
        })
    );
    navbarToggler2.addEventListener('click', function() {
        navbarToggler2.classList.toggle("active");
    })
    =========================
    ========================= */


    /* =========================
    =========================
    // header-3  toggler-icon
    let navbarToggler3 = document.querySelector(".header-3 .navbar-toggler");
    var navbarCollapse3 = document.querySelector(".header-3 .navbar-collapse");

    document.querySelectorAll(".header-3 .page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler3.classList.remove("active");
            navbarCollapse3.classList.remove('show')
        })
    );
    navbarToggler3.addEventListener('click', function() {
        navbarToggler3.classList.toggle("active");
    });
    =========================
    ========================= */

    /* =========================
    =========================
    // header-4  toggler-icon
    let navbarToggler4 = document.querySelector(".header-4 .navbar-toggler");
    var navbarCollapse4 = document.querySelector(".header-4 .navbar-collapse");

    document.querySelectorAll(".header-4 .page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler4.classList.remove("active");
            navbarCollapse4.classList.remove('show')
        })
    );
    navbarToggler4.addEventListener('click', function() {
        navbarToggler4.classList.toggle("active");
    }) 
    =========================
    ========================= */

    /* =========================
    =========================
    // header-5  toggler-icon
    let navbarToggler5 = document.querySelector(".header-5 .navbar-toggler");
    var navbarCollapse5 = document.querySelector(".header-5 .navbar-collapse");

    document.querySelectorAll(".header-5 .page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler5.classList.remove("active");
            navbarCollapse5.classList.remove('show')
        })
    );
    navbarToggler5.addEventListener('click', function() {
        navbarToggler5.classList.toggle("active");
    }) 
    =========================
    ========================= */

    /* =========================
    ============================
    // header-6  toggler-icon
    let navbarToggler6 = document.querySelector(".header-6 .navbar-toggler");
    var navbarCollapse6 = document.querySelector(".header-6 .navbar-collapse");

    document.querySelectorAll(".header-6 .page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler6.classList.remove("active");
            navbarCollapse6.classList.remove('show')
        })
    );
    navbarToggler6.addEventListener('click', function() {
        navbarToggler6.classList.toggle("active");
    }) 
    =========================
    ========================= */

	// WOW active
    new WOW().init();

})();