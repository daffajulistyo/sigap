 <!--begin::Header-->
 <nav class="app-header navbar navbar-expand bg-body">
     <!--begin::Container-->
     <div class="container-fluid">
         <!--begin::Start Navbar Links-->
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                     <i class="bi bi-list"></i>
                 </a>
             </li>

         </ul>
         <!--end::Start Navbar Links-->
         <!--begin::End Navbar Links-->
         <ul class="navbar-nav ms-auto">
             <!--begin::End Navbar links-->
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item dropdown">
                     <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                         id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                         data-bs-display="static">
                         <span class="theme-icon-active">
                             <i class="my-1"></i>
                         </span>
                         <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
                     </button>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text"
                         style="--bs-dropdown-min-width: 8rem;">
                         <li>
                             <button type="button" class="dropdown-item d-flex align-items-center active"
                                 data-bs-theme-value="light" aria-pressed="false">
                                 <i class="bi bi-sun-fill me-2"></i>
                                 Light
                                 <i class="bi bi-check-lg ms-auto d-none"></i>
                             </button>
                         </li>
                         <li>
                             <button type="button" class="dropdown-item d-flex align-items-center"
                                 data-bs-theme-value="dark" aria-pressed="false">
                                 <i class="bi bi-moon-fill me-2"></i>
                                 Dark
                                 <i class="bi bi-check-lg ms-auto d-none"></i>
                             </button>
                         </li>
                         <li>
                             <button type="button" class="dropdown-item d-flex align-items-center"
                                 data-bs-theme-value="auto" aria-pressed="true">
                                 <i class="bi bi-circle-fill-half-stroke me-2"></i>
                                 Auto
                                 <i class="bi bi-check-lg ms-auto d-none"></i>
                             </button>
                         </li>
                     </ul>
                 </li>
             </ul>
             <!--end::End Navbar links-->

             <!--begin::Fullscreen Toggle-->
             <li class="nav-item">
                 <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                     <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                     <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                 </a>
             </li>
             <!--end::Fullscreen Toggle-->
             <!--begin::User Menu Dropdown-->
             <li class="nav-item dropdown user-menu">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <img src="{{ asset('assets/dist/assets/img/avatar5.png') }}"
                         class="user-image rounded-circle shadow" alt="User Image" />
                     <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                     <!--begin::User Image-->
                     <li class="user-header text-bg-primary">
                         <img src="{{ asset('assets/dist/assets/img/avatar5.png') }}"
                             class="rounded-circle shadow" alt="User Image" />
                         <p>
                             {{ Auth::user()->name }}
                             <small>Member since: {{ Auth::user()->created_at->format('d F Y') }}</small>
                         </p>
                     </li>
                     <!--end::User Image-->

                     <!--begin::Menu Footer-->
                     <li class="user-footer">
                         <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                             @csrf
                             <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                         </form>
                     </li>
                     <!--end::Menu Footer-->
                 </ul>
             </li>
             <!--end::User Menu Dropdown-->
         </ul>
         <!--end::End Navbar Links-->
     </div>
     <!--end::Container-->
 </nav>
 <!--end::Header-->
 <script>
     (() => {
         "use strict";

         const storedTheme = localStorage.getItem("theme");

         const getPreferredTheme = () => {
             if (storedTheme) {
                 return storedTheme;
             }

             return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" :
                 "light";
         }

         ;

         const setTheme = function(theme) {
             if (theme === "auto" && window.matchMedia("(prefers-color-scheme: dark)").matches) {
                 document.documentElement.setAttribute("data-bs-theme", "dark");
             } else {
                 document.documentElement.setAttribute("data-bs-theme", theme);
             }
         }

         ;

         setTheme(getPreferredTheme());

         const showActiveTheme = (theme, focus = false) => {
             const themeSwitcher = document.querySelector("#bd-theme");

             if (!themeSwitcher) {
                 return;
             }

             const themeSwitcherText = document.querySelector("#bd-theme-text");
             const activeThemeIcon = document.querySelector(".theme-icon-active i");
             const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);
             const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

             for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
                 element.classList.remove("active");
                 element.setAttribute("aria-pressed", "false");
             }

             btnToActive.classList.add("active");
             btnToActive.setAttribute("aria-pressed", "true");
             activeThemeIcon.setAttribute("class", svgOfActiveBtn);

             const themeSwitcherLabel = `$ {
                     themeSwitcherText.textContent
                 }

                 ($ {
                         btnToActive.dataset.bsThemeValue
                     })`;
             themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

             if (focus) {
                 themeSwitcher.focus();
             }
         }

         ;

         window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
             if (storedTheme !== "light" || storedTheme !== "dark") {
                 setTheme(getPreferredTheme());
             }
         });

         window.addEventListener("DOMContentLoaded", () => {
             showActiveTheme(getPreferredTheme());

             for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
                 toggle.addEventListener("click", () => {
                     const theme = toggle.getAttribute("data-bs-theme-value");
                     localStorage.setItem("theme", theme);
                     setTheme(theme);
                     showActiveTheme(theme, true);
                 });
             }
         });
     })();
 </script>
