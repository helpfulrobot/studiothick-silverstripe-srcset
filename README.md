# SilverStripe Image SrcSet extension

This module adds srcset functionality to Image objects, allowing one to save on bandwidth
when serving high-resolution images to browsers on low-resolution devices.

Calling `SrcSet` on an image in a template will automatically generate multiple sizes of that image (just using `Resize`) and return an `img` tag with the `srcset` attribute populated with
those smaller alternatives.

## Installation

Install via `composer require studiothick/silverstripe-srcset`.

## Usage

While the functions provided by ImageSrcSetExtension can be called within php, they're meant
for use in templates.

### `SrcSet`

`SrcSet` returns a full `img` tag with populated `src` and `srcset` attributes.

```html
$HeaderImage.SrcSet
<h1>$Title</h1>
```

### `SrcSetAttribute`

`SrcSetAttribute` only returns the contents of the `srcset` attribute, to be included in a manually-written `img` tag. This is for when you need to set other attributes.

```html
<img src="$HeaderImage.URL" srcset="$HeaderImage.SrcSetAttribute" alt="$Title" />
<h1>$Title</h1>
```

