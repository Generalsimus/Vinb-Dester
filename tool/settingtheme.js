document.getElementById('fb-login-btn').onclick = function () {
    var scrip = document.createElement("script");
    scrip.setAttribute('src','https://connect.facebook.net/en_US/sdk.js')
    document.body.appendChild(scrip)
    scrip.onload=function(){

        FB.init({
            // appId: 1828387174079355,
            appId: document.querySelector('.socopt #fai').value,
            status: true,
            xfbml: true,
            version: 'v3.2'
        });
    
        FB.AppEvents.logPageView();




    FB.login(function (response) {
      if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me/accounts', {
          fields: ["can_post","name","fan_count"]
        }, function (response) {
          console.log(response);

        });
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    }, {
      scope: 'manage_pages'
    });
    }


    return false;
  }