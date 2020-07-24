const fs = require("fs")
const registries = fs.readFileSync("./en/registry/registries.ndjson", "utf-8").split("\n").filter(a => a.trim()).map(json => JSON.parse(json))

module.exports = registries
