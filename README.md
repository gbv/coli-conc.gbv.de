# New coli-conc Website
Currently under development.

## Install and Build
The website uses [Eleventy](https://www.11ty.dev) as a static site generator. Eleventy is built in JavaScript and we are extending some of its functionality with additional packages, therefore node/npm is necessary.

### Installation
```bash
git clone https://github.com/gbv/coli-conc-next.git
cd coli-conc-next
npm install
```

### Build
As we are doing some things that are currently not possible with native Eleventy functionality, we are using a build script which wraps around Eleventy's own build process.

```bash
npm run build -- --pathprefix=coli-conc-next --url=https://gbv.github.io
# The site is now available under _site/
```

This would build the site to be deployed to https://gbv.github.io/coli-conc-next/. `--pathprefix` is optional and only needed if the site is not deployed to the root folder of a domain. `--url` is always necessary.

### Development
A hot-reloading development server is included, though it **only serves the English version** of the site (note that the German version might still be accessible, but only because of an older build; both `build` and `serve` use the `_site` directory).

```bash
npm run serve
```

The site should be served on http://localhost:8080/. If the port is unavailable, the script will increment the port until an available port is found (please refer to the output).

Alternatively, if hot reloading is not required and you would like to locally preview the whole page (including the German version of the site), building the site is quick, and you can use a simple HTTP server like [http-server](https://www.npmjs.com/package/http-server) to serve the site:

```bash
# Install http-server globally
npm i -g http-server
# Build and run (adjust port if necessary)
PORT=8091; npm run build -- --url=http://localhost:$PORT; http-server -p $PORT _site
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
- **Occurrences API**
   - Served under `/occurrences/api/`
   - https://github.com/gbv/occurrences-api (to be replaced with https://github.com/gbv/occurrences-server)
- **Wikidata JSKOS API**
   - Served under `/services/wikidata/`
   - https://github.com/gbv/wikidata-jskos/

## Notes

### URLs
Run all URLs through Eleventy's `url` filter so that they will point to the correct path:

```
[some link]({{ "/path/" | url }})
```

For static assets that stay the same for both the German and the English site, use the custom `urla` filter instead:

```md
![]({{ "/images/myimage.png" | urla }})
```

### Sections
All content should use sections. There is a custom paired shortcode `section` which can be used for this:

```
{% section %}

Content of this section.

{% endsection %}
```

You can add one string parameter with CSS classes if necessary, e.g. `{% section "text-center" %}`.

Exception: Blog/news posts (using the template under `en/blog/YYYY-MM-DD-template.md`), do NOT use sections here.

### Localization
English is the default language and all content should be created in English first (folder `en`). Then there are two ways to localize the content to German:

1. Create the exact same file in folder `de` (same path, same filename) with German content.
2. Use `_data/strings.js` to define strings with keys `en` and `de`, then use the `localize` filter in your file like this: `{{ strings.mykey | localize }}`

   - You can also define these in the current page's front matter or even inline: `{{ { en: "English string", de: "German string" } | localize }}`

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

## Style Guide
### Sections
- Sections are styled automatically. Every odd section (starting from the third child) will have a dark background with light text.
- Use h6 (`######`) for section headers because they are styled in a specific way.
- Try to choose the number of sections so that it ends with a dark section. If necessary, add an empty section (`{% section %}{% endsection %}`).

## TO-DOs
- Optimize `screenshot-kos-registry.png` for different sizes.
- Add more icons for services on start page.
