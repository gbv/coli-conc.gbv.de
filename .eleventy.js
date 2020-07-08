module.exports = eleventyConfig => {

  // Prepare MarkdownIt
  const markdownItOptions = {
    html: true,
  }
  const markdownIt = require("markdown-it")(markdownItOptions)
    .use(require('markdown-it-anchor'))
  eleventyConfig.setLibrary("md", markdownIt);

  // Paired Shortcode for section
  eleventyConfig.addPairedShortcode("section", (content, variant = "") => {
    return `
<section class="${variant}">
  ${markdownIt.render(content)}
</section>
    `
  })

  eleventyConfig.addShortcode("clear", () => `<div style="clear: both;"></div>`)

  // Paired Shortcode for floating elements
  eleventyConfig.addPairedShortcode("float", (content) => {
    return `
<div class="float">
  ${markdownIt.render(content)}
</div>
    `
  })

  // Paired Shortcode for Markdown
  eleventyConfig.addPairedShortcode("markdown", content => markdownIt.render(content))

  // Passthrough for fonts and images
  eleventyConfig.addPassthroughCopy("fonts")
  eleventyConfig.addPassthroughCopy("images")

  // We can't use gitignore because Eleventy will ignore changes in CSS files
  eleventyConfig.setUseGitIgnore(false)

  return {
    markdownTemplateEngine: "njk",
    htmlTemplateEngine: "njk",
    dir: {
      input: "en",
      includes: "../_includes"
    },
  }
}
