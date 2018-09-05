      </div>
    </div>
  </div>
</div>

<footer> <!--nav class="navbar navbar-inverse navbar-fixed-bottom hidden-xs"-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-3 col-md-2">
        <i class="fab fa-github"></i>
        <a href="<?=$SOURCE?>">source</a>
        <i class="fab fa-twitter"></i>
        <a href="https://twitter.com/coli_conc" title="follow @coli_conc at twitter">
            @coli_conc
        </a>
        <?=($LICENSE ?? 0) ? $LICENSE : '' ?>
      </div>
      <div class="col-xs-9 col-md-10 text-center">
        coli-conc is a project of the head office of GBV –
        <a href="https://www.gbv.de/">Verbundzentrale des GBV (VZG)</a>
        – funded by German Research Foundation (DFG)
      </div>
    </div>
  </div>
</footer>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=$BASE?>/js/bootstrap.min.js"></script>
    <script src="<?=$BASE?>/js/jquery.tablesorter.min.js"></script>
    <link href="<?=$BASE?>/css/tablesorter.gbv.css" rel="stylesheet">
    <script type="text/javascript">
      $(function(){ 
        $(".table.sortable").tablesorter({'theme':'gbv'})
      })
    </script>
    <?php foreach (($REQUIREJS ?? []) as $script) { ?>
    <script src='<?=$BASE?>/js/<?=$script?>'></script>
    <?php } ?>
  </body>
</html>
