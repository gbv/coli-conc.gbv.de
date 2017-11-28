(function(f){if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f()}else if(typeof define==="function"&&define.amd){define([],f)}else{var g;if(typeof window!=="undefined"){g=window}else if(typeof global!=="undefined"){g=global}else if(typeof self!=="undefined"){g=self}else{g=this}g.jskos = f()}})(function(){var define,module,exports;return (function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// utility functions to process JSKOS data
module.exports = {

  getPrefLabel: (item, language = 'en', fallback = '') => {
    const prefLabel = item.prefLabel || {}

    language = selectLanguageFromMap(prefLabel, language)

    return language in prefLabel ? prefLabel[language] : fallback
  },

  getScopeNotes: (item, language = 'en') => getLanguageMapList(item, 'scopeNote', language),

  getOccurrenceCount: (occurrences, match) => {
    return ((occurrences || [])
          .find(o => {
            for (let f in match) {
              if (o[f] !== match[f]) return false
            }
            return true
          }) || {}).count || 0
  },

  // depth-first traverse all concepts in a concept scheme
  traverseConcepts: (scheme, callback) => {
    if (!scheme.concepts) return

    const concepts = setMap(scheme.concepts)
    const visited = []

    const deepFirst = (uri, depth, isSubjectOf) => {
      const concept = concepts[uri]
      if (!concept) return

      callback(concept, depth, visited[uri], isSubjectOf)

      if (!visited[uri]) {
        visited[uri] = true

        const subjectOf = concept.subjectOf || []
        // TODO: subjectOf should be stored in the node!
        subjectOf.forEach(child => deepFirst(child.uri, depth + 1, true))

        const narrower = concept.narrower || []
        narrower.forEach(child => deepFirst(child.uri, depth + 1, false))
      }
    }

    const topConcepts = scheme.topConcepts || []
    topConcepts.forEach(c => deepFirst(c.uri, 0, false))
  },

  setMap: setMap
}

function setMap (set) {
  return set.reduce((map, c) => { map[c.uri] = c; return map }, {})
}

function selectLanguageFromMap (languageMap, language) {
  if (language in languageMap) {
    return language
  }

  // take the first if required language is not available
  for (let language in languageMap) {
    return language
  }

  return 'en'
}

function getLanguageMapList (item, field, language) {
  const languageMap = item[field] || {}
  language = selectLanguageFromMap(languageMap, language)
  return language in languageMap ? languageMap[language] : []
}

},{}]},{},[1])(1)
});