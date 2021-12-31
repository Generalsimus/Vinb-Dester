<?php
defined('ABSPATH') or die("connect die");
$json_facebook= json_decode(get_option('facebook_option'));
$json_twitter = json_decode(get_option('twitter_option'));
$json_youtube = json_decode(get_option('youtube_option'));
$json_instagram = json_decode(get_option('instagram_option'));
$json_google = json_decode(get_option('google_option'));
function opt($option,$Obj,$optionnm){
    isset($option)?update_option($optionnm, json_encode($Obj)):add_option($optionnm, json_encode($Obj), '', 'yes');
}
if(isset($_POST['social'])){
if (isset($_POST['facebook'])){
    $Obj= new stdClass();

        $Obj->facebookappid=$_POST['facebookappid'];
        
        opt($json_facebook,$Obj,'facebook_option');        
        $json_facebook = $Obj;
    }else{delete_option( 'facebook_option' );$json_facebook = null;}

    if (isset($_POST['twitter'])){
        $Obj= new stdClass();

        $Obj->twitterusername=$_POST['twitterusername'];
        opt($json_twitter,$Obj,'twitter_option');
        
        $json_twitter = $Obj;
    }else{delete_option( 'twitter_option' );$json_twitter = null;}
    if (isset($_POST['youtube'])){
        $Obj= new stdClass();

        $Obj->youtubechannelid=$_POST['youtubechannelid'];
        $Obj->youtubechannelurl=$_POST['youtubechannelurl'];
        $Obj->googleapikey=$_POST['googleapikey'];
        opt($json_youtube,$Obj,'youtube_option');        
        $json_youtube = $Obj;
}else{delete_option('youtube_option');$json_youtube = null;}
    if (isset($_POST['instagram'])){
        $Obj= new stdClass();

        $Obj->instagramusername=$_POST['instagramusername'];
        $Obj->instagramuserid=$_POST['instagramuserid'];
        $Obj->instagramaccesstoken=$_POST['instagramaccesstoken'];
        opt($json_instagram,$Obj,'instagram_option');         
        $json_instagram = $Obj;
    }else{delete_option( 'instagram_option' );$json_instagram = null;}
    if (isset($_POST['google'])){
        $Obj= new stdClass();

        $Obj->googleid=$_POST['googleid'];
        $Obj->googleapikey=$_POST['googleapikey'];
        opt($json_google,$Obj,'google_option'); 
        $json_google = $Obj;
}else{delete_option('google_option');$json_google = null;}
}

?>


<link rel="stylesheet" type="text/css" href="/wp-content/themes/Vinb%20Dester/tool/themesetting.css">

<div class='toolbox'>
    <ul class='toolst'>
    <li>Menu</li>
        <li> 
            <a href="#socopt">
            <svg x="0px" y="0px" viewBox="0 0 481.6 481.6">

                <path d="M381.6,309.4c-27.7,0-52.4,13.2-68.2,33.6l-132.3-73.9c3.1-8.9,4.8-18.5,4.8-28.4c0-10-1.7-19.5-4.9-28.5l132.2-73.8
		c15.7,20.5,40.5,33.8,68.3,33.8c47.4,0,86.1-38.6,86.1-86.1S429,0,381.5,0s-86.1,38.6-86.1,86.1c0,10,1.7,19.6,4.9,28.5
		l-132.1,73.8c-15.7-20.6-40.5-33.8-68.3-33.8c-47.4,0-86.1,38.6-86.1,86.1s38.7,86.1,86.2,86.1c27.8,0,52.6-13.3,68.4-33.9
		l132.2,73.9c-3.2,9-5,18.7-5,28.7c0,47.4,38.6,86.1,86.1,86.1s86.1-38.6,86.1-86.1S429.1,309.4,381.6,309.4z M381.6,27.1
		c32.6,0,59.1,26.5,59.1,59.1s-26.5,59.1-59.1,59.1s-59.1-26.5-59.1-59.1S349.1,27.1,381.6,27.1z M100,299.8
		c-32.6,0-59.1-26.5-59.1-59.1s26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1S132.5,299.8,100,299.8z M381.6,454.5
		c-32.6,0-59.1-26.5-59.1-59.1c0-32.6,26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1C440.7,428,414.2,454.5,381.6,454.5z" />

            </svg>
            Socia Optimization</a></li>
        <!-- <a><a href="#gensetting">General settings</a></a> -->

    </ul>




    <div class='toolpr'>
        <div id="socopt" class='socopt'>

            <form method="post">

                <!-- <script src="https://connect.facebook.net/en_US/sdk.js"></script> -->
                <label for="fb"><strong>Facebook</strong></label>
                <input id='fb' name="facebook" type="checkbox" <?php if(isset($json_facebook))echo 'checked' ?>>
                <div>

                    <label for="fai">Facebook APP ID</label>
                    <input id="fai" name="facebookappid" value="<?php echo $json_facebook->facebookappid;?>"
                        type="text">

                    <button type="button" id="fb-login-btn" class="button button-large"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 216 216" style="height: 100%;">
                            <path fill="white" d="
          M204.1 0H11.9C5.3 0 0 5.3 0 11.9v192.2c0 6.6 5.3 11.9 11.9
          11.9h103.5v-83.6H87.2V99.8h28.1v-24c0-27.9 17-43.1 41.9-43.1
          11.9 0 22.2.9 25.2 1.3v29.2h-17.3c-13.5 0-16.2 6.4-16.2
          15.9v20.8h32.3l-4.2 32.6h-28V216h55c6.6 0 11.9-5.3
          11.9-11.9V11.9C216 5.3 210.7 0 204.1 0z">
                            </path>
                        </svg> Add Pages</button>

                </div>
                <label for="tw"><strong>Twitter</strong></label>
                <input id='tw' name="twitter" type="checkbox" <?php if(isset($json_twitter))echo 'checked' ?>>
                <div>
                    <label for="tu">Twitter Username</label>
                    <input id="tu" name="twitterusername" value="<?php echo $json_twitter->twitterusername;?>"
                        type="text">
                </div>
                <label for="yt"><strong>Youtube</strong></label>
                <input id='yt' name="youtube" type="checkbox" <?php if(isset($json_youtube))echo 'checked' ?>>

                <div>
                    <label for="ci">YouTube Channel ID</label>
                    <input id="ci" name="youtubechannelid" type="text"
                        value="<?php echo $json_youtube->youtubechannelid;?>">
                    <label for="ci">YouTube Channel URL</label>
                    <input id="ci" name="youtubechannelurl" type="text"
                        value="<?php echo $json_youtube->youtubechannelurl;?>">
                    <label for="gak">Google API key</label>
                    <input id="gak" name="googleapikey" type="text" value="<?php echo $json_youtube->googleapikey;?>">
                </div>
                <label for="yt"><strong>Instagram</strong></label>
                <input id='yt' name="instagram" type="checkbox" <?php if(isset($json_instagram))echo 'checked' ?>>
                <div>
                    <label for="ci">Instagram Username</label>
                    <input id="ci" name="instagramusername" type="text"
                        value="<?php echo $json_instagram->instagramusername;?>">
                    <label for="ci">Instagram User ID</label>
                    <input id="ci" name="instagramuserid" type="text"
                        value="<?php echo $json_instagram->instagramuserid;?>">
                    <label for="gak">Instagram Access Token</label>
                    <input id="gak" name="instagramaccesstoken" type="text"
                        value="<?php echo $json_instagram->instagramaccesstoken;?>">
                </div>
                <label for="yt"><strong>Google+</strong></label>
                <input id='yt' name="google" type="checkbox" <?php if(isset($json_google))echo 'checked' ?>>

                <div>
                    <label for="gi">Google+ ID</label>
                    <input id="gi" name="googleid" type="text" value="<?php echo $json_google->googleid;?>">
                    <label for="gak1">Google API Key</label>
                    <input id="gak1" name="googleapikey" type="text" value="<?php echo $json_google->googleapikey;?>">
                </div>
                <div class='savebutton'> <button name="social" value='true' type="submit">SAVE</button></div>
            </form>

        </div>




        <div id="gensetting">221222</div>

    </div>
    <!-- <div class='savebutton'> <button type="submit">SAVE</button></div> -->
</div>





<script src="/wp-content/themes/Vinb%20Dester/tool/settingtheme.js"></script>