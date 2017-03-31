This repository, hosted at <https://github.com/gbv/coli-conc.gbv.de>, contains
the homepage of **project coli-conc**. The homepage is automatically published
at <http://coli-conc.gbv.de/> after each push to GitHub.

# Administration

Die Homepage liegt derzeit auf esx-246.gbv.de unter `/var/www/` und wird dort
automatisch aus dem GitHub-Repository aktualisiert -- die im Repository
verwalteten Dateien sollten nicht direkt auf dem Server verändert werden, sonst
stoppt der Update-Prozess. Es können allerdings auf dem Server zusätzliche
Verzeichnisse angelegt werden, die nicht im Repository verwaltet werden. Dies
sind insbesondere:

* `cocoda/`
* `publications/bartoc/`
* `webhooks/`

Verzeichnisse die im Repsoitory verwaltet werden, müssen in der Datei
`.gitignore` aufgeführt werden. Derzeit sind dies:

* `css/`, `img/`, `js/`, und `fonts/`
* `jobs/` und `contact/`
* `publications/` außer `publications/bartoc/`
* `concordances/`

Die Bearbeitung kann bei kleinen Änderungen direkt im GitHub-Webinterface und
bei umfrangreichere Arbeiten in einem lokalen Clone des Repositories erfolgen.
