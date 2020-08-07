module.exports = {
  // Determine current locale from input path
  locale: data => data.page.inputPath.includes("/de/") ? "de" : "en",
  source: data => {
    let source = `${data.pkg.homepage}/tree/master${data.page.inputPath.replace("./", "/")}`
    if (data.isFallback) {
      source = source.replace("/de/", "/en/")
    }
    return source
  },
  // Set the title
  title: data => data.title || (data.series && `${data.series} ${data.number}`) || data.strings.pages[data.page.fileSlug] || data.page.fileSlug,
}
