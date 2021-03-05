---
layout: layouts/page
title: Typography
---

{% for title in ["Light Section", "Dark Section"] %}
{% section %}

## {{ title }}

### Headings

# H1 Heading {% badge "36px" %}

## H2 Heading {% badge "32px" %}

### H3 Heading {% badge "28px" %}

#### H4 Heading {% badge "24px" %}

##### H5 Heading {% badge "20px" %}

###### H6 Heading {% badge "20px" %}

{% raw %}
```markdown
# H1 Heading {% badge "36px" %}
## H2 Heading {% badge "32px" %}
### H3 Heading {% badge "28px" %}
#### H4 Heading {% badge "24px" %}
##### H5 Heading {% badge "20px" %}
###### H6 Heading {% badge "20px" %}
```
{% endraw %}

Note: `h2` has a special styling when it is at the beginning of a section (font size 28px, white text, orange background, see section heading).

### Paragraphs

Lorem ipsum dolor sit amet, consectetur [adipiscing elit. Praesent risus leo, dictum in vehicula sit amet](#), feugiat tempus tellus. Duis quis sodales risus. Etiam euismod ornare consequat.

Climb leg rub face on everything give attitude nap all day for under the bed. Chase mice attack feet but rub face on everything hopped up on goofballs.

### Font Sizes

{% div "font-size-smaller" %}
font-size-smaller {% badge "12px" %}
{% enddiv %}
{% div "font-size-small" %}
font-size-small {% badge "14px" %}
{% enddiv %}
{% div "font-size-normal" %}
font-size-normal {% badge "16px" %}
{% enddiv %}
{% div "font-size-medium" %}
font-size-medium {% badge "20px" %} = h6/h5
{% enddiv %}
{% div "font-size-large" %}
font-size-large {% badge "24px" %} = h4
{% enddiv %}
{% div "font-size-larger" %}
font-size-larger {% badge "28px" %} = h3
{% enddiv %}
{% div "font-size-largest" %}
font-size-largest {% badge "32px" %} = h2
{% enddiv %}
{% div "font-size-largestest" %}
font-size-largestest {% badge "36px" %} = h1
{% enddiv %}

{% raw %}
```markdown
{% div "font-size-largestest" %}
font-size-largestest {% badge "36px" %} = h1
{% enddiv %}
```
{% endraw %}

### Font Weights

{% div "font-size-normal font-weight-light" %}
font-size-normal font-weight-light {% badge "16px" %} {% badge "Weight: 400" %}
{% enddiv %}
{% div "font-size-normal font-weight-regular" %}
font-size-normal font-weight-regular {% badge "16px" %} {% badge "Weight: 600" %}
{% enddiv %}
{% div "font-size-normal font-weight-bold" %}
font-size-normal font-weight-bold {% badge "16px" %} {% badge "Weight: 700" %}
{% enddiv %}

{% div "font-size-large font-weight-light" %}
font-size-large font-weight-light {% badge "32px" %} {% badge "Weight: 400" %}
{% enddiv %}
{% div "font-size-large font-weight-regular" %}
font-size-large font-weight-regular {% badge "32px" %} {% badge "Weight: 600" %}
{% enddiv %}
{% div "font-size-large font-weight-bold" %}
font-size-large font-weight-bold {% badge "32px" %} {% badge "Weight: 700" %}
{% enddiv %}


### Markdown Semantic Text Elements

**Bold** `**Bold**`

_Italic_ `_Italic_`

~~Deleted~~ `~~Deleted~~`

`Inline Code` `` `Inline Code` ``

### HTML Semantic Text Elements

<abbr>I18N</abbr> `<abbr>`

<cite>Citation</cite> `<cite>`

<kbd>Ctrl + S</kbd> `<kbd>`

Text<sup>Superscripted</sup> `<sup>`

Text<sub>Subscripted</sub> `<sub>`

<u>Underlined</u> `<u>`

<mark>Highlighted</mark> `<mark>`

<time>20:14</time> `<time>`

<var>x = y + 2</var> `<var>`

### Blockquote

> The advance of technology is based on making it fit in so that you don't really even notice it,
> so it's part of everyday life.
>
> <cite>- Bill Gates</cite>

```markdown
> The advance of technology is based on making it fit in so that you don't really even notice it,
> so it's part of everyday life.
>
> <cite>- Bill Gates</cite>
```

### Unordered List

* list item 1
* list item 2
    * list item 2.1
    * list item 2.2
    * list item 2.3
* list item 3

```markdown
* list item 1
* list item 2
    * list item 2.1
    * list item 2.2
    * list item 2.3
* list item 3
```

### Ordered List

1. list item 1
1. list item 2
    1. list item 2.1
    1. list item 2.2
    1. list item 2.3
1. list item 3

```markdown
1. list item 1
1. list item 2
    1. list item 2.1
    1. list item 2.2
    1. list item 2.3
1. list item 3
```

### Table

| Name                        | Genre                         | Release date         |
| :-------------------------- | :---------------------------: | -------------------: |
| The Shawshank Redemption    | Crime, Drama                  | 14 October 1994      |
| The Godfather               | Crime, Drama                  | 24 March 1972        |
| Schindler's List            | Biography, Drama, History     | 4 February 1994      |
| Se7en                       | Crime, Drama, Mystery         | 22 September 1995    |

```markdown
| Name                        | Genre                         | Release date         |
| :-------------------------- | :---------------------------: | -------------------: |
| The Shawshank Redemption    | Crime, Drama                  | 14 October 1994      |
| The Godfather               | Crime, Drama                  | 24 March 1972        |
| Schindler's List            | Biography, Drama, History     | 4 February 1994      |
| Se7en                       | Crime, Drama, Mystery         | 22 September 1995    |
```

{% endsection %}
{% endfor %}
