const data = require("./kosTypes-data.json")
const _ = require("lodash")

// Build tree of concepts
// Some of the code taken from https://github.com/gbv/coli-conc.gbv.de/blob/pre-2020/publications/kostypes/jskos-treeview.js

const namespaces = {
  fabio: "http://purl.org/spar/fabio/",
  nkos: "http://w3id.org/nkos/nkostype#",
  skos: "http://www.w3.org/2004/02/skos/core#",
  edma: "http://edamontology.org/",
}

function qname(uri) {
  for (let prefix in namespaces) {
    if (uri.startsWith(namespaces[prefix])) {
      return prefix + ":" + uri.substr(namespaces[prefix].length)
    }
  }
  return uri
}

function makeNode(concept) {
  const node = {
    text: _.get(concept, "prefLabel.en", ""),
    description: _.get(concept, "scopeNote.en[0]", ""),
    uri: concept.uri,
    notation: _.get(concept, "notation[0]", ""),
    narrower: concept.narrower || [],
    tags: [],
    mappings: [],
  }
  if (concept.occurrences) {
    concept.occurrences.forEach(occ => {
      if (occ.relation === "http://schema.org/about") {
        node.tags.push({
          text: occ.count,
          class: "badge badge-alternative",
          href: concept.uri + "#sitelinks-wikipedia",
          title: "number of Wikipedia articles",
        })
      } else if (occ.relation === "http://www.wikidata.org/entity/P31") {
        node.tags.push({
          text: occ.count,
          class: "badge badge-default",
          href: "https://query.wikidata.org/#SELECT %3Fitem %3FitemLabel WHERE {%0A %3Fitem wdt%3AP31 <"+concept.uri+"> SERVICE wikibase%3Alabel { bd%3AserviceParam wikibase%3Alanguage \"[AUTO_LANGUAGE]%2Cen\". }%0A}",
          title: "number of Wikidata instances",
        })
      }
    })
  }
  if (concept.mappings) {
    node.mappings = concept.mappings.map(m => ({
      uri: m.to.memberSet[0].uri,
      text: qname(m.to.memberSet[0].uri) || "",
    }))
  }
  return node
}

const topConcepts = data.topConcepts.map(t => data.concepts.find(c => c.uri == t.uri)).map(c => makeNode(c))

function fillChildren(current) {
  for (let concept of current) {
    if (!concept.narrower) {
      concept.narrower = data.concepts.filter(c => c.broader.find(b => b.uri == concept.uri))
    } else {
      concept.narrower = concept.narrower.map(n => data.concepts.find(c => c.uri == n.uri))
    }
    concept.narrower = concept.narrower.filter(n => n).map(c => makeNode(c))
    fillChildren(concept.narrower)
  }
}
fillChildren(topConcepts)

module.exports = topConcepts
