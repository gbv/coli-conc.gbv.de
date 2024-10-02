import fs from "fs"
const registries = fs.readFileSync("./en/registry/registries.ndjson", "utf-8").split("\n").filter(a => a.trim()).map(json => JSON.parse(json))

export default registries
