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

## Style Guide
### Sections
- Always start with a white section (`{% section %}...{% endsection %}`)
- Then follow with dark and light sections (`{% section "dark" %}...{% endsection %}{% section "light" %}...{% endsection %}{% section "dark" %}...{% endsection %}...`)
- Use h4 (`####`) for section headers because they are styled in a specific way

## Ideas

### Multilingual Support - Add pages in German
- As far as I can see, multilingual support in Eleventy is lacking functionality, but there should be a fairly easy way to implement it, at least for content.
- Default is English (folder `en`, built into `_site/`), German will be in folder `de` and built into `_site/de/`.
- The two sites have to be built separately! I would suggest writing a bash script that does the following:
  - 1. Build English site into `_site/`.
  - 2. Build German site into `_side/de/`
  - 3. Iterate over files in English site and copy missing files into German site (= fallback to English)
- Not sure yet how the fallback pages will work with linking to other pages etc.
- Here are some links that might be helpful:
  - [Multilingual sites with Eleventy - Webstoemp](https://www.webstoemp.com/blog/multilingual-sites-eleventy/)
  - [Language switcher for multilingual JAMstack sites - Webstoemp](https://www.webstoemp.com/blog/language-switcher-multilingual-jamstack-sites/)
  - [eleventy-plugin-i18n  -  npm](https://www.npmjs.com/package/eleventy-plugin-i18n)
