#!/usr/bin/env node

const meow = require("meow")

const cli = meow(`
  Usage
    $ ./build.js

  Options
    --pathprefix pathprefix option that is passed to eleventy
    --url base URL for where the website is hosted

  Examples
    $ ./build.js --pathprefix=test
`, {
  flags: {
    pathprefix: {
      type: "string",
    },
    url: {
      type: "string",
      isRequired: true,
    },
  },
})

let pathprefix = cli.flags.pathprefix
// Add trailing slash
if (pathprefix && !pathprefix.endsWith("/")) {
  pathprefix += "/"
}
// Remove leading slash
if (pathprefix && pathprefix.startsWith("/")) {
  pathprefix = pathprefix.slice(1)
}

let url = cli.flags.url
// Add trailing slash
if (!url.endsWith("/")) {
  url += "/"
}
// Add pathprefix if necessary
if (pathprefix) {
  url += pathprefix
}

const fs = require("fs")
const path = require("path")
const { execSync } = require("child_process")

// from: https://stackoverflow.com/a/34509653/11050851
function ensureDirectoryExistence(filePath) {
  var dirname = path.dirname(filePath)
  if (fs.existsSync(dirname)) {
    return true
  }
  ensureDirectoryExistence(dirname)
  fs.mkdirSync(dirname)
}

const getAllFiles = function(dirPath, arrayOfFiles) {
  const files = fs.readdirSync(dirPath)

  arrayOfFiles = arrayOfFiles || []

  files.forEach(function(file) {
    if (fs.statSync(dirPath + "/" + file).isDirectory()) {
      arrayOfFiles = getAllFiles(dirPath + "/" + file, arrayOfFiles)
    } else {
      arrayOfFiles.push(path.join(dirPath, "/", file))
    }
  })

  return arrayOfFiles
}

const site = "en"
const siteGerman = "de"

// 1. Build SASS
console.log("Building SASS...")
execSync(
  "npm run sass",
  { stdio: "inherit" },
)
console.log()


// 2. Build English site
console.log("Building English site...")
execSync(
  `URL=${url} ` + "node_modules/.bin/eleventy build --passthroughall" + (pathprefix ? ` --pathprefix=${pathprefix}` : ""),
  { stdio: "inherit" },
)
console.log()

// 3. Find missing files in German site and copy from English site
console.log("Copying missing files to German site...")
const files = getAllFiles(site)
const filesCopied = []
for (let file of files) {
  const fileGerman = file.replace(site, siteGerman)
  if (!fs.existsSync(fileGerman)) {
    ensureDirectoryExistence(fileGerman)
    fs.copyFileSync(file, fileGerman)
    filesCopied.push(fileGerman)
    console.log(`- copied ${file} to ${fileGerman}`)
    // Add isFallback front matter variable to fallback site
    if (!fileGerman.includes("_includes")) {
      let fileContent = fs.readFileSync(fileGerman, "utf-8")
      const addition = "isFallback: true"
      if (fileContent.startsWith("---")) {
        fileContent = fileContent.replace("---", `---\n${addition}`)
      } else {
        fileContent = `---\n${addition}\n---\n${fileContent}`
      }
      fs.writeFileSync(fileGerman, fileContent)
    }
  }
}
console.log()

// 4. Build German site
console.log("Building German site...")
execSync(
  `URL=${url}${siteGerman}/ ` + `node_modules/.bin/eleventy build --pathprefix=${pathprefix || ""}${siteGerman} --input=${siteGerman} --output=_site/${siteGerman}`,
  { stdio: "inherit" },
)
console.log()

// 5. Delete copied files
console.log("Deleting previously copied files...")
for (let file of filesCopied) {
  try {
    fs.unlinkSync(file)
    console.log(`- ${file} deleted`)
  } catch(error) {
    console.error(`- ${file} could not be deleted: ${error}`)
  }
}
console.log()

// 6. Delete fonts and images folder in German site
console.log("Delete some static and unnecessary files...")
const foldersToDelete = [
  `${siteGerman}/fonts`,
  `${siteGerman}/images`,
  `${siteGerman}/js`,
  `${siteGerman}/_includes`,
  "_includes",
]
for (let folder of foldersToDelete) {
  folder = `_site/${folder}`
  try {
    fs.rmdirSync(folder, { recursive: true })
    console.log(`- ${folder} deleted`)
  } catch(error) {
    console.log(`- ${folder} could not be deleted: ${error}`)
  }
}
