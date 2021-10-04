<?php
/**
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/


// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid block-'.substr($block['name'], 4);
if( !empty($block['className']) ) {
$className .= ' ' . $block['className'];
}

// Create id attribute allowing for custom "anchor" value.
if( !empty($block['anchor']) ) {
$id = $block['anchor'];
} else {
$id = $block['id'];
}


$args = array(
    'post_type' => 'physician',
    'posts_per_page' => -1
);

$docs = get_posts($args);
if ($docs) :

  $specs = get_terms( array(
          'taxonomy' => 'specialty',
          'hide_empty' => true
      ) );
  $offices = get_terms( array(
          'taxonomy' => 'office',
          'hide_empty' => true
      ) );
  $genders = get_terms( array(
          'taxonomy' => 'gender',
          'hide_empty' => true
      ) );
?>
<div class="<?= $className; ?>" id="<?= $id;?>">
  <?php /******* SEARCH + ALPHABET *******/ ?>
  <div class="row justify-content-center text-center filters-search">
    <div class="col-md-9">
      <label class="d-block search-label text-left">
        <span>Search by Name, Speciality, Office, etc</span>
        <input id="sortSearch" type="search" class="form-control" placeholder="Name, Speciality, Office, etc" aria-controls="directory-list">
      </label>
    </div>

    <div class="col-12 btn-toolbar" role="toolbar" aria-label="Search list by alphabet">
      <div class="btn-group alphabet" role="group" aria-label="Alphabetical">
        <? $alphas = range('A', 'Z');
        foreach ($alphas as $letter) {
          echo '<button type="button" class="btn btn-sm btn-white a-btn" value="'.$letter.'">'.$letter.'</button>';
        } ?>
        <button type="button" class="btn btn-sm btn-light" value="all">ALL</button>
      </div>
    </div>
  </div>

  <div class="row">
    <?php /******* FILTERS *******/ ?>
    <div class="col-md-3 filters-sort">
      <h2 class="h3 column-heading">Filters</h2>

      <div class="select-wrapper">
        <label class="d-block">
          <span>Search by Specialty</span>
          <div><select id="sortSpec" class="form-control" data-filter="specialty">
            <option value="default" selected>Specialty</option>
            <?php foreach ($specs as $type) {
              echo '<option value="'.$type->name.'">'.$type->name.'</option>';
            }; ?>
          </select></div>
        </label>
      </div>

      <div class="select-wrapper">
        <label class="d-block">
          <span>Search by Office/Location Name</span>
          <div><select id="sortOffice" class="form-control" data-filter="office">
            <option value="default" selected>Office/Location</option>
            <?php foreach ($offices as $type) {
              echo '<option value="'.$type->name.'">'.$type->name.'</option>';
            }; ?>
          </select></div>
        </label>
      </div>

      <div class="select-wrapper">
        <label class="d-block">
          <span>Search by Gender</span>
          <div><select id="sortGender" class="form-control" data-filter="gender">
            <option value="default" selected>Gender</option>
            <?php foreach ($genders as $type) {
              echo '<option value="'.$type->name.'">'.$type->name.'</option>';
            }; ?>
          </select></div>
        </label>
      </div>

      <div class="btn btn-white w-100" id="clearFilter">Clear Filters</div>

    </div>
    <?php /******* TABLE ********/ ?>
    <div class="col-md-9">
      <h2 class="h3 column-heading"><span id="doc-count"><?= count($docs); ?></span> Doctor Results</h2>
      <table id="directory-list" cellspacing="0" width="100%">
        <thead><tr><th></th></tr></thead>
        <tbody>
        <?
          $order = 0;
          foreach ($docs as $doc) :
            $name = $doc->post_title;
            $pieces = explode(' ', $name);
            $last_name = array_pop($pieces);
            $id = $doc->ID;
            $title = get_field('title',$id);
            $phone = get_field('phone',$id);
            $email = get_field('email',$id);
            $website = get_field('website',$id);
            $school = get_field('medical_school', $id);
            $residency = get_field('residency',$id);
            $other = get_field('other_info',$id);
            $specialty = get_the_terms( $id , 'specialty' );
            $gender = get_the_terms( $id , 'gender' );
            $office = get_the_terms( $id , 'office' );
          ?>
            <tr data-specialty="<?= $specialty[0]->name; ?>" data-gender="<?= $gender[0]->name; ?>" data-office="<?= $office[0]->name; ?>" data-alpha="<?= $last_name[0]; ?>">
              <td data-order="<?= $last_name; ?>" data-sort="<?= $last_name; ?>">
              <div class="d-flex single-doc align-items-center">
                <div class="photo">
                  <div class="img-wrap">
                      <? if (has_post_thumbnail($doc)) {
                        echo get_the_post_thumbnail($doc, 'medium');
                      }  ?>
                  </div>
                </div>
                <div class="content">
                  <h3><?= $name; ?><?= ($title ? ', '.$title : ''); ?></h3>
                  <div class="d-flex justify-content-between content-inner">
                    <div>
                      <ul class="unstyled-list list-unstyled">
                      <?php if ($office) {
                        echo '<li>'.$office[0]->name.'</li>';
                        echo '<li>'.$office[0]->description.'</li>';
                      } ?>
                      <?= ($phone ? '<li>'.clean_phone($phone, true).'</li>' : ''); ?>
                      <?= ($email ? '<li><a href="mailto:'.$email.'">'.$email.'</a></li>' : ''); ?>
                      </ul>
                    </div>

                    <div>
                      <ul class="unstyled-list list-unstyled">
                      <?= ($specialty ? '<li>Specialty: '.$specialty[0]->name.'</li>' : ''); ?>
                      <?= ($school ? '<li>Medical School: '.$school.'</li>' : ''); ?>
                      <?= ($residency ? '<li>Residency: '.$residency.'</li>' : ''); ?>
                      <?= ($other ? '<li>Other Info: '.$other.'</li>' : ''); ?>
                      <?php $myLink = ''; if ($website) {
                        if (strpos($website, "http") !== false) {
                          $myLink = $website;
                        } else {
                          $myLink = 'https://'.$website;
                        }
                      } ?>
                      <?= ($myLink ? '<li>Website: <a href="'.$myLink.'" target="_blank">'.$website.'</a></li>' : ''); ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </td></tr>
        <? $order++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php endif; ?>
