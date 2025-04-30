<?php
/**
 * Template Name:  Properties
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Peter_Thompson
 */
get_header(); ?>

<?php if (have_rows('page_content')): while (have_rows('page_content')): the_row();
    $title = get_sub_field('title');
    $content = get_sub_field('content'); ?>
    <section class="page-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-10 col-12 text-center">
                    <h1><?php echo $title; ?></h1>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>

    <section class="explore propeties-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <form class="prop-search">
                        <!--<input type="hidden" name="search">-->
                        <select name="status" class="form-control">
                            <option value=""><?= ICL_LANGUAGE_CODE === 'en' ? 'Select' : 'Selectionner' ?></option>
                            <option value="open" <?= $_GET['status'] === 'open' ? 'selected' : '' ?>>
                                <?= ICL_LANGUAGE_CODE === 'en' ? 'Open House' : 'Visite libre'; ?>
                            </option>
                            <option value="sale" <?= $_GET['status'] === 'sale' ? 'selected' : '' ?>>
                                <?= ICL_LANGUAGE_CODE === 'en' ? 'For Sale' : 'À vendre'; ?>
                            </option>
                            <option value="rent" <?= $_GET['status'] === 'rent' ? 'selected' : '' ?>>
                                <?= ICL_LANGUAGE_CODE === 'en' ? 'For Rent' : 'À louer'; ?>
                            </option>
                            <option value="sold" <?= $_GET['status'] === 'sold' ? 'selected' : '' ?>>
                                <?= ICL_LANGUAGE_CODE === 'en' ? 'Sold' : 'Vendu'; ?>
                            </option>
                        </select>
                        <input type="text" name="q"
                               placeholder="<?= ICL_LANGUAGE_CODE === 'en' ? 'Search' : 'Rechercher' ?>"
                               class="form-control"
                               value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>"/>
                        <button type="submit" class="prop-search-btn">
                            <img src="/wp-content/uploads/2024/06/search-icon.png" alt="search icon">
                        </button>

                        <a href="<?= ICL_LANGUAGE_CODE === 'en' ? '/home-tours/' : '/fr/home-tours/'; ?>"
                           class="prop-search-btn reset--btn bg-danger" style="line-height: 40px;">
                            <img src="/wp-content/uploads/2024/07/rotate-left-circular-arrow-interface-symbol.png"
                                 style="filter: invert(1)" alt="reset icon">
                        </a>

                    </form>
                </div>
            </div>

            <?php if ($_GET['status'] === 'open') {
                echo do_shortcode('[properties template="grid" open_house="1"  pagination="1" q="' . $_GET['q'] . '"]');
            } else if ($_GET['status'] === 'sold') {
                echo do_shortcode('[properties template="grid" status="VE"  pagination="1" q="' . $_GET['q'] . '"]');
            } else if ($_GET['status'] === 'rent') {
                echo do_shortcode('[properties template="grid" min_price_rent="100" status="EV"  pagination="1" q="' . $_GET['q'] . '"]');
            } else if ($_GET['status'] === 'sale') {
                echo do_shortcode('[properties template="grid" min_price="10000" status="EV"  pagination="1" q="' . $_GET['q'] . '"]');
            } else {
                echo do_shortcode('[properties template="grid" pagination="1" q="' . $_GET['q'] . '"]');
            }
            ?>

        </div>
    </section>
<?php
get_footer();