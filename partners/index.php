<?php
$BASE = '..';
include "$BASE/header.php";
$PARTNERS = [
  [
    "fub-logo" => "https://www.fu-berlin.de/",
    "zbw-logo" => "http://www.leibniz-transfer.de/einrichtungen/wirtschafts-und-sozialwissenschaften-raumwissenschaften/deutsche-zentralbibliothek-fuer-wirtschaftswissenschaften-ao-leibniz-informationszentrum-wirtschaft/",
    "gesis-logo" => "https://www.gesis.org/home/",
    "stabi-logo" => "http://staatsbibliothek-berlin.de/",
  ],
  [
    "ur-logo" => "http://www.uni-regensburg.de/",
    "usg-logo" => "https://www.unisg.ch/",
    "ulb-logo" => "https://www.uibk.ac.at/ulb/index.html.de",
    "wikimedia-logo" => "https://wikimedia.de/",
  ]
]
?>

<div class="row">
  <?php
  foreach($PARTNERS as $side) {
    echo '<div class="col-md-6" style="text-align: center;">';
    foreach($side as $logo => $url) {
      echo "<p><a href='$url' target='_blank'><img src='/img/$logo.png' width='300px' style='margin: 30px'></a></p>";
    }
    echo '</div>';
  }
  ?>
</div>

<div class="row">
  <div class="col-md-12">
    <iframe style="border: 0; height: 240px; width: 100%;" scrolling="no" src="//piwik.gbv.de/index.php?module=CoreAdminHome&amp;action=optOut&amp;language=en"></iframe>
  </div>
</div>

<?php
include "$BASE/footer.php";
