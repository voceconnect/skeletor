<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package skeletor
 */
get_header();
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-lg-12" role="main" id="primary">

        <div class="flex">
          <div class="box">
            <img src="http://placehold.it/50/">
          </div>
          <div class="box">
            <p>Some other text. This paragraph will be vertically and horizontally centered. Some other text.</p>
          </div>
          <div class="box">
            <img src="http://placehold.it/200/">
          </div>
          <div class="box">
            <p>This is the fourth box in the markup.</p>
          </div>

          <div class="box">
            <p>This is the fourth box in the markup.</p>
          </div>
          <div class="box">
            <img src="http://placehold.it/250/">
          </div>
          <div class="box">
            <p>Some other text. Bacon ipsum sausage custard lamb chops turky. This paragraph will be vertically and horizontally centered. Some other text.</p>
          </div>
          <div class="box">
            <img src="http://placehold.it/200/">
          </div>
        </div>

      </div>
      <?php //get_sidebar(); ?>
    </div>
  </div>
</section>

<?php
get_footer();
