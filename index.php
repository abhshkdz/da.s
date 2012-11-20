<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  include('Urls.class.php');
  include('config.php');

  if(empty($_GET['url'])){
?>

<form method="GET" action="/">
  <fieldset style="display:inline;">
    <input name='url' placeholder='URL' type='url' required autofocus/>
    <input name='short' placeholder='ID. For example, domain/id' type='text'>
    <input type='submit' value='Shorten' />
  </fieldset>
</form>


<?php      

  }

  else {
    $l = new Urls();
    $linkId = $l->add_url($_GET['url'], $_GET['short']);

    global $config;
    echo '<a href="http://'. $config['ROOT'] . '/' . Urls::numToAlpha($linkId) . '">'. $config['ROOT'] .'/' . Urls::numToAlpha($linkId) . '</a>';
  }
