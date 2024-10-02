import gbv from "eslint-config-gbv"

export default [
  ...gbv,
  {
    ignores: [
      "js",
      "_site",
      "docker",
    ],
  },
]
