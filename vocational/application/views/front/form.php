            <div class="bg-blue p-4 text-white border border-3 border-warning rounded">
              <div class="text-center">
                <h3 class="text-uppercase">Admission Form</h3>
                <small>Please fill information below to make an admission.</small>
              </div>
              <hr class="mt-2 mb-3" />
              <div id="error_message">
              </div>
              <!-- <form method="get" name="reg_form" id="reg_form" autocomplete="off" action="http://127.0.0.1/btu_new/admission-form" class="row g-3" > -->
              <form method="get" name="reg_form" id="reg_form" autocomplete="off" action="https://www.tgu.ac.in/admission-form" class="row g-3">
                <div class="form-group col-md-12">
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Name*" />
                </div>

                <div class="form-group col-md-12">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email ID*" />
                </div>

                <div class="form-group col-md-12">
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                    placeholder="Mobile Number*" />
                </div>
                <div class="form-group col-md-12">
                  <select class="form-control chosen-select" name="city" id="city">
                    <option value="">Select City*</option>
                    <?php
                    if (!empty($city)) {
                      foreach ($city as $city_result) { ?>
                        <option value="<?= $city_result->id ?>"><?= $city_result->name ?>, <?= $city_result->state_name ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <input
                    type="hidden"
                    class="form-control"
                    id="bvoc"
                    name="bvoc"
                    value="bvoc" />
                </div>

                <!-- <div class="col-md-12"> -->
                <div class="form-group form-check col-md-12">
                  <!-- <input class="form-check-input" type="checkbox" id="gridCheck" required/>
                    <label class="form-check-label" for="gridCheck">
                      I agree to receive information regarding my submitted
                      application.
                    </label> -->
                  <input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" class="form-check-input" />I agree to receive information regarding my submitted
                  application.</label>
                </div>
                <!-- </div> -->
                <div class="form-group col-md-12">
                  <button type="submit" name="submit" id="submit" value='Submit' class="btn btn-warning w-100 fw-bold">
                    SUBMIT
                  </button>
                </div>
              </form>
            </div>