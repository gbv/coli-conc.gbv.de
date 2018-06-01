<?php

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

require 'vendor/autoload.php';

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>coli-conc <?= implode(': ', array_map('ucfirst', $LOCATION)) ?></title>
<?php if ($AUTHOR) { ?>
    <meta name="author" content="<?=$AUTHOR?>"/>
<?php } ?>
    <link rel="stylesheet" href="<?=$BASE?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$BASE?>/css/navbar-fixed-side.css">
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

<div class="container-fluid">

  <div class="navbar-inverse navbar-fixed-top">
    <div class="col-sm-3 col-lg-2 vcenter hidden-xs">
      <a href="//www.gbv.de/"><img src="<?=$BASE?>/img/vzg-logo.jpg" style="padding: 10px"/></a>
    </div><!--
    --><div class="col-sm-9 col-lg-10 text-right vcenter">
     <span style="color:#fff">Verbundzentrale des GBV (VZG)
    </div>
  </div>

  <div class="row">
    <div class="col-sm-3 col-lg-2">

    <nav class="navbar navbar-default navbar-fixed-side">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			<span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=$BASE?>/">
            <img class="hidden-xs" src="<?="$BASE/img/coli-conc-logo.svg"?>" alt="coli-conc"/>
            <span class="visible-xs">coli-conc</span>
         </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
<?php

$MENU = [
    '/' => 'About',
    'terminologies' => 'KOS Registry',
    'concordances' => [
        ['wikidata', 'Wikidata']
    ],
    'cocoda/' => 'Cocoda prototype',
    'publications' => [
        ['software', 'Software'],
        ['data', 'Data'],
        ['licenses', 'Licenses'],
        ['kostypes', 'KOS types'],
    ],
    'contact' => 'Contact'
];

foreach($MENU as $section => $entry) {
    if ($section == '/') $section = '';
    $active = (count($LOCATION) < 2 && $section == $SECTION)
            ? ' class="active"' : '';
    if (is_array($entry)) {
        echo "<li$active>";
        echo "<a href='$BASE/$section'>".ucfirst($section)."</a>";
        echo "<ul class='dropdown-menu'>";
        foreach ($entry as $subentry) {
            list ($loc, $title) = $subentry;
            $active = end($LOCATION) == $loc ? ' class="active"' : '';
            echo "<li$active><a href='$BASE/$section/$loc'>$title</a></li>";
        }
        echo "</ul></li>";
    } else {
        echo "<li$active><a href='$BASE/$section'>$entry</a></li>";
    }
}
?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-sm-9 col-lg-10">
  <?php

if ($SECTION != '/') {
  echo "<h2>";
  if (count($LOCATION)>1) {
     echo "<a href='../'>".ucfirst($SECTION)."</a>: ";
  }
  echo $TITLE."</h2>";
}
