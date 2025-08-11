<?php
class Front_model extends CI_model{
	public function login(){
		$admission_status = array(1, 4);
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('hold_login', '0');
		$this->db->where_in('admission_status', $admission_status);
		$this->db->where("password", $this->input->post("password"));
		$this->db->where("username", $this->input->post("username"));
		$result = $this->db->get("tbl_student");
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				'student_id' => $result->id,
			);
			$this->session->set_userdata($data);
			return true;
		} else {
			return false;
		}
	}
	public function forgot_password()
	{
		$admission_status = array(1, 4);
		$email  = $this->input->post("email");
		$this->db->where('email', $email);
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('hold_login', '0');
		$this->db->where_in('admission_status', $admission_status);
		$result = $this->db->get('tbl_student');
		$temp = $result->row();
		if ($result->num_rows() > 0) {
			$token = md5(rand());
			$data = array(
				'forgot_token' => $token
			);
			$this->db->where('email', $email);
			$this->db->update('tbl_student', $data);

			$from_email = no_reply_mail;
			$message = '
			<!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            @media screen {
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 400;
                                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 700;
                                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family:  "Lato";
                                    font-style: italic;
                                    font-weight: 400;
                                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: v
                                    font-style: italic;
                                    font-weight: 700;
                                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                                }
                            }
                    
                            /* CLIENT-SPECIFIC STYLES */
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                    
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                    
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                    
                            /* RESET STYLES */
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                    
                            table {
                                border-collapse: collapse !important;
                            }
                    
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                    
                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                    
                            /* MOBILE STYLES */
                            @media screen and (max-width:600px) {
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }
                    
                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    </head> 
                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<!-- LOGO -->
								<tr>
									<td bgcolor="" align="center">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
											<tr>
												<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td bgcolor="" align="center" style="padding: 0px 10px 0px 10px;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

											<tr>
												<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
													<p style="margin: 0;">Dear ' . $temp->student_name . ',<br></p>
												</td>
											</tr>

											<tr>
												<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
													<img src="' . $this->Digitalocean_model->get_photo('images/icons/forgot_password.jpg') . '"  style="display: block; border: 0px;width: 40%;" />
													<h1 style="font-size: 35px; font-weight: 400; margin-top:5px; margin-bottom:15px;">Forgot Your Password?</h1> 
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
											<tr>
												<td bgcolor="#ffffff" align="left" style=" color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
													<p style="margin: 0;text-align: center;">We have received a request to reset the password for your account. To complete the password reset process, Click on the button below.
													</p>
													<br>
												   
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" align="left">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td bgcolor="#ffffff" align="center" style="">
																<table border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td align="center" style="border-radius: 3px;" bgcolor="#4b0000"><a href="' . base_url() . 'reset_your_password/' . $token . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #4b0000; display: inline-block;">RESET PASSWORD</a></td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr> <!-- COPY -->
											<tr>
												<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												</td>
											</tr> <!-- COPY -->
											<tr>
												<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
													 
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
													<p style="margin: 0;padding:15px;">If you did not request a password reset, you can ignore this email, and your account will remain secure.
													</p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
													<p style="margin: 0;">Best Regards,<br>IT Team</p>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								
								 
							</table>
						</body>

						</html>';
			// <img src="'.base_url().'images/icons/forgot_password.jpg" height="120" style="display: block; border: 0px;width: 50%;" />


			// <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
			// </div>

			// <tr>
			// 			<td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
			// 				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
			// 					<tr>
			// 						<td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
			// 							<p style="margin: 0;">The Global University, Arunachal Pradesh is established by the Arunachal Pradesh Government as an Act No. 9 of 2020 and under u/s 2(f) of UGC act 1956.</p>
			// 						</td>
			// 					</tr>
			// 				</table>
			// 			</td>
			// 		</tr>


			$config['protocol'] = 'smtp';
			$config['smtp_host'] = smtp_host;
			$config['smtp_port'] = 587;
			$config['smtp_user'] = smtp_user;
			$config['smtp_pass'] = smtp_pass;
			$config['newline'] = "\r\n";
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from(no_reply_mail, no_reply_name);
			$this->email->to($temp->email);
			$this->email->subject('Forgot Password |' . no_reply_name);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			if ($this->email->send()) {
			} else {
			}
			return true;
		} else {
			return false;
		}
	}
	public function reset_your_password()
	{
		$data = array(
			'password' 		=> $this->input->post('new_password'),
			'forgot_token' 	=> ''
		);
		$this->db->where('forgot_token', $this->uri->segment(2));
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		if (!empty($student)) {
			$this->db->where('forgot_token', $this->uri->segment(2));
			$this->db->update('tbl_student', $data);
			$from_email = "no-reply@tgu.ac.in";
			$message = '
				<!DOCTYPE html>
					<html>
						<head>
							<title></title>
							<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta http-equiv="X-UA-Compatible" content="IE=edge" />
							<style type="text/css">
								@media screen {
									@font-face {
										font-family: "Lato";
										font-style: normal;
										font-weight: 400;
										src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
									}
						
									@font-face {
										font-family: "Lato";
										font-style: normal;
										font-weight: 700;
										src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
									}
						
									@font-face {
										font-family:  "Lato";
										font-style: italic;
										font-weight: 400;
										src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
									}
						
									@font-face {
										font-family: v
										font-style: italic;
										font-weight: 700;
										src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
									}
								}
						
								/* CLIENT-SPECIFIC STYLES */
								body,
								table,
								td,
								a {
									-webkit-text-size-adjust: 100%;
									-ms-text-size-adjust: 100%;
								}
						
								table,
								td {
									mso-table-lspace: 0pt;
									mso-table-rspace: 0pt;
								}
						
								img {
									-ms-interpolation-mode: bicubic;
								}
						
								/* RESET STYLES */
								img {
									border: 0;
									height: auto;
									line-height: 100%;
									outline: none;
									text-decoration: none;
								}
						
								table {
									border-collapse: collapse !important;
								}
						
								body {
									height: 100% !important;
									margin: 0 !important;
									padding: 0 !important;
									width: 100% !important;
								}
						
								/* iOS BLUE LINKS */
								a[x-apple-data-detectors] {
									color: inherit !important;
									text-decoration: none !important;
									font-size: inherit !important;
									font-family: inherit !important;
									font-weight: inherit !important;
									line-height: inherit !important;
								}
						
								/* MOBILE STYLES */
								@media screen and (max-width:600px) {
									h1 {
										font-size: 32px !important;
										line-height: 32px !important;
									}
								}
						
								/* ANDROID CENTER FIX */
								div[style*="margin: 16px 0;"] {
									margin: 0 !important;
								}
							</style>
						</head> 
						<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
							<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
		</div>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<!-- LOGO -->
			<tr>
				<td bgcolor="" align="center">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
						<tr>
							<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td bgcolor="" align="center" style="padding: 0px 10px 0px 10px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
						<tr>
							<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
								<img src="' . base_url() . 'images/icons/forgot_password.jpg" height="120" style="display: block; border: 0px;width: 50%;" />
								<h1 style="font-size: 35px; font-weight: 400; margin: 2;">Password changed successfully</h1> 
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
						<tr>
							
							<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
								<p style="margin: 0;">Dear ' . $student->student_name . ',<br></p>
								<p style="margin: 0;"><br>Your password has been updated successfully, below is updated password</p>
								<p style="margin: 0;"><br><b>Username:</b> ' . $student->username . '</p>
								<p style="margin: 0;"><b>Password:</b> ' . $student->password . '</p>
							</td>
						</tr>
						 
						<tr>
							<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
							</td>
						</tr> <!-- COPY -->
						<tr>
							<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
								 
							</td>
						</tr> 
						<tr>
							<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
								<p style="margin: 0;">Cheers,<br>IT Team</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
						<tr>
							<td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
								<p style="margin: 0;">The Global University, Arunachal Pradesh is established by the Arunachal Pradesh Government as an Act No. 9 of 2020 and under u/s 2(f) of UGC act 1956.</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			 
		</table>
	</body>

	</html>
				';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = smtp_host;
			$config['smtp_port'] = 587;
			$config['smtp_user'] = smtp_user;
			$config['smtp_pass'] = smtp_pass;
			$config['newline'] = "\r\n";
			$this->load->library('email');

			$this->email->initialize($config);
			$this->email->from('no-reply@tgu.ac.in', 'The Global Univerisity');
			$email_id = $this->input->post('email_id');

			// if (is_array($email_id)) {
			// 	for ($e = 0; $e < count($email_id); $e++) {
			// 		$this->email->to($email_id[$e]);
			// 	}
			// } else {
			// 	$this->email->to($email_id);
			// }

			if ($email_id !== null) {
				for ($e = 0; $e < count($email_id); $e++) {
					$this->email->to($email_id[$e]);
				}
			}

			// for($e=0;$e<count($email_id);$e++){
			// 	$this->email->to($email_id[$e]);
			// } 
			$this->email->subject('Reset Password | The Global Univerisity');
			$this->email->message($message);
			$this->email->set_mailtype('html');
			if ($this->email->send()) {
			} else {
			}
			return true;
		} else {
			return false;
		}
	}
	public function get_student_details(){ 
		$this->db->select('tbl_student.*,countries.name as country_name,states.name as state_name,tbl_course.print_name,tbl_stream.stream_name,tbl_faculty.faculty_name,tbl_session.session_name,tbl_course_type.course_type');
		$this->db->where('tbl_student.id',$this->session->userdata('student_id'));
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('countries','countries.id = tbl_student.country','left');
		$this->db->join('states','states.id = tbl_student.state','left');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id'); 
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type','left'); 
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id'); 
		$result = $this->db->get('tbl_student');
		return $result->row(); 
	}

	public function change_password()
	{
		$data = array(
			'password' => $this->input->post('new_password'),
		);
		$this->db->where('id', $this->session->userdata('student_id'));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function set_ppc_report($pcc)
	{
		$data = array(
			'pcc' => $pcc,
		);
		$this->db->where('id', $this->session->userdata('student_id'));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function get_university_details()
	{
		$result = $this->db->get('tbl_university_details');
		return $result->row();
	}
	public function get_admission_form()
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.id', $this->session->userdata('student_id'));
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course');
		$this->db->join('states', 'states.id = tbl_student.state');
		$this->db->join('cities', 'cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_all_ebook()
	{
		$profile = $this->get_student_profile();
		$this->db->where('is_deleted', '0');
		$this->db->where('course', $profile->course_id);
		$this->db->where('stream', $profile->stream_id);
		$this->db->where('year_sem', $profile->year_sem);
		$result = $this->db->get('tbl_ebook_library');
		return $result->result();
	}
	public function get_student_profile()
	{
		$this->db->where('id', $this->session->userdata('student_id'));
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_my_qualification()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function upload_self_assesment($file)
	{
		$data = array(
			'student_id'	=> $this->session->userdata('student_id'),
			'year_sem' 		=> $this->input->post('year_sem'),
			'file' 			=> $file,
			'assessment_status' => '0',
			'created_on'	=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_self_assesments', $data);
		return true;
	}
	public function upload_teacher_assesment($file)
	{
		$data = array(
			'student_id'	=> $this->session->userdata('student_id'),
			'year_sem' 		=> $this->input->post('year_sem'),
			'file' 			=> $file,
			'assessment_status' => '0',
			'created_on'	=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_teacher_assesments', $data);
		return true;
	}
	public function upload_assignment($file)
	{
		$data = array(
			'student_id'			=> $this->session->userdata('student_id'),
			'year_sem' 				=> $this->input->post('year_sem'),
			'assignment_title'		=> $this->input->post('assignment_title'),
			'file' 					=> $file,
			'assessment_status' => '0',
			'created_on'			=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_assignment', $data);
		return true;
	}
	public function upload_industrial($file)
	{
		$data = array(
			'student_id'	=> $this->session->userdata('student_id'),
			'year_sem' 		=> $this->input->post('year_sem'),
			'file' 			=> $file,
			'assessment_status' => '0',
			'created_on'	=> date("Y-m-d H:i:s")
		);
		// print_r($data);exit();
		$this->db->insert('tbl_industry_assesment', $data);
		return true;
	}
	public function upload_guardian($file)
	{
		$data = array(
			'student_id'	=> $this->session->userdata('student_id'),
			'year_sem' 		=> $this->input->post('year_sem'),
			'file' 			=> $file,
			'assessment_status' => '0',
			'created_on'	=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_guardian_assesment', $data);
		return true;
	}
	public function get_my_self_assesment()
	{
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_self_assesments');
		return $result->result();
	}
	public function get_my_teacher_assesment()
	{
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_teacher_assesments');
		return $result->result();
	}
	public function get_assignment()
	{
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_industrial()
	{
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_industry_assesment');
		return $result->result();
	}
	public function get_guardian()
	{
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_guardian_assesment');
		return $result->result();
	}
	public function get_my_all_result()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->order_by('year_sem', 'ASC');
		$result = $this->db->get('tbl_exam_results');
		return $result->result();
		// $result =  $result->result();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_stu_data()
	{
		$this->db->select("tbl_student.*,tbl_stream.stream_name");
		$this->db->where("tbl_student.id", $this->session->userdata('student_id'));
		$this->db->join("tbl_stream", "tbl_stream.id=tbl_student.stream_id");
		$result = $this->db->get("tbl_student");
		return $result->row();
	}
	public function get_this_result()
	{
		$this->db->select('tbl_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.course_mode,tbl_student.father_name,tbl_exam_results.examination_month,tbl_exam_results.examination_year');
		$this->db->where('tbl_exam_results.id', $this->uri->segment(2));
		$this->db->where('tbl_exam_results.student_id', $this->session->userdata('student_id'));
		$this->db->where('tbl_exam_results.is_deleted', '0');
		// $this->db->where('tbl_exam_results.status','0');
		$this->db->where('tbl_exam_results.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_exam_results.student_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_exam_results.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_exam_results.stream_id', 'left');
		$result = $this->db->get('tbl_exam_results');
		return $result->row();
	}
	public function get_selected_subject_for_result($result_id)
	{
		$this->db->select('tbl_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type');
		$this->db->where('tbl_examination_result_details.result_id', $result_id);
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_examination_result_details.subject_id');
		$result = $this->db->get('tbl_examination_result_details');
		return $result->result();
	}
	public function set_feedback()
	{
		$data = array(
			'student_id' 	=> $this->session->userdata('student_id'),
			'feedback' 		=> $this->input->post('feedback'),
			'created_on'	=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_student_feedback', $data);
		return true;
	}
	public function get_all_feedback()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$result = $this->db->get('tbl_student_feedback');
		return $result->result();
	}
	public function get_all_student_marksheet()
	{
		$profile = $this->get_student_profile();
		if ($profile->course_id == "23") {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			//$this->db->where('issue_status','1');
			$this->db->where('status', '1');
			$this->db->where('is_deleted', '0');
			$this->db->order_by('id', 'DESC');
			$result = $this->db->get('tbl_course_work_result');
			return $result->result();
		} else { //echo $this->session->userdata("student_id");exit;
			$this->db->select('tbl_marksheet.*,tbl_exam_results.examination_month,tbl_exam_results.examination_year');
			$this->db->where("tbl_marksheet.is_deleted", "0");
			$this->db->where("tbl_marksheet.status", "1");
			//$this->db->where('tbl_marksheet.issue_status','1');
			$this->db->where('tbl_exam_results.is_deleted', '0');
			$this->db->where('tbl_exam_results.status', '1');
			$this->db->where("tbl_marksheet.student_id", $this->session->userdata("student_id"));
			$this->db->join('tbl_exam_results', 'tbl_exam_results.id = tbl_marksheet.result_id');
			$result = $this->db->get("tbl_marksheet")->result();
			return $result;
		}
	}
	public function get_single_marksheet()
	{
		$this->db->select('tbl_marksheet.*,tbl_exam_results.result,tbl_exam_results.examination_month,tbl_exam_results.examination_year,tbl_student.mother_name,tbl_student.student_name,tbl_student.father_name,tbl_student.date_of_birth,tbl_course.course_name,tbl_stream.stream_name,tbl_session.session_name,tbl_session.pre_session,tbl_course.course_name,tbl_course.id as course_id');
		$this->db->where('tbl_marksheet.is_deleted', '0');
		$this->db->where('tbl_marksheet.id', $this->uri->segment(2));
		$this->db->where("tbl_marksheet.student_id", $this->session->userdata("student_id"));
		$this->db->join('tbl_exam_results', 'tbl_exam_results.id = tbl_marksheet.result_id');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_marksheet.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_marksheet');
		return $result->row();
	}
	public function get_single_marksheet_result_course_work()
	{
		// echo "<pre>";print_r($this->session->userdata('student_id'));exit;
		$this->db->select('tbl_course_work_result.*,tbl_student.student_name,tbl_student.father_name,tbl_student.enrollment_number,tbl_stream.stream_name,tbl_signature.name as signature_name,tbl_signature.signature,tbl_signature.dispalay_signature,prepared_tbl_signature.name as prepared_signature_name,prepared_tbl_signature.signature as prepared_signature,prepared_tbl_signature.dispalay_signature as prepared_dispalay_signature,tbl_checked_signature.name as checked_signature_name,tbl_checked_signature.signature as checked_signature,tbl_checked_signature.dispalay_signature as checked_dispalay_signature');
		$this->db->where('tbl_course_work_result.is_deleted', '0');
		$this->db->where('tbl_course_work_result.status', '1');
		$this->db->where('tbl_course_work_result.issue_status', '1');
		$this->db->where('tbl_course_work_result.student_id', $this->session->userdata('student_id'));
		$this->db->join('tbl_student', 'tbl_student.id = tbl_course_work_result.student_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join("tbl_signature", "tbl_signature.id = tbl_course_work_result.signature_id", 'left');
		$this->db->join("tbl_signature as prepared_tbl_signature", "prepared_tbl_signature.id = tbl_course_work_result.prepared_signature_id", 'left');
		$this->db->join("tbl_signature as tbl_checked_signature", "tbl_checked_signature.id = tbl_course_work_result.checked_signature_id", 'left');
		$query = $this->db->get('tbl_course_work_result');
		$row = $query->row();
		return $row;

		// print_r($row);exit;
	}
	public function get_course_work_marksheet_details($id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('result_id', $id);
		$result = $this->db->get('tbl_course_work_result_details');
		$result = $result->result();
		return $result;
	}
	/*public function get_recommendation_letter(){
		$this->db->select("tbl_student_recommendation_letter.*,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_student_recommendation_letter.is_deleted","0");
		$this->db->where("tbl_student_recommendation_letter.payment_status","1");
		$this->db->where("tbl_student_recommendation_letter.student_id",$this->session->userdata("student_id"));  
		$this->db->join("tbl_student","tbl_student.id = tbl_student_recommendation_letter.student_id");
		$this->db->join("tbl_session","tbl_session.id = tbl_student.session_id"); 
		$this->db->join("tbl_course","tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_student.stream_id");  
		$result = $this->db->get("tbl_student_recommendation_letter")->row();
		return $result;
	}
	public function set_pay_recommendation_letter_fees(){
		$data  = array(
			"student_id"	=> $this->session->userdata("student_id"),
			"amount"		=> '1000',
			//"amount"		=> '1',
			"created_on"	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert("tbl_student_recommendation_letter",$data);
		$id = $this->db->insert_id();

		$this->db->select("tbl_student_recommendation_letter.id,tbl_student_recommendation_letter.amount,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
		$this->db->where("tbl_student_recommendation_letter.id",$id);
		$this->db->join("tbl_student","tbl_student.id = tbl_student_recommendation_letter.student_id");
 		$result = $this->db->get("tbl_student_recommendation_letter")->row(); 
		return $result;
	}*/
	public function get_student_provisional_degree()
	{
		$this->db->select("tbl_student_provisional_degree.*,tbl_student.course_id,tbl_student.student_name,tbl_student.father_name,tbl_student.enrollment_number,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_student_provisional_degree.is_deleted", "0");
		$this->db->where("tbl_student_provisional_degree.payment_status", "1");
		$this->db->where("tbl_student_provisional_degree.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_provisional_degree.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_student_provisional_degree")->row();
		return $result;

		// echo "<pre>";print_r($result);exit;
	}
	public function get_print_provisional_degree_certificate_regular_student_login()
	{
		$api_url = api_url . "get_print_provisional_degree_certificate_regular_student_login";
		$form_data = array(
			'id'  			=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		exit;
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_print_degree_certificate_regular_studnet_login()
	{
		$api_url = api_url . "get_print_degree_certificate_regular_studnet_login";
		$form_data = array(
			'id'  			=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_print_transcript_list_student_login()
	{
		$api_url = api_url . "get_print_transcript_list_student_login";
		$form_data = array(
			'id'  			=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		exit;
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_print_transcript_regular_student_login()
	{
		$api_url = api_url . "get_print_transcript_regular_student_login";
		$form_data = array(
			'id'  			=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		exit;
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_printing_transfer_certificate_student_login()
	{
		$api_url = api_url . "get_printing_transfer_certificate_student_login";
		$form_data = array(
			'id'  			=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function print_migration_certificate_regular_student_login()
	{
		$api_url = api_url . "print_migration_certificate_regular_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_single_print_consolidate_regular_student_login()
	{
		$api_url = api_url . "get_single_print_consolidate_regular_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_single_print_bonafied_regular_student_login()
	{
		$api_url = api_url . "get_single_print_bonafied_regular_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_single_print_bonafied_scholarship_regular_student_login()
	{
		$api_url = api_url . "get_single_print_bonafied_scholarship_regular_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_single_print_recom_regular_student_login()
	{
		$api_url = api_url . "get_single_print_recom_regular_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_second_recommendation_letter_print_student_login()
	{
		$api_url = api_url . "get_second_recommendation_letter_print_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_print_medium_inst_student_login()
	{
		$api_url = api_url . "get_print_medium_inst_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_single_no_backlog_application_print_student_login()
	{
		$api_url = api_url . "get_single_no_backlog_application_print_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_single_no_split_application_print_student_login()
	{
		$api_url = api_url . "get_single_no_split_application_print_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}



	public function get_single_character_application_print_student_login()
	{
		$api_url = api_url . "get_single_character_application_print_student_login";
		$form_data = array(
			'id'  	=> base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);
		return $response = json_decode($response);
	}
	public function get_student_division_for_degree()
	{
		$this->db->select("examination_year,internal_max_marks,internal_marks_obtained,external_max_marks,external_marks_obtained,created_on");
		$this->db->where("is_deleted", "0");
		$this->db->where("status", "1");
		$this->db->where("result", "0");
		$this->db->where("student_id", $this->session->userdata("student_id"));
		$this->db->order_by("id", "DESC");
		$result = $this->db->get("tbl_exam_results");
		$result = $result->result();
		$total_marks = 0;
		$gained_marks = 0;
		if (!empty($result)) {
			foreach ($result as $res) {
				$total_marks = $total_marks + $res->internal_max_marks + $res->external_max_marks;
				$gained_marks = $gained_marks + $res->internal_marks_obtained + $res->external_marks_obtained;
			}
			$percentage = $total_marks == 0 ? 0 : ($gained_marks / $total_marks) * 100;
			if ($percentage >= 60) {
				$data["division"] = "First Division";
			} else if ($percentage < 60 & $percentage >= 45) {
				$data["division"] = "Second Division";
			} else {
				$data["division"] = "Third Division";
			}
			$data["date"] = $result[0]->examination_year;
			return $data;
		}
	}
	public function get_student_division_for_degree_new_degree()
	{
		$this->db->select("examination_year,internal_max_marks,internal_marks_obtained,external_max_marks,external_marks_obtained,created_on");
		$this->db->where("is_deleted", "0");
		$this->db->where("status", "1");
		$this->db->where("result", "0");
		$this->db->where("student_id", $this->session->userdata("student_id"));
		$this->db->order_by("id", "DESC");
		$result = $this->db->get("tbl_exam_results");
		$result = $result->result();
		$total_marks = 0;
		$gained_marks = 0;
		if (!empty($result)) {
			foreach ($result as $res) {
				$total_marks = $total_marks + $res->internal_max_marks + $res->external_max_marks;
				$gained_marks = $gained_marks + $res->internal_marks_obtained + $res->external_marks_obtained;
			}
			$percentage = $total_marks == 0 ? 0 : ($gained_marks / $total_marks) * 100;
			if ($percentage >= 60) {
				$data["division"] = "First ";
			} else if ($percentage < 60 & $percentage >= 45) {
				$data["division"] = "Second ";
			} else {
				$data["division"] = "Third ";
			}
			$data["date"] = $result[0]->examination_year;
			return $data;
		}
	}
	public function get_student_division_for_degree_new($id)
	{
		$this->db->select("examination_year,internal_max_marks,internal_marks_obtained,external_max_marks,external_marks_obtained,created_on");
		$this->db->where("is_deleted", "0");
		$this->db->where("status", "1");
		$this->db->where("result", "0");
		$this->db->where("student_id", $id);
		$this->db->order_by("id", "DESC");
		$result = $this->db->get("tbl_exam_results");
		$result = $result->result();
		$total_marks = 0;
		$gained_marks = 0;
		if (!empty($result)) {
			foreach ($result as $res) {
				$total_marks = $total_marks + $res->internal_max_marks + $res->external_max_marks;
				$gained_marks = $gained_marks + $res->internal_marks_obtained + $res->external_marks_obtained;
			}
			$percentage = $total_marks == 0 ? 0 : ($gained_marks / $total_marks) * 100;
			if ($percentage >= 60) {
				$data["division"] = "First Division";
			} else if ($percentage < 60 & $percentage >= 45) {
				$data["division"] = "Second Division";
			} else {
				$data["division"] = "Third Division";
			}
			$data["date"] = $result[0]->examination_year;
			return $data;
		}
	}
	public function send_provisional_terms()
	{
		$profile = $this->get_student_profile();
		$from_email = "no-reply@tgu.ac.in";

		$message = '
			<!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            @media screen {
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 400;
                                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 700;
                                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family:  "Lato";
                                    font-style: italic;
                                    font-weight: 400;
                                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: v
                                    font-style: italic;
                                    font-weight: 700;
                                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                                }
                            }
                    
                            /* CLIENT-SPECIFIC STYLES */
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                    
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                    
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                    
                            /* RESET STYLES */
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                    
                            table {
                                border-collapse: collapse !important;
                            }
                    
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                    
                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                    
                            /* MOBILE STYLES */
                            @media screen and (max-width:600px) {
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }
                    
                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    </head> 
                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<!-- LOGO -->
							<tr>
								<td bgcolor="#4b0000" align="center">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#4b0000" align="center" style="padding: 0px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
												<h1 style="font-size: 35px; font-weight: 400; margin: 2;">Undertaking for Provisional Degree!</h1> <img src="https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">We are excited to have you get started to applying for provisional degree. First, you need to accept our term and conditions. Just press the button below.</p>
												<br>
												<p style="margin: 0;">
												 I solemnly declare and confirm that I have submitted documents are ture, if any false document is found that is submitted by me  then university can cancel/terminate my admission at any time without any prior notice.
												  </p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" align="left">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td align="center" style="border-radius: 3px;" bgcolor="#4b0000"><a href="' . base_url() . 'accept_provisional_terms/' . base64_encode($profile->id) . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #4b0000; display: inline-block;">I Accept</a></td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr> <!-- COPY -->
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">If that doesnt work, copy and paste the following link in your browser:</p>
											</td>
										</tr> <!-- COPY -->
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;"><a href="' . base_url() . 'accept_provisional_terms/' . base64_encode($profile->id) . '" target="_blank" style="color: #4b0000;">' . base_url() . 'accept_provisional_terms/' . base64_encode($profile->id) . '</a></p>
												 
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">If you have any questions, just reply to this email info@aceg.info we are always happy to help out.</p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">Cheers,<br>IT Team</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
												<p style="margin: 0;"><a href="' . base_url() . 'contact-us" target="_blank" style="color: #4b0000;">We&rsquo;re here to help you out</a></p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							 
						</table>
					</body> 
					</html>';
		$subject = 'Accept Terms & Conditions | The Global University';

		$to = array(
			"email" => $profile->email,
			"name" => $profile->student_name,
		);
		$subject = 'Provisional Terms | The Global University';
		$this->send_send_blue($to, $subject, $message);
		return true;
	}
	public function accept_provisional_terms()
	{
		$data = array(
			'provisional_degree' => '1'
		);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function accept_degree_terms()
	{
		$data = array(
			'degree_cert' => '1'
		);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function accept_transfer_terms()
	{
		$data = array(
			'transfer_cert' => '1'
		);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function accept_transcript_terms()
	{
		$data = array(
			'transcript' => '1'
		);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function accept_migration_terms()
	{
		$data = array(
			'migration_terms' => '1'
		);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function set_pay_provisional_degree_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get("tbl_student_provisional_degree");
		$exist = $exist->row();

		$amount = $this->get_certificate_fees('3');
		if (!empty($amount)) {
			$amount = $amount->certificate_fees;
		} else {
			$amount = '1100';
		}
		$data  = array(
			"student_id"	=> $this->session->userdata("student_id"),
			// "amount"		=> '1100', 
			"amount"		=> $amount,
			"created_on" => date("Y-m-d H:i:s"),
		);
		if (empty($exist)) {
			$this->db->insert("tbl_student_provisional_degree", $data);
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $exist->id);
			$this->db->update("tbl_student_provisional_degree", $data);
			$id = $exist->id;
		}

		$this->db->select("tbl_student_provisional_degree.id,tbl_student_provisional_degree.amount,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");

		$this->db->where("tbl_student_provisional_degree.id", $id);
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_provisional_degree.student_id");
		$result = $this->db->get("tbl_student_provisional_degree")->row();
		return $result;
	}
	public function get_transfer_certificate()
	{
		$this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.father_name,tbl_student.enrollment_number,tbl_student.gender,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_student_transfer.is_deleted", "0");
		$this->db->where('tbl_student_transfer.payment_status', "1");
		$this->db->where("tbl_student_transfer.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_transfer.student_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_student_transfer")->row();
		return $result;
	}
	public function send_accept_transfer_undertaking()
	{
		$profile = $this->get_student_profile();
		$from_email = no_reply_mail;

		$message = '
			<!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            @media screen {
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 400;
                                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 700;
                                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family:  "Lato";
                                    font-style: italic;
                                    font-weight: 400;
                                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: v
                                    font-style: italic;
                                    font-weight: 700;
                                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                                }
                            }
                    
                            /* CLIENT-SPECIFIC STYLES */
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                    
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                    
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                    
                            /* RESET STYLES */
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                    
                            table {
                                border-collapse: collapse !important;
                            }
                    
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                    
                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                    
                            /* MOBILE STYLES */
                            @media screen and (max-width:600px) {
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }
                    
                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    </head> 
                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#4b0000" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#4b0000" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 35px; font-weight: 400; margin: 2;">Undertaking for Transfer Certificate !</h1> <img src="https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">We are excited to have you get started to applying for transfer certificate. First, you need to accept our term and conditions. Just press the button below.</p>
                            <br>
                            <p style="margin: 0;">
                             I solemnly declare and confirm that I have submitted documents are ture, if any false document is found that is submitted by me  then university can cancel/terminate my admission at any time without any prior notice.
                              </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#4b0000"><a href="' . base_url() . 'accept_transfer_terms/' . base64_encode($profile->id) . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #4b0000; display: inline-block;">I Accept</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If that doesnt work, copy and paste the following link in your browser:</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="' . base_url() . 'accept_transfer_terms/' . base64_encode($profile->id) . '" target="_blank" style="color: #4b0000;">' . base_url() . 'accept_transfer_terms/' . base64_encode($profile->id) . '</a></p>
                             
                        </td>
                    </tr>
                    
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Best Regards,<br>IT Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
         
    </table>
</body>

</html> ';
		// <tr>
		//                         <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
		//                             <p style="margin: 0;">If you have any questions, just reply to this email info@aceg.info we are always happy to help out.</p>
		//                         </td>
		//                     </tr>
		// <tr>
		//             <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
		//                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
		//                     <tr>
		//                         <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
		//                             <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
		//                             <p style="margin: 0;"><a href="'.base_url().'contact-us" target="_blank" style="color: #4b0000;">We&rsquo;re here to help you out</a></p>
		//                         </td>
		//                     </tr>
		//                 </table>
		//             </td>
		//         </tr>

		$subject = 'Accept Terms & Conditions |' . no_reply_name;

		$to = array(
			"email" => $profile->email,
			"name" => $profile->student_name,
		);
		// $to = array(
		// 	"email" => 'anpathak252531@gmail.com',
		// 	"name" => 'anpathak',
		// );

		$this->send_send_blue($to, $subject, $message);

		return true;
	}
	public function send_send_blue($to, $subject, $message)
	{
		$data = array(
			"sender" => array(
				"email" => no_reply_mail,
				"name" => no_reply_name
			),
			"to" => array(
				$to
			),
			"subject" => $subject,
			"htmlContent" => $message

		);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Api-Key: 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';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		//    print_r($ch);
		//    exit;
		return true;
	}

	public function set_pay_transfer_certificate_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_transfer');
		$exist = $exist->row();

		$amount = $this->get_certificate_fees('1');
		if (!empty($amount)) {
			$amount = $amount->certificate_fees;
		} else {
			$amount = '500';
		}
		if (empty($exist)) {
			$data  = array(
				"student_id"	=> $this->session->userdata("student_id"),
				// "amount"		=> '500',
				"amount"		=> $amount,
				"status"		=> '1',
				// "status"		=> '0',
				"created_on"	=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_student_transfer", $data);
			$id = $this->db->insert_id();
		} else {
			$data  = array(
				"student_id"	=> $this->session->userdata("student_id"),
				// "amount"		=> '500',
				"amount"		=> $amount,
				"status"		=> '1',
				// "status"		=> '0', 
			);
			$this->db->where('id', $exist->id);
			$this->db->update("tbl_student_transfer", $data);
			$id = $exist->id;
		}
		$this->db->select("tbl_student_transfer.id,tbl_student_transfer.amount,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
		$this->db->where("tbl_student_transfer.id", $id);
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_transfer.student_id");
		$result = $this->db->get("tbl_student_transfer")->row();
		return $result;
	}
	public function get_transcript()
	{
		$this->db->where('registration_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_transcript');
		return $result->row();
	}
	public function set_transcript_form()
	{
		$profile = $this->get_student_profile();
		$data = array(
			'enrollment_number' => $profile->enrollment_number,
			'registration_id'   => $this->session->userdata('student_id'),
			'course_duration'   => $this->input->post('duration_of_course'),
			'year_of_passing'   => $this->input->post('year_of_passing'),
			'credit_note'   	=> $this->input->post('credit_note'),
			'issue_date'   		=> date("Y-m-d", strtotime($this->input->post('issue_date'))),
			'payment_date'      => date("Y-m-d"),
			'created_on'        => date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_transcript', $data);
		$last_id = $this->db->insert_id();
		$sem = $this->input->post('sem');
		$subject = $this->input->post('subject');
		$type = $this->input->post('type');
		$max_mark = $this->input->post('max_mark');
		$obtained = $this->input->post('obtained');
		$detail_arr = array();
		if (!empty($sem)) {

			for ($i = 0; $i < count($sem); $i++) {
				$detail_arr[] = array(
					'transcript_id' => $last_id,
					'sem'           => $sem[$i],
					'subject'       => $subject[$i],
					'type'          => $type[$i],
					'max_mark'      => $max_mark[$i],
					'obtained'      => $obtained[$i],
					'created_on'    => date("Y-m-d H:i:s")
				);
			}
			if (!empty($detail_arr)) {
				$this->db->insert_batch('tbl_transcript_details', $detail_arr);
			}
		}
		return true;
	}
	public function get_print_transcript()
	{
		$this->db->select('tbl_transcript.*,tbl_transcript_details.sem,tbl_student.student_name,tbl_student.course_id,tbl_student.enrollment_number,tbl_course.print_name,tbl_stream.stream_name');
		$this->db->where('tbl_transcript.registration_id', $this->session->userdata('student_id'));
		$this->db->where('tbl_transcript.is_deleted', '0');
		$this->db->where('tbl_transcript.status', '1');
		$this->db->where('tbl_transcript.approve_status', '1');
		$this->db->join('tbl_transcript_details', 'tbl_transcript_details.transcript_id = tbl_transcript.id');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_transcript.registration_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->group_by('tbl_transcript_details.sem');
		$this->db->order_by('tbl_transcript_details.sem', 'DESC');
		$result = $this->db->get('tbl_transcript');
		return $result->row();
	}
	public function get_my_consolidated_marksheet()
	{
		// echo "<pre>";print_r($_POST);exit;
		$this->db->select('tbl_consolidated_marksheet.*');
		$this->db->where('tbl_consolidated_marksheet.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet.status', '1');
		//$this->db->where('tbl_consolidated_marksheet.issue_status','1'); 
		$this->db->where('tbl_student.id', $this->session->userdata('student_id'));
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment', 'left');
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->row();
	}
	public function get_this_transcript_subject($sem, $id)
	{
		$this->db->where('sem', $sem);
		$this->db->where('transcript_id', $id);
		$this->db->order_by('type', 'DESC');
		$result = $this->db->get('tbl_transcript_details');
		return $result->result();
	}
	public function get_this_transcript_total($id)
	{
		$this->db->select('sum(obtained) as total_obt,sum(max_mark) as total_mk');
		$this->db->where('transcript_id', $id);
		$result = $this->db->get('tbl_transcript_details');
		return $result->row();
	}
	public function get_consolidated_marksheet_details($id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $id);
		$result = $this->db->get('tbl_consolidated_marksheet_details');
		$result = $result->result();
		return $result;
	}
	public function get_migration_certificate()
	{
		// echo "<pre>";print_r($this->session->userdata("student_id"));exit;
		$this->db->select("tbl_student_migration.*,tbl_stream.stream_name,tbl_student.student_name,tbl_student.course_id,tbl_student.father_name,tbl_student.enrollment_number,tbl_course.course_name,tbl_course.sort_name,tbl_session.session_start_date");
		$this->db->where("tbl_student_migration.is_deleted", "0");
		// $this->db->where('tbl_student_migration.payment_status',"1");
		$this->db->where("tbl_student_migration.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_migration.student_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$result = $this->db->get("tbl_student_migration")->row();
		return $result;
	}
	public function upload_old_migration_certificate($file)
	{
		if (isset($_REQUEST['save'])) {
			if ($_REQUEST['save'] == 'Upload_Form') {
				$data = array(
					'old_migration' => $file,
				);
				$this->db->where('id', $this->session->userdata('student_id'));
				$this->db->update('tbl_student', $data);
			}
		}
	}
	public function send_accept_migration_undertaking()
	{
		$profile = $this->get_student_profile();
		$from_email = no_reply_mail;
		$message = '
			<!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            @media screen {
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 400;
                                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 700;
                                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family:  "Lato";
                                    font-style: italic;
                                    font-weight: 400;
                                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: v
                                    font-style: italic;
                                    font-weight: 700;
                                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                                }
                            }
                    
                            /* CLIENT-SPECIFIC STYLES */
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                    
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                    
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                    
                            /* RESET STYLES */
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                    
                            table {
                                border-collapse: collapse !important;
                            }
                    
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                    
                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                    
                            /* MOBILE STYLES */
                            @media screen and (max-width:600px) {
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }
                    
                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    </head> 
                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#4b0000" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#4b0000" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 35px; font-weight: 400; margin: 2;">Undertaking for Migration Certificate!</h1> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">We are excited to have you get started to applying for migration certificate. First, you need to accept our term and conditions. Just press the button below.</p>
                            <br>
                            <p style="margin: 0;">
                             I solemnly declare and confirm that I have submitted documents are ture, if any false document is found that is submitted by me  then university can cancel/terminate my admission at any time without any prior notice.
                              </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#4b0000"><a href="' . base_url() . 'accept_migration_terms/' . base64_encode($profile->id) . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #4b0000; display: inline-block;">I Accept</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If that doesnt work, copy and paste the following link in your browser:</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="' . base_url() . 'accept_migration_terms/' . base64_encode($profile->id) . '" target="_blank" style="color: #4b0000;">' . base_url() . 'accept_migration_terms/' . base64_encode($profile->id) . '</a></p>
                             
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, just reply to this email info@aceg.info we are always happy to help out.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Cheers,<br>IT Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                            <p style="margin: 0;"><a href="' . base_url() . 'contact-us" target="_blank" style="color: #4b0000;">We&rsquo;re here to help you out</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
         
    </table>
</body>

</html>
			';
		//   echo "$message";exit();
		$subject = 'Accept Terms & Conditions | ' . no_reply_name;
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = smtp_host;
		$config['smtp_port'] = 587;
		$config['smtp_user'] = smtp_user;
		$config['smtp_pass'] = smtp_pass;
		$config['newline'] = "\r\n";
		$this->load->library('email');

		$this->email->initialize($config);
		$this->email->from(no_reply_mail, no_reply_name);
		$this->email->to($profile->email);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->set_mailtype('html');
		if ($this->email->send()) {
		} else {
		}
		return true;
	}
	public function set_pay_migration_certificate_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_migration');
		$exist = $exist->row();
		// print_r($exist);exit;
		$amount = $this->get_certificate_fees('0');
		// print_r($amount);exit;
		if (!empty($amount)) {
			$certificate_amount = $amount->certificate_fees;
		} else {
			$certificate_amount = '500';
		}
		$data  = array(
			"student_id"	=> $this->session->userdata("student_id"),
			// "amount"		=> '500',
			"amount"		=> $certificate_amount,
			//"amount"		=> '1',
			"issue_date"	=> date("Y-m-d"),
			"created_on"	=> date("Y-m-d H:i:s"),
		);
		if (empty($exist)) {
			$this->db->insert("tbl_student_migration", $data);
			$id = $this->db->insert_id();
		} else {
			$this->db->where('student_id', $this->session->userdata("student_id"));
			$this->db->update("tbl_student_migration", $data);
			$id = $exist->id;
		}
		$this->db->select("tbl_student_migration.id,tbl_student_migration.amount,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
		$this->db->where("tbl_student_migration.student_id", $this->session->userdata('student_id'));
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_migration.student_id");
		$result = $this->db->get("tbl_student_migration")->row();
		return $result;
	}


	public function get_migration_certificate_amount()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_migration');
		$exist = $exist->row();
		if (empty($exist)) {
			$amount = $this->get_certificate_fees('0');
			if (!empty($amount)) {
				$exist = $amount->certificate_fees;
			} else {
				$exist = '500';
			}
			return $exist;
		}
		return $exist;
	}









	public function get_single_consolidated_markshhet()
	{
		$profile = $this->get_student_profile();
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment', $profile->enrollment_number);
		$result = $this->db->get('tbl_consolidated_marksheet');
		$result =  $result->row();
		return $result;
	}
	public function get_last_exam_year($student)
	{
		$this->db->where('student_id', $student);
		$this->db->where('exam_status', '1');
		$this->db->where('payment_status', '1');
		$this->db->order_by('year_sem', 'DESC');
		$result = $this->db->get('tbl_examination_form');
		return $result->row();
	}
	public function get_selected_semester_subject_for_result($marksheet_id, $sem)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $marksheet_id);
		$this->db->where('year_sem', $sem);
		$this->db->order_by('year_sem,subject_code', 'ASC');
		$this->db->limit($limit, $start);
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		return $result->result();
	}
	public function get_selected_subject_for_result_loop($id, $limit, $start)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $id);
		$this->db->order_by('year_sem,subject_code', 'ASC');
		$this->db->limit($limit, $start);
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		return $result->result();
	}
	public function get_selected_marksheet_course_stream_details($course_id, $stream_id, $course_type, $course_mode)
	{
		$this->db->where('course', $course_id);
		$this->db->where('stream', $stream_id);
		$this->db->where('course_type', $course_type);
		$this->db->where('course_mode', $course_mode);
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->row();
	}
	public function get_total_marks_cons($year_sem, $id)
	{
		$this->db->select('SUM(tbl_consolidated_marksheet_details.total_marks) as sum_total_mark');
		$this->db->where('tbl_consolidated_marksheet_details.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet_details.consolidate_id', $id);
		$this->db->where('tbl_consolidated_marksheet_details.year_sem', $year_sem);
		$this->db->join('tbl_consolidated_marksheet', 'tbl_consolidated_marksheet.id = tbl_consolidated_marksheet_details.consolidate_id');
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		$result = $result->row();
		if (!empty($result)) {
			return $result->sum_total_mark;
		} else {
			return 0;
		}
	}
	public function get_total_obt_marks_cons($year_sem, $id)
	{
		//$this->db->select('SUM(tbl_consolidated_marksheet_details.internal_mark) as sum_internal_mark, SUM(tbl_consolidated_marksheet_details.external_mark) as sum_external_mark');
		$this->db->where('tbl_consolidated_marksheet_details.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet_details.consolidate_id', $id);
		$this->db->where('tbl_consolidated_marksheet_details.year_sem', $year_sem);
		//$this->db->join('tbl_consolidated_marksheet','tbl_consolidated_marksheet.id = tbl_consolidated_marksheet_details.consolidate_id');
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		$result = $result->result();
		$total = 0;
		if (!empty($result)) {
			foreach ($result as $result_arr) {
				$total += $result_arr->internal_mark + $result_arr->external_mark;
			}
			return $total;
		} else {
			return 0;
		}
	}
	public function get_student_last_exam_month_year($student_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('student_id', $student_id);
		$this->db->order_by('year_sem', 'DESC');
		$result = $this->db->get('tbl_exam_results');
		$result = $result->row();
		$exam_year_month = '';
		if (!empty($result)) {
			$exam_year_month = $result->examination_month . ' ' . $result->examination_year;
		}
		return $exam_year_month;
	}
	public function get_selected_semester_subject_for_result_consoliddate($marksheet_id, $sem)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $marksheet_id);
		$this->db->where('year_sem', $sem);
		$this->db->order_by('year_sem,subject_code', 'ASC');
		//$this->db->limit($limit,$start);
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		return $result->result();
	}
	public function get_selected_subject_for_result_consolidate($id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $id);
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		return $result->num_rows();
	}
	public function get_selected_subject_for_result_loop_consolidate($id, $limit, $start)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $id);
		$this->db->order_by('year_sem,subject_code', 'ASC');
		$this->db->limit($limit, $start);
		$result =  $this->db->get('tbl_consolidated_marksheet_details');
		return $result->result();
	}
	public function get_my_topic()
	{
		$profile = $this->get_student_profile();
		/*$this->db->where('course_id',$profile->course_id);
		$this->db->where('stream_id',$profile->stream_id);
		$this->db->where('year_sem',$profile->year_sem);*/
		$this->db->where('status', '1');
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_course_topic');
		return $result->result();
	}
	public function get_single_my_topic()
	{
		$profile = $this->get_student_profile();
		/*$this->db->where('course_id',$profile->course_id);
		$this->db->where('stream_id',$profile->stream_id);
		$this->db->where('year_sem',$profile->year_sem);*/
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$this->db->where('status', '1');
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_course_topic');
		return $result->row();
	}
	public function get_topic_pdf()
	{
		$this->db->where('status', '1');
		$this->db->where('is_deleted', '0');
		$this->db->where('topic_id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_topic_pdf');
		return $result->result();
	}
	public function get_topic_video()
	{
		$this->db->where('status', '1');
		$this->db->where('is_deleted', '0');
		$this->db->where('topic_id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_topic_video');
		return $result->result();
	}
	public function update_student_document($identity_file)
	{
		$data = array(
			'id_type'	  			=> $this->input->post('id_type'),
			'id_number'	      	=> $this->input->post('identity_numer'),
			'identity_softcopy'  	=> $identity_file,
		);
		$this->db->where('id', $this->session->userdata('student_id'));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function upload_progress_report_one($file)
	{
		$data = array(
			'student_id'	  	=> $this->session->userdata('student_id'),
			'report_one'	    => $file,
		);
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_progree_report');
		$exist = $exist->row();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_student_progree_report', $new_arr);
		} else {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$this->db->update('tbl_student_progree_report', $data);
		}
		return true;
	}
	public function upload_progress_report_two($file)
	{
		$data = array(
			'student_id'	  	=> $this->session->userdata('student_id'),
			'report_two'	    => $file,
		);
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_progree_report');
		$exist = $exist->row();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_student_progree_report', $new_arr);
		} else {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$this->db->update('tbl_student_progree_report', $data);
		}
		return true;
	}
	public function upload_progress_report_three($file)
	{
		$data = array(
			'student_id'	  	=> $this->session->userdata('student_id'),
			'report_three'	=> $file,
		);
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_progree_report');
		$exist = $exist->row();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_student_progree_report', $new_arr);
		} else {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$this->db->update('tbl_student_progree_report', $data);
		}
		return true;
	}
	public function upload_progress_report_four($file)
	{
		$data = array(
			'student_id'	  	=> $this->session->userdata('student_id'),
			'report_four'		=> $file,
		);
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_progree_report');
		$exist = $exist->row();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_student_progree_report', $new_arr);
		} else {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$this->db->update('tbl_student_progree_report', $data);
		}
		return true;
	}
	public function upload_progress_report_five($file)
	{
		$data = array(
			'student_id'	  	=> $this->session->userdata('student_id'),
			'report_five'	    => $file,
		);
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_progree_report');
		$exist = $exist->row();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_student_progree_report', $new_arr);
		} else {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$this->db->update('tbl_student_progree_report', $data);
		}
		return true;
	}


	public function upload_progress_report_six($file)
	{
		$data = array(
			'student_id'	  	=> $this->session->userdata('student_id'),
			'report_six'	    => $file,
		);
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_progree_report');
		$exist = $exist->row();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_student_progree_report', $new_arr);
		} else {
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$this->db->update('tbl_student_progree_report', $data);
		}
		return true;
	}

	public function get_my_progress_report_research()
	{
		$profile = $this->get_student_profile();
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_student_progree_report');
		return $result->row();
	}

	//thesis,synopsis,abstract
	public function get_single_thesis_submission()
	{
		$this->db->select('tbl_thesis.*,tbl_student.student_name,tbl_student.father_name,tbl_student.enrollment_number,tbl_guide_application.name as guide_name');
		$this->db->where('tbl_thesis.student_id', $this->session->userdata('student_id'));
		$this->db->where('tbl_thesis.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_thesis.student_id');
		$this->db->join('tbl_guide_application', 'tbl_guide_application.id = tbl_thesis.guide_id');
		$result = $this->db->get('tbl_thesis');
		return $result->row();
	}
	public function get_active_guide_list()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('appliation_status', '1');
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function insert_thesis_submission($file1)
	{
		$student = $this->get_student_profile();
		// print_r($student);exit();
		if ($file1 == "") {
			$file1 = $this->input->post("softcopy");
		}
		$data = array(
			'student_id'   	  => $this->session->userdata('student_id'),
			'stream_id'         => $student->stream_id,
			'center_id'         => $student->center_id,
			'thesis_title'      => $this->input->post('thesis_title'),
			'softcopy'		  => $file1,
			'paper_journal1'    => $this->input->post('paper_journal1'),
			'guide_id'          => $this->input->post('name'),
		);
		// print_r($data);exit();
		if ($this->input->post('hidden_id') == "") {
			$date = array(
				'created_on' => date('Y-m-d H:i:s'),
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_thesis', $new_arr);
			return 1;
		} else {
			$this->db->where('id', $this->input->post('hidden_id'));
			$this->db->update('tbl_thesis', $data);
			return 0;
		}
	}
	public function get_single_synopsis_thesis()
	{
		$this->db->select('tbl_synopsis.*,tbl_student.student_name,tbl_student.father_name,tbl_student.enrollment_number,tbl_guide_application.name as guide_name');
		$this->db->where('tbl_synopsis.student_id', $this->session->userdata('student_id'));
		$this->db->where('tbl_synopsis.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_synopsis.student_id');
		$this->db->join('tbl_guide_application', 'tbl_guide_application.id = tbl_synopsis.guide_id');
		$this->db->order_by('tbl_synopsis.id', 'DESC');
		$result = $this->db->get('tbl_synopsis');
		return $result->row();
	}
	public function get_active_guide_synopsis_list()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('appliation_status', '1');
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function insert_synopsis_thesis_submission($file1)
	{
		$student = $this->get_student_profile();
		if ($file1 == "") {
			$file1 = $this->input->post("soft_copy");
		}
		$data = array(
			'student_id'   	  => $this->session->userdata('student_id'),
			'student_name'	  => $student->student_name,
			'father_name'	      => $student->father_name,
			'stream_id'         => $student->stream_id,
			'center_id'         => $student->center_id,
			'thesis_title'      => $this->input->post('thesis_title'),
			'soft_copy'		  => $file1,
			'guide_id'          => $this->input->post('name'),
		);
		// print_r($data);exit();
		//if($this->input->post('hidden_id') == ""){
		$date = array(
			'created_on' => date('Y-m-d H:i:s'),
		);
		$new_arr = array_merge($data, $date);
		$this->db->insert('tbl_synopsis', $new_arr);
		return 1;
		/*}else{
			$this->db->where('id',$this->input->post('hidden_id'));
			$this->db->update('tbl_synopsis',$data);
			return 0;
		}*/
	}
	public function get_single_abstract()
	{
		$this->db->select('tbl_abstract.*,tbl_student.student_name');
		$this->db->where('tbl_abstract.student_id', $this->session->userdata('student_id'));
		$this->db->where('tbl_abstract.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_abstract.student_id');
		$result = $this->db->get('tbl_abstract');
		return $result->row();
	}
	public function insert_abstract($file1)
	{
		$student = $this->get_student_profile();
		if ($file1 == "") {
			$file1 = $this->input->post("upload_report");
		}
		$data = array(
			'student_id'   	  => $this->session->userdata('student_id'),
			'upload_report'	  => $file1,
			'remark'            => $this->input->post('remark'),
			'created_on'        => date('Y-m-d H:i:s'),
		);
		// print_r($data);exit();
		$this->db->insert('tbl_abstract', $data);
		return 1;
	}

	public function get_my_exams()
	{
		$profile = $this->get_student_profile();
		/*$this->db->where('course_id',$profile->course_id);
		$this->db->where('stream_id',$profile->stream_id);
		$this->db->where('year_sem',$profile->year_sem);*/
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_yearly_exam');
		return $result->result();
	}


	public function get_test_paper_question()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('exam_id', base64_encode($this->uri->segment(2)));
		$this->db->order_by('id', 'RANDOM');
		$result = $this->db->get('tbl_question_data');
		$paper_set = $result->row();

		if ($paper_set) {
			$paper_set_value = $paper_set->paper_set;
			$this->db->select('tbl_mcq_question.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
			$this->db->where('tbl_mcq_question.is_deleted', '0');
			$this->db->where('tbl_mcq_question.audio_question_description_id ', '0');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_question_data', 'tbl_mcq_question.question_data_id=tbl_question_data.id');
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
			$res = $this->db->get('tbl_mcq_question');
			$mcq_question = $res->result();
			$this->db->select('tbl_fill_in_blank_question.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
			$this->db->where('tbl_fill_in_blank_question.is_deleted', '0');
			$this->db->where('tbl_fill_in_blank_question.audio_question_description_id ', '0');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_question_data', 'tbl_fill_in_blank_question.question_data_id=tbl_question_data.id');
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
			$this->db->limit(5);
			$res = $this->db->get('tbl_fill_in_blank_question');
			$fill_blank_question = $res->result();
			$this->db->select('tbl_one_word_question.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
			$this->db->where('tbl_one_word_question.is_deleted', '0');
			$this->db->where('tbl_one_word_question.audio_question_description_id ', '0');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_question_data', 'tbl_one_word_question.question_data_id=tbl_question_data.id');
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
			$this->db->limit(5);
			$res = $this->db->get('tbl_one_word_question');
			$one_word_question = $res->result();
			$this->db->select('tbl_tick_mark_question.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
			$this->db->where('tbl_tick_mark_question.is_deleted', '0');
			$this->db->where('tbl_tick_mark_question.audio_question_description_id ', '0');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_question_data', 'tbl_tick_mark_question.question_data_id=tbl_question_data.id');
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
			$this->db->limit(5);
			$res = $this->db->get('tbl_tick_mark_question');
			$tick_mark_question = $res->result();
			$this->db->select('tbl_passage_reading_description.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.paper_set');
			$this->db->where('tbl_passage_reading_description.is_deleted', '0');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_question_data', 'tbl_passage_reading_description.question_data_id=tbl_question_data.id');
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
			$passage_question = $this->db->get('tbl_passage_reading_description')->result_array();

			foreach ($passage_question as &$ress) {
				$questions = $this->get_passage_question_test_paper($ress["id"], $ress["paper_set"]);
				$ress["questions"] = $questions;
			}

			$this->db->select('tbl_picture_question_description.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.paper_set');
			$this->db->where('tbl_picture_question_description.is_deleted', '0');
			$this->db->join('tbl_question_data', 'tbl_picture_question_description.question_data_id=tbl_question_data.id');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');

			$picture_question = $this->db->get('tbl_picture_question_description')->result_array();

			foreach ($picture_question as &$response) {
				$questions = $this->get_picture_question_test_paper($response["id"], $response["paper_set"]);
				$response["questions"] = $questions;
			}
			$this->db->select('tbl_match_the_following.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
			$this->db->where('tbl_match_the_following.is_deleted', '0');
			$this->db->join('tbl_question_data', 'tbl_match_the_following.question_data_id=tbl_question_data.id');
			$this->db->where('tbl_question_data.paper_set', $paper_set_value);
			$this->db->where('tbl_question_data.exam_id', $this->input->post('exam_id'));
			$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
			$res = $this->db->get('tbl_match_the_following');
			$match_following = $res->result();

			$question = array_merge($mcq_question, $fill_blank_question, $one_word_question, $picture_question, $tick_mark_question, $passage_question, $match_following);
			echo  json_encode($question);
		}
	}
	public function get_picture_question_test_paper($rel_id, $paper_set)
	{
		$this->db->select('tbl_picture_question.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
		$this->db->where("tbl_picture_question.question_description_id", $rel_id);
		$this->db->where_in('tbl_question_data.question_category', array(2, 3));
		$this->db->join('tbl_question_data', 'tbl_picture_question.question_data_id=tbl_question_data.id');
		$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
		$this->db->join('tbl_picture_question_description', 'tbl_picture_question.question_description_id=tbl_picture_question_description.id');
		$this->db->where('tbl_picture_question.is_deleted', '0');
		$this->db->where('tbl_question_data.paper_set', $paper_set);
		$res = $this->db->get('tbl_picture_question');
		return $res->result_array();
	}
	public function get_passage_question_test_paper($rel_id, $paper_set)
	{
		$this->db->select('tbl_passage_reading_question.*,tbl_yearly_exam.exam_name,tbl_question_data.question_type,tbl_question_data.course_name,tbl_question_data.paper_set');
		$this->db->where("tbl_passage_reading_question.question_description_id", $rel_id);
		$this->db->where_in('tbl_question_data.question_category', array(2, 3));
		$this->db->join('tbl_question_data', 'tbl_passage_reading_question.question_data_id=tbl_question_data.id');
		$this->db->join('tbl_yearly_exam', 'tbl_yearly_exam.id = tbl_question_data.exam_id');
		$this->db->join('tbl_passage_reading_description', 'tbl_passage_reading_question.question_description_id=tbl_passage_reading_description.id');
		$this->db->where('tbl_passage_reading_question.is_deleted', '0');
		$this->db->where('tbl_question_data.paper_set', $paper_set);
		$res = $this->db->get('tbl_passage_reading_question');
		return $res->result_array();
	}
	public function get_course_id_exam($exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $exam_id);
		$result = $this->db->get('tbl_yearly_exam');
		echo $result->row()->id;
	}
	public function get_single_exams()
	{
		$profile = $this->get_student_profile();
		$this->db->where('course_id', $profile->course_id);
		$this->db->where('stream_id', $profile->stream_id);
		$this->db->where('year_sem', $profile->year_sem);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_yearly_exam');
		return $result->row();
	}
	public function set_paper_set()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('paper_set', 'RANDOM');
		$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_mcq_question');
		$result = $result->row();
		if (empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('paper_set', 'RANDOM');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$result = $this->db->get('tbl_fill_in_blank_question');
			$result = $result->row();
		} else if (empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('paper_set', 'RANDOM');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$result = $this->db->get('tbl_one_word_question');
			$result = $result->row();
		} else if (empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('paper_set', 'RANDOM');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$result = $this->db->get('tbl_picture_question_description');
			$result = $result->row();
		} else if (empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('paper_set', 'RANDOM');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$result = $this->db->get('tbl_tick_mark_question');
			$result = $result->row();
		} else if (empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('paper_set', 'RANDOM');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$result = $this->db->get('tbl_passage_reading_description');
			$result = $result->row();
		} else if (empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('paper_set', 'RANDOM');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$result = $this->db->get('tbl_match_the_following');
			$result = $result->row();
		}
		if (!empty($result)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
			$this->db->where('student_id', $this->session->userdata('student_id'));
			$exist = $this->db->get('tbl_yearly_attempted_exam');
			$exist = $exist->row();
			if (empty($exist)) {
				$data = array(
					'student_id' 	=> $this->session->userdata('student_id'),
					'exam_id' 		=> base64_decode($this->uri->segment(2)),
					'paper_set' 	=> $result->paper_set,
					'created_on' 	=> date("Y-m-d H:i:s")
				);
				$this->db->insert('tbl_yearly_attempted_exam', $data);
			}
		}
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('exam_id', base64_decode($this->uri->segment(2)));
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$paper_set = $this->db->get('tbl_yearly_attempted_exam');
		return $paper_set->row();
	}

	public function get_course_id_test($exam_id)
	{
		$this->db->where('tbl_yearly_exam.is_deleted', '0');
		$this->db->where('tbl_yearly_exam.id', $exam_id);
		$result = $this->db->get('tbl_yearly_exam');
		$res = $result->row();
		return $res->id;
	}
	public function get_exam_paper_mcq($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_mcq_question');
		return $result->result();
	}
	public function get_exam_paper_fill($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_fill_in_blank_question');
		return $result->result();
	}
	public function get_exam_paper_one_word($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_one_word_question');
		return $result->result();
	}
	public function get_exam_paper_passage($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_passage_reading_description');
		return $result->result();
	}
	public function get_passage_selected_question($passage)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('question_description_id', $passage);
		$result = $this->db->get('tbl_passage_reading_question');
		return $result->result();
	}
	public function get_exam_paper_match($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_match_the_following');
		return $result->result();
	}
	public function get_exam_paper_tick_mark($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_tick_mark_question');
		return $result->result();
	}
	public function get_exam_paper_picture($paper_set, $exam_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('paper_set', $paper_set);
		$this->db->where('exam_id', $exam_id);
		$result = $this->db->get('tbl_picture_question_description');
		return $result->result();
	}
	public function get_picture_selected_question($picture)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('question_description_id', $picture);
		$result = $this->db->get('tbl_picture_question');
		return $result->result();
	}
	public function set_given_exam()
	{
		$data = array();
		$right = 0;
		$question = $this->input->post('question');
		/*----
			size[0] = Question ID
			size[1] = Given Answer
			size[2] = Question Type	[1=mcq,2=fill in the blank,3=one word,4=picture,5=tick mark,6=passage,7=Match the following] 
		---*/
		for ($i = 0; $i < count($question); $i++) {
			$exp = explode("-", $question[$i]);
			if ($exp[2] == "1") {
				$this->db->where('id', $exp[0]);
				$master = $this->db->get('tbl_mcq_question');
				$master = $master->row();
				$asnwer = '1';
				if ($exp[1] == $master->option_a && $master->correct_answer == "A") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_b && $master->correct_answer == "B") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_c && $master->correct_answer == "C") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_d && $master->correct_answer == "D") {
					$asnwer = '0';
				}
				if ($asnwer == "0") {
					$right++;
				}
				$data[] = array(
					'exam_id'	 		=> base64_decode($this->input->post('exam_id')),
					'attempt_id'	 	=> $this->input->post('attempt'),
					'question_id' 		=> $exp[0],
					'question_type' 	=> '1',
					'correct_answer'	=> $master->correct_answer,
					'given_answer' 		=> $exp[1],
					'answer' 			=> $asnwer,
					'marks'	 			=> $master->marks,
					'created_on'	 	=> date("Y-m-d H:i:s"),
				);
			} else if ($exp[2] == "2") {
				$this->db->where('id', $exp[0]);
				$master = $this->db->get('tbl_fill_in_blank_question');
				$master = $master->row();
				$given_answer = explode(",", $exp[1]);
				$options = explode(",", $master->fill_blank_option);
				$correct_options = explode(",", $master->correct_answer);
				$asnwer = "1";
				for ($a = 0; $a < count($given_answer) - 1; $a++) {
					$asnwer = "1";
					if ($given_answer[$a] == $correct_options[$a]) {
					} else {
						$asnwer = "1";
					}
				}
				if ($asnwer == "0") {
					$right++;
				}
				$data[] = array(
					'exam_id'	 		=> base64_decode($this->input->post('exam_id')),
					'attempt_id'	 	=> $this->input->post('attempt'),
					'question_id' 		=> $exp[0],
					'question_type' 	=> '2',
					'correct_answer'	=> $master->correct_answer,
					'given_answer' 		=> $exp[1],
					'answer' 			=> $asnwer,
					'marks'	 			=> $master->marks,
					'created_on'	 	=> date("Y-m-d H:i:s"),
				);
			} else if ($exp[2] == "4") {
				$this->db->where('id', $exp[0]);
				$master = $this->db->get('tbl_picture_question');
				$master = $master->row();
				$asnwer = '1';
				if ($exp[1] == $master->option_a && $master->correct_answer == "A") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_b && $master->correct_answer == "B") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_c && $master->correct_answer == "C") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_d && $master->correct_answer == "D") {
					$asnwer = '0';
				}
				if ($asnwer == "0") {
					$right++;
				}
				$data[] = array(
					'exam_id'	 		=> base64_decode($this->input->post('exam_id')),
					'attempt_id'	 	=> $this->input->post('attempt'),
					'question_id' 		=> $exp[0],
					'question_type' 	=> '4',
					'correct_answer'	=> $master->correct_answer,
					'given_answer' 		=> $exp[1],
					'answer' 			=> $asnwer,
					'marks'	 			=> $master->marks,
					'created_on'	 	=> date("Y-m-d H:i:s"),
				);
			} else if ($exp[2] == "5") {
				$this->db->where('id', $exp[0]);
				$master = $this->db->get('tbl_tick_mark_question');
				$master = $master->row();
				$asnwer = '1';
				if ($exp[1] == $master->option_a && $master->correct_answer == "A") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_b && $master->correct_answer == "B") {
					$asnwer = '0';
				}
				if ($asnwer == "0") {
					$right++;
				}
				$data[] = array(
					'exam_id'	 		=> base64_decode($this->input->post('exam_id')),
					'attempt_id'	 	=> $this->input->post('attempt'),
					'question_id' 		=> $exp[0],
					'question_type' 	=> '5',
					'correct_answer'	=> $master->correct_answer,
					'given_answer' 		=> $exp[1],
					'answer' 			=> $asnwer,
					'marks'	 			=> $master->marks,
					'created_on'	 	=> date("Y-m-d H:i:s"),
				);
			} else if ($exp[2] == "6") {
				$this->db->where('id', $exp[0]);
				$master = $this->db->get('tbl_passage_reading_question');
				$master = $master->row();
				$asnwer = '1';
				if ($exp[1] == $master->option_a && $master->correct_answer == "A") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_b && $master->correct_answer == "B") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_c && $master->correct_answer == "C") {
					$asnwer = '0';
				} else if ($exp[1] == $master->option_d && $master->correct_answer == "D") {
					$asnwer = '0';
				}
				if ($asnwer == "0") {
					$right++;
				}
				$data[] = array(
					'exam_id'	 		=> base64_decode($this->input->post('exam_id')),
					'attempt_id'	 	=> $this->input->post('attempt'),
					'question_id' 		=> $exp[0],
					'question_type' 	=> '5',
					'correct_answer'	=> $master->correct_answer,
					'given_answer' 		=> $exp[1],
					'answer' 			=> $asnwer,
					'marks'	 			=> $master->marks,
					'created_on'	 	=> date("Y-m-d H:i:s"),
				);
			}
		}
		if (!empty($data)) {
			$this->db->insert_batch('tbl_yearly_attempted_exam_questions', $data);
		}
		$total_mark = array(
			'gain_mark' => $right
		);
		$this->db->where('id', $this->input->post('attempt'));
		$this->db->update('tbl_yearly_attempted_exam', $total_mark);
		return true;
	}
	public function get_marquee_news()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_marquee_news');
		return $result->result();
	}
	public function set_exam_photo($photo, $exam)
	{
		$data = array(
			'student_id' 	=> $this->session->userdata('student_id'),
			'exam_id' 		=> base64_decode($exam),
			'photo' 		=> $photo,
			'created_on' 	=> date("Y-m-d H:"),
		);
		$this->db->insert('tbl_exam_photo', $data);
		redirect('start-exam/' . $exam);
	}
	public function get_student_degree()
	{
		$this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.course_id,tbl_student.stream_id,tbl_student.father_name,tbl_student.enrollment_number,tbl_student.photo,tbl_session.session_start_date,tbl_course.course_name,tbl_course.print_name,tbl_stream.stream_name");
		$this->db->where("tbl_student_degree.is_deleted", "0");
		$this->db->where("tbl_student_degree.payment_status", "1");
		$this->db->where("tbl_student_degree.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_degree.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_student_degree")->row();
		return $result;
	}
	public function get_year_duration($course, $stream)
	{
		$this->db->where('course', $course);
		$this->db->where('stream', $stream);
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->row();
	}
	public function send_degree_terms()
	{
		$profile = $this->get_student_profile();
		$from_email = "no-reply@tgu.ac.in";

		$message = '
			<!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            @media screen {
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 400;
                                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 700;
                                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family:  "Lato";
                                    font-style: italic;
                                    font-weight: 400;
                                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: v
                                    font-style: italic;
                                    font-weight: 700;
                                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                                }
                            }
                    
                            /* CLIENT-SPECIFIC STYLES */
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                    
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                    
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                    
                            /* RESET STYLES */
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                    
                            table {
                                border-collapse: collapse !important;
                            }
                    
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                    
                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                    
                            /* MOBILE STYLES */
                            @media screen and (max-width:600px) {
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }
                    
                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    </head> 
                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<!-- LOGO -->
							<tr>
								<td bgcolor="#4b0000" align="center">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#4b0000" align="center" style="padding: 0px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
												<h1 style="font-size: 35px; font-weight: 400; margin: 2;">Undertaking for Degree!</h1> <img src="https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">We are excited to have you get started to applying for  degree. First, you need to accept our term and conditions. Just press the button below.</p>
												<br>
												<p style="margin: 0;">
												 I solemnly declare and confirm that I have submitted documents are ture, if any false document is found that is submitted by me  then university can cancel/terminate my admission at any time without any prior notice.
												  </p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" align="left">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td align="center" style="border-radius: 3px;" bgcolor="#4b0000"><a href="' . base_url() . 'accept_provisional_terms/' . base64_encode($profile->id) . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #4b0000; display: inline-block;">I Accept</a></td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr> <!-- COPY -->
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">If that doesnt work, copy and paste the following link in your browser:</p>
											</td>
										</tr> <!-- COPY -->
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;"><a href="' . base_url() . 'accept_degree_terms/' . base64_encode($profile->id) . '" target="_blank" style="color: #4b0000;">' . base_url() . 'accept_degree_terms/' . base64_encode($profile->id) . '</a></p>
												 
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">If you have any questions, just reply to this email info@aceg.info we are always happy to help out.</p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<p style="margin: 0;">Cheers,<br>IT Team</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
												<h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
												<p style="margin: 0;"><a href="' . base_url() . 'contact-us" target="_blank" style="color: #4b0000;">We&rsquo;re here to help you out</a></p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							 
						</table>
					</body> 
					</html>';

		$subject = 'Accept Terms & Conditions | The Global University';

		$to = array(
			"email" => $profile->email,
			"name" => $profile->student_name,
		);
		$this->send_send_blue($to, $subject, $message);
		return true;
	}

	public function set_pay_degree_fees()
	{
		// $profile = $this->get_student_profile();
		// $amount = 3500; 
		// if($profile->center_id == "9"){
		// 	$amount = 10000; 	
		// }
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_degree');
		$exist = $exist->row();
		if (empty($exist)) {
			$amount = $this->get_certificate_fees('2');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '3500';
			}
			/*$FourDigitRandomNumber = rand(1231,7879); 
			$randomCharacters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
			$randomDigits = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
			$randomString = $randomCharacters . $randomDigits;*/
			$data  = array(
				"student_id"	=> $this->session->userdata("student_id"),
				"amount"		=> $amount,
				"created_on"	=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_student_degree", $data);
			$id = $this->db->insert_id();
			// $pass_year = $this->get_student_division_for_degree_new_degree();
			// $degree_sr = array(
			// 	'sr_no' => "IDZ".$pass_year['date'].$this->session->userdata("student_id")
			// );
			// $this->db->where('id',$id);
			// $this->db->update('tbl_student_degree',$degree_sr);
		} else {
			$pass_year = $this->get_student_division_for_degree_new_degree();
			$degree_sr = array(
				'sr_no' => "IDZ" . $pass_year['date'] . $this->session->userdata("student_id")
			);
			$this->db->where('id', $id);
			$this->db->update('tbl_student_degree', $degree_sr);
			$id = $exist->id;
		}
		$this->db->select("tbl_student_degree.id,tbl_student_degree.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");

		$this->db->where("tbl_student_degree.id", $id);
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_degree.student_id");
		$result = $this->db->get("tbl_student_degree")->row();
		return $result;
	}





	public function get_recommendation_letter()
	{
		// echo "<pre>";print_r($this->session->userdata("student_id"));exit;
		$this->db->select("tbl_reccom_letter_application.*,tbl_student.gender,tbl_student.student_name,tbl_student.gender,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_reccom_letter_application.is_deleted", "0");
		// $this->db->where("tbl_reccom_letter_application.payment_status","1");
		$this->db->where("tbl_reccom_letter_application.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_reccom_letter_application.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_reccom_letter_application")->row();
		return $result;

		// echo"<pre>";print_r($result);exit;
	}
	public function set_pay_recommendation_letter_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_reccom_letter_application")->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('8');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount"			=> $certificate_amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_reccom_letter_application", $data);
			$id = $this->db->insert_id();

			$this->db->select("tbl_reccom_letter_application.id,tbl_reccom_letter_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_reccom_letter_application.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_reccom_letter_application.student_id", 'left');
			$result = $this->db->get("tbl_reccom_letter_application")->row();
			return $result;
		} else {
			$this->db->select("tbl_reccom_letter_application.id,tbl_reccom_letter_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_reccom_letter_application.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_reccom_letter_application.student_id", 'left');
			$result = $this->db->get("tbl_reccom_letter_application")->row();
			return $result;
		}
	}




	public function get_recommendation_letter_print()
	{
		$this->db->select("tbl_reccom_letter_application.*,tbl_student.gender,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_reccom_letter_application.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_reccom_letter_application.is_deleted', '0');
		$this->db->where('tbl_reccom_letter_application.status', '1');
		$this->db->where('tbl_reccom_letter_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_reccom_letter_application');
		return $result->row();
	}

	public function get_second_recommendation_letter()
	{
		// echo "<pre>";print_r(base64_decode($this->uri->segment(2)));exit;
		$this->db->select("tbl_reccom_letter_application_second.*,tbl_student.gender,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_reccom_letter_application_second.is_deleted", "0");
		// $this->db->where("tbl_reccom_letter_application_second.payment_status","1");
		$this->db->where("tbl_reccom_letter_application_second.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_reccom_letter_application_second.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_reccom_letter_application_second")->row();
		return $result;
	}
	public function set_pay_second_recommendation_letter_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_reccom_letter_application_second")->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('9');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount"			=> $amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_reccom_letter_application_second", $data);
			$id = $this->db->insert_id();

			$this->db->select("tbl_reccom_letter_application_second.id,tbl_reccom_letter_application_second.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_reccom_letter_application_second.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_reccom_letter_application_second.student_id", 'left');
			$result = $this->db->get("tbl_reccom_letter_application_second")->row();
			return $result;
		} else {
			$this->db->select("tbl_reccom_letter_application_second.id,tbl_reccom_letter_application_second.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_reccom_letter_application_second.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_reccom_letter_application_second.student_id", 'left');
			$result = $this->db->get("tbl_reccom_letter_application_second")->row();
			return $result;
		}
	}
	public function get_second_recommendation_letter_print()
	{
		$this->db->select("tbl_reccom_letter_application_second.*,tbl_student.gender,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_reccom_letter_application_second.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_reccom_letter_application_second.is_deleted', '0');
		$this->db->where('tbl_reccom_letter_application_second.status', '1');
		$this->db->where('tbl_reccom_letter_application_second.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_reccom_letter_application_second');
		return $result->row();
	}


	public function get_student_enrollment($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get('tbl_student')->row();
		if ($result != "") {
			return $result->enrollment_number;
		} else {
			return "";
		}
	}
	public function get_student_bonafide()
	{
		$this->db->select("tbl_bonafide_cer_application.*,tbl_student.gender,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_bonafide_cer_application.is_deleted", "0");
		// $this->db->where("tbl_bonafide_cer_application.payment_status","1");
		$this->db->where("tbl_bonafide_cer_application.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_bonafide_cer_application.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_bonafide_cer_application")->row();
		return $result;
	}
	public function set_pay_bonafide_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_bonafide_cer_application")->row();
		// echo "<pre>";print_r($result);exit;
		if (empty($result)) {
			// echo "<pre>";print_r($result);exit;
			$amount = $this->get_certificate_fees('4');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount"			=> $certificate_amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_bonafide_cer_application", $data);
			$id = $this->db->insert_id();
			$this->db->select("tbl_bonafide_cer_application.id,tbl_bonafide_cer_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_bonafide_cer_application.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_bonafide_cer_application.student_id", 'left');
			$result = $this->db->get("tbl_bonafide_cer_application")->row();
			return $result;
		} else {
			$this->db->select("tbl_bonafide_cer_application.id,tbl_bonafide_cer_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_bonafide_cer_application.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_bonafide_cer_application.student_id", 'left');
			$result = $this->db->get("tbl_bonafide_cer_application")->row();
			return $result;
		}
	}

	public function get_bonafide_certificate_amount()
	{
		$this->db->where('student_id', $this->session->userdata('student_id'));
		$result = $this->db->get('tbl_bonafide_cer_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('4');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
		}
		return $result;
	}






	public function get_single_bona_application_print()
	{
		$this->db->select("tbl_bonafide_cer_application.*,tbl_student.gender,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_bonafide_cer_application.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_bonafide_cer_application.is_deleted', '0');
		$this->db->where('tbl_bonafide_cer_application.status', '1');
		$this->db->where('tbl_bonafide_cer_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_bonafide_cer_application');
		return $result->row();
	}

	public function get_student_bonafide_scholarship()
	{
		$this->db->select("tbl_bonafide_cer_application_scholarship.*,tbl_student.gender,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_bonafide_cer_application_scholarship.is_deleted", "0");
		$this->db->where("tbl_bonafide_cer_application_scholarship.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_bonafide_cer_application_scholarship.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_bonafide_cer_application_scholarship")->row();
		return $result;
	}
	public function set_pay_bonafide_scholarship_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_bonafide_cer_application_scholarship")->row();
		// echo "<pre>";print_r($result);exit;
		if (empty($result)) {
			// echo "<pre>";print_r($result);exit;
			//$amount = $this->get_certificate_fees('5');
			/*if(!empty($amount)){
				$certificate_amount = $amount->certificate_fees;
			}else{*/
			$certificate_amount = '100';
			//}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				"amount"			=> $certificate_amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_bonafide_cer_application_scholarship", $data);
			$id = $this->db->insert_id();
			$this->db->select("tbl_bonafide_cer_application_scholarship.id,tbl_bonafide_cer_application_scholarship.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_bonafide_cer_application_scholarship.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_bonafide_cer_application_scholarship.student_id", 'left');
			$result = $this->db->get("tbl_bonafide_cer_application_scholarship")->row();
			return $result;
		} else {
			$this->db->select("tbl_bonafide_cer_application_scholarship.id,tbl_bonafide_cer_application_scholarship.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_bonafide_cer_application_scholarship.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_bonafide_cer_application_scholarship.student_id", 'left');
			$result = $this->db->get("tbl_bonafide_cer_application_scholarship")->row();
			return $result;
		}
	}


	public function get_student_medium_inst()
	{
		$this->db->select("tbl_medium_instruction_application.*,tbl_student.gender,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_medium_instruction_application.is_deleted", "0");
		// $this->db->where("tbl_medium_instruction_application.payment_status","1");
		$this->db->where("tbl_medium_instruction_application.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_medium_instruction_application.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_medium_instruction_application")->row();
		return $result;
	}
	public function set_pay_medium_inst_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_medium_instruction_application")->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('5');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount"			=> $certificate_amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_medium_instruction_application", $data);
			$id = $this->db->insert_id();

			$this->db->select("tbl_medium_instruction_application.id,tbl_medium_instruction_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_medium_instruction_application.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_medium_instruction_application.student_id", 'left');
			$result = $this->db->get("tbl_medium_instruction_application")->row();
			return $result;
		} else {
			$this->db->select("tbl_medium_instruction_application.id,tbl_medium_instruction_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_medium_instruction_application.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_medium_instruction_application.student_id", 'left');
			$result = $this->db->get("tbl_medium_instruction_application")->row();
			return $result;
		}
	}
	public function get_single_medium_inst_application_print()
	{
		$this->db->select("tbl_medium_instruction_application.*,tbl_student.gender,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_medium_instruction_application.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_medium_instruction_application.is_deleted', '0');
		$this->db->where('tbl_medium_instruction_application.status', '1');
		$this->db->where('tbl_medium_instruction_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_medium_instruction_application');
		return $result->row();
	}

	public function get_student_no_backlog()
	{
		$this->db->select("tbl_no_backlog_application.*,tbl_student.student_name,tbl_student.gender,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_no_backlog_application.is_deleted", "0");
		// $this->db->where("tbl_no_backlog_application.payment_status","1");
		$this->db->where("tbl_no_backlog_application.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_no_backlog_application.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_no_backlog_application")->row();
		return $result;
	}
	public function set_pay_no_backlog_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_no_backlog_application")->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('6');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount"			=> $certificate_amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_no_backlog_application", $data);
			$id = $this->db->insert_id();

			$this->db->select("tbl_no_backlog_application.id,tbl_no_backlog_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_no_backlog_application.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_no_backlog_application.student_id", 'left');
			$result = $this->db->get("tbl_no_backlog_application")->row();
			return $result;
		} else {
			$this->db->select("tbl_no_backlog_application.id,tbl_no_backlog_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_no_backlog_application.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_no_backlog_application.student_id", 'left');
			$result = $this->db->get("tbl_no_backlog_application")->row();
			return $result;
		}
	}
	public function get_single_no_backlog_application_print()
	{
		$this->db->select("tbl_no_backlog_application.*,tbl_student.gender,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_no_backlog_application.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_no_backlog_application.is_deleted', '0');
		$this->db->where('tbl_no_backlog_application.status', '1');
		$this->db->where('tbl_no_backlog_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_no_backlog_application');
		return $result->row();
	}

	public function get_student_no_split()
	{
		$this->db->select("tbl_no_split_application.*,tbl_student.gender,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_no_split_application.is_deleted", "0");
		// $this->db->where("tbl_no_split_application.payment_status","1");
		$this->db->where("tbl_no_split_application.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_no_split_application.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_no_split_application")->row();
		return $result;
	}
	public function set_pay_no_split_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_no_split_application")->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('7');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount" 			=> $certificate_amount,
				"application_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_no_split_application", $data);
			$id = $this->db->insert_id();
			$this->db->select("tbl_no_split_application.id,tbl_no_split_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_no_split_application.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_no_split_application.student_id", 'left');
			$result = $this->db->get("tbl_no_split_application")->row();
			return $result;
		} else {
			$this->db->select("tbl_no_split_application.id,tbl_no_split_application.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_no_split_application.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_no_split_application.student_id", 'left');
			$result = $this->db->get("tbl_no_split_application")->row();
			return $result;
		}
	}
	public function get_single_no_split_application_print()
	{
		$this->db->select("tbl_no_split_application.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_no_split_application.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_no_split_application.is_deleted', '0');
		$this->db->where('tbl_no_split_application.status', '1');
		$this->db->where('tbl_no_split_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_no_split_application');
		return $result->row();
	}
	public function get_consolidate_subject()
	{
		$profile = $this->get_student_details();
		if ($profile->admission_status != "4") {
			$this->session->set_flashdata('message', 'Sorry! you are not eligible to apply consolidate please cordinate to your administration department');
			//redirect('student_consolidate_student_marksheet');
		}
		$this->db->where('tbl_exam_results.student_id', $this->session->userdata("student_id"));
		$this->db->where('tbl_exam_results.is_deleted', '0');
		$this->db->where('tbl_exam_results.status', '1');
		$this->db->order_by('tbl_exam_results.year_sem', 'ASC');
		$result = $this->db->get('tbl_exam_results');
		return $result->result();
	}


	// character

	public function get_student_character()
	{
		// echo "<pre>";print_r($this->session->userdata("student_id"));exit;
		$this->db->select("tbl_character_certificate.*,tbl_student.gender,tbl_student.student_name,tbl_student.course_id,tbl_session.session_start_date,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_character_certificate.is_deleted", "0");
		// $this->db->where("tbl_character_certificate.payment_status","1");
		$this->db->where("tbl_character_certificate.student_id", $this->session->userdata("student_id"));
		$this->db->join("tbl_student", "tbl_student.id = tbl_character_certificate.student_id", 'left');
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$result = $this->db->get("tbl_character_certificate")->row();
		return $result;

		// echo "<pre>";print_r($result);exit;
	}
	public function set_pay_character_fees()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$result = $this->db->get("tbl_character_certificate")->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('10');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data  = array(
				"student_id"		=> $this->session->userdata("student_id"),
				"enrollment_no"		=> $this->get_student_enrollment($this->session->userdata("student_id")),
				// "amount"			=> '1000',
				"amount"			=> $certificate_amount,
				"issue_date"	=> date("Y-m-d"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_character_certificate", $data);
			$id = $this->db->insert_id();
			$this->db->select("tbl_character_certificate.id,tbl_character_certificate.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_character_certificate.id", $id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_character_certificate.student_id", 'left');
			$result = $this->db->get("tbl_character_certificate")->row();
			return $result;
		} else {
			$this->db->select("tbl_character_certificate.id,tbl_character_certificate.amount,tbl_student.gender,tbl_student.student_name,tbl_student.email,tbl_student.mobile,tbl_student.address,tbl_student.pincode");
			$this->db->where("tbl_character_certificate.id", $result->id);
			$this->db->join("tbl_student", "tbl_student.id = tbl_character_certificate.student_id", 'left');
			$result = $this->db->get("tbl_character_certificate")->row();
			return $result;
		}
	}
	public function get_single_character_application_print()
	{
		$this->db->select("tbl_character_certificate.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_session.session_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_character_certificate.enrollment_no");
		$this->db->join("tbl_session", "tbl_session.id = tbl_student.session_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->where('tbl_character_certificate.is_deleted', '0');
		$this->db->where('tbl_character_certificate.status', '1');
		$this->db->where('tbl_character_certificate.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_character_certificate');
		return $result->row();
	}



















































	public function get_subject_for_consolidate($result_id)
	{
		$this->db->select('tbl_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type,tbl_subject.credit');
		$this->db->where('tbl_examination_result_details.result_id', $result_id);
		$this->db->where('tbl_examination_result_details.is_deleted', '0');
		$this->db->where('tbl_examination_result_details.status', '1');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_examination_result_details.subject_id');
		$result = $this->db->get('tbl_examination_result_details');
		return $result->result();
	}
	public function get_exist_consolidate_form()
	{
		$profile = $this->get_student_profile();
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment', $profile->enrollment_number);
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->row();
	}
	public function set_consolidate()
	{
		$profile = $this->get_student_profile();
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment', $profile->enrollment_number);
		$exist = $this->db->get('tbl_consolidated_marksheet');
		$exist = $exist->row();
		if (empty($exist)) {
			$amount = $this->get_certificate_fees('12');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '3500';
			}
			$data = array(
				'enrollment' 	=> $profile->enrollment_number,
				'center_id'   	=> $profile->center_id,
				// 'amount'  		=> '3500', 
				'amount'		=> $certificate_amount,
				'payment_date'  => date("Y-m-d"),
				'payment_date'  => date("Y-m-d"),
				'created_on'    => date("Y-m-d H:i:s")
			);
			$this->db->insert('tbl_consolidated_marksheet', $data);
			$last_id = $this->db->insert_id();
			$sem = $this->input->post('sem');
			$subject_code = $this->input->post('subject_code');
			$subject = $this->input->post('subject');
			$internal_mark = $this->input->post('internal_mark');
			$external_mark = $this->input->post('external_mark');
			$max_mark = $this->input->post('max_mark');
			$obtained = $this->input->post('obtained');
			$credit = $this->input->post('credit');
			$grade = $this->input->post('grade');
			$detail_arr = array();
			for ($i = 0; $i < count($sem); $i++) {
				$detail_arr[] = array(
					'consolidate_id' 	=> $last_id,
					'year_sem'          => $sem[$i],
					'subject_code'      => $subject_code[$i],
					'subject_name'       => $subject[$i],
					'internal_mark'     => $internal_mark[$i],
					'external_mark'     => $external_mark[$i],
					'total_marks'      	=> $max_mark[$i],
					'total'     	 	=> $obtained[$i],
					'credit'     	 	=> $credit[$i],
					'grade'     	 	=> $grade[$i],
					'created_on'    	=> date("Y-m-d H:i:s")
				);
			}
			if (!empty($detail_arr)) {
				$this->db->insert_batch('tbl_consolidated_marksheet_details', $detail_arr);
			}
			redirect('pay_consolidate_student_fees/' . base64_encode($last_id));
		} else {
			redirect('pay_consolidate_student_fees/' . base64_encode($exist->id));
		}
	}

	public function get_consolidated_certificate_amount()
	{
		$profile = $this->get_student_profile();
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment', $profile->enrollment_number);
		$exist = $this->db->get('tbl_consolidated_marksheet');
		$exist = $exist->row();
		if (empty($exist)) {
			$amount = $this->get_certificate_fees('12');
			if (!empty($amount)) {
				$exist = $amount->certificate_fees;
			} else {
				$exist = '3500';
			}
			// return $exist;
		}
		return $exist;
	}


	public function get_single_consolidate()
	{
		$profile = $this->get_student_profile();
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment', $profile->enrollment_number);
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->row();
	}

	public function get_campus_student_result($enrollment)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment_number', $enrollment);
		$exam = $this->db->get('tbl_exam_results');
		$exam = $exam->result();
		$result_ids = array();
		if (!empty($exam)) {
			foreach ($exam as $exam_result) {
				$result_ids[] = $exam_result->id;
			}
		}
		// 		if(!empty($result_ids)){
		// 			$this->db->select('tbl_examination_result_details.*,tbl_subject.credit,tbl_subject.subject_code,tbl_subject.subject_name,tbl_subject.year_sem');
		// 			$this->db->where_in('tbl_examination_result_details.result_id',$result_ids);
		// 			$this->db->where('tbl_examination_result_details.is_deleted','0'); 
		// 			$this->db->order_by('tbl_subject.year_sem','ASC');
		// 			$this->db->join('tbl_subject','tbl_subject.id = tbl_examination_result_details.subject_id');
		// 			$result = $this->db->get('tbl_examination_result_details');
		// 			return $result->result(); 
		// 		}
		if (!empty($result_ids)) {
			$this->db->select('tbl_examination_result_details.*,tbl_subject.credit,tbl_subject.subject_code,tbl_subject.subject_name,tbl_subject.year_sem');
			$this->db->where_in('tbl_examination_result_details.result_id', $result_ids);
			$this->db->where('tbl_examination_result_details.is_deleted', '0');
			$this->db->order_by('tbl_subject.year_sem', 'ASC');
			$this->db->join('tbl_subject', 'tbl_subject.id = tbl_examination_result_details.subject_id');
			$result = $this->db->get('tbl_examination_result_details')->result();

			foreach ($result as $result_item) {
				$result_item->year_sem_value = $this->find_exam_result_year_sem($result_item->result_id, $exam);
			}

			return $result;
		}
	}
	public function find_exam_result_year_sem($result_id, $exam_results)
	{
		foreach ($exam_results as $exam_result) {
			if ($exam_result->id === $result_id) {
				return $exam_result->year_sem;
			}
		}
		return null;
	}
	public function set_uplod_lor($lor)
	{
		$student = $this->get_student_details();
		$data = array(
			'student_id' 			=> $this->session->userdata("student_id"),
			'enrollment_no' 		=> $student->enrollment_number,
			'letter_type' 			=> '1',
			'application_status'	=> '1',
			'lor_file' 				=> $lor,
		);
		$this->db->insert('tbl_reccom_letter_application', $data);
		return true;
	}
	public function get_uploaded_lor()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		// $this->db->where('application_status','1');
		$this->db->where('approve_status', '1');  //
		$result = $this->db->get('tbl_reccom_letter_application');
		$result = $result->row();
		return $result;
	}
	public function get_subject_result_for_transcript($student)
	{
		$result_id = array();
		$this->db->where('student_id', $student);
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_marksheet');
		$exist = $exist->result();
		if (!empty($exist)) {
			foreach ($exist as $exist_result) {
				$result_id[] = $exist_result->result_id;
			}
		}
		if (!empty($result_id)) {
			$this->db->select('tbl_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type,tbl_subject.year_sem');
			$this->db->where('tbl_examination_result_details.is_deleted', "0");
			$this->db->where('tbl_examination_result_details.status', "1");
			$this->db->where_in('tbl_examination_result_details.result_id', $result_id);
			$this->db->join('tbl_subject', 'tbl_subject.id = tbl_examination_result_details.subject_id');
			$this->db->order_by('tbl_subject.year_sem', 'ASC');
			$result = $this->db->get('tbl_examination_result_details');
			return $result->result();
		}
	}
	public function get_print_new_marksheet()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_marksheet');
		$exist = $exist->row();
		if ($exist) {
			$api_url = api_url . "get_print_new_marksheet_student_login";
			$form_data = array(
				'id'  => $this->uri->segment(2),
			);
			$client = curl_init($api_url);
			curl_setopt($client, CURLOPT_POST, true);
			curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
			curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
			$response = curl_exec($client);
			print_r($response);
			exit;
			curl_close($client);
			return $response = json_decode($response);
		} else {
			$this->session->set_flashdata('message', 'Marksheet not available');
			redirect('marksheets');
		}
	}
	public function print_credit_transfer_certificate()
	{
		$api_url = api_url . "get_print_credit_tranfer_certificate_student_login";
		$form_data = array(
			'id'  => base64_decode($this->uri->segment(2)),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		exit;
		curl_close($client);
		return $response = json_decode($response);
	}
	public function print_synopsis()
	{
		$api_url = api_url . "get_print_synopsis_student";
		$form_data = array(
			'id'  => $this->session->userdata("student_id"),
		);
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client);
		print_r($response);
		exit;
		curl_close($client);
		return $response = json_decode($response);
	}
	public function set_pay_credit_transfer_certificate()
	{
		$data = array(
			'student_id' => $this->session->userdata("student_id"),
			'previous_university' => $this->input->post('previous_university'),
			'amount' => '1000',
			'payment_date' => date("Y-m-d"),
			'issue_date' => date("Y-m-d"),
			'payment_status' => '0',
			'approve_status' => '0',
			'created_on' => date("Y-m-d H:i:s"),
		);
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_credit_transfer_certificate');
		$exist = $exist->row();
		if (empty($exist)) {
			$this->db->insert('tbl_credit_transfer_certificate', $data);
		} else {
			$this->db->where('student_id', $this->session->userdata("student_id"));
			$this->db->update('tbl_credit_transfer_certificate', $data);
		}
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_credit_transfer_certificate');
		return $exist->row();
	}
	public function get_credit_transfer_certificate()
	{
		$this->db->where('student_id', $this->session->userdata("student_id"));
		$this->db->where('is_deleted', '0');
		$this->db->where('payment_status', '1');
		$exist = $this->db->get('tbl_credit_transfer_certificate');
		return $exist->row();
	}
	public function get_paid_course() {}

	public function get_scholar_details($id)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.verified_status', '1');
		$this->db->where('tbl_student.course_id', '23');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.admission_status !=', '2');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries', 'countries.id = tbl_student.country');
		$this->db->join('states', 'states.id = tbl_student.state');
		$this->db->join('cities', 'cities.id = tbl_student.city');
		$this->db->where('tbl_student.id', $id);
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_scholar_extra_details($id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('student_id', $id);
		$result = $this->db->get('tbl_scholar_extra_details');
		return $result->row();
	}
	public function get_assigned_guide($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get('tbl_guide_application');
		return $result->row();
	}
	public function set_scholar_details()
	{
		$student_details_id = $this->input->post('student_details_id');
		$student_id = $this->session->userdata("student_id");
		$details = $this->get_scholar_extra_details($student_id);

		$scholar_type = "";
		$entrance_exam = "";
		$is_regular_teacher = "";
		$co_is_regular_teacher = "";
		$course_work_report_type = "";
		$examiner_from = "";
		if (!empty($details)) {
			if ($details->scholar_type != "") {
				$scholar_type = $details->scholar_type;
			} else {
				$scholar_type = $this->input->post('scholar_type');
			}

			if ($details->entrance_exam != "") {
				$entrance_exam = $details->entrance_exam;
			} else {
				$entrance_exam = $this->input->post('entrance_exam');
			}

			if ($details->is_regular_teacher != "") {
				$is_regular_teacher = $details->is_regular_teacher;
			} else {
				$is_regular_teacher = $this->input->post('is_regular_teacher');
			}

			if ($details->co_is_regular_teacher != "") {
				$co_is_regular_teacher = $details->co_is_regular_teacher;
			} else {
				$co_is_regular_teacher = $this->input->post('co_is_regular_teacher');
			}

			if ($details->course_work_report_type != "") {
				$course_work_report_type = $details->course_work_report_type;
			} else {
				$course_work_report_type = $this->input->post('course_work_report_type');
			}

			if ($details->examiner_from != "") {
				$examiner_from = $details->examiner_from;
			} else {
				$examiner_from = $this->input->post('examiner_from');
			}
		}

		if ($student_id != "") {
			$data = array(
				'student_id'						=>	$student_id,
				'scholar_type'						=>	$scholar_type,
				'entrance_exam'						=>	$entrance_exam,
				'guide_allocation_process'			=>	$this->input->post('guide_allocation_process'),
				'is_regular_teacher'				=>	$is_regular_teacher,
				'scholars_under_guide'				=>	$this->input->post('scholars_under_guide'),
				'co_is_regular_teacher'				=>	$co_is_regular_teacher,
				'scholars_under_co_guide'			=>	$this->input->post('scholars_under_co_guide'),
				'course_work_start_date'			=>	date('Y-m-d', strtotime($this->input->post('course_work_start_date'))),
				'research_proposal_link'			=>	$this->input->post('research_proposal_link'),
				'periodical_review_link'			=>	$this->input->post('periodical_review_link'),
				'presentation_date'					=>	date('Y-m-d', strtotime($this->input->post('presentation_date'))),
				'thesis_submission_date'			=>	date('Y-m-d', strtotime($this->input->post('thesis_submission_date'))),
				'examiner'							=>	$this->input->post('examiner'),
				'examiner_from'						=>	$examiner_from,
				'plagiarism_check_review_link'		=>	$this->input->post('plagiarism_check_review_link'),
				'thesis_examiner_submission_date'	=>	date('Y-m-d', strtotime($this->input->post('thesis_examiner_submission_date'))),
				'thesis_examiner_receive_date'		=>	date('Y-m-d', strtotime($this->input->post('thesis_examiner_receive_date'))),
				'examiner_thesis_suggestion_link'	=>	$this->input->post('examiner_thesis_suggestion_link'),
				'examiner_report_link'				=>	$this->input->post('examiner_report_link'),
				'viva_date'							=>	date('Y-m-d', strtotime($this->input->post('viva_date'))),
				'viva_report_link'					=>	$this->input->post('viva_report_link'),
				'phd_award_date'					=>	date('Y-m-d', strtotime($this->input->post('phd_award_date'))),
				'thesis_evidence_link'				=>	$this->input->post('thesis_evidence_link'),
				'other_information'					=>	$this->input->post('other_information'),
				'course_work_period_from'			=>	$this->input->post('course_work_period_from'),
				'course_work_period_to'				=>	$this->input->post('course_work_period_to'),
				'course_work_report_type'			=>	$course_work_report_type,
				'research_committee'				=>	$this->input->post('research_committee'),
				'research_papers'					=>	$this->input->post('research_papers'),
				'provisional_certificate'			=>	$this->input->post('provisional_certificate'),
			);
			if ($student_details_id != "") {
				$this->db->where('id', $student_details_id);
				$this->db->where('student_id', $student_id);
				$this->db->update('tbl_scholar_extra_details', $data);
				return 1;
			} else {
				$date = array(
					'created_on'	=>	date("Y-m-d H:i:s"),
				);
				$newArr = array_merge($data, $date);
				$this->db->insert('tbl_scholar_extra_details', $newArr);
				return 1;
			}
		} else {
			return 0;
		}
	}

	public function get_certificate_fees($type)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('certificate_type', $type);
		$result = $this->db->get('tbl_certificate_fees_relation');
		return $result->row();
	}
	public function set_center_student_self_assessment($signature)
	{
		$indices = $this->input->post('indices');
		$student = $this->get_student_details();
		if ($signature == "") {
			$signature = $this->input->post('old_signature');
		}
		$assign_data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'center_id' 		=> $student->center_id,
			'enrollment_number' => $this->input->post('enroll_number'),
			'study_mode' 		=> $this->input->post('study_mode'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'assessment_status'	=> '0',
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_center_self_assessment_form', $assign_data);
		$assessment_id = $this->db->insert_id();
		if (!empty($signature)) {
			$data = array(
				'signature' 		=> $signature,
			);
			$this->db->where('id', $this->input->post('student_id'));
			$this->db->update('tbl_student', $data);
		}
		if (!empty($indices)) {
			for ($i = 0; $i < count($indices); $i++) {
				$subject_name = $this->input->post('subject_name_' . $indices[$i]);
				$no_of_hours_study = $this->input->post('no_of_hours_study_' . $indices[$i]);
				$no_of_hours_subject = $this->input->post('no_of_hours_subject_' . $indices[$i]);
				$grade = $this->input->post('grade_' . $indices[$i]);
				if (!empty($subject_name) && is_array($subject_name)) {
					foreach ($subject_name as $key => $subject_names) {
						$study_hours = $no_of_hours_study[$key] ?? '';
						$subject_hours = $no_of_hours_subject[$key] ?? '';
						$grade = $grade[$key] ?? '';
						if (!empty($subject_name) || !empty($study_hours) || !empty($subject_hours) || !empty($grade)) {
							$assessment_data = array(
								'self_assessment_id' => $assessment_id,
								'student_id'         => $this->input->post('student_id'),
								'subject_name'       => $subject_names,
								'no_of_hours_study'  => $study_hours,
								'no_of_hours_subject' => $subject_hours,
								'grade'              => $grade,
								'assessment_status'	 => '0',
								'created_on'         => date('Y-m-d H:i:s'),
							);
							$this->db->insert('tbl_center_self_assessment_form_data', $assessment_data);
						}
					}
				}
			}
		}
		return 1;
	}
	public function get_single_student_self_assessment()
	{
		$student = $this->get_student_details();
		$this->db->where('student_id', $student->id);
		$this->db->where('year_sem', $student->year_sem);
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->row();
	}
	public function set_student_assignment($assignment)
	{
		$data = array(
			'student_id'			=> $this->input->post('student_id'),
			'year_sem' 				=> $this->input->post('year_sem'),
			'assignment_title'		=> $this->input->post('title'),
			'file' 					=> $assignment,
			'assessment_status' => '0',
			'created_on'			=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_assignment', $data);
		return true;
	}
	public function get_single_student_assignment()
	{
		$student = $this->get_student_details();
		$this->db->where('student_id', $student->id);
		$this->db->where('year_sem', $student->year_sem);
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_assignment');
		return $result->row();
	}
	public function set_center_student_teacher_assessment($signature)
	{
		$indices = $this->input->post('indices');
		$student = $this->get_student_details();
		if ($signature == "") {
			$signature = $this->input->post('old_signature');
		}
		$assign_data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'enrollment_number' => $this->input->post('enroll_number'),
			'assessor_name' 	=> $this->input->post('assessor_name'),
			'assessor_signature' => $signature,
			'year_sem' 		=> $this->input->post('year_sem'),
			'assessment_status'	=> '0',
			'center_id' 		=> $student->center_id,
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_center_teacher_assessment_form', $assign_data);
		$assessment_id = $this->db->insert_id();
		if (!empty($indices)) {
			for ($i = 0; $i < count($indices); $i++) {
				$subject_name = $this->input->post('subject_name_' . $indices[$i]);
				$assessment_knowledge = $this->input->post('assessment_knowledge_' . $indices[$i]);
				$assessment_application = $this->input->post('assessment_application_' . $indices[$i]);

				if (!empty($subject_name) && is_array($subject_name)) {
					foreach ($subject_name as $key => $subject_names) {
						$assessment_knowledge = $assessment_knowledge[$key] ?? '';
						$assessment_application = $assessment_application[$key] ?? '';

						if (!empty($subject_name) || !empty($assessment_knowledge) || !empty($assessment_application)) {
							$assessment_data = array(
								'teacher_assessment_id' 	=> $assessment_id,
								'student_id'         		=> $this->input->post('student_id'),
								'subject_name'       		=> $subject_names,
								'assessment_knowledge'  	=> $assessment_knowledge,
								'assessment_application'	=> $assessment_application,
								'created_on'         		=> date('Y-m-d H:i:s'),
							);
							$this->db->insert('tbl_center_teacher_assessment_form_data', $assessment_data);
						}
					}
				}
			}
		}
		return 1;
	}
	public function get_single_teacher_assement()
	{
		$student = $this->get_student_details();
		$this->db->where('student_id', $student->id);
		$this->db->where('year_sem', $student->year_sem);
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		return $result->row();
	}
	public function get_single_indestry_assment()
	{
		$student = $this->get_student_details();
		$this->db->where('student_id', $student->id);
		$this->db->where('year_sem', $student->year_sem);
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_industry_assessment_form');
		return $result->row();
	}
	public function set_center_student_industry_assessment($signature, $company_seal)
	{
		$student = $this->get_student_details();

		$indices = $this->input->post('indices');
		if ($signature == "") {
			$signature = $this->input->post('old_signature');
		}
		if ($company_seal == "") {
			$company_seal = $this->input->post('old_company_seal');
		}
		$assign_data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'center_id' 		=> $student->center_id,
			'enrollment_number' => $this->input->post('enroll_number'),
			'assessor_name' 	=> $this->input->post('assessor_name'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'vaccancy' 			=> $this->input->post('vaccancy'),
			'job_opportunity' 	=> $this->input->post('job_opportunity'),
			'designation' 		=> $this->input->post('designation'),
			'company_name' 		=> $this->input->post('company_name'),
			'company_address' 	=> $this->input->post('company_address'),
			'contact_no' 		=> $this->input->post('contact_no'),
			'email' 			=> $this->input->post('email'),
			'assessor_signature' => $signature,
			'company_seal' 		=> $company_seal,
			'assessment_status'	=> '0',
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		// echo "<pre>";print_r($assign_data);exit;
		$this->db->insert('tbl_center_industry_assessment_form', $assign_data);
		$assessment_id = $this->db->insert_id();

		if (!empty($indices)) {
			for ($i = 0; $i < count($indices); $i++) {
				$subject_name = $this->input->post('subject_name_' . $indices[$i]);
				$assessment_knowledge = $this->input->post('assessment_knowledge_' . $indices[$i]);
				$assessment_skill = $this->input->post('assessment_skill_' . $indices[$i]);
				$suggestions = $this->input->post('suggestions_' . $indices[$i]);

				if (!empty($subject_name) && is_array($subject_name)) {
					foreach ($subject_name as $key => $subject_names) {
						$assessment_knowledge = $assessment_knowledge[$key] ?? '';
						$assessment_skill = $assessment_skill[$key] ?? '';
						$suggestions = $suggestions[$key] ?? '';
						if (!empty($subject_name) || !empty($assessment_knowledge) || !empty($assessment_skill) || !empty($suggestions)) {
							$assessment_data = array(
								'industry_assessment_id' 	=> $assessment_id,
								'student_id'         		=> $this->input->post('student_id'),
								'subject_name'       		=> $subject_names,
								'assessment_knowledge'  	=> $assessment_knowledge,
								'assessment_skill'			=> $assessment_skill,
								'suggestions'				=> $suggestions,
								'created_on'         		=> date('Y-m-d H:i:s'),
							);
							$this->db->insert('tbl_center_industry_assessment_form_data', $assessment_data);
						}
					}
				}
			}
		}

		return 1;
	}
	public function set_center_student_parent_assessment($signature)
	{
		$student = $this->get_student_details();
		if ($signature == "") {
			$signature = $this->input->post('old_signature');
		}
		$assign_data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'father_name' 		=> $this->input->post('father_name'),
			'contact_no' 		=> $this->input->post('contact_no'),
			'center_id' 		=> $student->center_id,
			'relation' 			=> $this->input->post('relation'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'word' 				=> $this->input->post('word'),
			'satisfaction' 		=> $this->input->post('satisfaction'),
			'father_signature'	=> $signature,
			'assessment_status'	=> '0',
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_center_parent_assessment_form', $assign_data);
		return 1;
	}
	public function get_single_parent()
	{
		$student = $this->get_student_details();
		$this->db->where('student_id', $student->id);
		$this->db->where('year_sem', $student->year_sem);
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		return $result->row();
	}
	// public function get_transcript_certificate_amount(){
	// 	$this->db->where('registration_id',$this->session->userdata("student_id"));
	//     $this->db->where('is_deleted','0');
	//     $this->db->where('status','1');
	//     $result = $this->db->get('tbl_transcript');
	//     $result = $result->row();
	// 	// echo "<pre>";print_r($result);exit;
	// 	if(empty($result)){
	// 		$amount = $this->get_certificate_fees('11');
	// 		if(!empty($amount)){
	// 			$result = $amount->certificate_fees;
	// 		}else{
	// 			$result = '3500';
	// 		}
	// 		// return $exist;
	// 	}
	// 	return $result;
	// }
	public function set_visit_appoinment(){ 
		$this->db->where('enrollment_number',$this->input->post('enrollment_number')); 
		$this->db->where('status','1'); 
		$this->db->where('is_deleted','0'); 
		$result = $this->db->get('tbl_visit_appoinment'); 
		$result = $result->row(); 
		if(empty($result)){ 
			$data = array( 
				'center_id' 				=> '9', 
				'enrollment_number' 		=> $this->input->post('enrollment_number'), 
				'student_name' 				=> $this->input->post('student_name'), 
				'course' 					=> $this->input->post('course'), 
				'branch' 					=> $this->input->post('branch'), 
				'year_of_completion' 		=> $this->input->post('year_of_completion'), 
				'place' 					=> $this->input->post('place'), 
				'country' 					=> $this->input->post('country'), 
				'state' 					=> $this->input->post('state'), 
				'date_of_visiting_in_university' => $this->input->post('date_of_visiting_in_university'), 
				'time_of_visiting_in_university' => $this->input->post('time_of_visiting_in_university'), 
				'email' 					=> $this->input->post('email'), 
				'mobile_number' 			=> $this->input->post('mobile_number'), 
				'alternamte_mobile_number' 	=> $this->input->post('alternamte_mobile_number'), 
				'purpose_of_visit' 			=> $this->input->post('purpose_of_visit'), 
				'created_on' 				=> date("Y-m-d H:i:s"),  
			); 
			$this->db->insert('tbl_visit_appoinment',$data); 
			$message = "Dear ".$this->input->post('student_name'); 
			$message .= ",<br><br>Your Appointment has been re-scheduled on ".date("d/m/Y",strtotime( $this->input->post('date_of_visiting_in_university')))." at ".$this->input->post('time_of_visiting_in_university');
			$message .= "<br>";   
			$message .= "<br>Thanks<br>Team Bir Tikendrajit University"; 
			$to = array( 
				"email" => $this->input->post('email'), 
				"name" => $this->input->post('student_name'), 
			); 
			$subject = 'Appointment Details | Bir Tikendrajit University';     
			$this->send_send_blue($to,$subject,$message);	 
			return true; 
		}else{ 
			return false; 
		} 
	} 
	public function get_available_slot($date){ 
		$this->db->where('date_of_visiting_in_university',$date); 
		$this->db->where('status','1'); 
		$this->db->where('is_deleted','0'); 
		$result = $this->db->get('tbl_visit_appoinment'); 
		return $result->num_rows(); 
	} 
}
