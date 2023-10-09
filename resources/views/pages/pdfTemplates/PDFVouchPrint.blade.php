<div class="container mx-auto">
  <div class="flex justify-between items-center">
    <center>
        <img src="{{ $base64Image }}" alt="Profile Picture" class="mx-auto" style="height: 105px; weight: 135px;">
        <h1 class="cursive-title mb-0">
            <em class="emphasized-text">Dahlia Customs Brokerage</em><br/>
            <span class="text-sm">Unit 232/233 2nd Floor Nova Tierra Square Davao City</span>
        </h1>
        <h1 class="text-xl">REQUEST VOUCHER</h1>
    </center>
    <h1> </h1>
    <h1> </h1>
    <div class="w-1/2 text-right">
      <h3 class="text-red-300 custom-h3 moneyword">ID No#: {{ $vouchreqs->id }}</h3>
      <h3>Date: {{ $date }}</h3>
    </div>
  </div>
  <div class="w-1/2 text-left">
      <h3>Paid To: <span class="moneyword">{{ $customers->name }}</span></h3>
      <h3>Request Details: <span class="moneyword">{{ $vouchreqs->comments }}</span></h3>
    </div>
  </div>

  <div class="my-4 items-center">
    <table class="w-full table-auto text-wrap">
      <thead>
        <tr>
          <th class="text-left px-4 py-2">PARTICULARS</th>
          <th class="text-right px-4 py-2">AMOUNT</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-left px-4 py-2">{{ $vouchreqs->particulars}}</td>
          <td class="text-right px-4 py-2">{{ 'PHP '.number_format($vouchreqs->amount, 2, '.', ',') }}</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td class="text-left px-4 py-2">TOTAL</td>
          <td class="text-right px-4 py-2">{{ 'PHP '.number_format($vouchreqs->amount, 2, '.', ',') }}</td>
        </tr>
      </tfoot>
    </table>
</div>

  <div class="my-4">
    <p>Requested By: <span class="moneyword">{{ $vouchreqs->requested_by }}</span></p>
    <p>Checked by: <span class="moneyword">{{ $vouchreqs->check_by }}</span></p>
    <p>Approved by: _________________________</span></p>
  </div>
  <div class="my-4">
    <p>Received from (________________________) the amount of <span class="moneyword">(PHP {{ $amountword }} )</span> in full payment of amount describe above.</p>
  </div>
</div>
<style>
          .text-red-300 {
            color: #EF4444; /* Define the color corresponding to Tailwind CSS text-red-300 */
        }
        
        .custom-h3 {
            font-size: 1.5rem; /* Customize the font size as needed */
            font-weight: bold; /* Add bold style if needed */
        }
        .moneyword {
          text-decoration: underline;
        }
        .container {
        max-width: 960px;
        }

        table {
        border-collapse: collapse;
        }

        th, td {
        border: 1px solid #ccc;
        padding: 8px;
        }

        th {
        background-color: #f5f5f5;
        }

        tr:last-child td {
        border-bottom: none;
        }

        .my-4 {
        margin: 1.6rem 0;
        }

        .text-right {
        text-align: right;
        }

        h1, h2, h3 {
        font-weight: 700;
        }

        h1 {
        font-size: 1.6rem;
        }

        h2 {
        font-size: 1.4rem;
        }

        h3 {
        font-size: 1.2rem;
        }

        p {
        font-size: 1rem;
        }

        .emphasized-text {
            font-size: 24px; /* Adjust the size as needed */
        }

        .text-sm {
            font-size: 15px; /* Adjust the size as needed */
        }

</style>