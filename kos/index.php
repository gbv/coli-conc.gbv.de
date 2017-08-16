<?php

$BASE='..';
$SOURCES='https://github.com/gbv/coli-conc.gbv.de/blob/master/kos.php';
$TITLE = 'Terminologies';
include "$BASE/header.php";

require "$BASE/vendor/autoload.php";

$kostypes = [];

foreach( file('kos.ndjson') as $line ) {
    $kos = new JSKOS\ConceptScheme($line);
    foreach ($kos->type as $type) {
        #if (preg_match('/nkostype/', $type)) {
            $kostypes[$type][] = $kos->uri;
        #}
    }
    $schemes[$kos->uri] = $kos; 
}

function item($item) {
    $uri = $item->uri;
    # TODO: select such as 'de-*', 'en-*'
    $name = $item->prefLabel['en'] ?? $item->prefLabel['en-US']
            ?? $item->prefLabel['de'] 
            ?? $item->prefLabel['de-DE']
            ?? $item->notation[0] ?? $uri;
    return "<a href='$uri'>$name</a>";
}

function items($label, $items) {    
    if ($items and !is_array($items)) $items = iterator_to_array($items);
    $html = implode(", ", array_map("item", $items ?? []));
    return $html ? "<div><b>$label:</b> $html</div>" : "";
} 

?>
<div class="container">
  <h2>Terminologies</h2>

  <p>
    This list contains a collection of knowledge organization systems relevant to
    project coli-conc. The metadata is a subset of <a href="https://bartoc.org/">BARTOC</a>,
    also <a href="kos.ndjson">available for download</a>.
    See also <a href="../publications/bartoc">BARTOC dumps</a> for full downloads.
  </p>

  <form>
<?php
foreach ($kostypes as $type => $koslist) {
    echo "<label class='checkbox-inline'><input type='checkbox' value=''>";
    echo "$type (".count($koslist).")";
    echo "</label>";
}
?>
  </form>

  <table class="table sortable table-hover">
  <thead>
    <tr>
     <th>ID</th>
     <th>title</th>
    </tr>
  </thead>
    <?php foreach($schemes as $kos) { 
        $id = substr($kos->uri, strrpos($kos->uri, '/')+1);
    ?>
    <tr>
      <td class="text-right"><a href="<?=$kos->uri?>"><?=$id?></a></td>
      <td id="kos-<?=$id?>">
        <div class="collapsible-heading">        
          <a data-toggle="collapse" data-target="#details-<?=$id?>" style="font-weight: bold">
            <?php
              echo ($kos->prefLabel['de'] ?? $kos->prefLabel['en']);
              if ($kos->notation) echo " ({$kos->notation[0]})";
            ?>
          </a>
        </div>
        <div id="details-<?=$id?>" class="panel-collapse collapse in">
          <?php if ($kos->altLabel) { 
            echo '<div>= ';
            $n=0;
            $iter = $kos->altLabel->getIterator();
            foreach ($iter as $lang => $labels) {
              foreach ($labels as $l) {
                if ($n++) echo ", ";
                echo $l;
              }
            }
            echo '</div>';
          } ?>
		  <p><?=$kos->scopeNote['en'][0]?></p>
          <?php echo items('author', $kos->creator); ?>
<!--
TODO: type(s)
-->
          <?php
            $subjects = iterator_to_array($kos->subject);
            echo items('DDC', array_filter($subjects, function($s) { 
              return substr($s->uri, 0, 12) == 'http://dewey';
            }));
            echo items('EuroVoc', array_filter($subjects, function($s) { 
              return substr($s->uri, 0, 28) == 'http://bartoc.org/en/EuroVoc';
            }));     
            if ($kos->startDate) echo "<div><b>created:</b> {$kos->startDate}</b></div>"; 
            if ($kos->extent) echo "<div><b>size:</b> {$kos->extent}</b></div>";
            if (count($kos->languages)) {
                $languages = iterator_to_array($kos->languages);
                echo "<div><b>languages: </b>".implode(", ", $languages)."</div>";
            }
            if (count($kos->license)) {
                echo "<div><b>license:</b> ".item($kos->license[0])."</div>";
            }
		    if ($kos->url) { ?>
			<div>
			  <span class="glyphicon glyphicon-arrow-right"></span>
			  <a href='<?=$kos->url?>'><?=$kos->url?></a>
			</div>
          <?php } 
            if (count($kos->identifier)) {
              echo "<div>= ";
              for ($i=0; $i<count($kos->identifier); $i++) {
                if ($i>0) echo ", ";
                $id = $kos->identifier[$i];
                echo "<a href='$id'>$id</a></div>";
              }
            }
          ?>
        </div>
      </td>
    </tr>
   <?php } ?>
  </table>

</div>
 
<script type="text/javascript">

</script>

<?php include "$BASE/footer.php";
