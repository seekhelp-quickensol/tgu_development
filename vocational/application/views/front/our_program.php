<div class="container">
  <h2 class="text-center text-uppercase fw-semibold heading-divider">
    Our Programme
  </h2>
  <div class="row py-4">
    <?php if (!empty($course_streams)) {
      foreach ($course_streams as $course_result) {
    ?>
        <div class="col-lg-4">
          <ul class="list-points">
            <li class="tick"><a href="<?= base_url(); ?>all_courses/<?= $course_result->course_link ?>"><?= $course_result->course_name ?> <?= $course_result->stream_name ?></a></li>
          </ul>
        </div>
    <?php }
    } ?>
  </div>
</div>