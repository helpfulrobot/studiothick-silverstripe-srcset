# SilverStripe Image SrcSet extension

This module is a work in progress. Bug reports or feature requests welcome.

This module adds srcset functionality to Image objects, allowing one to save on bandwidth
when serving high-resolution images to browsers on low-resolution devices.

Calling `SrcSet` on an image in a template will automatically generate multiple sizes of that 
image (just using `Resize`) and return a string of corresponding URLs and widths to be used
in an `img` tag's `srcset` attribute.

## Installation

Install via `composer require studiothick/silverstripe-srcset`.

## Usage

`SrcSet` only returns a string to use in the `srcset` attribute, to be included in a
manually-written `img` tag. 

Example:

```html
<img src="$HeaderImage.URL" srcset="$HeaderImage.SrcSet" alt="$HeaderImage.Title" />
```

