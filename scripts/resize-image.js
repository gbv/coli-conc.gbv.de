#!/usr/bin/env node

import meow from "meow"

const cli = meow(`
  Usage
    $ ./resize-image.js <input file> [<input file>, ...]

  Options
    --widths target widths in pixels separated by comma

  Examples
    $ ./resize-image.js image.png --widths=100,200,300
`, {
  importMeta: import.meta,
  flags: {
    widths: {
      type: "string",
      isRequired: true,
    },
  },
})

const widths = cli.flags.widths.split(",").map(w => parseInt(w))

import sharp from "sharp"

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
