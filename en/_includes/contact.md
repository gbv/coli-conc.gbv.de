{% set userIcon %}
{% icon "user", "40vw", "max-width: 150px;" %}
{% endset %}

{% flexbox "row", "text-align: center;" %}
{% flex %}
**{{ { en: "General", de: "Allgemein" } | localize }}**

coli-conc@gbv.de

{% small %}
[Twitter](https://twitter.com/coli_conc)
{% endsmall %}
{% endflex %}
{% endflexbox %}

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start;" %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Project Lead", de: "Projektleitung" } | localize }}**

Uma Balakrishnan

{% small %}
balakrishnan@gbv.de
{% endsmall%}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Technical Coordination", de: "Technische Koordination" } | localize }}**

Dr. Jakob Voß

{% small %}
voss@gbv.de

[GitHub](https://github.com/nichtich)
{% endsmall %}
{% endflex %}
{% flex %}
{{ userIcon | safe }}

**{{ { en: "Software Development", de: "Software-Entwicklung" } | localize }}**

Stefan Peters

{% small %}
peters@gbv.de

[GitHub](https://github.com/stefandesu)
{% endsmall %}
{% endflex %}
{% endflexbox %}
