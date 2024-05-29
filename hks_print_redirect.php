<?php
session_destroy();
session_start();

$_SESSION["print_issue"] = $_POST["issue_no"];
$type = $_POST["print_type"];


if ($type == "Subscriber Packing Label") {
    header("Location: hks_prnt_subs_pack.php");
    die();
}

if ($type == "Subscriber Summary List") {
    header("Location: hks_prnt_subs_summary.php");
    die();
}

if ($type == "Courier Packing Label") {
    header("Location: hks_prnt_qur_pack.php");
    die();
}


if ($type == "PO VP Packing Label") {
    header("Location: hks_prnt_post_vp_pack.php");
    die();
}


if ($type == "PO VPP Packing Label") {
    header("Location: hks_prnt_post_vpp_pack.php");
    die();
}

if ($type == "PO VPP Packing Label New") {
    header("Location: hks_prnt_post_vpp_pack_new.php");
    die();
}

if ($type == "Courier Packing Label") {
    header("Location: hks_prnt_qur_pack.php");
    die();
}

if ($type == "Binding Summary All") {
    header("Location: hks_prnt_binding_summary.php");
    die();
}


if ($type == "Courier Summary List") {
    header("Location: hks_prnt_qur_summary.php");
    die();
}

if ($type == "PO VP Despatch") {
    header("Location: hks_prnt_post_dsptc_vp.php");
    die();
}


if ($type == "PO VPP Despatch") {
    header("Location: hks_prnt_post_dsptc_vpp.php");
    die();
}

if ($type == "PO RP Despatch") {
    header("Location: hks_prnt_post_dsptc_rp.php");
    die();
}

if ($type == "PO Summary List") {
    header("Location: hks_prnt_post_summary.php");
    die();
}

if ($type == "VP Entry List") {
    header("Location: hks_prnt_post_vp_entry_list.php");
    die();
}

if ($type == "PO VP Form") {
    header("Location: hks_prnt_post_vp_form.php");
    die();
}


if ($type == "PO VPP Form") {
    header("Location: hks_prnt_post_vpp_form.php");
    die();
}


if ($type == "Courier Invoice") {
    header("Location: hks_prnt_qur_invoice.php");
    die();
}

if ($type == "courier_invoice_sm") {
    header("Location: hks_prnt_qur_invoice_sm.php");
    die();
}
