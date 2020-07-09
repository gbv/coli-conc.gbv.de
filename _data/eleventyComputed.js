module.exports = {
  // Determine current locale from input path
  locale: data => data.page.inputPath.includes("/de/") ? "de" : "en",
}
