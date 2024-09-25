<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package chandenhomes
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="single-prop">

      <?php while (have_posts()):
        the_post(); ?>
        <div class="property-description paddings">
          <h2>
            <?= the_title() ?><br>
            <?= get_field('location'); ?>
          </h2>

          <!-- mobile version of slider -->
          <div class="property-img" id="mobile-view">
            <div class="portfolio-item-slider-mb">
              <?php $images = get_field('gallery'); ?>
              <?php if ($images): ?>
              <?php foreach ($images as $image): ?>
              <div class="slick-slider-item">
                <img src="<?= $image['sizes']['single'] ?>" alt="" />
              </div>
              <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <!-- .portfolio-item-slider -->
            
          </div>
          <!-- mobile versio of lsider ends here -->

          <p>Price: $
            <?= get_field('price'); ?>/month
          </p>
          <p>
            <?= get_the_content(); ?>
          </p>

          <p>Features:</p>
          <table>
            <tr>
              <td>Bedroom</td>
              <td>
                <?= get_field('bedrooms'); ?>
              </td>
            </tr>
            <tr>
              <td>Bath</td>
              <td>
                <?= get_field('bathrooms'); ?>
              </td>
            </tr>
            <tr>
              <td>Price</td>
              <td>$
                <?= get_field('price'); ?>
              </td>
            </tr>
            <tr>
              <td>Parking Spaces</td>
              <td>
                <?= get_field('parking_spaces'); ?>
              </td>
            </tr>
          </table>
          <div class="button-contain">
            <a href="https://chanden.twa.rentmanager.com/applynow" target="_blank">Apply Now</a>
          </div>
        </div>

        <div class="property-img"  id="desktop-view">


          <div class="portfolio-item-slider">
            <?php $images = get_field('gallery'); ?>
            <?php if ($images): ?>
              <?php foreach ($images as $image): ?>

                <div class="slick-slider-item">
                  <img src="<?= $image['sizes']['single'] ?>" alt="" />
                </div>
              <?php endforeach; ?>

            <?php endif; ?>
          </div>
          <!-- .portfolio-item-slider -->
          <div class="portfolio-thumb-slider">
            <?php $images = get_field('gallery'); ?>
            <?php if ($images): ?>
            <?php foreach ($images as $image): ?>
            <div class="slick-slider-item">
              <img src="<?= $image['sizes']['gallery-thumbnail'] ?>" alt="" />
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

          </div>
          <!-- .portfolio-thumb-slider -->

        </div>
      <?php endwhile; ?>
    </div>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();