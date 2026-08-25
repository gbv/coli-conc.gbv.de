---
originalLanguage: de
layout: layouts/bk-homepage
title: Basisklassifikation
css: ["bk-homepage"]
---

{% set prefix = "/de" if locale == "de" else "" %}

<div class="bk-homepage">
  <div class="hero">

    <a href="{{ prefix }}/basisklassifikation/">
      <img src="/images/logo-bk.png" alt="Basisklassifikation">
    </a>

{% include "bk-homepage-nav.njk" %}

    <div class="hero-main">
      <div class="title-section">
        <h1>Die zentrale<br>Plattform der<br>Basisklassifikation</h1>

        <hr>

        <h2>Informationen, Richtlinien, Werkzeuge<br> und Projekte rund um die Basisklassifikation.</h2>
      </div>

      <div class="cards">
        <div class="card-1">
          <img src="/images/basisklassifikation.svg" alt="">
          <h2 class="card-title">Basisklassifikation</h2>
          <ul>
            <li><a href="{{ prefix }}/basisklassifikation/ueber-die-bk/" class="portal-link">Über die BK</a></li>
          </ul>
          <p class="card-description">Klassifikation durchsuchen über BARTOC oder VZG Terminology.</p>
          <ul>
            <li><a href="https://bartoc.org/en/node/18785#content" class="portal-link">BARTOC</a></li>
            <li><a href="https://uri.gbv.de/terminology/bk/" class="portal-link">VZG Terminology</a></li>
          </ul>
        </div>

        <div class="card-2">
          <img src="/images/anwendungsrichtlinien.svg" alt="">
          <a href="{{ prefix }}/basisklassifikation/anwendungsrichtlinien/" class="card-title-link">
            <h2 class="card-title">Anwendungsrichtlinien</h2>
          </a>
          <p>Richtlinien für die Anwendung der Basisklassifikation.</p>
        </div>

        <div class="card-3">
          <img src="/images/erschliessungstools.svg" alt="">
          <h2 class="card-title">Erschließungstools</h2>
          <p>Werkzeuge für die Erschließung mit der Basisklassifikation.</p>
          <ul>
            <li><a href="https://services.eurospider.com/da3/login?p=k10plus" class="portal-link">DA-3</a></li>
            <li><a href="https://coli-conc.gbv.de/coli-rich/app/" class="portal-link">coli-rich</a></li>
            <li><a href="https://wiki.k10plus.de/spaces/K10PLUS/pages/64225355/Installationsanleitung+WinIBW3+K10plus" class="portal-link">WinIBW</a></li>
          </ul>
        </div>

        <div class="card-4">
          <img src="/images/news.svg" alt="">
          <h2 class="card-title">BK-Projekte</h2>
          <p>Aktuelle Projekte zur Basisklassifikation.</p>
          <ul>
            <li><a href="{{ prefix }}/basisklassifikation/relaunch/" class="portal-link">BK-Relaunch</a></li>
            <li><a href="{{ prefix }}/basisklassifikation/uebersetzungsprojekt/" class="portal-link">BK-Übersetzung</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="portal-links">
    <div class="portal-link-item">
      <img src="/images/bk-redaktion.svg" alt="">
      <div class="portal-link-text">
        <span class="label">
          <a href="{{ prefix }}/basisklassifikation/bk-redaktion/">BK-Redaktion</a>
        </span>
      </div>
    </div>

    <div class="portal-link-item">
      <img src="/images/arbeitspakete.svg" alt="">
      <div class="portal-link-text">
        <span class="label">
          BK-Fachkoordination
        </span>
      </div>
    </div>

    <div class="portal-link-item">
      <img src="/images/partnerinstitutionen.svg" alt="">
      <div class="portal-link-text">
        <span class="label">
          Publikationen
        </span>
      </div>
    </div>

    <div class="portal-link-item">
      <img src="/images/neuigkeiten.svg" alt="">
      <div class="portal-link-text">
        <span class="label">
          <a href="{{ prefix }}/basisklassifikation/neuigkeiten/">Neuigkeiten &amp; Updates</a>
        </span>
      </div>
    </div>
  </div>

{% include "bk-homepage-footer.njk" %}

</div>