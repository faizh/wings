<div class="container">
  <div class="position-relative mt-3">
    <div class="text-center mb-5">
      <h3>Report</h3>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Transactions</th>
              <th scope="col">User</th>
              <th scope="col">Total</th>
              <th scope="col">Date</th>
              <th scope="col">Item</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transactions as $transaction) { ?>
               <tr>
                <th><?= $transaction->document_code . ' - ' . $transaction->document_number ?></th>
                <td><?= $transaction->user ?></td>
                <td><?= "Rp. " . number_format($transaction->total) ?></td>
                <td><?= $transaction->create_date ?></td>
                <td>
                  <?php foreach ($transaction_details[$transaction->document_number] as $transaction_detail) { ?>
                    <p><?= $transaction_detail->product_name . ' x ' . $transaction_detail->quantity ?> </p>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>