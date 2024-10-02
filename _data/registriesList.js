import registries from "./registries.js"
import _ from "lodash"

export default registries.map(r => ({
  notation: _.get(r, "notation[0]", ""),
  uri: r.uri,
  label: _.get(r, "prefLabel.en") || _.get(r, "prefLabel.de") || "?",
  description: _.get(r, "definition.en[0]") || _.get(r, "definition.de[0]") || "",
  id: _.last(r.uri.split("/")),
  registry: r,
}))
