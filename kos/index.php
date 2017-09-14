<?php
$BASE = '..';
$TITLE = 'KOS Registry';
$REQUIREJS[] = 'kos.js';
include "$BASE/header.php";

$kostype = [];
$hastype = [];

foreach( file('nkostype.ndjson') as $line ) {
    $concept = new JSKOS\Concept(json_decode($line, true));
    $kostype[$concept->uri] = $concept;
}

foreach( file('kos.ndjson') as $line ) {
    $kos = new JSKOS\ConceptScheme(json_decode($line, true));
    foreach ($kos->type as $type) {
        $hastype[$type][] = $kos->uri;
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
  <p>
    This list contains a collection of knowledge organization systems relevant to
    project coli-conc. The metadata is a subset of <a href="https://bartoc.org/">BARTOC</a>,
    also <a href="kos.ndjson">available for download</a>.
    See also <a href="../publications/bartoc">BARTOC dumps</a> for full downloads.
  </p>

  <div class="btn-group">
<?php
foreach ($kostype as $uri => $type) {
    if ($hastype[$uri]) {
        echo "<div type='button' class='btn btn-default'>";
        echo "<label style='font-weight:normal'>";
        echo "<input class='checkbox-inline' type='checkbox' checked='checked' value='$uri'>";
        echo ucfirst($type->prefLabel['en']);
        echo "</label></div>";
    }
}
?>
  </div>
<script language="Javascript">
var type2kos=<?=json_encode($hastype)?>;
</script>

  <div class="btn-group pull-right">
    <button type="button" class="btn btn-default" id="expand-all">expand all</button>
    <button type="button" class="btn btn-default" id="collapse-all">collapse all</button>
  </div>

  <table class="table sortable table-hover">
  <thead>
    <tr>
     <!--th>ID</th-->
     <th>title</th>
    </tr>
  </thead>
    <?php foreach($schemes as $kos) { 
        $id = substr($kos->uri, strrpos($kos->uri, '/')+1);
    ?>
      <tr id="kos-<?=$id?>">
      <!--td class="text-right"><a href="<?=$kos->uri?>"><?=$id?></a></td-->
      <td id="kos-<?=$id?>">
        <div class="collapsible-heading">        
          <a data-toggle="collapse" data-target="#details-<?=$id?>" style="font-weight: bold">
            <?php
              echo ($kos->prefLabel['de'] ?? $kos->prefLabel['en']);
              if ($kos->notation) echo " ({$kos->notation[0]})";
            ?>
          </a>
        </div>
        <div id="details-<?=$id?>" class="panel-collapse collapse out">
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
              echo '<a href="'.$kos->uri."\">".$kos->uri."</a>";
              for ($i=0; $i<count($kos->identifier); $i++) {
                $id = $kos->identifier[$i];
                echo ", <a href='$id'>$id</a></div>";
              }
            }
          ?>
        </div>
      </td>
    </tr>
   <?php } ?>
  </table>
</div>
 
<?php 
include "$BASE/footer.php";
