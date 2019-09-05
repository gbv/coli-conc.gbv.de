$(function() {
  function supportedSystem(notation) {
    return notation.match(/^(DDC|RVK|BK|GND|BOS|ixtheo)$/)
  }
  $.getJSON('kos.json', function(registry) {
    const table = $('#registry-table tbody')
    registry.forEach(function (scheme) {
      const row = $('<tr>')

      var name = scheme.prefLabel.en ||scheme.prefLabel.de
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
      
      row.appendTo(table)
    })
  })
});
