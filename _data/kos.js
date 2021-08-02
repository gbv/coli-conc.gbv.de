const axios = require("axios")
const apiUrl = "http://bartoc.org/api/voc?sort=label&order=asc&partOf=http%3A%2F%2Fbartoc.org%2Fen%2Fnode%2F18926"

module.exports = async () => {
  const result = (await axios.get(apiUrl)).data
  return result
}
