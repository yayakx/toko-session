@include('header')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"><b>Admin BajuStore</b></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Masuk</button>
            </form><!-- /form -->            
        </div><!-- /card-container -->
    </div><!-- /container -->


    <script>
        $( document ).ready(function() {
            // DOM ready

            // Test data
            /*
            * To test the script you should discomment the function
            * testLocalStorageData and refresh the page. The function
            * will load some test data and the loadProfile
            * will do the changes in the UI
            */
            // testLocalStorageData();
            // Load profile if it exits
            loadProfile();
        });

        /**
         * Function that gets the data of the profile in case
         * thar it has already saved in localstorage. Only the
         * UI will be update in case that all data is available
         *
         * A not existing key in localstorage return null
         *
         */
        function getLocalProfile(callback){
            var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
            var profileName        = localStorage.getItem("PROFILE_NAME");
            var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

            if(profileName !== null
                    && profileReAuthEmail !== null
                    && profileImgSrc !== null) {
                callback(profileImgSrc, profileName, profileReAuthEmail);
            }
        }

        /**
         * Main function that load the profile if exists
         * in localstorage
         */
        function loadProfile() {
            if(!supportsHTML5Storage()) { return false; }
            // we have to provide to the callback the basic
            // information to set the profile
            getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
                //changes in the UI
                $("#profile-img").attr("src",profileImgSrc);
                $("#profile-name").html(profileName);
                $("#reauth-email").html(profileReAuthEmail);
                $("#inputEmail").hide();
                $("#remember").hide();
            });
        }

        /**
         * function that checks if the browser supports HTML5
         * local storage
         *
         * @returns {boolean}
         */
        function supportsHTML5Storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }

        /**
         * Test data. This data will be safe by the web app
         * in the first successful login of a auth user.
         * To Test the scripts, delete the localstorage data
         * and comment this call.
         *
         * @returns {boolean}
         */
        function testLocalStorageData() {
            if(!supportsHTML5Storage()) { return false; }
            localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" );
            localStorage.setItem("PROFILE_NAME", "C??sar Izquierdo Tello");
            localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
}
    </script>