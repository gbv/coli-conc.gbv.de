<?php
$BASE = '../..';
include "$BASE/header.php";

$url = "http://api.dante.gbv.de/voc/license/top?properties=*";
$licenses = json_decode(file_get_contents($url), true);
?>

<p>
  This page contains a <a href="//uri.gbv.de/terminology/license/">list of licenses</a>
  possibly used to publish knowledge organization systems.
  The list if available in JSKOS format
  <a href="<?=$url?>">via DANTE</a>.
</p>
<p>  
  We strongly recommend to use a Public Domain license, if possible, such as
  <a href="https://creativecommons.org/publicdomain/zero/1.0/">CC Zero</a>!
</p>
<table class="table">
  <thead>
    <tr>
      <th>license</th>
      <th>name</th>
      <th>badge</th>
      <th>sameAs</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($licenses as $license) {
        $license = new JSKOS\Concept($license);
    ?>
    <tr>
      <td><a href="<?=$license->uri?>"><?=$license->notation[0]?></a></td>
      <td><?=$license->prefLabel['en']?></td>
      <td><?php if ($license->depiction) { ?>
        <img width="80" src="<?=$license->depiction[0]?>"/>    
          <?php } ?>
      </td>
      <td>
        <?php $ids = $license->identifier->map(function($id) {
            if (preg_match('/wikidata/', $id)) {
              $name = "Wikidata";
            } else if (preg_match('/bartoc/', $id)) {
              $name = "BARTOC";
            } else if (preg_match('/rdflicense/', $id)) {
              $name = 'RDFLicense';
            } else {
              $name = $id;
            } 
            return "<a href='$id'>$name</a>";
        });
        arsort($ids);
        echo implode(", ", $ids);
        ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php
include "$BASE/footer.php";
