<?php include('header.php'); ?>
<section class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-4">
        <p>
          <b>About Bachelor of Vocational (B.Voc.)</b>
        </p>

        <p>
          Bachelor of Vocational (B.Voc.) courses represent an innovative approach to higher education, tailored to meet the dynamic demands of the modern workforce. Designed for students who have completed their foundational education, these programs offer a unique blend of specialized vocational skills and a robust general education curriculum.
        </p>
        <p>B.Voc. courses are structured to integrate specific job roles and National Occupational Standards (NOSs), ensuring that graduates are equipped with the practical skills and theoretical knowledge required to excel in their chosen field. Whether it's healthcare, tourism, hospitality, or information technology, B.Voc. programs cover a wide range of industries, providing students with diverse career opportunities.</p>
        <p>One of the primary objectives of B.Voc. courses is to enhance the employability prospects of individuals. By focusing on industry-relevant skills and real-world experiences, these programs prepare students to hit the ground running in their careers. Employers value the practical training and hands-on experience that B.Voc. graduates bring to the table, making them highly sought after in the job market.</p>
        <p>Moreover, B.Voc. courses emphasize lifelong learning and professional development. Graduates are not only equipped to enter the workforce immediately but also have the foundation to pursue further education and advanced certifications in their field. This flexibility enables individuals to continuously upskill and adapt to evolving industry trends, ensuring long-term career success.</p>
        <!--<img src="images/btech-in-all-stream.jpg" class="img-fluid border p-1 rounded" alt="B Tech"/>-->
      </div>
      <div class="col-lg-4 mb-4">
        <?php include('form.php');
        ?>
      </div>


    </div>
  </div>
</section>
<section class="py-4 px-3 mb-5">
  <div class="container">
    <h2 class="text-center text-uppercase fw-semibold heading-divider">
      Why Choose Bachelor of Vocational (B.Voc.)?
    </h2>
    <ol>
      <li><b>Practical Skills Development:</b> B.Voc. programs focus on providing practical, hands-on training that directly aligns with industry requirements. This approach ensures that graduates are equipped with the specific skills and competencies needed to excel in their chosen field from day one.</li>
      <li><b>Industry-Relevant Curriculum:</b> B.Voc. courses are designed in collaboration with industry experts, ensuring that the curriculum remains up-to-date and relevant to current market needs. This industry-driven approach means students learn the latest techniques, technologies, and best practices directly from professionals in the field.</li>
      <li><b>Employability:</b> B.Voc. graduates are highly sought after by employers due to their combination of specialized vocational skills and general education. The emphasis on practical training and real-world experience makes B.Voc. graduates immediately valuable to companies across various industries.</li>
      <li><b>Flexibility:</b> B.Voc. programs offer flexibility in terms of both course structure and scheduling. Many programs offer part-time or online options, allowing students to balance their studies with work or other commitments. Additionally, B.Voc. courses often include opportunities for internships or work placements, providing valuable hands-on experience while still in school.</li>
      <li><b>Career Advancement:</b> A B.Voc. degree serves as a solid foundation for career advancement. Whether graduates choose to enter the workforce directly after graduation or pursue further education, such as postgraduate studies or specialized certifications, they are well-prepared to take on new challenges and opportunities.</li>
      <li><b>Entrepreneurial Opportunities:</b> B.Voc. programs foster an entrepreneurial mindset, equipping students with the skills and knowledge needed to start their own businesses or ventures. With a strong understanding of industry trends and market demands, B.Voc. graduates are well-positioned to identify and capitalize on emerging opportunities.</li>
      <li><b>Personal Fulfillment:</b> Finally, pursuing a B.Voc. degree can be personally fulfilling, allowing students to follow their passions and interests while gaining practical skills that can make a real difference in the world. Whether it's healthcare, tourism, technology, or any other field, B.Voc. programs offer the chance to pursue a meaningful and rewarding career path.</li>
    </ol>
    <div class="row py-3 text-center bg-blue text-white">
      <div class="col-lg-4 border-dotted">
        <i class="bi bi-person-lock fs-1 text-warning"></i>
        <h5>Eligibility</h5>
        <h6>10+2 or equivalent from a recognized board.</h6>
      </div>
      <div class="col-lg-2 border-dotted">
        <i class="bi bi-mortarboard fs-1 text-warning"></i>
        <h5>Course Mode</h5>
        <h6>Semester wise</h6>
      </div>
      <div class="col-lg-2 border-dotted">
        <i class="bi bi-clock-history fs-1 text-warning"></i>
        <h5>Duration</h5>
        <h6>3 years</h6>
      </div>

      <div class="col-lg-4">
        <i class="bi bi-person-workspace fs-1 text-warning"></i>
        <h5>Study Mode</h5>
        <h6>Full-Time, Online</h6>
      </div>

      <input type="hidden" name="is_bvoc" id="is_bvoc" value="<?php if (isset($_GET['bvoc'])) {
                                                                echo '2';
                                                              } else {
                                                                echo '0';
                                                              } ?>">
    </div>
</section>
<section class="py-4">
  <?php include('our_program.php'); ?>
</section>

<?php include('footer.php'); ?>