<?php
$BASE = '..';
$FORMAT = 'markdown';
$TITLE = 'Regensburg Classification';
include "$BASE/header.php";
?>

The **Regensburg Classification** (Regensburger Verbundklassifikation, RVK) is one of the most used universal library classifications in Germany. The classification is managed by University Library Regensburg (see [RVK Portal](https://rvk.uni-regensburg.de/)) and provided as Open Data. We use these RVK dumps to include RVK into our tools. In particular we provide:

* [dumps of RVK](data/) converted to JSKOS format and the [scripts used for conversion](https://github.com/gbv/jskos-data/tree/master/rvk)
* statistics generated from these dumps
* a webservice to access RVK data at <https://coli-conc.gbv.de/rvk/api/>
 
To start browsing RVK in [Cocoda mapping tool](../cocoda/) follow [this link](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Furi.gbv.de%2Fterminology%2Frvk%2F).
