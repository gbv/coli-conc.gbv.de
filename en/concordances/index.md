---
layout: layouts/page
title: Concordance Registry
js:
  vue: true
  axios: true
---

{% section "textPadding" %}

We collect concordances and mappings in a public database run with
[jskos-server](https://github.com/gbv/jskos-server). The database can be
queried via this web interface and via an API at
<https://coli-conc.gbv.de/api/>.

So far, we have collected ${concordanceCount} concordances with ${mappingsCount} mappings.

{% button "https://coli-conc.gbv.de/cocoda/app/concordances.html", "Browse all concordances and mappings" %}

→ alternatively [open concordances in Cocoda](https://coli-conc.gbv.de/cocoda/app/?concordances)

{% endsection %}

{% section %}{% endsection %}

<script>
const { createApp } = Vue
const app = createApp({
  data() {
    return {
      concordanceCount: "?",
      mappingsCount: "?",
    }
  },
  async created() {
    // Load concordances from API
    const url = "https://coli-conc.gbv.de/api/concordances"
    const result = await axios.get(url, { params: { limit: 10000 }})
    this.concordanceCount = result.data.length
    this.mappingsCount = result.data.reduce((total, current) => total + parseInt(current.extent) || 0, 0)
  },
})
app.config.compilerOptions.delimiters = ['${', '}']
app.mount('#main')
</script>
