const moment = require("moment")

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

  // Paired Shortcode for flexbox
  eleventyConfig.addPairedShortcode("flexbox", (content, direction = "row", extra = "") => {
    return `
<div class="flexbox", style="flex-direction: ${direction}; ${extra}">
  ${markdownIt.render(content)}
</div>
    `
  })

  // Paired Shortcode for flex element
  eleventyConfig.addPairedShortcode("flex", (content, flex = "1") => {
    return `
<div class="flex" style="flex: ${flex};">
  ${markdownIt.render(content)}
</div>
    `
  })

  eleventyConfig.addShortcode("icon", (name, width = "20px") => {
    return {
      user: `<svg aria-hidden="true" width="${width}" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>`,
    }[name] || ""
  })

  // Paired Shortcode for Markdown
  eleventyConfig.addPairedShortcode("markdown", content => markdownIt.render(content))

  // date filter
  eleventyConfig.addFilter("date", (date, format) => {
    return moment(date).format(format)
  })

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
