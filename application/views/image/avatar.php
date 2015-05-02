<?php
$this->load->helper('file');
$this->output->set_content_type(get_mime_by_extension($avatar->ext));
$this->output->set_output(base64_decode($avatar->data));
