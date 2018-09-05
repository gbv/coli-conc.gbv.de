<?php

require_once 'vendor/autoload.php';

// get title and location of current page from its filename
$SOURCE = substr(get_included_files()[0], strlen(__DIR__)+1);
$LOCATION = array_slice(explode('/', $SOURCE), 0, -1);
$SECTION = $LOCATION[0];
$TITLE = $TITLE ?? ucfirst(end($LOCATION));

// repository in a subdirectory
$REPO = preg_replace('/\.git\n$/', '', `git config --get remote.origin.url`);
if ($BASE) {
  $ROOT_REPO = preg_replace('/\.git\n$/', '', `git -C $BASE config --get remote.origin.url`);
  if ($REPO != $ROOT_REPO) {
    $SOURCE = implode('/',array_slice(explode('/',$SOURCE),1));
  }
}
$SOURCE = "$REPO/tree/master/$SOURCE";


?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>coli-conc <?= implode(': ', array_map('ucfirst', $LOCATION)) ?></title>
<?php if ($AUTHOR ?? null) { ?>
    <meta name="author" content="<?=$AUTHOR?>"/>
<?php } ?>
    <link rel="stylesheet" href="<?=$BASE?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$BASE?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$BASE?>/css/bootstrap-vzg.css">
    <link rel="stylesheet" href="<?=$BASE?>/css/bootstrap-treeview.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="<?=$BASE?>favicon.ico" sizes="16x16 32x32 64x64" type="image/vnd.microsoft.icon">
    <script src="<?=$BASE?>/js/jquery.min.js"></script>
    <?php require_once 'piwik.php'; ?>
  </head>
  <body>

  <nav class="navbar navbar-dark fixed-top">
    <a href="//www.gbv.de/" class="navbar-brand d-none d-sm-block">
	  <img src="<?=$BASE?>/img/vzg-logo.svg" height="40px" alt="Verbundzentrale des GBV (VZG)"/>
	</a>
    <div class="navbar-brand">
	  <small>Verbundzentrale des GBV (VZG)</small>
	</div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div id="sidebar" class="col-md-3 col-xl-2">
        <ul class="list-group sticky-top sticky-offset">
          <li class="list-group-item logo-separator d-flex justify-content-center">
            <a class="navbar-brand d-none d-md-block" style="padding: 5px" href="<?=$BASE?>/">
              <img src="<?="$BASE/img/coli-conc-logo.svg"?>" alt="coli-conc"/>
            </a>
          </li>

<?php

use Symfony\Component\Yaml\Yaml;
$MENU = Yaml::parseFile("$BASE/menu.yaml");

foreach($MENU as $section => $entry) {
    if ($section == '/') $section = '';
    $class = (count($LOCATION) < 2 && $section == $SECTION)
            ? 'active' : '';
	$class .= ' list-group-item';
    if (is_array($entry)) {
        $title =  $section === '' ? 'About' : ucfirst($section);
        echo "<li class='$class submenu'><a href='$BASE/$section'>$title</a></li>";
        foreach ($entry as $subentry) {
            list ($loc, $title) = $subentry;
            $class = end($LOCATION) == $loc ? 'active' : '';
            echo "<li class='$class list-group-item submenu-item'>";
			echo "<a href='$BASE/$section/$loc'>$title</a></li>";
        }
        //echo "</ul></li>";
    } else {
       echo "<li class='$class'><a href='$BASE/$section'>$entry</a></li>";
    }
}
?>
      </ul>
    </div>
    <div id="main" class="col-md-9 col-xl-10">
  <?php

if ($SECTION != '/' && $TITLE) {
  echo "<h2>";
  if (count($LOCATION)>1) {
     echo "<a href='../'>".ucfirst($SECTION)."</a>: ";
  }
  echo $TITLE."</h2>";
}

if (($FORMAT ?? '') == 'markdown') {
  $parsedown = ParsedownExtra::instance();
  $content = file_get_contents(debug_backtrace()[0]['file']);
  $content = preg_replace('/<[?].*?([?]>|\Z)/sm', '', $content);
  echo $parsedown->text($content);
  include 'footer.php';
  exit;
}
