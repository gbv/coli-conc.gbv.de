---
originalLanguage: de
layout: layouts/bk-homepage
title: BK-Relaunch
css: ["bk-homepage"]
---

{% set prefix = "/de" if locale == "de" else "" %}

<div class="bk-homepage">

  <div class="hero">

    <a href="{{ prefix }}/basisklassifikation/">
      <img src="/images/logo-bk.png" alt="Basisklassifikation">
    </a>

    {% include "bk-relaunch-nav.njk" %}

    <div class="hero-main relaunch-hero-main">

      <div class="title-section relaunch-title-section">

        <h1>Relaunch der<br>Basisklassifikation</h1>

        <hr>

        <h2>Informationsportal zum BK-Relaunch</h2>

      </div>

      <div class="subpage-content relaunch-content">

        <section class="project-section">

          <h2 class="relaunch-subheading">Über das Projekt</h2>

          <p class="subpage-text">
            Die Basisklassifikation entstand Ende der 1980er Jahre in den Niederlanden unter der Leitung der Königlichen Bibliothek. Sie wurde als System zur systematischen Ordnung von Wissen und Literatur entwickelt. Seit 1992 im Rahmen des PICA-Projekts Niedersachsen in deutschsprachigen Ausgaben verfügbar. Damit wurde die BK früh in kooperative bibliothekarische Infrastrukturen eingebunden. Im Gemeinsamen Bibliotheksverbund (GBV) etablierte sie sich als fester Bestandteil der Katalogisierungspraxis. Seit 1995 liegt eine zweite, überarbeitete Ausgabe vor; seit 2009 wird die BK unter anderem auch im Österreichischen Bibliothekenverbund genutzt.
          </p>

          <p class="subpage-text">
            Vor diesem Hintergrund ist auch die spätere Wiederaufnahme der Arbeit an der Basisklassifikation einzuordnen. Im Jahr 2017 setzten die Verbundzentrale des GBV (VZG) und die Staatsbibliothek zu Berlin erste Impulse zur Wiederbelebung der BK. Zu den Maßnahmen gehörten eine Umfrage und ein Workshop. Dieser Workshop fand im Rahmen des SI&amp;IT-Workshops (Subject Indexing and Information Technology) der VZG statt. Im Jahr 2024 kam ein erneuter Impuls aus dem Österreichischen Bibliothekenverbund (OBV) hinzu, der die Weiterentwicklung und Aktualisierung der BK zusätzlich vorantrieb.
          </p>

          <p class="subpage-text">
            Diese historische Einordnung unterstreicht die BK als gewachsene, verbundübergreifend genutzte Infrastruktur. Der Relaunch ist daher nicht als Neuanfang zu verstehen, sondern als Fortführung der Entwicklung einer seit Jahrzehnten etablierten Klassifikation, die wiederholt durch institutionelle Initiativen vorangetrieben wurde. Gerade diese Kontinuität erklärt, warum Änderungen vorsichtig, kompatibel und nachvollziehbar umgesetzt werden müssen: Die BK ist in Katalogdaten, Arbeitsroutinen und Rechercheumgebungen tief eingebettet.
          </p>

        </section>

        <section class="project-section">

          <h2 class="relaunch-subheading">Ziele</h2>

          <div class="relaunch-goals">
            <div class="relaunch-goal">
              <h3>Modernisierung und Aktualisierung</h3>

              <p class="subpage-text">
                Das erste Ziel ist die Modernisierung und Aktualisierung der Basisklassifikation.
                Die letzte Überarbeitung fand vor ca. 20 Jahren statt. In der Zwischenzeit
                haben sich Wissenschaft und Gesellschaft stark gewandelt. Ein wichtiger
                Punkt der Überarbeitung ist es daher, den bisher bestehenden Eurozentrismus
                aufzuweichen.
              </p>
            </div>
            <div class="relaunch-goal">
              <h3>Weiterentwicklung</h3>

              <p class="subpage-text">
                Ein weiteres Ziel ist es, die Basisklassifikation so weiterzuentwickeln,
                dass sie sowohl die computerunterstützte Inhaltserschließung als auch das
                Training KI-basierter Verfahren unterstützt. Ergänzend soll eine ständige
                BK-Redaktion eingerichtet werden, die eine kontinuierliche Anpassung der BK
                an zukünftige Anforderungen sicherstellt.
              </p>
            </div>
          </div>

        </section>

        <hr class="relaunch-divider">

        <section class="project-section">

          <h2 class="relaunch-subheading">Was ist bei der Überarbeitung wichtig?</h2>

          <ul class="relaunch-list">

            <li>
              Ein Relaunch der Basisklassifikation muss pragmatisch und restriktiv erfolgen – die Kontinuität der bisherigen Notationen soll gewahrt werden.
            </li>

            <li>
              Fachliche Argumente und Überlegungen zur allgemeinen Gebräuchlichkeit der in der BK verwendeten Terminologie sind die Schlüssel zu Änderungen des Zugangsvokabulars.
            </li>

            <li>
              Die prinzipielle Struktur ZZ.ZZ soll beibehalten werden – das ist für die maschinelle Verarbeitung Voraussetzung.
            </li>

            <li>
              Die neuralgischen Bereiche betreffen v. a. historische, geografische und geisteswissenschaftliche Termini.
            </li>

            <li>
              Erweiterung &amp; Anreicherung der Normdaten mit Konkordanzen.
            </li>

            <li>
              Vorschläge zur inhaltlichen Erschließung machen, die in halbautomatischen Tools wie dem Digitalen Assistenten (DA-3) redaktionell ausgewählt und übernommen werden.
            </li>

          </ul>

        </section>

        <hr class="relaunch-divider">

        <section class="roadmap">

          <h2 class="relaunch-subheading">Roadmap</h2>

          <div class="roadmap-scroll">

            <div class="roadmap-timeline">

              <div class="roadmap-step">
                <div class="roadmap-date">April</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Redaktionssitzung in Zürich
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">April – Mai</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Erstellen von Scope Notes / Beschreibungen
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">Mai – Juli</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Expert:innen über die Vorschläge schauen lassen
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">Juli</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Abgleich
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">September</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Einpflege in DANTE
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">September – Oktober</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Verweise erstellen / überprüfen
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">Ende Oktober</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  BK Relaunch 1.0
                </div>
              </div>

              <div class="roadmap-step">
                <div class="roadmap-date">November</div>
                <div class="roadmap-dot"></div>
                <div class="roadmap-card">
                  Kommunikation (u. a. DA-3-Workshop)
                </div>
              </div>

            </div>

            <div class="roadmap-ongoing">

              <span class="roadmap-ongoing-title">
                Fortlaufend
              </span>

              <span class="roadmap-ongoing-text">
                Umkategorisierung
              </span>

            </div>

          </div>

        </section>

      </div>

    </div>

  </div>

  {% include "bk-relaunch-footer.njk" %}

</div>
