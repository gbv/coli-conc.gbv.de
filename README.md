# New coli-conc Homepage
Currently under development.

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
{% section "dark" %}

Content of this section.

{% endsection %}
```

The parameter can be `"dark"`, `"light"`, or empty.

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
- Always start with a white section (`{% section %}...{% endsection %}`)
- Then follow with dark and light sections (`{% section "dark" %}...{% endsection %}{% section "light" %}...{% endsection %}{% section "dark" %}...{% endsection %}...`)
- Use h4 (`####`) for section headers because they are styled in a specific way
