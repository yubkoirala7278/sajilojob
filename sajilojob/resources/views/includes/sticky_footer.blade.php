@if (!Auth::check())
    <style>
        .sticky-title {
            font-size: 18px;
            font-weight: 700;
        }

        .sticky-btn-register {
            background: #373092;
            border: none;
            text-decoration: none;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
            width: 110px;
        }

        .sticky-btn-register:hover {
            color: white;
            text-decoration: none;
            transition: 0.3s ease-in-out;
            -webkit-transition: 0.3s ease-in-out;
            -ms-transition: 0.3s ease-in-out;
            -moz-transition: 0.3s ease-in-out;
        }

        .sticky-btn-login {
            border: 1px solid #373092;
            padding: 10px;
            color: black;
            border-radius: 5px;
            width: 110px;

        }

        .sticky-btn-login:hover {
            text-decoration: none;
            background: #373092;
            transition: 0.4s ease-in-out;
            -webkit-transition: 0.4s ease-in-out;
            -ms-transition: 0.4s ease-in-out;
            -moz-transition: 0.4s ease-in-out;
            color: #fff;

        }

        .sticky-main {
            z-index:99;
            background-color: whitesmoke;
            box-shadow: 0px 0 5px rgba(0, 0, 0, 0.8);

        }

        .make-sticky {
            position: sticky;
            bottom: 0;
        }

        .sticky-employee a {
            text-decoration: none;
        }

        .sticky-employee a:hover {
            color: black;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .sticky-main {
                display: none;
            }

            .make-sticky {
                display: none;
            }
        }

    </style>
    <div class="sticky-main" id="sticky-main">
        <div class="container">
            <div class="d-flex p-4 justify-content-end align-items-center">
                <span class="mr-lg-5 mr-md-3 mr-1 sticky-title">Search, Apply & Get Job</span>
                <span class="mr-lg-3 mr-md-1 mr-1"><a href="{{ route('register') }}" class="sticky-btn-register"><i
                            class="fa fa-user-o" aria-hidden="true"></i>
                        Register</a></span>
                <span class="mr-lg-5 mr-md-3 mr-1"><a href="{{ route('login') }}" class="sticky-btn-login"><i
                            class="fa fa-sign-in" aria-hidden="true"></i>
                        Login</a></span>
                <span class="mr-lg-5 ml-lg-5 mr-md-3 ml-md-3 ml-1 mr-1 sticky-employee"><a
                        href="{{ route('login') }}"> <i class="fa fa-building-o" aria-hidden="true"></i> Are You an
                        Employer?</a></span>
            </div>

        </div>
    </div>
    {{-- SCRIPT TO SHOW/HIDE NAVBAR SEARCH BAR --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 60) {
                $("#sticky-main").addClass("make-sticky");
            } else {
                $("#sticky-main").removeClass("make-sticky");
            }
        });
    </script>
    {{-- SCRIPT TO SHOW/HIDE NAVBAR SEARCH BAR  END --}}
@endif
