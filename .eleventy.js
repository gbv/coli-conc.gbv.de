const moment = require("moment")
const pluginRss = require("@11ty/eleventy-plugin-rss")
const yaml = require("js-yaml")
const htmlmin = require("html-minifier")

module.exports = eleventyConfig => {

  // Add plugins
  eleventyConfig.addPlugin(pluginRss)

  // Add yml
  eleventyConfig.addDataExtension("yml", contents => yaml.safeLoad(contents))

  // Add transformation to minify HTML
  // See: https://www.11ty.dev/docs/config/#transforms
  eleventyConfig.addTransform("htmlmin", (content, outputPath) => {
    if (outputPath.endsWith(".html")) {
      const minified = htmlmin.minify(content, {
        useShortDoctype: true,
        removeComments: true,
        collapseWhitespace: true,
        minifyCSS: true,
      })
      return minified
    }
    return content
  })

  // Prepare MarkdownIt
  const markdownItOptions = {
    html: true,
  }
  const markdownIt = require("markdown-it")(markdownItOptions)
    .use(require("markdown-it-anchor"))
    .disable("code")

  // Open external links in new tab, adapted from https://github.com/markdown-it/markdown-it/blob/master/docs/architecture.md#renderer
  const mdDefaultLinkOpen = markdownIt.renderer.rules.link_open || function(tokens, idx, options, env, self) {
    return self.renderToken(tokens, idx, options)
  }
  markdownIt.renderer.rules.link_open = function (tokens, idx, options, env, self) {
    if (tokens[idx].attrGet("href").startsWith("http")) {
      const aIndex = tokens[idx].attrIndex("target")
      if (aIndex < 0) {
        tokens[idx].attrPush(["target", "_blank"])
      } else {
        tokens[idx].attrs[aIndex][1] = "_blank"
      }
    }
    return mdDefaultLinkOpen(tokens, idx, options, env, self)
  }

  eleventyConfig.setLibrary("md", markdownIt)

  // Paired Shortcode for section
  eleventyConfig.addPairedShortcode("section", (content, classes = "") => {
    return `
<section class="${classes}">
  ${markdownIt.render(content)}
</section>
    `
  })

  eleventyConfig.addShortcode("clear", () => "<div style=\"clear: both;\"></div>")

  // Paired Shortcode for flexbox
  eleventyConfig.addPairedShortcode("flexbox", (content, direction = "row", extra = "") => {
    return `
<div class="flexbox" style="flex-direction: ${direction}; ${extra}">
  ${markdownIt.render(content)}
</div>
    `
  })

  // Paired Shortcode for flex element
  eleventyConfig.addPairedShortcode("flex", (content, flex = "1", style = "") => {
    return `
<div class="flex" style="flex: ${flex}; ${style}">
  ${markdownIt.render(content)}
</div>
    `
  })

  // Paired Shortcode for div element
  eleventyConfig.addPairedShortcode("div", (content, classes = "", style = "") => {
    return `
<div class="${classes}" style="${style}">
  ${markdownIt.render(content)}
</div>
    `
  })

  // Paired Shortcode for smaller text
  eleventyConfig.addPairedShortcode("small", (content) => {
    return `
<small>
  ${markdownIt.render(content)}
</small>
    `
  })

  eleventyConfig.addShortcode("flexBreakRow", () => "<div style=\"flex-basis: 100%; height: 0;\"></div>")

  eleventyConfig.addShortcode("icon", (name, width = "20px") => {
    return {
      user: `<svg aria-hidden="true" width="${width}" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>`,
    }[name] || ""
  })

  // Shortcode for images
  eleventyConfig.addShortcode("image", (url, style, alt = "") => `<img class="image" src="${eleventyConfig.getFilter("urla")(url)}" style="${style}" alt="${alt}">`)

  // Paired Shortcode for Markdown
  eleventyConfig.addPairedShortcode("markdown", content => markdownIt.render(content))

  // Shortcode for button
  eleventyConfig.addShortcode("button",
    (url, text, style, onclick) => `<a
      href="${url.startsWith("http") ? url : eleventyConfig.getFilter("url")(url)}"
      target="${url.startsWith("http") ? "_blank" : ""}"
      class="button"
      style="${style}"
      onclick="${onclick}">${text}</a>`,
  )

  // date filter
  eleventyConfig.addFilter("date", (date, format) => {
    return moment(date).format(format)
  })

  // absolute URL filter
  eleventyConfig.addFilter("urla", (url) => {
    return eleventyConfig.getFilter("url")(url).replace("/de/", "/")
  })

  eleventyConfig.addFilter("localize", function(string) {
    string = string || ""
    if (typeof string === "string") {
      return string
    }
    return string[this.ctx.locale] || string.en
  })

  // Passthrough for fonts and images
  eleventyConfig.addPassthroughCopy("fonts")
  eleventyConfig.addPassthroughCopy("images")
  eleventyConfig.addPassthroughCopy("js")

  // We can't use gitignore because Eleventy will ignore changes in CSS files
  eleventyConfig.setUseGitIgnore(false)

  return {
    markdownTemplateEngine: "njk",
    htmlTemplateEngine: "njk",
    dir: {
      input: "en",
      includes: "../_includes",
      data: "../_data",
    },
  }
}
