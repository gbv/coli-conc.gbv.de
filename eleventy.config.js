import moment from "moment"
import pluginRss from "@11ty/eleventy-plugin-rss"
import yaml from "js-yaml"
import htmlmin from "html-minifier-terser"

import markdownItPackage from "markdown-it"
import markdownItAnchor from "markdown-it-anchor"
import markdownItFootnote from "markdown-it-footnote"
import markdownItMultimdTable from "markdown-it-multimd-table"

export default async function (eleventyConfig) {

  // Add plugins
  eleventyConfig.addPlugin(pluginRss)

  // Add yml
  eleventyConfig.addDataExtension("yml", contents => yaml.load(contents))

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
    linkify: true,
  }
  const markdownIt = markdownItPackage(markdownItOptions)
    .use(markdownItAnchor)
    .use(markdownItFootnote)
    .use(markdownItMultimdTable)
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

  // Adjust rendering of markdown-it-footnote (i.e. remove <section> element)
  markdownIt.renderer.rules.footnote_block_open = (tokens, idx, options) => (
    (options.xhtmlOut ? "<hr class=\"footnotes-sep\" />\n" : "<hr class=\"footnotes-sep\">\n") +
    "<ol class=\"footnotes-list\">\n"
  )
  markdownIt.renderer.rules.render_footnote_block_close = () => "</ol>\n"

  eleventyConfig.setLibrary("md", markdownIt)

  // Paired Shortcode for section
  eleventyConfig.addPairedShortcode("section", (content, classes = "", style = "") => {
    return `
<div class="section ${classes}" style="${style}">
  ${markdownIt.render(content)}
</div>
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

  // Paired Shortcode for badge
  eleventyConfig.addShortcode("badge", (text, variant = "default") => {
    return `<span class="badge badge-${variant}">${text}</span>`
  })

  // Paired Shortcode for smaller text
  eleventyConfig.addPairedShortcode("small", (content) => {
    return `
<div class="font-size-small">
  ${markdownIt.render(content)}
</div>
    `
  })

  eleventyConfig.addShortcode("flexBreakRow", () => "<div style=\"flex-basis: 100%; height: 0;\"></div>")

  // Shortcode for images
  eleventyConfig.addShortcode("image", function(url, style, alt = "") {
    if (!alt) {
      console.warn(`Warning: Do not embed images without alt text (${this.page.inputPath} - ${url})!`)
    }
    return `<img class="image" src="${eleventyConfig.getFilter("urla")(url)}" style="${style}" alt="${alt}">`
  })

  // Paired Shortcode for Markdown
  eleventyConfig.addPairedShortcode("markdown", content => markdownIt.render(content))

  // Shortcode for button
  eleventyConfig.addShortcode("button",
    (url, text, classes = "", style = "", onclick = "") =>
      `<a
        href="${url.startsWith("http") ? url : eleventyConfig.getFilter("url")(url)}"
        ${url.startsWith("http") ? "target=\"_blank\"" : ""} class="button ${classes}"
        style="${style}"
        onclick="${onclick}">
        ${text}
      </a>`,
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
  // Passthrough for files in static/ folder
  eleventyConfig.addPassthroughCopy({ static: "/" })
  // Passthrough for certain file extensions
  ;["json", "ndjson", "php", "bib", "yaml", "pdf"].forEach(ext => {
    eleventyConfig.addPassthroughCopy(`en/**/*.${ext}`)
  })

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
