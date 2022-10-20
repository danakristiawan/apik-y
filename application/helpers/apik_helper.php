<?php

defined('BASEPATH') or exit('No direct script access allowed');


function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nip')) {
    redirect('auth');
  }
}


function noUrutPenerimaan($kdsatker)
{
  $ci = get_instance();
  $no_urut = $ci->ref_satker_m->getNoUrutPenerimaan($kdsatker);
  $no_urut_next = intval($no_urut) + 1;
  switch (strlen($no_urut_next)) {
    case '1':
      $no_urut_next = '0000' . $no_urut_next;
      break;
    case '2':
      $no_urut_next = '000' . $no_urut_next;
      break;
    case '3':
      $no_urut_next = '00' . $no_urut_next;
      break;
    case '4':
      $no_urut_next = '0' . $no_urut_next;
      break;
    default:
      $no_urut_next = $no_urut_next;
      break;
  }
  return [
    'no_urut' => $no_urut,
    'no_urut_next' => $no_urut_next
  ];
}
