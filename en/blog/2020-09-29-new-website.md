---
layout: layouts/blog
title: "New Website"
excerpt: "Our new website is now live!"
tags:
- blog
---

After more than five years, the coli-conc website at <https://coli-conc.gbv.de/> got a fresh layout and internal refactoring. All URLs should still be working! (If not, please let us know.) The sources are managed [in a public GitHub repository](https://github.com/gbv/coli-conc.gbv.de/) like [all of our software]({{ "/publications/#software" | url }}). Selected pages are available in both English and German.

Instead of being served through PHP, the website is now built from Markdown files via a static site generator called [Eleventy](https://www.11ty.dev). This made it possible to better separate logic from content. Dynamic elements can be added client side with our favorite [JavaScript framework Vue](https://vuejs.org/).

This post is also part of our new blog! We converted existing reports to blog posts, so there are already [some posts available]({{ "/blog/" | url }}). We will share updates about the project and our services here from now on. You can subscribe to our blog via [RSS]({{ "/rss/blog.xml" | url }}) and follow us [on Twitter](https://twitter.com/coli_conc).
