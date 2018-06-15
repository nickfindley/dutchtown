# Dutchtown Theme

### To Do

* Sitewide
  * Output all styles into style.css
  * JavaScript
    * Combine and minify JS files
    * Get [BalanceText](https://github.com/adobe-webplatform/balance-text) working or find another solution
  * Sass
    * Abstract color variables
    * Clean up main.scss
    * Import [modern-normalize](https://github.com/sindresorhus/modern-normalize)
    * _grid.scss
      * Clean up duplicates
      * Simplify grid variables
* Front page
* News page
* Page page
* Post pages
  * Clean up comment walker
* Archive and search pages
  * Page headers
  * Category featured images
  * Category descriptions
  * Pull results from all post types for categories and tags
  * Clean up JS solution to cropping images on large screens
  * Pagination
  * Refine excerpts
  * Add "read more" links
* 404 page
  * Approximate results from URL
* Sidebars and page footers
* Clean up navbar
  * Scale down and change color on dropdowns
* Calendar
  * Default to list view on small screens

### Template Tags

* dutchtown_posted_on
  ```
  $args = array(
        'before_posted_on'	=> '',
        'after_posted_on'		=> ''
    );
  ```
* dutchtown_updated_on
  ```
  $args = array(
        'before_updated_on'	=> '',
        'after_updated_on'	=> ''
    );
  ```
* dutchtown_event_date
  ```
  $args = array(
        'before_event_date'	=> '',
        'after_event_date'	=> ''
    );
  ```
* dutchtown_byline
  ```
  $args = array(
        'before_byline'	=> '',
        'after_byline'	=> ''
    );
  ```
* dutchtown_comment_count
  * dutchtown_comment_count
  * dutchtown_get_comment_count
    ```
    $args = array(
        'show_zero'			=> false,
        'term_singular'	=> 'comment',
        'term_plural'		=> 'comments',
        'cap'						=> false,
        'there'					=> false,
        'phrase'				=> true,
        'max'						=> 20,
        'before_output'	=> '',
        'after_output'	=> '',
        'before_phrase'	=> '',
        'after_phrase'	=> ''
    );
    ```
* dutchtown_comment_link
  * dutchtown_comment_link
  * dutchtown_get_comment_link
  * dutchtown_get_comment_link_args
  ```
  $args = array(
        'before_list'		=> '',
        'after_list'		=> '',
        'before_form'		=> '',
        'after_form'		=> '',
        'list_or_form'	=> 'both',
        'separator'			=> '',
        'list_output'		=> '',
        'form_output'		=> '',
        'count_args'		=> array(
            'show_zero'			=> false,
            'term_singular'	=> 'comment',
            'term_plural'		=> 'comments',
            'cap'						=> true,
            'there'					=> false,
            'phrase'				=> true,
            'max'						=> 20,
            'before_output'	=> '',
            'after_output'	=> '',
            'before_phrase'	=> '<a href="' . get_the_permalink() . '#comments">',
            'after_phrase'	=> '</a>'
        )
    );
  ```
* dutchtown_oxford_categories
  ```
  $args = array(
        'before_categories'		=> '',
        'after_categories'		=> '',
        'before_link'					=> '',
        'after_link'					=> '',
    );
  ```
* dutchtown_post_thumbnail

### Future Reading

* [A Comprehensive Gouide to Font Loading Strategies](https://www.zachleat.com/web/comprehensive-webfonts/)
* [WP Fastest Cache](https://wordpress.org/plugins/wp-fastest-cache/)
* [7 Rules for Creating Gorgeous UI Part 1](https://medium.com/@erikdkennedy/7-rules-for-creating-gorgeous-ui-part-1-559d4e805cda)
