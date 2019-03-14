<?php
$BASE = '..';
$FORMAT = 'markdown';
$TITLE = 'ccmapper';
include "$BASE/header.php";
?>

**ccmapper** is a mapping application specialized on mapping vocabularies
against the Dewey Decimal Classification (DDC). The web application was
originally created by German software company [pansoft](https://www.pansoft.de/)
for University of Oslo to map Norwegian vocabularies Humord and Realfagstermer
against DDC. pansoft also develops other database systems for processing DDC
such as [WebDewey Search](https://deweysearchde.pansoft.de/webdeweysearch/).
ccmapper is being extended for mapping Regensburger Verbundklassifikation (RVK)
against DDC as part of project coli-conc. We provide: 

* an instance of [ccmapper for mapping RVK against DDC](https://ccmapper-de.pansoft.de/).
  Please contact us to get an account for testing!

* an API to query mappings from ccmapper (based on regular exports) which include

    * mapping recommendations based on algorithms
    * intellectually approved mapping candidates (not implemented yet)
    * reviewed mappings (not implemented yet)

Mappings from ccmapper are also shown in [cocoda mapping application](../cocoda)
so we can evaluate how to best use both tools together.
