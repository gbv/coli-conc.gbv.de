# coli-conc Website

## Install and Build
The website uses [Eleventy](https://www.11ty.dev) as a static site generator. Eleventy is built in JavaScript and we are extending some of its functionality with additional packages, therefore node/npm is necessary.

### Installation
```bash
git clone https://github.com/gbv/coli-conc.gbv.de.git
cd coli-conc.gbv.de
npm install
```

### Build
As we are doing some things that are currently not possible with native Eleventy functionality, we are using a build script which wraps around Eleventy's own build process.

```bash
npm run build -- --pathprefix=coli-conc.gbv.de --url=https://gbv.github.io
# The site is now available under _site/
```

This would build the site to be deployed to https://gbv.github.io/coli-conc.gbv.de/. `--pathprefix` is optional and only needed if the site is not deployed to the root folder of a domain. `--url` is always necessary.

### Development
A hot-reloading development server is included, though it **only serves the English version** of the site (note that the German version might still be accessible, but only because of an older build; both `build` and `serve` use the `_site` directory).

```bash
npm run serve
```

The site should be served on http://localhost:8080/. If the port is unavailable, the script will increment the port until an available port is found (please refer to the output).

Alternatively, if hot reloading is not required and you would like to locally preview the whole page (including the German version of the site), building the site is quick, and you can use a simple HTTP server like [http-server](https://www.npmjs.com/package/http-server) to serve the site:

```bash
# Build and run (adjust port if necessary)
PORT=8091; npm run build -- --url=http://localhost:$PORT; npx http-server -p $PORT _site
```

The site should now be served on http://localhost:8081, including the German version.

## Dependencies on Other Services
The website links to several services that have to be run independently from hosting the website. It is likely necessary to configure a proxy so that certain services are correctly served under certain subfolders. The following is a (not yet exhaustive) list of those services:

- **Cocoda Instances**
   - Served under `/cocoda/<idOrTag>/`
- **Registries**
   - Served under `/registry/<name>`
   - Serves the registries that are defined in `/registry/registries.ndjson`
   - Service is available in repository *TODO*
- **GND Service**
   - Served under `/services/gnd.php`
   - Offers JSKOS access to GND
- ? **BARTOC Dumps**
   - Served under `/publications/bartoc/`
   - https://github.com/gbv/bartoc-dumps
- **JSKOS Server (Production)**
   - Served under `/api/`
- **JSKOS Server (Development)**
   - Served under `/dev-api/`
- **RVK API**
   - Served under `/rvk/api/`
   - Instance of jskos-server only offering RVK
- **RVK Dumps**
   - Served under `/rvk/data/`
- ? **BK Dumps**
   - Served under `/publications/data/bk.ttl`/`/publications/data/bk.ndjson`
- **CCMapper API**
   - Served under `/ccmapper/api/`
   - Instance of jskos-server only offering RVK-DDC mapping suggestions
- **Subjects and Occurrences API**
   - Served under `/subjects/`
   - https://github.com/gbv/subjects-api
- **Wikidata JSKOS API**
   - Served under `/services/wikidata/`
   - https://github.com/gbv/wikidata-jskos/

## Notes

### Markdown
We use Markdown for most of the content (there's some inline HTML as well). You can find an overview of Markdown's basic syntax [here](https://www.markdownguide.org/basic-syntax/). Files ending in `.md` always contain Markdown content, but layout files (usually ending in `.njk`) might also contain Markdown using Nunjucks shortcodes (see below).

### Front Matter
Each page (except for [_includes files](#shared-markdown-content)) needs to provide some front matter at the beginning of the file. Front matter looks like this:

```
---
layout: layouts/page
title: Title of the page
---

... (actual content of the page)
```

Here are some values you should or can provide:

- `layout` - Please specify for **every** page. Currently, only `layouts/page` (normal page) and `layouts/blog` (blog post) should be used.
- `title` - It is recommended to specify a title. It will be displayed on the very top of the page, under the coli-conc logo. If no title is specified, a fallback title will be generated (e.g. the page's slug file slug = inputPath filename minus template file extension).
- `subtitle` - Optional. It will be shown centered under the title of the page.
- `excerpt` - Optional, only used for blog posts. A small summary of the posts that will be shown in the list of posts.
- `date` - Optional. For blog posts (pages with the `blog` tag), the date can be specified here or be prefixed to the file name (see examples in `/en/blog/`). This is important for the order in which blog posts are displayed. For more info, especially about the date's format, see [the Content Dates section in the Eleventy documentation](https://www.11ty.dev/docs/dates/).
- `tags` - Optional. Currently only used for blog posts like this:

   ```yml
   tags:
   - blog
   ```
- `redirect` - If the page is only a redirect to another page, specify the redirect URL here. It will be run through the `url` filter so that internal URLs are properly resolved.
- You can also specify any other variable here and use it inside the current page.

### Nunjucks
We are using [Nunjucks](https://mozilla.github.io/nunjucks/) as a blog templating engine. You can find the documentation [here](https://mozilla.github.io/nunjucks/templating.html). You can use Nunjucks everywhere **except in [_includes files](#shared-markdown-content)**. In the following, I will describe some parts of Nunjucks and some custom shortcodes we have added to make things easier.

#### URLs
Run all internal URLs through the `url` filter so that they will point to the correct path:

```md
[some link]({{ "/path/" | url }})
```

For static assets that stay the same for both the German and the English site (e.g. images and PDFs), use the custom `urla` filter instead:

```md
![]({{ "/images/myimage.png" | urla }})
```

#### Sections
All content should use sections. There is a custom paired shortcode `section` which can be used for this:

```md
{% section %}
## Optional Heading (always use h2 because it has special styling at the beginning of sections)

Content of this section (can also contain Markdown as usual).

{% endsection %}
```

You can add one string parameter with CSS classes if necessary, e.g. `{% section "text-center" %}` for centered text.

Exception: Blog/news posts (with `layout: layouts/blog`), do **NOT use sections here**.

Some notes about sections:
- Sections are styled automatically. Every odd section (starting from the third child) will have a dark background with light text.
- Use h6 (`##`) for section headers because they are styled in a specific way (as in the example above).
- Try to choose the number of sections so that it ends with a dark section. If necessary, add an empty section at the end (`{% section %}{% endsection %}`).

#### `<div>` with Markdown Content
For some special layout, you can use the custom paired shortcode `div` to wrap content inside a div:

```md
{% div "css-classes", "margin-left: 10px;" %}

We can have **Markdown content** here.

{% enddiv %}
```

The first parameter is the string for CSS classes (i.e. the `class` attribute in HTML), the second parameter are styles (i.e. the `style` attribute in HTML).

#### Markdown content inside a HTML tag
If you need to use Markdown inside some other HTML tag, or you need more control, use the `markdown` paired shortcode:

```md
{% markdown %}
## Heading

Here is a [link]().
{% endmarkdown %}
```

#### Dates
If you need to display dates (e.g. a blog post's date), run it through the `date` filter:

```
{{ page.date | date("YYYY-MM-DD") }}
```

#### Eleventy Supplied Data
[Eleventy](https://www.11ty.dev), the engine that drives this website, supplies certain data for each page. Please refer the the [Eleventy documentation](https://www.11ty.dev/docs/data-eleventy-supplied/) for more information.

### Content Overview
For most content, you can just navigate to the page on https://gbv.github.io/coli-conc.gbv.de/, scroll to the bottom, and click on "Source" (after "Impressum" and "Datenschutz"). It will forward you to the file for the current page on GitHub where you can edit the content. However, the are some things to note here:

- Some pages import content from the `_includes` folder (see [below](#shared-markdown-content)). In that case, you need to find the respective file for that. Here is a list of files where this is currently the case:

   - The intro text below the Cocoda screenshot on the start page ([English](https://github.com/gbv/coli-conc.gbv.de/blob/main/en/_includes/index-intro.md) / [German](https://github.com/gbv/coli-conc.gbv.de/blob/main/de/_includes/index-intro.md))
   - The footer text ([English](https://github.com/gbv/coli-conc.gbv.de/blob/main/en/_includes/footer.md) / [German](https://github.com/gbv/coli-conc.gbv.de/blob/main/de/_includes/footer.md))
   - The partners page ([English/German](https://github.com/gbv/coli-conc.gbv.de/blob/main/en/_includes/partners.md) - Warning: Heavy custom code here. The list of partner institutions and projects is actually defined in a [data file](https://github.com/gbv/coli-conc.gbv.de/blob/main/_data/partners.json))
   - The contact page ([English/German](https://github.com/gbv/coli-conc.gbv.de/blob/main/en/_includes/contact.md) - Warning: Also heavy custom code here, but the content is defined inline.)

- If a page is not translated, the Source link will refer to the English version of that page. See [Localization](#localization) for more info.
- Some pages have heavy custom code, especially the index page ([`/en/index.md`](https://github.com/gbv/coli-conc.gbv.de/blob/main/en/index.md)) and the KOS registry ([`/en/terminologies.md`](https://github.com/gbv/coli-conc.gbv.de/blob/main/en/terminologies.md)). Please be careful when editing those pages.

Here's an explanation of some of the folders/files in this project:
- `_data` - contains data which will be available to use via Nunjucks in all pages
   - `eleventyComputed.js` - data variables that are computed from other data
   - `partners.json` - list of partners for the Partners page/section
   - `software.yml` - list of software for the Software section in Publications
   - `strings.js` - defined localized strings (refer to this file whenever you see something like `strings.something | localize`)
- `_includes`
   - `css` - do not touch, will be autogenerated from Sass files
   - `de` and `en` - do not touch, these are just symlinks to `de/_includes` and `en/_includes` which are needed for technical reasons
   - `layouts` - here, all the page layout (i.e. HTML templates) are defined
- `_scss` - Sass files where all styles are defined
- `_site` - output folder for live server/build
- `en` - **main content folder** = define all content here first.
   - `_includes` - special folder only for files that get included in other files (see [here](#shared-markdown-content))
   - The rest of this folder follows the site's folder structure (i.e. the path `/terminologies/` is either in `en/terminologies.md` or `en/terminologies/index.md`)
- `de` - content folder for German translations; use the **exact** same paths and filenames as in `en`
   - If there is content that is only available in German, you can put it here, but it will **not** be available on the English page. However, all pages available on the English page will be copied to the German page if they are not translated. (Note that this happens only during build, not with the live server. Meaning that you can't use `npm run serve` to preview the German site.)
- `fonts` - static fonts that are passthrough-copied to the output (`/fonts/` on the site)
- `images` - static images that are passthrough-copied to the output (`/images/` on the site)
- `js` - static JavaScript files that are passthrough-copied to the output (`/js/` on the site)
- `scripts` - some helper scripts
   - `build.js` - the build script that is run by `npm run build`
   - `resize-images.js` - a script to resize images to multiple sizes (to be documented further)
- `.eleventy.js` - Eleventy's configuration and setup script; contains plugin setup, defines shortcodes, etc.

### Localization
English is the default language and all content should be created in English first (folder `en`). Then there are two ways to localize the content to German:

1. Create the exact same file in folder `de` (same path, same filename) with German content.
2. Use `_data/strings.js` to define strings with keys `en` and `de`, then use the `localize` filter in your file like this: `{{ strings.mykey | localize }}`

   - You can also define these in the current page's front matter (for `title` and `subtitle`) or even inline: `{{ { en: "English string", de: "German string" } | localize }}`

### Shared Markdown Content
If there is certain Markdown content that is shared between two or more files, you can use the `_includes` folder inside the language folders (**not** the global `_includes` folder).

Assuming you have a file `en/_includes/test.md`, you can include that file in your pages as follows:

```
{% include locale + "/test.md" %}
```

This file can also be localized by adding the same file inside `de/_includes`.

**Some notes:**
- Shared Markdown files can use Nunjucks templating like normal pages. They can also access the parent's front matter as well as global data.
- Shared Markdown files **can't** have front matter. Front matter is included like it's Markdown content.

### How to Use Vue.js
If there is a page with dynamic content, you can use Vue.js in the following way:

1. Add the following to your front matter:

   ```yml
   js:
      vue: true
   ```

   This will include Vue.js on that page.

2. Add a `<script>` tag where you initialize the Vue instance:

   ```html
   <script>
   const app = new Vue({
      delimiters: ["${", "}"],
      el:'#main',
      data: {
         // ...
      },
      // ...
   })
   </script>
   ```

   Note that we use different delimiters because Vue's delimiters overlap with those of the Nunjucks templating engine.

3. Now you can refer to your data/computed inside the current page with `${variableName}`. You can also use Vue's attribute names (like `v-if` etc.) on your HTML tags.

### Redirects
If you want to have a redirecting page, create a file with only front matter:

```yml
---
layout: layouts/base
redirect: https://example.com
---
```

`layout` is necessary because the base layout is handling the redirect. The redirect happens both with a meta tag and JavaScript as a fallback.

## TO-DOs
- Optimize `screenshot-kos-registry.png` for different sizes.
- ...
