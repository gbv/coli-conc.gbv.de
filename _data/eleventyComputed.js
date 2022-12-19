const gitCommit = require("child_process")
  .execSync("git rev-parse --short HEAD")
  .toString().trim()

module.exports = {
  // Determine current locale from input path
  locale: data => data.page.inputPath.includes("/de/") ? "de" : "en",
  source: data => {
    let source = `${data.pkg.homepage}/tree/main${data.page.inputPath.replace("./", "/")}`
    if (data.originalLanguage) {
      source = source.replace(/\/(en|de)\//, `/${data.originalLanguage}/`)
    }
    return source
  },
  // Set the title
  title: data => data.title || (data.series && `${data.series} ${data.number}`) || data.strings.pages[data.page.fileSlug] || data.page.fileSlug,
  buildInfo: data => ({
    gitCommit,
    gitCommitLink: `${data.pkg.homepage}/commit/${gitCommit}`,
  }),
}
