---
originalLanguage: en
layout: layouts/bk-homepage
title: Ansprechpartnerinnen
css: ["bk-homepage"]
---

{% set prefix = "/de" if locale == "de" else "" %}

<div class="bk-homepage">

  <div class="subpage">

    <a href="{{ prefix }}/basisklassifikation/">
      <img src="/images/logo-bk.png" alt="Basisklassifikation">
    </a>

    {% include "bk-relaunch-nav.njk" %}

</div>

<div class="subpage-content">

    <div class="subpage-title-section">
      <h1 class="subpage-title">Ansprechpartnerinnen</h1>
      <hr>
    </div>

    <div class="grid-3">
      <div class="person-card">
        <p class="card-title">Regine Beckmann</p>
        <p class="card-subtitle">Staatsbibliothek zu Berlin</p>
      </div>
      <div class="person-card">
        <p class="card-title">Rabea Rudigier</p>
        <p class="card-subtitle">Österreichische Nationalbibliothek</p>
      </div>
      <div class="person-card">
        <p class="card-title">Diana Slawig</p>
        <p class="card-subtitle">Technische Informationsbibliothek Hannover</p>
      </div>
    </div>
</div>

{% include "bk-relaunch-footer.njk" %}

</div>