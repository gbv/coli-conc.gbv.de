{% set userIcon %}
<svg class="user-icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 115 115">
  <g data-name="Ellipse 3" fill="#ffffff00" stroke-width="1">
    <circle cx="57.5" cy="57.5" r="57.5" stroke="none"/>
    <circle cx="57.5" cy="57.5" r="57" fill="none"/>
  </g>
  <path d="M0,71.3c2.522-3.074,6.625-5.776,12.31-8.3,10.217-3.974,20.434-6.243,30.083-6.243s19.3,2.27,30.083,6.243c6.2,2.285,10.341,5.134,12.736,8.438a56.853,56.853,0,0,1-39.794,19q-1.316.058-2.643.065h-.109A56.857,56.857,0,0,1,0,71.3ZM26.5,38.6A21.48,21.48,0,0,1,19.689,22.7,21.478,21.478,0,0,1,26.5,6.811a21.946,21.946,0,0,1,31.784,0A21.476,21.476,0,0,1,65.1,22.7,20.612,20.612,0,0,1,58.284,38.6a21.946,21.946,0,0,1-31.784,0Z" transform="translate(15 23.993)" />
</svg>
{% endset %}

{% flexbox "row", "text-align: center;" %}
{% flex %}

**{{ { en: "Email for general or editorial feedback", de: "E-Mail für allgemeine oder redaktionelle Rückmeldungen" } | localize }}**:

coli-conc@gbv.de

{{ { en: "For technical questions or feedback, feel free to create an issue on GitHub concerning [Cocoda](https://github.com/gbv/cocoda/issues), [BARTOC](https://github.com/gbv/bartoc.org/issues), or any other [software component](/publications/#software).", de: "Bei Fragen oder Feedback zur Software, öffnen Sie gerne ein neues Issue auf GitHub: [Cocoda](https://github.com/gbv/cocoda/issues), [BARTOC](https://github.com/gbv/bartoc.org/issues) oder [eine andere Softwarekomponente](/publications/#software)." } | localize }}

{% endflex %}
{% endflexbox %}

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start;" %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Lead, Terminology Services", de: "Leitung, Terminologie-Services" } | localize }}**

Uma Balakrishnan

{% small %}
balakrishnan@gbv.de
{% endsmall%}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Technical Lead", de: "Technischer Leiter" } | localize }}**

Dr. Jakob Voß

{% small %}
voss@gbv.de

[GitHub](https://github.com/nichtich)
{% endsmall %}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Data Librarian", de: "Datenbibliothekarin" } | localize }}**

Mareike Röhl

{% small %}
mareike.roehl@gbv.de

[GitHub](https://github.com/mroehl86)
{% endsmall %}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Software Development", de: "Software-Entwicklung" } | localize }}**

Rodolfo Marraffa

{% small %}
rodolfo.marraffa@gbv.de

[GitHub](https://github.com/rodolv-commons)
{% endsmall %}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Software Development", de: "Software-Entwicklung" } | localize }}**

Markus Matoni

{% small %}
markus.matoni@gbv.de

[GitHub](https://github.com/mmarkus1)
{% endsmall %}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Software Development", de: "Software-Entwicklung" } | localize }}**

Arno Kesper

{% small %}
arno.kesper@gbv.de

[GitHub](https://github.com/kespera)
{% endsmall %}
{% endflex %}
{% endflexbox %}


{% flexbox "row", "text-align: center;" %}
{% flex %}
Mastodon:

[@bartoc@code4lib.social](https://code4lib.social/@bartoc)
{% endflex %}
{% endflexbox %}
