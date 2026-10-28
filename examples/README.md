# Selected WordPress implementation examples

These excerpts are drawn from the private theme's approach and shortened for portfolio review. They show the structure of the implementation without publishing the complete deployable site.

| Example | What it demonstrates |
| --- | --- |
| [Responsive hero](responsive-hero.php) | Server-rendered picture markup with responsive AVIF/WebP assets and early LCP priority. |
| [Indexing control](indexing-control.php) | Preview exclusion and result-page safeguards through the WordPress robots filter. |
| [Static asset strategy](asset-loading.php) | Bundle freshness check, one public stylesheet, and deferred site JavaScript. |

The original build also includes ordinary WordPress pages, an assessment plugin with nonce and input validation, an independently downloadable PDF, and site-scoped Apache delivery rules. Those complete components are maintained in the private project repository.
