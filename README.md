# New coli-conc Homepage
Currently under development.

### URLs
Run all absolute URLs through Eleventy's `url` filter so that they will point to the correct path:

```
[some link]({{ "/path/" | url }})
```

### Sections
All content should use sections. There is a custom paired shortcode `section` which can be used for this:

```
{% section "dark" %}

Content of this section.

{% endsection %}
```

The parameter can be `"dark"`, `"light"`, or empty.

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
