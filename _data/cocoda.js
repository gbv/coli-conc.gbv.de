const axios = require("axios")

// Download builds from server and sort them
module.exports = async () => {
  const result = (await axios.get("https://coli-conc.gbv.de/cocoda/status/builds.json")).data
  const builds = []
  for (let key of Object.keys(result)) {
    const build = Object.assign({ name: key }, result[key])
    builds.push(build)
  }
  builds.sort((a, b) => {
    return a.date < b.date ? 1 : -1
  })
  return builds
}
