<?php include('header.php'); ?>
<style>
    .para_area_frame {
        margin: 0px auto;
        width: 62%;
    }
</style>
<!-- Search Modal -->
<div class="modal fade search-modal-area" id="exampleModalsrc">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" data-bs-dismiss="modal" class="closer-btn">
                <i class="ri-close-line"></i>
            </button>

            <div class="modal-body">
                <form class="search-box">
                    <div class="search-input">
                        <input type="text" name="Search" placeholder="Search for..." class="form-control">

                        <button type="submit" class="search-btn">
                            <i class="ri-search-line"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal -->

<!-- Start Page Title Area -->
<div class="page-title-area bg-15">
    <div class="container">
        <div class="page-title-content">
            <h2>Approval</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Home
                    </a>
                </li>

                <li class="active">Bar Council of India (BCI)</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->



<section>
    <div class="container">
        <br>
        <div class="col-lg-12 col-md-12">
            <div class="para_area">
                <div class="col-lg-12">
                    <div class="para_area_frame">
                        <img src="<?= $this->Digitalocean_model->get_photo('images/approvals/bar_council_of_india.jpg') ?>" width="100%" height="900px">
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

</section>

<?php include('footer.php'); ?>