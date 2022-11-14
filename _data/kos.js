const axios = require("axios")
const jskos = require("jskos-tools")
const apiUrl = "http://bartoc.org/api/voc?sort=label&order=asc&partOf=http%3A%2F%2Fbartoc.org%2Fen%2Fnode%2F18926"
const apiTypesUrl = "https://bartoc.org/api/voc/concepts?uri=http%3A%2F%2Fbartoc.org%2Fen%2Fnode%2F20002&limit=100"

module.exports = async () => {
  const kos = (await axios.get(apiUrl)).data
  const types = (await axios.get(apiTypesUrl)).data
  kos.forEach(scheme => {
    (scheme.API || []).forEach(api => {
      const type = types.find(t => t.uri === api.type)
      if (type) {
        api.label = jskos.prefLabel(type)
      } else {
        api.label = "Unspecified Webservice"
      }
    })
  })
  return kos
}
