$(function(){
  $.getJSON('Q6423319.json', function(scheme) {

    let topConcept = scheme.topConcepts[0].uri
    const concepts = scheme.concepts.reduce(
      function (m, c) { m[c.uri] = c; return m }      
      ,{})

    function makeTree(uri) {
      const concept = concepts[uri]
      if (!concept) {
        return { href: uri, id: uri }
      }

      var node = {
        text: concept.prefLabel['en'],
        description: jskos.getScopeNotes(concept, 'en')[0] || '',
        href: concept.uri,
        id: concept.notation[0],
        selectable: false,
        tags: [],
      }

      if (concept.occurrences) {
        concept.occurrences.forEach(occ => {
          if (occ.relation === 'http://schema.org/about') {
            node.tags.push({
              text: occ.count,
              class: 'badge badge-success',
              href: concept.uri + '#sitelinks-wikipedia',
              title: 'number of Wikipedia articles',
            })
          } else if (occ.relation === 'http://www.wikidata.org/entity/P31') {
            node.tags.push({
              text: occ.count,
              class: 'badge badge-default',
			  href: 'https://query.wikidata.org/#SELECT %3Fitem %3FitemLabel WHERE {%0A %3Fitem wdt%3AP31 <'+concept.uri+'> SERVICE wikibase%3Alabel { bd%3AserviceParam wikibase%3Alanguage \"[AUTO_LANGUAGE]%2Cen\". }%0A}',
              title: 'number of Wikidata instances',
            })
          }
        })
      }

      if (concept.mappings) {
        node.mappings = concept.mappings.map( m => m.to.memberSet[0].uri )
      }

      if (concept.narrower) {
        node.nodes = concept.narrower.map( c => makeTree(c.uri) ) 
      }

      return node
    }

    treeData = makeTree(topConcept)


    const namespaces = {
      fabio: 'http://purl.org/spar/fabio/',
      nkos: 'http://w3id.org/nkos/nkostype#',
      skos: 'http://www.w3.org/2004/02/skos/core#',
      edma: 'http://edamontology.org/',
    }

    function qname(uri) {
      for (prefix in namespaces) {
        if (uri.startsWith(namespaces[prefix])) {
          return prefix + ':' + uri.substr(namespaces[prefix].length)
        }
      }
      return uri
    }

    function nodeFormatter(node, elem) {
      elem
        .append(' (')
        .append($('<a href="#"></a>')
          .attr('href', node.href)
          .attr('title', node.description)
          .append(node.id)
        ).append(')')

      if (node.mappings) {
        elem.append(' ')
        let sep = ' = '
        node.mappings.forEach(function (uri) {
          elem.append(sep)
          sep = ' | '
          elem.append(
            $('<a href="#"></a>').attr('href', uri).text(qname(uri))
          )
        })
      }
    } 

    $('#tree').treeview({
      data: [ treeData ],
      showTags: true,
      depth: 2,
      nodeFormatter: nodeFormatter,
    })
    
  })
})
