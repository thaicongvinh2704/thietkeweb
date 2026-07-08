# Website Status Report - Local WordPress

Audit date: 2026-07-03
Project path: `C:\xampp\htdocs\thietkeweb`
Scope: local WordPress source, local database read-only queries, source/config inspection. No files were edited or deleted during the audit, except creating this report. No database writes, migrations, or `wp-config.php` changes were performed.

## 1. Tổng quan project local

- Đây là website WordPress local trong thư mục `C:\xampp\htdocs\thietkeweb`.
- Local URL trong database: `http://localhost/thietkeweb`.
- Database local kết nối được bằng read-only `SELECT`.
- WordPress source version theo `wp-includes/version.php`: `7.0`.
- CLI environment: PHP `8.2.12`, MariaDB `10.4.32-MariaDB`.
- Theme active theo database: `dichvuthietkewebgiare`.
- Plugin active theo database: không có plugin active (`active_plugins = a:0:{}`).
- Git hiện có thay đổi sẵn ở `wp-content/themes/dichvuthietkewebgiare/functions.php`.
- `wp-config.php` có tồn tại nhưng không bị Git track theo `git ls-files`; `.cpanel.yml`, `.htaccess`, và theme file đang được track.

## 2. Cấu trúc WordPress

Source có cấu trúc WordPress chuẩn và đủ các thư mục chính:

- `wp-admin`
- `wp-content`
- `wp-includes`

Các file root quan trọng có đủ:

- `index.php`
- `wp-config.php`
- `.htaccess`
- `wp-load.php`
- `wp-settings.php`
- `wp-login.php`
- `wp-config-sample.php`
- các file core WordPress khác như `wp-cron.php`, `xmlrpc.php`, `wp-blog-header.php`.

Trong `wp-content` có:

- `themes`
- `plugins`
- `uploads`
- `languages`
- `upgrade`
- `index.php`

`wp-content/uploads` hiện chỉ thấy thư mục `2026/06`, chưa thấy file upload thực tế qua `rg --files wp-content\uploads`.

## 3. Theme hiện tại

Các theme trong `wp-content/themes`:

| Directory | Theme name | Version | Ghi chú |
|---|---:|---:|---|
| `dichvuthietkewebgiare` | Dich Vu Thiet Ke Web Gia Re | 1.0.0 | Theme active, custom theme |
| `twentytwentyfive` | Twenty Twenty-Five | 1.5 | Theme mặc định |
| `twentytwentyfour` | Twenty Twenty-Four | 1.5 | Theme mặc định |
| `twentytwentythree` | Twenty Twenty-Three | 1.6 | Theme mặc định |
| `twentytwentytwo` | Twenty Twenty-Two | 2.1 | Theme mặc định |

Database xác nhận:

- `template = dichvuthietkewebgiare`
- `stylesheet = dichvuthietkewebgiare`

Theme active là custom theme. `style.css` ghi description: custom WordPress theme cho dịch vụ thiết kế website WordPress tại Việt Nam. Theme không khai báo `Template`, nên không phải child theme.

File theme quan trọng:

- Có: `style.css`, `functions.php`, `header.php`, `footer.php`, `index.php`, `page.php`, `single.php`, `archive.php`, `404.php`, `sidebar.php`, `front-page.php`.
- Có template/trang riêng: `page-about.php`, `page-contact.php`, `page-tin-tuc.php`, `template-demo-business.php`.
- `page-gioi-thieu.php` chỉ require `page-about.php`.
- `page-lien-he.php` chỉ require `page-contact.php`.

Chức năng chính của theme:

- Đăng ký menu `primary`, sidebar blog, custom logo, title tag, thumbnail, HTML5, feed links.
- Enqueue CSS/JS chính: `assets/css/main.css`, `assets/js/main.js`.
- Tạo virtual routes: `/tin-tuc/`, `/gioi-thieu/`, `/lien-he/`, `/mau-giao-dien/mau-website-doanh-nghiep/`, `/dvtkwgr-sitemap.xml`, `/robots.txt`.
- Có SEO tự viết: title profile, meta description, Open Graph, Twitter card, schema JSON-LD, sitemap XML, robots.txt, breadcrumb.
- Có front page dịch vụ, bảng giá, mẫu giao diện, blog preview, CTA liên hệ.
- Có mobile menu, sticky CTA mobile, animation reveal, FAQ behavior trong JS.

Lưu ý theme:

- `functions.php` có hook `init` gọi `flush_rewrite_rules(false)` và `update_option('dvtkwgr_rewrite_version', ...)` nếu rewrite version lệch. DB hiện đã có `dvtkwgr_rewrite_version = 20260629.5`, khớp code hiện tại, nên hiện tại không cần flush lại. Tuy nhiên đây vẫn là điểm cần chú ý vì khi đổi version, lần load WordPress đầu tiên sẽ ghi database.
- `page-contact.php` có form `action="#" method="post"` nhưng không thấy code xử lý submit, nonce, gửi email, hoặc plugin form active. Form này nhiều khả năng chỉ là giao diện, chưa hoạt động thật.
- Theme đang dùng email/domain/phone placeholder như `contact@dichvuthietkewebgiare.com`, `09xx xxx xxx`, `09xxxxxxxx`.

## 4. Plugin hiện tại

Plugin có trong `wp-content/plugins`:

| Plugin | Version | Main file | Trạng thái |
|---|---:|---|---|
| Akismet Anti-spam: Spam Protection | 5.7 | `akismet/akismet.php` | Installed, inactive |
| Hello Dolly | 1.7.2 | `hello.php` | Installed, inactive |

Database:

- `active_plugins = a:0:{}`.

Phân loại plugin:

- SEO: không có plugin SEO active; không thấy Yoast/Rank Math.
- Cache: không có.
- Form: không có.
- Ecommerce: không có WooCommerce hoặc plugin bán hàng.
- Page builder: không có Elementor/page builder active.
- Security: không có plugin security hardening active. Akismet là anti-spam nhưng inactive.
- SMTP: không có.
- Custom plugin: không thấy custom plugin riêng.

Plugin có thể ảnh hưởng mạnh nếu được active:

- Akismet có thể ảnh hưởng comment/form spam checking, gọi API bên ngoài, thêm JS/frontend logic và redirect trong admin khi cấu hình. Hiện inactive nên không ảnh hưởng runtime.
- Hello Dolly không ảnh hưởng giao diện frontend đáng kể và hiện inactive.

## 5. Cấu hình wp-config.php và database local

Thông tin đọc từ `wp-config.php` theo dạng an toàn:

- `DB_NAME = thietkeweb`
- `DB_USER = root`
- `DB_HOST = localhost`
- `DB_PASSWORD = [hidden]`
- `DB_CHARSET = utf8mb4`
- `DB_COLLATE = ''`
- `table_prefix = wp_`
- `WP_DEBUG = false`
- `WP_HOME`: không define trong `wp-config.php`
- `WP_SITEURL`: không define trong `wp-config.php`
- Auth keys/salts: `[hidden]`

Database local truy cập được bằng `C:\xampp\mysql\bin\mysql.exe` qua host `127.0.0.1`, database `thietkeweb`, user `root`, chỉ chạy truy vấn `SELECT`.

Option quan trọng:

| Option | Value |
|---|---|
| `siteurl` | `http://localhost/thietkeweb` |
| `home` | `http://localhost/thietkeweb` |
| `template` | `dichvuthietkewebgiare` |
| `stylesheet` | `dichvuthietkewebgiare` |
| `active_plugins` | `a:0:{}` |
| `permalink_structure` | `/%year%/%monthnum%/%day%/%postname%/` |
| `show_on_front` | `page` |
| `page_on_front` | `6` |
| `page_for_posts` | `9` |
| `WPLANG` | `vi` |

Post count theo database:

| post_type | post_status | count |
|---|---|---:|
| `page` | publish | 5 |
| `page` | draft | 1 |
| `post` | publish | 1 |
| `post` | auto-draft | 1 |
| `nav_menu_item` | publish | 4 |
| `wp_navigation` | publish | 1 |

Lưu ý:

- `blogname` và `blogdescription` đang rỗng trong `wp_options`.
- Front page là page ID `6`; posts page là page ID `9`.

## 6. Local URL / siteurl / home

- `siteurl` và `home` đều là `http://localhost/thietkeweb`, phù hợp môi trường local.
- `WP_HOME` và `WP_SITEURL` không bị hardcode trong `wp-config.php`, nên WordPress lấy URL từ database.
- Các GUID/content trong `wp_posts` đang dùng local URL `http://localhost/thietkeweb`.
- Không thấy option redirect trong database ngoài `home` và `siteurl`.
- Không thấy domain `dichvuthietkewebgiare.com` trong `wp_options`, `wp_posts`, hoặc `wp_postmeta`.
- Chưa thấy dấu hiệu database redirect sai từ local sang domain live.

Tôi không mở trang qua HTTP/curl để render runtime vì theme có code có thể ghi database khi rewrite version lệch. Yêu cầu audit là không thay đổi database, nên phần runtime browser chưa được kiểm chứng.

## 7. .htaccess và permalink

`.htaccess` hiện là rule WordPress chuẩn:

- Có `RewriteEngine On`.
- Có rule preserve `HTTP_AUTHORIZATION`.
- Có rule bỏ qua `index.php`.
- Có điều kiện `REQUEST_FILENAME !-f` và `!-d`.
- Rewrite về `index.php`.

Không thấy:

- Rule ép HTTPS.
- Rule ép domain live.
- Rule redirect lạ.
- Rule hardcode `HTTP_HOST`.

Permalink trong DB: `/%year%/%monthnum%/%day%/%postname%/`.

## 8. URL hardcode hoặc URL cũ phát hiện

Trong custom theme `dichvuthietkewebgiare`:

- `style.css` có `Theme URI` và `Author URI`: `https://dichvuthietkewebgiare.com`.
- `functions.php` có schema context `https://schema.org`.
- `functions.php` có email schema `contact@dichvuthietkewebgiare.com`.
- `footer.php` và `page-contact.php` có email `contact@dichvuthietkewebgiare.com`.
- `footer.php` có Zalo placeholder `https://zalo.me/09xxxxxxxx`.
- `style.css` có GPL license URL.

Các URL này không phải redirect local sang live. Navigation/runtime URL chính trong theme chủ yếu dùng `home_url()` và `get_template_directory_uri()`.

Trong plugin:

- Akismet có nhiều URL `https://akismet.com`, `https://rest.akismet.com`, WordPress.org, font/CDN URL. Plugin đang inactive.
- Hello Dolly có plugin/author URL metadata.

Trong database:

- `wp_options`: 7 option có URL, gồm `siteurl`, `home`, `ping_sites`, browser/update transient.
- `wp_posts`: 13 dòng có local URL trong GUID/content.
- `wp_postmeta`: 0 dòng có URL theo pattern kiểm tra.
- `dichvuthietkewebgiare.com`: 0 trong options/posts/postmeta.

Không phát hiện URL cũ/live domain trong database theo các query đã chạy.

## 9. Vấn đề kỹ thuật phát hiện

Kết quả PHP lint:

- Đã kiểm tra toàn bộ `1587` file PHP trong project.
- Không phát hiện lỗi syntax PHP bằng `php -l`.
- Đã kiểm tra riêng active theme/plugins và root PHP files; cũng không có lỗi lint.

Duplicate function:

- Không thấy duplicate global function rõ ràng trong custom theme.
- Một số tên method/function như `init`, `execute`, `get_config`, `get_stats` lặp trong Akismet class/method context; đây là pattern plugin bình thường, không phải lỗi fatal duplicate function.

Rủi ro/điểm cần chú ý:

- Theme có `flush_rewrite_rules(false)` + `update_option()` trên `init` khi rewrite version đổi. Nên cân nhắc chuyển logic flush sang activation/admin action rõ ràng hơn nếu tiếp tục phát triển.
- Contact form hiện không có backend xử lý submit, không có SMTP/plugin form active.
- `blogname` và `blogdescription` đang rỗng; theme có fallback site name nhưng cấu hình WordPress/SEO nền tảng chưa đầy đủ.
- `functions.php` đang có diff chưa commit: tăng rewrite version, thêm site name fallback, SEO profiles, canonical/social meta, sitemap/robots.
- `.cpanel.yml` có deploy path `/home/mgrgffc/public_html/`; đây là dấu hiệu có cấu hình deploy live/cPanel, nhưng không ảnh hưởng local nếu không chạy deploy.
- `.cpanel.yml` không copy `wp-config.php`, chỉ copy `wp-config-sample.php`; điểm này tốt hơn cho bảo mật khi deploy, nhưng vẫn cần rà soát quy trình live riêng.
- Không runtime-test bằng browser/curl để tránh khả năng ghi DB ngoài ý muốn.

## 10. SEO hiện tại trong source

SEO trong theme:

- `add_theme_support('title-tag')`: có.
- Custom document title: có qua filter `pre_get_document_title`.
- Meta description: có qua `wp_head`, bỏ qua nếu Yoast hoặc Rank Math tồn tại.
- Canonical: custom canonical chỉ in khi đang ở virtual page. Cần kiểm tra thêm canonical cho homepage/singular/archive khi runtime.
- Open Graph: có `og:type`, `og:title`, `og:description`, `og:url`, `og:site_name`, `og:image`.
- Twitter card: có.
- Schema JSON-LD: có cho front page, type `ProfessionalService`.
- Breadcrumb: có function `dvtkwgr_breadcrumb()` và được gọi ở page/archive/single/index/contact/about/tin-tuc.
- Sitemap custom: có `/dvtkwgr-sitemap.xml`.
- Robots custom: có route `/robots.txt` và filter `robots_txt`.
- SEO plugin: không có plugin active.

Điểm cần chú ý SEO:

- `blogname` rỗng trong DB, nên nên đặt tên site thật trong Settings.
- Không có SEO plugin active; SEO đang phụ thuộc vào code custom trong theme.
- Canonical custom chưa bao phủ mọi loại trang.
- Nếu sau này bật Yoast/Rank Math, theme đã có guard cho meta description và social meta, nhưng vẫn cần test tránh trùng tag.

## 11. Responsive / giao diện

CSS/JS chính:

- `wp-content/themes/dichvuthietkewebgiare/assets/css/main.css`
- `wp-content/themes/dichvuthietkewebgiare/assets/js/main.js`

Theme có dấu hiệu responsive rõ:

- Có viewport meta trong `header.php`.
- CSS dùng custom CSS, grid/flex layout, container width responsive.
- Có media queries tại các breakpoint như `max-width: 1100px`, `860px`, `700px`, `782px`, `560px`.
- Có `@media (prefers-reduced-motion: reduce)`.
- Không thấy Bootstrap, Tailwind, Elementor.
- Có style cho mobile menu, mobile sticky CTA, card grids, pricing/demo grids, contact layout, footer layout.
- JS xử lý mobile menu, header scrolled state, reveal animation bằng `IntersectionObserver`, FAQ accordion.

Các file assets đáng kiểm tra tiếp nếu QA giao diện:

- `assets/css/main.css`
- `assets/js/main.js`
- `front-page.php`
- `page-contact.php`
- `page-about.php`
- `page-tin-tuc.php`
- `template-demo-business.php`
- ảnh trong `assets/images/` và `assets/images/templates/business/`.

## 12. Rủi ro cần chú ý

1. Contact form chưa có xử lý thật, có thể gây hiểu nhầm là đã gửi được yêu cầu.
2. Theme có logic ghi DB khi rewrite version đổi; cần cẩn trọng khi chỉ muốn audit hoặc khi deploy.
3. Không có plugin SEO/form/cache/security/SMTP active; toàn bộ chức năng SEO/form hiện phụ thuộc theme hoặc chưa có.
4. `blogname`/`blogdescription` rỗng, ảnh hưởng title/site identity nếu fallback không đủ.
5. `functions.php` đang có thay đổi chưa commit, cần xác nhận đây là thay đổi mong muốn.
6. Có `.cpanel.yml` deploy live path; nếu chạy deploy, cần quy trình riêng để không đưa sai trạng thái local lên live.
7. `uploads` không có media file thực tế; nếu nội dung cần ảnh từ media library thì hiện chưa đủ.
8. Không runtime-test frontend để giữ đúng yêu cầu không thay đổi database.

## 13. Việc nên làm tiếp theo

1. Backup database và source trước khi sửa bất cứ thứ gì.
2. Đặt `blogname` và `blogdescription` trong WordPress Settings.
3. Xác nhận `functions.php` diff hiện tại có phải thay đổi mong muốn không, sau đó commit hoặc tiếp tục review.
4. Chuyển logic `flush_rewrite_rules()` sang activation/manual admin task nếu muốn tránh ghi DB trên `init`.
5. Làm contact form thật: dùng plugin form + SMTP hoặc viết handler có nonce, validation, sanitization, email/log rõ ràng.
6. Quyết định dùng SEO custom trong theme hay cài SEO plugin; nếu giữ custom SEO, bổ sung canonical cho mọi loại trang cần SEO.
7. Khi được phép runtime-test, mở local site và kiểm tra homepage, `/gioi-thieu/`, `/lien-he/`, `/tin-tuc/`, sitemap, robots, mobile menu.
8. Nếu chuẩn bị deploy live, cần audit riêng live URL, search/replace database, `.cpanel.yml`, SSL/domain, SMTP và cache.

## 14. Thông tin cần hỏi thêm từ chủ website

- Domain live chính xác là gì?
- Tên website chính thức, tagline, số điện thoại, Zalo, email nhận form là gì?
- Contact form cần gửi email, lưu database, gửi CRM, hay chỉ chuyển Zalo?
- Website có cần bán hàng/WooCommerce không?
- Có muốn dùng SEO plugin như Yoast/Rank Math hay giữ SEO custom trong theme?
- Nội dung hiện tại là demo hay đã là nội dung cuối?
- Có cần deploy qua `.cpanel.yml` không, hay chỉ chạy local?
- Có dữ liệu media/upload thật ở nơi khác chưa?
- Có yêu cầu bảo mật/admin user/plugin nào cho bản live không?

## Tóm tắt 10 dòng copy nhanh

1. Project là WordPress local tại `C:\xampp\htdocs\thietkeweb`, source core đủ `wp-admin`, `wp-content`, `wp-includes`.
2. Database local kết nối được read-only; `siteurl` và `home` đều là `http://localhost/thietkeweb`.
3. Theme active là custom theme `dichvuthietkewebgiare`, version `1.0.0`.
4. Plugin installed chỉ có Akismet và Hello Dolly; không có plugin nào active.
5. `wp-config.php`: DB `thietkeweb`, user `root`, host `localhost`, password `[hidden]`, prefix `wp_`, `WP_DEBUG=false`.
6. `.htaccess` là rule WordPress chuẩn, không thấy ép HTTPS, ép domain live, hoặc redirect lạ.
7. Không thấy domain live trong database; `dichvuthietkewebgiare.com` chỉ nằm trong source theme/email metadata.
8. SEO được viết trong theme: title, meta description, OG/Twitter, schema, breadcrumb, sitemap/robots; chưa có SEO plugin active.
9. Đã lint toàn bộ `1587` file PHP, không có lỗi syntax; rủi ro chính là form liên hệ chưa xử lý và theme có thể flush rewrite khi version đổi.
10. Ưu tiên tiếp theo: đặt site name/tagline, xử lý form thật, review diff `functions.php`, QA frontend khi được phép load site, rồi mới tính deploy/live URL.
