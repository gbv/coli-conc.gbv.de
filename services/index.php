<?php
$BASE = '..';
$TITLE = 'Services';
$FORMAT = 'markdown';
include "$BASE/header.php";
?>

We provide a several applictaions, data sets and APIs for public use.

### Applications

Core or the project is **[Cocoda Mapping Tool](../cocoda/)**.

See [software](../publications/software/) for a full list of programming libraries and applications.

### Data sets

* **[KOS Types](../publications/kostypes)**<br>
  Classification of knowledge organization systems. Data extracted from Wikidata.

* **[KOS Registry](../terminologies)**<br>
  Description of knowledge organization systems relevant to project coli-conc.
  Data extracted from BARTOC.

* **[Concordance Registry](../concordances/)**<br>
  Concordances collected and unified in project coli-conc.
  Data collected manually.

* **[Wikidata Mappings](../concordances/wikidata/)**<br>
  Collected mappings between Wikidata and other systems.
  Data extracted daily from Wikidata.

* **[GND Mappings](../concordances/gnd/)**<br>
  Collected mappings between the Integrated Authority File (GND) and other systems.
  Work in progress.

### APIs

Several web services are being developed to query information related to 
knowledge organization systemes in [JSKOS format](https://gbv.github.io/jskos/).

* **[DANTE API](https://api.dante.gbv.de/)**<br>
  Access to terminologies and concepts from central terminology service of VZG.

* **[Mappings API](../api/mappings)**<br>
  Access to collected mappings.

* **[Occurrences API](../occurrences/)**<br>
  Look up occurrences and co-occurrences of concepts in library catalogs. 

