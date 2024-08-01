#!/usr/bin/env node

const meow = require("meow")
const defaultOutput = "_site"

const cli = meow(`
  Usage
    $ ./build.js

  Options
    --pathprefix pathprefix option that is passed to eleventy
    --url base URL for where the website is hosted
    --output output folder for site

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
    output: {
      type: "string",
      default: defaultOutput,
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
let output = cli.flags.output
// Remove trailing slash
if (output.endsWith("/")) {
  output = output.slice(0, output.length - 1)
}
if (output != defaultOutput) {
  console.log(`Building site into ${output}...`)
  console.log()
}

const fs = require("fs-extra")
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
console.log(`- Copying resulting CSS into ${output}/css/...`)
fs.copySync("_includes/css", `${output}/css`)
console.log()

let files = [], filesCopied = []

// 1.5 Copy Static JS Dependencies
console.log("Copy Static JS Dependencies...")
execSync(
  "npm run copyStaticDependencies",
  { stdio: "inherit" },
)
console.log()

// 2a. Find missing files in English site and copy from German site
console.log("Copying missing files to English site...")
files = getAllFiles(siteGerman)
filesCopied = []
try {
  for (let file of files) {
    const fileEnglish = file.replace(siteGerman, site)
    if (!fs.existsSync(fileEnglish)) {
      ensureDirectoryExistence(fileEnglish)
      fs.copyFileSync(file, fileEnglish)
      filesCopied.push(fileEnglish)
      console.log(`- copied ${file} to ${fileEnglish}`)
      // Add originalLanguage front matter variable
      if (!fileEnglish.includes("_includes")) {
        let fileContent = fs.readFileSync(fileEnglish, "utf-8")
        const addition = "originalLanguage: de"
        if (fileContent.startsWith("---")) {
          fileContent = fileContent.replace("---", `---\n${addition}`)
        } else {
          fileContent = `---\n${addition}\n---\n${fileContent}`
        }
        fs.writeFileSync(fileEnglish, fileContent)
      }
    }
  }
} catch (error) {
  console.error("- Error while copying missing files to English site:", error)
  console.log("- Contuining anyway...")
}
console.log()

// 2b. Build English site
console.log("Building English site...")
execSync(
  `URL=${url} ` + `node_modules/.bin/eleventy ${pathprefix ? ` --pathprefix=${pathprefix}` : ""} --output=${output}`,
  { stdio: "inherit" },
)
console.log()

// 2c. Delete copied files
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

// 3a. Find missing files in German site and copy from English site
console.log("Copying missing files to German site...")
files = getAllFiles(site)
filesCopied = []
try {
  for (let file of files) {
    const fileGerman = file.replace(site, siteGerman)
    if (!fs.existsSync(fileGerman)) {
      ensureDirectoryExistence(fileGerman)
      fs.copyFileSync(file, fileGerman)
      filesCopied.push(fileGerman)
      console.log(`- copied ${file} to ${fileGerman}`)
      // Add originalLanguage front matter variable
      if (!fileGerman.includes("_includes")) {
        let fileContent = fs.readFileSync(fileGerman, "utf-8")
        const addition = "originalLanguage: en"
        if (fileContent.startsWith("---")) {
          fileContent = fileContent.replace("---", `---\n${addition}`)
        } else {
          fileContent = `---\n${addition}\n---\n${fileContent}`
        }
        fs.writeFileSync(fileGerman, fileContent)
      }
    }
  }
} catch (error) {
  console.error("- Error while copying missing files to German site:", error)
  console.log("- Contuining anyway...")
}
console.log()

// 3b. Build German site
console.log("Building German site...")
try {
  execSync(
    `URL=${url}${siteGerman}/ ` + `node_modules/.bin/eleventy --pathprefix=${pathprefix || ""}${siteGerman} --input=${siteGerman} --output=${output}/${siteGerman}`,
    { stdio: "inherit" },
  )
} catch (error) {
  console.error("- Error building German site:", error)
  console.log("- Contuining anyway...")
}
console.log()

// 3c. Delete copied files
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

// 5. Other adjustments
console.log("Other adjustments...")
try {
  // Manually alias 404 page to 404.html
  fs.copyFileSync(`${output}/404/index.html`, `${output}/404.html`)
} catch (error) {
  console.error("An error occurred:", error)
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
  // This is required for Eleventy v2 as the old --passthroughall option was removed and the German site build will now include the `en` directory with some unnecessary files
  `${siteGerman}/en`,
]
for (let folder of foldersToDelete) {
  folder = `${output}/${folder}`
  try {
    fs.rmSync(folder, { recursive: true })
    console.log(`- ${folder} deleted`)
  } catch(error) {
    console.log(`- ${folder} could not be deleted: ${error}`)
  }
}

console.log()
console.log("Build completed!")
