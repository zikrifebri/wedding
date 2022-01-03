<?php
create_title("Dashboard");
   create_panel("primary", "ticket", $data['jml_transaksi'], "Jumlah Transaksi","admin/transaksi");
   create_panel("info", "file", $data['jml_jadwal'], "Jadwal Pemesanan","admin/jadwal");
   create_panel("default", "users", $data['jml_cust'], "Customers","admin/customer");
   create_panel("success", "comments", $data['jml_pesan'], "Pesan Baru","admin/pesan");