# SEO, speed, and accessibility review

This case records implementation choices and the local measurements taken on October 27, 2026. The production domain requires a new audit after hosting, HTTPS, caching, and content approvals are complete.

## Search structure

- One visible H1 names “roof coating.” The title and description state the Florida roof coating topic and assessment action.
- The page includes server-rendered headings, material cards, product details, FAQs, and the form. Core content remains available when JavaScript is disabled.
- WordPress emits canonical and social metadata plus Organization, WebSite, Service, and WebPage structured data. Structured data avoids unverified review scores or lifespan claims.
- Sitemap output excludes the result page and the user provider. The local preview intentionally carries `noindex`. Production search visibility requires a deliberate launch change.

## Delivery work

| Area | Implementation |
| --- | --- |
| HTML | Anonymous pages use a five-minute WP Super Cache lifetime. Form submissions, logged-in visitors, query strings, and result pages bypass page caching. |
| Styles | Eight theme stylesheet requests were combined into one generated minified bundle. The transferred stylesheet was 13,915 bytes with gzip in the local check. |
| Scripts and fonts | The site script is deferred. Self-hosted WOFF2 fonts use `font-display: swap` and versioned preloads. |
| Hero image | Responsive AVIF and WebP variants, explicit dimensions, eager loading, and high fetch priority. The hero stays available to the browser early. |
| Supporting images | Roof material cards use cropped responsive variants with lazy loading. The product bucket has a transparent AVIF option with WebP fallback. |
| Server headers | The site-scoped Apache rules serve precompressed CSS and JavaScript and cache versioned static assets. Other hosts need equivalent rules. |

The old roof material sprite was 468,610 bytes and loaded eagerly. It was replaced with separate material images that the browser can request near the viewport. The original source art was retained for editing.

## Local measurements

| Local Lighthouse run | Performance | Accessibility | Best practices | SEO | LCP | CLS | Total blocking time |
| --- | ---: | ---: | ---: | ---: | ---: | ---: | ---: |
| Mobile emulation | 99 | 100 | 100 | 66 | 2.10 s | 0 | 28 ms |
| Desktop emulation | 100 | 100 | 100 | 66 | 0.54 s | 0 | 0 ms |

The SEO score reflects the intentional local `noindex`. These scores are local lab observations. They are neither production Core Web Vitals nor an accessibility certification. Four repeated local anonymous cache hits had a median time to first byte of 21.25 ms. Hosting and network conditions will change that result.

## Interaction and layout checks

The site was checked at 320, 390, 768, 1121, and 1440 pixels without horizontal overflow. Mobile menu open and Escape behavior, roof material selection, expandable specifications, and the ordinary form were exercised. A no-JavaScript check confirmed the heading, five material links, and form remained in the HTML. The blank financing PDF is downloadable and fillable, with financial data staying in the visitor's saved file.

## Production review

On the live domain, verify TLS, real canonical URLs, robots and sitemap output, image and font responses, cache exclusions, form storage and delivery, privacy copy, and social previews. Then run PageSpeed Insights and check Search Console once the property is verified. See [selected implementation excerpts](../../examples/README.md).
