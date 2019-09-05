$(function() {

  function supportedSystem(notation) {
    return notation.match(/^(DDC|RVK|BK|GND|BOS|ixtheo)$/)
  }

  $.getJSON('kos.json', function(registry) {
    const table = $('#registry-table tbody')
    registry.forEach(function (scheme) {
      const row = $('<tr>')

      var name = scheme.prefLabel ? (scheme.prefLabel.en ||scheme.prefLabel.de) : '?'
      if (scheme.notation && scheme.notation.length) {
        name += " (" + scheme.notation[0] + ")"
      }

      if (supportedSystem(scheme.notation[0])) { 
        var url = 'https://coli-conc.gbv.de/cocoda/app/?fromScheme='+scheme.uri
        var a = $('<a>').text(name).attr('href', url)
        $('<td>').append(a).appendTo(row)
      } else {
        $('<td>').text(name).appendTo(row)
      }

      if (scheme.PICAPATH) {
        $('<td>').append($('<code>').text(scheme.PICAPATH)).appendTo(row)
      } else {
        $('<td>').appendTo(row)
      }

      var marcfield = scheme.MARCSPEC
      if (scheme.uri === "http://bartoc.org/en/node/241") {
        marcfield = '082|083'
      } else if (scheme.uri === "http://bartoc.org/en/node/496") {
        marcfield = '080'
      } else if (scheme.identifier) {

        var locid = scheme.identifier.find(id => id.startsWith("http://id.loc.gov/vocabulary/classSchemes/"))
        if (locid) {
          marcfield = '084{$2='+locid.substr(42)+'}'
        }
      }

      if (marcfield) {
        $('<td>').append($('<code>').text(marcfield)).appendTo(row)
      } else {
        $('<td>').appendTo(row)
      }
      
      row.appendTo(table)
    })
  })
});
