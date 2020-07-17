#!/usr/bin/env node

const meow = require('meow')

const cli = meow(`
  Usage
    $ ./resize-image.js <input file> [<input file>, ...]

  Options
    --widths target widths in pixels separated by comma

  Examples
    $ ./resize-image.js image.png --widths=100,200,300
`, {
  flags: {
    widths: {
      type: "string",
      isRequired: true,
    },
  }
})

const widths = cli.flags.widths.split(",").map(w => parseInt(w))

const sharp = require("sharp")

;(async () => {
  for (let filename of cli.input) {
    const fileExtension = filename.slice(filename.lastIndexOf("."))
    for (let width of widths) {
      const targetFilename = filename.replace(fileExtension, `-${width}px${fileExtension}`)
      console.log(`Writing version with ${width} pixels width to ${targetFilename}...`)
      await sharp(filename)
        .resize(width)
        .toFile(targetFilename)
      console.log("...done!")
    }
    console.log()
  }
})()
