<?php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('CLIENT_ID', 'CLIENT_SECRET', 'REDIRECT_URI');
$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    $tracks = $api->getUserPlaylistTracks(
       'USERNAME',
       'PLAYLIST_ID',
        array(
            'limit' => 6
        )
    );

    // var_dump($tracks);

    //RETURN TRACK FROM SINGLE PLAYLIST
    foreach ($tracks->items as $track) {

 ?>
    <div class="artist" style="background-image:url(<?php echo $track->track->album->images[1]->url; ?>);">
      <?php  echo '<a href="' . $track->track->external_urls->spotify . '">' . $track->track->name . '</a> <br />';?>
    </div>
<?php
    }
    
} else {
    header('Location: ' . $session->getAuthorizeUrl(array(
        'scope' => array('user-read-email', 'user-library-modify')
    )));
}