<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                        <h6>My Transactions</h6>
                        </div>
                     </div>
                  </div>
               </div>
<div class="table-responsive">
  <?php
$payments=$call_config->get_all("SELECT * FROM `tbl_txn_master` WHERE `uid`='".$user_sess_data['sess_user_id']."'");
?>
           <table class="table table-hover">
              <thead>
      <td>No.</td>
      <td>Contact Used</td>
      <td>Amount</td>
      <td>Method</td>
      <td>Paid For</td>
      <td>On</td>
    </thead>
            <tbody>
<?php
$i=1;
foreach ($payments as $paym) {
?>
    <tr>
      <td><?= $i++; ?></td>
      <td><?= $paym['mobile'] ?><br><?= $paym['email'] ?></td>
      <td><?= $paym['amount'] ?> <?= $paym['currency'] ?></td>
      <td><?php
if ($paym['instrument_type']=="paypal") {
  echo "<i class='badge badge-info'>Paypal</i>";
}
else
{
    echo "<i class='badge badge-warning'>Other</i>";
}
      ?></td>
      <td><?= $paym['purpose'] ?></td>
    <td><?= $paym['con'] ?></td>
    </tr>
<?php
}
?>
  </tbody>
           </table>
           </div>
            </div>
            <!-- /.container-fluid -->